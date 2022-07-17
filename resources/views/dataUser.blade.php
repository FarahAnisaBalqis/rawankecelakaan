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
    <title>Ziggy HTML Template</title>
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


    <section class="w-100" style="background-color: #2B333F">
        <a href="{{ route('login') }}" class="text-decoration-none text-white m-4 py-1 btn btn-outline-light me-2">
            <h5>Log in</h5>
        </a>
        <a href="/" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Home</h5>
        </a>
        <a href="{{ route('heatmap user', ['show' => 1, 'radius' => 0.001]) }}"
            class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Maps</h5>
        </a>
        <a href="{{ route('Data user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn"
            style="border-bottom:1px solid white;">
            <h5>Data</h5>
        </a>
        <a href="{{ route('panduan-user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Panduan</h5>
        </a>

    </section>

    <section class="second-section">

        <div class="container">
            <!--data dashboard user-->
            <div class="row mb-2">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="card p-3 mb-3 bg-info h-100">
                        <div class="inner">
                            <h3 class="text-white">{{ $kecamatan }}</h3>

                            <p class="text-white">Kecamatan Dengan Kasus Kecelekaan Terbanyak</p>
                        </div>


                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="card p-3 mb-3 bg-success h-100">
                        <div class="inner">
                            <h3 class="text-white">{{ $tanggal }}</h3>

                            <p class="text-white">Tahun Dengan Kasus Kecelakaan Terbanyak</p>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="card p-3 mb-3 bg-warning h-100">
                        <div class="inner">
                            <span class="h3 text-white">{{ $sifat->count }} </span> <span
                                class="text-white">{{ $sifat->sifat_cidera }}</span>

                            <p class="text-white">Jumlah Sifat Cidera Terbanyak</p>
                        </div>


                    </div>
                </div>
                <!-- ./col -->

            </div>
            <section>

                <div class="card">
                    <div class="card-header">
                        <span class="card-title h3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Grafik
                        </span>

                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="grafik1-button"
                                style="position: relative; height: 300px;">
                                <canvas id="grafik1" height="300" style="height: 300px;"></canvas>
                            </div>
                            <div class="chart tab-pane active" id="grafik2-button"
                                style="position: relative; height: 300px;">
                                <canvas id="grafik2" height="300" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </section>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
    integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    /*grafik kecamatan*/
    var labels = {!! json_encode($kec) !!};
    const data = {
        labels: labels,
        datasets: [{
            label: 'Jumlah Kecelakaan',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: {!! json_encode($kasus) !!},

        }],
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    min: 0,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    };
    const myChart = new Chart(
        document.getElementById('grafik1'),
        config
    );
</script>
<script>
    /*grafik tahun*/
    var labels2 = {!! json_encode($tahun) !!};
    const data2 = {
        labels: labels2,
        datasets: [{
            label: 'Jumlah Kecelakaan',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: {!! json_encode($jumlah) !!},

        }],
    };

    const config2 = {
        type: 'line',
        data: data2,
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    min: 0,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    };
    const myChart2 = new Chart(
        document.getElementById('grafik2'),
        config2
    );
</script>
