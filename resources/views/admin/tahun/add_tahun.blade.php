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
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #f6f6f6;">
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
                            <h1 class="m-0">Form Tahun</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Tahun</a></li>
                                <li class="breadcrumb-item active">Form</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="card-header d-flex align-items-center" style="background-color: #17a2b8; color: white; height: 70px">
                            <h3 class="card-title">Form Tahun</h3>
                        </div>
                        <form action="{{ url('upload_tahun') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tahun">Nama Tahun</label>
                                            <select name="tahun" id="tahun" class="form-control" required>
                                                <!-- JavaScript will populate this dropdown with year options -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button aligned to the right -->
                                <div class="form-footer">
                                    <input class="btn btn-primary" type="submit" style="border-radius: 8px;" value="Add Tahun">
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: #17a2b8; color: white; height: 70px;">
                            </div>
                        </form>
                    </div>
                </div>
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

    <script>
        // Populating the year dropdown
        const select = document.getElementById("tahun");
        const currentYear = new Date().getFullYear();
        for (let year = 2014; year <= currentYear + 200; year++) {
            const option = document.createElement("option");
            option.value = year;
            option.text = year;
            select.appendChild(option);
        }
    </script>
</body>

</html>
