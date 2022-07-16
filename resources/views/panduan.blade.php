@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('storage/css/halaman-data.css') }}">
    <section class="second-section" style=" background-color: #EDE6DB">
        <div class="container">
            <div class="card p-4">
                <h3><b>Fitur Maps</b></h3>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 me-2 text-white rounded-circle px-1" style="width: fit-content text">
                            1
                        </span> Tekan "Lihat Semua" untuk melihat koordinat lokasi kecelakaan pertahun
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            2
                        </span> Tekan "Cetak Peta" untuk mencetak peta
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            3
                        </span> Tekan scale button untuk mengatur transparansi
                    </div>
                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/maps.png') }}" alt="">
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="card p-4">
                <div class="col">
                    <h3><b>Fitur Heatmaps
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            1
                        </span>Tekan "pilih radius" untuk memilih radius
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            2
                        </span> Tekan "Lihat Semua" untuk melihat daerah rawan kecelakaan pertahun
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            3
                        </span> Tekan button tampil titik untuk melihat koordinat pada halaman heatmaps
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            4
                        </span> Tekan button "Cetak Peta" untuk mencetak peta
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            5
                        </span> Tekan scale button untuk mengatur transparansi
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/heatmap.png') }}" alt=""></div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="card p-4">
                <div class="col">
                    <h3><b>Fitur Dashboard
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            1
                        </span> Anda dapat melihat informasi mengenai kecamatan dan tahun dengan kasus kecelakaan terbanyak, juga sifat cidera terbanyak
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/data1.png') }}" alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            2
                        </span> Anda dapat melihat grafik total kecelakaan setiap kecamatan
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/kecamatan.png') }}" alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            3
                        </span> Anda dapat melihat grafik total kecelakaan setiap tahun
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/tahun.png') }}" alt="">
                    </div>
                </div>

                  <div class="container">
            <div class="card p-4">
                <div class="col">
                    <h3><b>Fitur Dashboard
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            1
                        </span> Anda dapat melihat informasi mengenai kecamatan dan tahun dengan kasus kecelakaan terbanyak, juga sifat cidera terbanyak
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/data1.png') }}" alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            2
                        </span> Anda dapat melihat grafik total kecelakaan setiap kecamatan
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/kecamatan.png') }}" alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                            3
                        </span> Anda dapat melihat grafik total kecelakaan setiap tahun
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/tahun.png') }}" alt="">
                    </div>
                </div>


                <div class="container">
                    <div class="card p-4">
                        <div class="col">
                            <h3><b>Fitur Data Kecelakaan
                        </div>
                        <div class="mt-2">
                            <div class="mb-2">
                                <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                                    1
                                </span> Anda dapat menambahkan data pada button "Masukkan Data Baru"
                            </div>
                        </div>
        
                        <div class="mt-2">
                            <div class="mb-2">
                                <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                                    2
                                </span> Anda dapat mengedit data pada button "pensil" dan "tempat sampah"
                            </div>
                        </div>
        
                        <div class="mt-2">
                            <div class="mb-2">
                                <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                                    3
                                </span> Anda dapat mencari data pada kolom "search"
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="mb-2">
                                <span class="bg-dark me-2 text-white rounded-circle px-1" style="width: fit-content">
                                    4
                                </span> Anda dapat mendownload data pada button "excel"
                            </div>
        
                            <div class="text-center"><img class="mx-auto" width="700"
                                    src="{{ asset('storage/img/tahun.png') }}" alt="">
                            </div>
                        </div>





                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/data.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
