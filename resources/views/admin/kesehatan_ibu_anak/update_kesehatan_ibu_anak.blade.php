<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .btn-custom {
            background-color: #d2dc02;
            color: white;
            border: none;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #bfc900;
            color: white;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed " style="background-color: #f6f6f6;>
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
    <div class="content-wrapper" style="margin-bottom: 50px; background-color: #f6f6f6;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Form Kesehatan Ibu & Anak</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Kesehatan Ibu & Anak Menular</a></li>
                            <li class="breadcrumb-item active">Form</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header d-flex align-items-center"
                            style="background-color: #16b3ac; color: white; height: 70px">
                        <h3 class="card-title">Form Kesehatan Ibu & Anak</h3>
                    </div>
                    <form action="{{ url('edit_kesehatan_ibu_anak', $data->id) }}" method="Post" enctype="multipart/form-data">

                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="row">
                           <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <select class="form-control select2" name="tahun_id" style="width: 100%;">
                                            @foreach ($tahuns as $tahun)
                                                <option value="{{ $tahun->id }}"
                                                    {{ $tahun->id == $data->tahun_id ? 'selected' : '' }}>
                                                    {{ $tahun->tahun }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                                
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>kecamatan</label>
                                        <select class="form-control select2" name="kecamatan_id" style="width: 100%;">
                                            @foreach ($kecamatans as $kecamatan)
                                                <option value="{{ $kecamatan->id }}"
                                                    {{ $kecamatan->id == $data->kecamatan_id ? 'selected' : '' }}>
                                                    {{ $kecamatan->kecamatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Indikator KIA</label>
                                        <select class="form-control select2" name="indikator_id" style="width: 100%;">
                                            @foreach ($ibu_anaks as $ibu_anak)
                                                <option value="{{ $ibu_anak->id }}"
                                                    {{ $ibu_anak->id == $data->indikator_id ? 'selected' : '' }}>
                                                    {{ $ibu_anak->indikator }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah">jumlah</label>
                                        <input type="text" name="jumlah" class="form-control"
                                            value="{{ $data->jumlah }}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="form-footer ">
                                  <input class="btn btn-primary" type="submit" style="border-radius: 8px; width: 200px;" value="Edit KIA">
                            </div>
                        </div>
                        <div class="card-footer " style="background-color: #16b3ac; color: white; height: 70px">
                            
                        </div>
                    </form>
                </div>
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
