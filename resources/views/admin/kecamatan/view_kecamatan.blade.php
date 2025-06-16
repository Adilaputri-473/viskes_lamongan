<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .table-bordered {
            border: 1px solid #dee2e6;
            margin-bottom: 0;
            width: 100%;
            background-color: #fff;
            text-align: center;
            vertical-align: middle;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 10px;
            white-space: nowrap;
            vertical-align: middle;
        }

        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
        }
        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-right: 35px;
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Table Kecamatan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Kecamatan</a></li>
                                <li class="breadcrumb-item active">Table</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex align-items-center"
                            style="background-color: #17a2b8; color: white; height: 70px">
                            <h3 class="card-title">Table Kecamatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button type="button" class="btn btn-block btn-success" style="width:200px; border-radius: 8px;"
                                onclick="window.location.href='{{ url('add_kecamatan') }}'">
                                <i class="fas fa-plus" style="padding-right: 8px;"></i> Add Kecamatan
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>kecamatan</th>
                                            <th style="width: 80px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kecamatan as $kecamatans)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kecamatans->kecamatan }}</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ url('update_kecamatan', $kecamatans->id) }}"
                                                            class="btn btn-info " style="border-radius: 8px; padding-right: 8px;">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ url('delete_kecamatan', $kecamatans->id) }}"
                                                            class="btn btn-danger" title="Delete" style="border-radius: 8px; padding-right: 8px; margin-left: 10px;"
                                                            onclick="confirmation(event)"><i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-footer clearfix">
                                  {{ $kecamatan->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix"  style="background-color: #17a2b8; color: white; height: 70px">
                            
                        </div>
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

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            var userChoice = confirm("Are you sure you want to delete this kecamatan?");
            if (userChoice) {
                window.location.href = urlToRedirect;
            }
        }
    </script>

</body>

</html>
