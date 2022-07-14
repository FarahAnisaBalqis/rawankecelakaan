@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('storage/css/halaman-data.css') }}">


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title" style="background-color: #2B333F">
                    <div class="row">
                        <div class="col-sm-6" style="background-color: #2B333F">
                            <h2>Data <b>Kecelakaan</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('tambah data2') }}" class="btn btn-primary"><i
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
                            <th>Kecamatan</th>
                            <th>Instansi No.Laporan Polisi</th>
                            <th>Waktu Kejadian</th>
                            <th>Deskripsi Lokasi</th>
                            <th>Sifat dan Kasus Kecelakaan</th>
                            <th>Biodata Korban</th>
                            <th>Sifat Cidera</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->tematik->kecamatan }}</td>
                                <td>{{ $item->no_laporan }}</td>
                                <td>{{ $item->waktu->isoFormat('DD MMMM Y hh:mm:ss') }}</td>
                                <td>{{ $item->deskripsi_lokasi }}</td>
                                <td>{{ $item->sifat_kasus }}</td>
                                <td>{{ $item->bio_korban }}</td>
                                <td>{{ $item->sifat_cidera }}</td>

                                <td class="w-25">

                                    <form action="{{ route('delete data2', ['id' => $item->id]) }}" method="get">
                                        <a href="{{ route('edit data2', ['id' => $item->id]) }}"
                                            class="edit"><i class="material-icons" data-toggle="tooltip"
                                                title="Edit">&#xE254;</i></a>
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
                pageLength: 100,
                 dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                scroller: true,
                oSearch: { "bSmart": false, "bRegex": true }
            });
        });
    </script>
@endsection
