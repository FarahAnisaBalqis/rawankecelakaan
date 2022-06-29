@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('storage/css/halaman-data.css') }}">
    <section class="second-section" style=" background-color: #EDE6DB">
        <div class="container">
            <div class="card p-4">
                <h3><b>Cara Melakukan Pendaftaran Vaksinasi</b></h3>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 me-2 text-white rounded-circle px-1" style="width: fit-content">
                            1
                        </span> Tekan tombol "Daftar Vaksinasi"
                    </div>
                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/daftar.png') }}" alt="">
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            2
                        </span> Isi data diri Anda, lalu tekan tombol daftar
                    </div>
                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/IsiData.png') }}" alt="">
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="card p-4">
                <div class="col">
                    <h3><b>Jika Anda Pihak Gerai Vaksin/PUSKESMAS/Rumah Sakit
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            1
                        </span>Login menggunakan Akun yang sudah diberikan
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/LoginRS.png') }}" alt="">
                    </div>
                </div>


                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            2
                        </span> Tekan tombol ceklis jika masyarakat berhasil melakukan vaksinasi dan tekan tombol hapus
                        jika masyarakat batal melakukan vaksinasi
                    </div>
                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/DataDaftar.png') }}" alt=""></div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            3
                        </span>Menu untuk melihat data yang sudah terverifikasi, jika data sudah
                        tidak dibutuhkan tekan tombol hapus
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/verifikasi.png') }}" alt=""></div>

                </div>

            </div>
        </div>

        <div class="container">
            <div class="card p-4">
                <div class="col">
                    <h3><b>Jika Anda Pihak Dinas Kesehatan
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            1
                        </span> Login menggunakan Akun yang sudah diberikan
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/loginAdmin.png') }}" alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            2
                        </span> Menu dashboard akan menampilkan informasi capaian vaksinasi
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/dashboard.png') }}" alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            3
                        </span> Menu Maps menampilkan beberapa informasi dalam bentuk peta seperti sebaran lokasi, desa,
                        kecamatan dan rute
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/lokasi.png') }}" alt="">
                    </div>
                </div>



                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-success me-2 text-white rounded-circle px-1" style="width: fit-content">
                            4
                        </span>
                        Menu Data menampilkan beberapa informasi dalam bentuk tabel seperti data vaksinasi, data
                        lokasi,
                        data desa, data kecamatan dan data user. Pada halaman ini Admin juga dapat melakukan
                        input data atau edit data
                    </div>

                    <div class="text-center"><img class="mx-auto" width="700"
                            src="{{ asset('storage/img/data.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
