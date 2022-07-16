<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--

Template 2091 Ziggy

http://www.tooplate.com/view/2091-ziggy

-->
    <title>Rawan Kecelakaan Kota Banda Aceh dan Sekitarnya</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('storage/css/tooplate-style.css') }}" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>

<style>
        input[type="range"] {
            -webkit-appearance: slider-vertical;
            background-color: #9a905d;
        }

    </style>
    <section class="w-100" style="background-color: #2B333F">
        <a href="{{ route('login') }}" class="text-decoration-none text-white m-4 py-1 btn btn-outline-light me-2">
            <h5>Log in</h5>
        </a>
        <a href="{{ route('Map user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn"
            >
            <h5>Maps</h5>
        </a>
        <a href="{{ route('heatmap user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Heatmaps</h5>
        </a>
        <a href="{{ route('Data user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn" >
            <h5>Data</h5>
        </a>
        <a href="#" class="text-decoration-none text-white m-4 py-1 me-2 btn" style="border-bottom:1px solid white;">
            <h5>Panduan</h5>
        </a>
        <a href="/" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Home</h5>
        </a>
    </section>

    <section class="pt-4" style=" background-color: #EDE6DB">
        <div class="container">
            <div class="card p-4">
                <h3><b>Fitur Maps</b></h3>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 me-2 text-dark rounded-circle px-2" style="width: fit-content">
                            1
                        </span> Tekan "Lihat Semua" untuk melihat koordinat lokasi kecelakaan pertahun
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            2
                        </span> Tekan "Cetak Peta" untuk mencetak peta
                    </div>
                </div>

                    <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            3
                        </span> Tekan scale button untuk mengatur transparansi
                        <div class="text-center mt-4"><img width="700" src="{{ asset('storage/img/maps.png') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-3 container">
            <div class="card p-4">
                <div class="col">
                    <h3><b>Fitur Heatmaps</b></h3>
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            1
                        </span>Tekan "pilih radius" untuk memilih radius
                    </div>
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            2
                        </span> Tekan "Lihat Semua" untuk melihat daerah rawan kecelakaan pertahun
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            3
                        </span>Tekan button tampil titik untuk melihat koordinat pada halaman heatmaps
                    </div> 
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            4
                        </span>Tekan button "Cetak Peta" untuk mencetak peta
                    </div> 
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            5
                        </span> Tekan scale button untuk mengatur transparansi

                        <div class="text-center mt-4"><img width="700" src="{{ asset('storage/img/heatmap.png') }}" alt="">
                        </div>
                    </div> 
                </div>
            </div>
        </div>


        <div class="mt-3 container">
            <div class="card p-4">
                <div class="col">
                    <h3><b>Fitur Data</b></h3>
                </div>
                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            1
                        </span> Anda dapat melihat informasi mengenai kecamatan dan tahun dengan kasus kecelakaan terbanyak, juga sifat cidera terbanyak
                    </div>

                    <div class="text-center"><img width="700" src="{{ asset('storage/img/data1.png') }}"
                            alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            2
                        </span> Anda dapat melihat grafik total kecelakaan setiap kecamatan
                    </div>

                    <div class="text-center"><img width="700" src="{{ asset('storage/img/kecamatan.png') }}"
                            alt=""></div>

                </div>

                <div class="mt-2">
                    <div class="mb-2">
                        <span class="bg-dark me-2 text-white rounded-circle px-2" style="width: fit-content">
                            3
                        </span> Anda dapat melihat grafik total kecelakaan setiap tahun
                    </div>

                    <div class="text-center"><img width="700" src="{{ asset('storage/img/tahun.png') }}" alt="">
                    </div>
                </div>

                    <div class="text-center"><img width="700" src="{{ asset('storage/img/data.png') }}" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-white">Jasa Raharja </h4>
                </div>
            </div>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

</body>

</html>
