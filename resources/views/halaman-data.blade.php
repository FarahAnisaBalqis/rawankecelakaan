@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('storage/css/halaman-data.css') }}">


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title" style="background-color: #2B333F">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Data <b>Rawan </b><b>Kecelakaan</b></h2>
                        </div>
                        {{-- button untuk print --}}
                        <div class="col-sm-6">
                             <a href="{{ route('export') }}" class="btn btn-primary">Print</a>
                            <a href="{{ route('tambah data') }}"class="btn btn-primary"><i
                                    class="material-icons">&#xE147;</i> <span>Masukkan Data Baru</span></a>
                        </div>
                    </div>
                </div>
                <table id="table" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>Instansi No.Laporan Polisi</th>
                            <th>Kecamatan</th>
                            <th>Alamat</th>
                            <th>Jumlah Kecelakaan</th>
                            <th>Tahun</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->no_laporan }}</td>
                                <td>{{ $item->tematik->kecamatan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->jumlah_kecelakaan }}</td>
                                <td>{{ $item->tanggal }}</td>

                                <td class="w-25">

                                    <form action="{{ route('delete data', ['id' => $item->id]) }}" method="get">
                                        <a href="{{ route('detail map', ['id' => $item->id]) }}" class="edit" data-toggle="tooltip" title="Detail"><i
                                                class="fas fa-map-marker-alt text-danger"></i></a>
                                        <a href="{{ route('edit data', ['id' => $item->id]) }}" class="edit"><i
                                                class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <button type="submit" class="delete show_confirm border-0 p-0 bg-transparent"><i
                                                class="material-icons" data-toggle="tooltip"
                                                title="Delete">&#xE872;</i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Anda yakin ingin menghapus data ini`,
                    text: "Data akan hilang secara permanen",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

        $(document).ready(function() {
            $('#table').DataTable({
                fixedHeader: true,
                pageLength: 100
            });
        });
    </script>
@endsection
