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
                            <h1 class="m-0">Form Indikatir Gizi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Indikatir Gizi</a></li>
                                <li class="breadcrumb-item active">Form</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content" >
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="card-header d-flex align-items-center" style="background-color:#16b3ac; color: white; height: 70px">
                            <h3 class="card-title">Form Indikatir Gizi</h3>
                        </div>
                        <form action="{{ url('upload_gizi') }}" method="Post" enctype="multipart/form-data">

                            @csrf
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="indikator">Indikatir Gizi</label>
                                            <input type="text" name="indikator" class="form-control" required>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.row -->
                                
                                <!-- Button aligned to the right -->
                                <div class="form-footer">
                                    <input class="btn btn-primary" type="submit" style="border-radius: 8px;" value="Add Indikatir Gizi">
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
