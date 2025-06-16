<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
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

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
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
    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper" style="background-color: #f6f6f6;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Import Excel Kasus Penyakit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Kasus Penyakit</a></li>
                            <li class="breadcrumb-item active">Import Excel</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header d-flex align-items-center"
                         style="background-color: #16b3ac; color: white; height: 70px">
                        <h3 class="card-title">Form Import Excel</h3>
                    </div>

                    <form action="{{ url('import_status_gizi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="excel_file">Pilih File Excel</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="excel_file" required>
                                    <label class="custom-file-label" for="excel_file">Choose file</label>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-upload" style="padding-right: 8px;"></i> Import File
                                </button>
                            </div>
                        </div>

                        <div class="card-footer" style="background-color: #16b3ac; color: white; height: 70px">
                            <!-- Optional footer content -->
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    @include('admin.footer')
</div>

@include('admin.js')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileInput = document.getElementById("excel_file");
            if (fileInput.files.length > 0) {
                var fileName = fileInput.files[0].name;
                var label = e.target.nextElementSibling;
                if (label) {
                    label.innerText = fileName;
                }
            }
        });
    });
</script>

</body>
</html>
