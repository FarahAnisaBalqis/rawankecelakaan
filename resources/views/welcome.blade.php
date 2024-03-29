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

    <a href="{{ route('login') }}"
        class="text-decoration-none text-white position-absolute m-4 py-1 btn btn-outline-light">
        <h4>Log in</h4>
    </a>
    <section class="first-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h2>Selamat Datang Di WebGIS Rawan Kecelakaan Lalu Lintas</h2>
                        <div class="line-dec"></div>
                        <span>Di Kota Banda Aceh  &amp; dan Sekitarnya</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="second-section">
        <div class="container">
            <div class="row mx-auto">
              
                <div class="col-md-4 col-sm-8">
                    <a href="{{ route('heatmap user',['show'=>1,'radius'=>0.001]) }}" class="btn btn-outline-info py-2">
                        <div class="service-item">
                            <div class="icon">
                                <i class="fa-solid fa-map-location h1"></i>
                            </div>
                            <h4>Maps</h4>
                            <p>Maps adalah fitur yang akan menampilkan peta rawan kecelakaan, selain itu fitur maps juga memiliki fitur pendukung lainnya</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-8">
                    <a href="{{route('Data user')}}" class="btn btn-outline-info py-2">
                        <div class="service-item">
                            <div class="icon">
                                <i class="fa-solid fa-database h1"></i>
                            </div>
                            <h4>Data</h4>
                            <p>Fitur data adalah fitur yang menampilkan informasi - infromasi umum mengenai rawan kecelakaan, selain itu fitur ini juga dilengkapi dengan informasi grafik </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-8">
                    <a href="{{ route('panduan-user') }}" class="btn btn-outline-info py-2">
                        <div class="service-item">
                            <div class="icon">
                                <i class="fa-solid fa-book h1"></i>
                            </div>
                            <h4>Panduan</h4>
                            <p>Panduan adalah halaman menampilkan tata cara mengenai tata cara penggunaan fitur - fitur WebGIS ini</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="third-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="left-image col-md-4">
                        <img src="{{ asset('storage/img/left-image.png') }}" alt="">
                    </div>
                    <div class="right-text col-md-8">
                        <h4>Tips Berkendara Aman di Jalan Raya</h4>
                        <p>1. Sebelum Pergi Selalu Periksa Kendaraan Anda <br>2. Selalu Gunakan Sabuk Pengaman <br>
                            3. Jangan Pernah Melawan Arus <br>
                            4. Mematuhi Kecepatan Berkendara <br>
                            5. Dilarang Menyalip dari Bahu Jalan <br>
                            6. Dilarang Bermain Handphone <br>
                            7. Jangan Lupa Istirahat Ketika Mengantuk</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="fivth-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="left-text col-md-8" style="text-color: black">
                        <h4><em>Aliquam efficitur</em><br>augue et libero vulputate feugiat</h4>
                        <p>Mauris eget orci porta, aliquam neque sit amet, porttitor dui. Donec efficitur vehicula justo
                            quis varius. Vivamus pharetra lorem eget turpis ornare tempus. Vivamus ac sodales lectus.
                            Morbi rhoncus feugiat neque ultrices rhoncus. Maecenas ultrices, nisl pellentesque hendrerit
                            dignissim, ante purus hendrerit urna, eu tristique est massa quis risus.</p>
                    </div>
                    <div class="right-image col-md-4">
                        <img src="{{ asset('storage/img/right-image.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="sixth-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-5">
                    <div class="right-info">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i>aceh@jasaraharja.co.id</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>(0651) 41441</a></li>
                            <li><a href="#"><i class="fa fa-map-marker"></i>Jl. Teuku Umar No.350, Seutui, </a></li>
                                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- <ul>
                        <li><a href="https://www.facebook.com/tooplate"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul> --}}
                    <p>Copyright &copy; 2022 Jasa Raharja

                        {{-- | Design: <a href="https://www.facebook.com/tooplate" target="_parent">Tooplate</a></p> --}}
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
