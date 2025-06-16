<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #f6f6f6;>
    <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" height="100"
            width="120">
    </div>

    <!-- Navbar -->
    @include('admin.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.sidebar')
    <!-- /. Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- Total User -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{ $totalUsers }}</h3>
            <p>Users</p>
        </div>
        <div class="icon">
            <i class="fas fa-user"></i>
        </div>
        <a href="{{ url('view_user') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<!-- Total Tahun -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3>{{ $totalTahuns }}</h3>
            <p>Tahun</p>
        </div>
        <div class="icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <a href="{{ url('view_tahun') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{ $totalKecamatans }}</h3>
            <p>Kecamatan</p>
        </div>
        <div class="icon">
            <i class="fas fa-map-marked-alt"></i>
        </div>
        <a href="{{ url('view_kecamatan') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<!-- Total Ibu & Anak -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-primary">
        <div class="inner">
            <h3>{{ $totalIbuAnaks }}</h3>
            <p>Indikator KIA</p>
        </div>
        <div class="icon">
            <i class="fas fa-baby"></i>
        </div>
        <a href="{{ url('view_ibu_anak') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<!-- Total Gizi -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-secondary">
        <div class="inner">
            <h3>{{ $totalGizis }}</h3>
            <p>Indikator Gizi</p>
        </div>
        <div class="icon">
            <i class="fas fa-apple-alt"></i>
        </div>
        <a href="{{ url('view_gizi') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<!-- Total Penyakit Menular -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-dark">
        <div class="inner">
            <h3>{{ $totalPenyakitMenulars }}</h3>
            <p>Penyakit Menular</p>
        </div>
        <div class="icon">
            <i class="fas fa-virus"></i>
        </div>
        <a href="{{ url('view_penyakit_menular') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div
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
    @include('admin.footer')
    <!-- /.footer -->

    </div>
    <!-- ./wrapper -->

    @include('admin.js')
</body>

</html>
