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
            border-radius: 8px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-right: 35px;
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

        .btn-danger {
            border-radius: 8px !important;
        }

        .btn-group-sm > .btn {
            border-radius: 8px !important;
        }

        .btn-success {
            border-radius: 8px;
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
                            <h1 class="m-0">Table User</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">User</a></li>
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
                            style="background-color: #16b3ac; color: white; height: 70px">
                            <h3 class="card-title">Table User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="d-flex justify-content-start mb-3">
                               <button type="button" class="btn btn-block btn-success" style="width:200px; border-radius: 8px;"
                                onclick="window.location.href='{{ url('add_user') }}'">
                                <i class="fas fa-plus" style="padding-right: 8px;"></i> Add User
                            </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th style="width: 80px">Aksi</th
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                 <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $user->status ? 'success' : 'secondary' }}">
                                                        {{ $user->status ? 'Aktif' : 'Inaktif' }}
                                                    </span>
                                                </td>
                                               <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ url('update_user', $user->id) }}"
                                                            class="btn btn-info " style="border-radius: 8px;" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ url('delete_user', $user->id) }}"
                                                            class="btn btn-danger" title="Delete"
                                                            style="border-radius: 8px; margin-left: 10px;" 
                                                            onclick="confirmation(event)">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-footer clearfix">
                                  {{ $users->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix" style="background-color: #16b3ac; color: white; height: 70px">
                            
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
            var userChoice = confirm("Are you sure you want to delete this User?");
            if (userChoice) {
                window.location.href = urlToRedirect;
            }
        }
    </script>

</body>

</html>
