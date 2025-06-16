<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background:
                radial-gradient(circle at 95% 5%, rgba(210, 220, 2, 0.25) 10%, transparent 40%),
                radial-gradient(circle at 5% 95%, rgba(22, 179, 172, 0.25) 10%, transparent 40%),
                #ffffff;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-in-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .intro-section,
        .visualisasi-section {
            min-height: 100vh;
            padding: 50px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .intro-section {
            background-color: #16b3ac;
            color: white;
        }

        .visualisasi-section {
            background:
                radial-gradient(circle at 95% 5%, rgba(210, 220, 2, 0.25) 10%, transparent 40%),
                radial-gradient(circle at 5% 95%, rgba(22, 179, 172, 0.25) 10%, transparent 40%),
                #ffffff;
            color: #16b3ac;
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            background-color: #d2dc02;
            border: none;
            color: #333;
        }

        .btn-primary:hover {
            background-color: #c3c90b;
            color: #000;
        }

        .card {
            background-color: #ffffff;
            color: #333;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            animation: floatCard 3s ease-in-out infinite;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            animation-play-state: paused;
            transform: scale(1.01);
        }

        @keyframes floatCard {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

       
        .visualisasi-section a {
            color: #16b3ac;
            text-decoration: underline;
        }

        /* Tambahan hover kalau ingin efek saat diarahkan */
        .visualisasi-section a:hover {
            color: #0f8e89;
        }

        h3.text-center {
            color: #16b3ac;
            font-weight: bold;
            position: relative;
            display: inline-block;
        }

        h3.text-center::after {
            content: "";
            display: block;
            width: 60%;
            height: 4px;
            background-color: #d2dc02;
            margin: 8px auto 0;
            border-radius: 4px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" height="100" width="120">
        </div>

        <!-- Navbar -->
        @include('home.navbar')

        <!-- Content Wrapper -->
        <div class="content-wrapper" style="margin: 0; padding: 0;">

            <!-- Content Wrapper -->
        <div class="content-wrapper" style="margin: 0; padding: 0;">
            <!-- Visualisasi Data Section -->
            <div class="visualisasi-section" id="dataCards">
                <div class="card p-4 fade-in" style="max-width: 800px;">
                    <p class="mb-3">
                        Halaman ini menyediakan akses ke file <strong>Profil Kesehatan Kabupaten Lamongan</strong> 
                        yang tersedia sebagai sumber data untuk visualisasi data kesehatan.
                    </p>
                    <p class="mb-2">
                        Silakan <a href="{{ url('/login') }}"><strong>login</strong></a> menggunakan akun Anda untuk melanjutkan proses unduhan.
                    </p>
                    <p>
                        Jika Anda belum memiliki akun, mohon melakukan <a href="{{ url('/register') }}"><strong>registrasi</strong></a> terlebih dahulu.
                    </p>
                </div>
            </div>
        </div>
            

        <!-- Footer -->
        @include('home.footer')
    </div>

    @include('home.js')

    <script>
        // Fade in effect on scroll
        document.addEventListener('DOMContentLoaded', function () {
            const fadeIns = document.querySelectorAll('.fade-in');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            fadeIns.forEach(el => observer.observe(el));
        });
    </script>
</body>

</html>
