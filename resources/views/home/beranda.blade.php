<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>


<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #f6f6f6;>
    <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" height="100"
            width="120">
    </div>

    <!-- Navbar -->
    @include('home.navbar')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper " style="margin: 0; padding: 0;">
        <!-- Page Header -->
        <div class="content-header" style="padding: 20px 0;">
            <h1 class="text-center">Visualisasi Data Cakupan Imunisasi dan Penyakit yang Dapat Dicegah dengan Imunisasi
            </h1>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row justify-content-center">
                    <!-- Box Target Imunisasi -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalTargetImunisasis }}</h3>
                                <p>Target Imunisasi</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ url('view_target_imunisasi') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Box Jenis Imunisasi -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalJenisImunisasis }}</h3>
                                <p>Jenis Imunisasi</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-syringe"></i>
                            </div>
                            <a href="{{ url('view_jenis_imunisasi') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Box Penyakit -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $totalPenyakits }}</h3>
                                <p>Penyakit</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-virus"></i>
                            </div>
                            <a href="{{ url('view_penyakit') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="scroll-container" id="sourceScroll">
                        <a href="https://lamongankab.go.id/beranda/documents/dinkes/profilkes_lamongan_2020.pdf"
                            class="source-card-index" target="_blank">
                            Profil Kesehatan Lamongan 2020
                        </a>
                        <a href="https://lamongankab.go.id/beranda/documents/dinkes/profil%20kesehatan%20lamongan%202021.pdf"
                            class="source-card-index" target="_blank">
                            Profil Kesehatan Lamongan 2021
                        </a>
                        <a href="https://drive.google.com/file/d/1mCyRHCNmRN5_AiNJ_e9f6SS67H-wjh5l/view"
                            class="source-card-index" target="_blank">
                            Profil Kesehatan Lamongan 2022
                        </a>
                        <a href="https://drive.google.com/file/d/1aNS4JGKeQBkLzT9EV8qlq7bSiJHegeQ1/view"
                            class="source-card-index" target="_blank">
                            Profil Kesehatan Lamongan 2023
                        </a>
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <!--@include('home.footer')-->
    <!-- /.footer -->

    </div>
    <!-- ./wrapper -->

    @include('home.js')
</body>

</html>
