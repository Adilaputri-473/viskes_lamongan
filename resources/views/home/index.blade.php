<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease-in-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .uiverse-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            }

            .uiverse-container .glass {
            position: relative;
            width: 180px;
            height: 200px;
            background: linear-gradient(#fff2, transparent);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 25px rgba(0, 0, 0, 0.25);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.5s;
            border-radius: 10px;
            margin: 0 -45px;
            backdrop-filter: blur(10px);
            transform: rotate(calc(var(--r) * 1deg));
            overflow: hidden;
            }

            .uiverse-container:hover .glass {
            transform: rotate(0deg);
            margin: 0 10px;
            }

            .uiverse-container .glass::before {
            content: attr(data-text);
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
            background: rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: bold;
            backdrop-filter: blur(2px);
            }
            .uiverse-container a {
            text-decoration: none;
            }


        .intro-section,
        .visualisasi-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
        .sumberdata-section{
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
            padding-top: 20px;
            padding-bottom: 50px;
            padding-left: 20px;
            padding-right: 20px;
        }
        

        .visualisasi-section {
            background-color: #ffffff;
            color: #16b3ac;
            padding: 50px 20px;
        }

        .sumberdata-section {
            background-color: #16b3ac;
            color: white;
        }

        
        .btn-glow {
            background: linear-gradient(135deg, #d2dc02, #c2cf00);
            color: #fff;
            padding: 10px 25px;
            font-size: 1rem;
            border: none;
            border-radius: 25px;
            box-shadow: 0 0 15px rgba(210, 220, 2, 0.4);
            transition: 0.3s ease-in-out;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-glow:hover {
            box-shadow: 0 0 25px rgba(210, 220, 2, 0.7);
            transform: translateY(-3px);
        }



        .card-index {
            background-color: #e0f7f6;
            color: var(--text-color);
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            transform: translateY(0);
        }

        .card-index:hover,
        .card-index:focus-within {
            background-color: #16b3ac;
            color: white;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px) scale(1.03);
        }

        #dataCards {
            background: linear-gradient(180deg, #ffffff 0%, #f0fefc 100%);
            position: relative;
            z-index: 1;
        }

        .ornament {
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(22, 179, 172, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .ornament-top-right {
            top: 20px;
            right: 20px;
        }

        .ornament-bottom-left {
            bottom: 20px;
            left: 20px;
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

        .source-card-index {
            background-color: #ffffff;
            color: #16b3ac;
            text-decoration: none;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            min-width: 220px;
            margin-right: 16px;
            display: inline-block;
        }

        .source-card-index:hover {
            background-color: #d2dc02;
            color: white;
        }

        .scroll-container {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding: 10px;
        }

        .scroll-container::-webkit-scrollbar {
            display: none;
        }
        .extra-circle {
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        /* Untuk ornament-top-right: */
        .extra-1 {
            width: 60px;
            height: 60px;
            background-color: #16b3ac;
            top: 190px;
            right: 20px;
            opacity: 0.3;
        }
        .extra-2 {
            width: 50px;
            height: 50px;
            background-color: #139892;
            top: 230px;
            right: 40px;
            opacity: 0.5;
        }
        .extra-3 {
            width: 40px;
            height: 40px;
            background-color: #0f726e;
            top: 260px;
            right: 60px;
            opacity: 0.7;
        }

        /* Untuk ornament-bottom-left: */
        .extra-4 {
            width: 60px;
            height: 60px;
            background-color: #16b3ac;
            bottom: 190px;
            left: 20px;
            opacity: 0.3;
        }
        .extra-5 {
            width: 50px;
            height: 50px;
            background-color: #139892;
            bottom: 230px;
            left: 40px;
            opacity: 0.5;
        }
        .extra-6 {
            width: 40px;
            height: 40px;
            background-color: #0f726e;
            bottom: 260px;
            left: 60px;
            opacity: 0.7;
        }

        .visualisasi-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    transform: translateY(0);
}


.visualisasi-card:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.25);
    z-index: 2;
}


.visualisasi-card:hover .border {
    background-color: #16b3ac;
    color: white;
    border-color: #16b3ac;
    transition: 0.3s ease;
}

.visualisasi-card:hover .border hr {
    background-color: white;
}

.visualisasi-card:hover i {
    transition: 0.3s ease;
}


    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #f0fefc;">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                height="100" width="120">
        </div>

        <!-- Navbar -->
        @include('home.navbar')

        <!-- Content Wrapper -->
        <div class="content-wrapper" style="margin: 0; padding: 0; background-color: #f0fefc;">

            <!-- Intro Section -->
            <div class="intro-section">
                <div class="uiverse-container container">
    @if(Auth::check())
        <a href="/kia">
            <div data-text="Imunisasi Dasar" style="--r:-15;" class="glass">
                <img src="/image/Imunisasi Dasar Lengkap.png" alt="Imunisasi Dasar Lengkap" style="width: 80%; height: auto; border-radius: 8px;">
            </div>
        </a>

        <a href="/penyakit_menular">
            <div data-text="Pneumonia 2020" style="--r:5;" class="glass">
                <img src="/image/Pneumonia 2020.png" alt="Pneumonia 2020" style="width: 80%; height: auto; border-radius: 8px;">
            </div>
        </a>

        <a href="/status_gizi">
            <div data-text="Status Gizi" style="--r:25;" class="glass">
                <img src="/image/Status Gizi.png" alt="Status Gizi" style="width: 80%; height: auto; border-radius: 8px;">
            </div>
        </a>
    @else
        <a href="/restriction_data">
            <div data-text="Imunisasi Dasar" style="--r:-15;" class="glass">
                <img src="/image/Imunisasi Dasar Lengkap.png" alt="Imunisasi Dasar Lengkap" style="width: 80%; height: auto; border-radius: 8px;">
            </div>
        </a>

        <a href="/restriction_data">
            <div data-text="Pneumonia 2020" style="--r:5;" class="glass">
                <img src="/image/Pneumonia 2020.png" alt="Pneumonia 2020" style="width: 80%; height: auto; border-radius: 8px;">
            </div>
        </a>

        <a href="/restriction_data">
            <div data-text="Status Gizi" style="--r:25;" class="glass">
                <img src="/image/Status Gizi.png" alt="Status Gizi" style="width: 80%; height: auto; border-radius: 8px;">
            </div>
        </a>
    @endif
</div>



                <div class="intro text-center mt-5">
                    <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">Visualisasi Interaktif Kesehatan</h2>
                    <h4 class="fw-semibold mb-3" style="color: #f6ff7c;">Kabupaten Lamongan</h4>
                    <p style="max-width: 800px; margin: 0 auto 20px; font-size: 1.1rem; line-height: 1.6;">
                        Akses cepat dan mudah terhadap informasi kesehatan masyarakat, hadir dalam format interaktif untuk memudahkan pemahaman
                        dan pengambilan keputusan kapan saja, di mana saja.
                    </p>

                    @if(Auth::check())
                        <button class="btn-glow" onclick="document.getElementById('dataCards').scrollIntoView({ behavior: 'smooth' });">
                            <i class="fas fa-database me-2"></i> Jelajahi Data Sekarang
                        </button>
                    @else
                        <button class="btn-glow" onclick="window.location.href='/restriction_data'">
                            <i class="fas fa-database me-2"></i> Jelajahi Data Sekarang
                        </button>
                    @endif

                </div>

            </div>

            @if(Auth::check())
            <!-- Visualisasi Data Section -->
            <div id="dataCards" class="visualisasi-section">
                <!-- Tambahan untuk ornament-top-right -->
                <div class="ornament ornament-top-right extra-circle extra-1"></div>
                <div class="ornament ornament-top-right extra-circle extra-2"></div>
                <div class="ornament ornament-top-right extra-circle extra-3"></div>

                <!-- Tambahan untuk ornament-bottom-left -->
                <div class="ornament ornament-bottom-left extra-circle extra-4"></div>
                <div class="ornament ornament-bottom-left extra-circle extra-5"></div>
                <div class="ornament ornament-bottom-left extra-circle extra-6"></div>


                <div class="container text-center">
                <h3 class="text-center mb-5">Visualisasi Data</h3>

                    <div class="row justify-content-center fade-in">
                        @foreach ($items as $item)
                            <div class="col-md-3 col-6 mb-4">
                                <a href="{{ url($item['url']) }}" class="text-decoration-none text-dark w-100">
                                    <div class="position-relative d-flex justify-content-center visualisasi-card" style="height: auto;">
                                        <div class="position-absolute rounded-circle d-flex justify-content-center align-items-center shadow"
                                            style="width: 50px; height: 50px; top: -20px; background-color: #16b3ac;">
                                            <i class="{{ $item['icon'] }} text-white fs-4"></i>
                                        </div>

                                        <div class="w-100 d-flex flex-column align-items-center rounded bg-white border"
                                            style="min-height: 200px; border: 1px solid #d2dc02; padding: 30px 10px 10px 10px;">
                                            <span class="fw-semibold mb-2">{{ $item['label'] }}</span>
                                            <hr class="w-75 my-1">

                                            @if (!empty($item['indicators']))
                                                <ul class="list-unstyled small text-start mb-0" style="font-size: 0.85rem;">
                                                    @foreach ($item['indicators'] as $indikator)
                                                        <li>• {{ $indikator }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="small text-muted mb-0">Tidak ada indikator.</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>



                <div class="text-center mt-5">
                    <p style="color: #999;">Data akan terus diperbarui secara berkala.</p>
                </div>
            </div>

            </div>

            <!-- Sumber Data Section -->
            <div id="sumberdataCards" class="sumberdata-section">
                <h3 class="text-center mb-5" style="color: white;">Sumber Data</h3>

                
                    <div class="scroll-container" id="sourceScroll">
                        @if(Auth::check())
                            <a href="https://lamongankab.go.id/beranda/documents/dinkes/profilkes_lamongan_2020.pdf" class="source-card-index" target="_blank">Profil Kesehatan Lamongan 2020</a>
                            <a href="https://lamongankab.go.id/beranda/documents/dinkes/profil%20kesehatan%20lamongan%202021.pdf" class="source-card-index" target="_blank">Profil Kesehatan Lamongan 2021</a>
                            <a href="https://drive.google.com/file/d/1mCyRHCNmRN5_AiNJ_e9f6SS67H-wjh5l/view" class="source-card-index" target="_blank">Profil Kesehatan Lamongan 2022</a>
                            <a href="https://drive.google.com/file/d/1aNS4JGKeQBkLzT9EV8qlq7bSiJHegeQ1/view" class="source-card-index" target="_blank">Profil Kesehatan Lamongan 2023</a>
                        @else
                            <a href="{{ url('/restriction_file') }}" class="source-card-index">Login untuk akses Profil 2020</a>
                            <a href="{{ url('/restriction_file') }}" class="source-card-index">Login untuk akses Profil 2021</a>
                            <a href="{{ url('/restriction_file') }}" class="source-card-index">Login untuk akses Profil 2022</a>
                            <a href="{{ url('/restriction_file') }}" class="source-card-index">Login untuk akses Profil 2023</a>
                        @endif
                    </div>

                
            </div>
            @endif
        </div>

        <!-- Footer -->
        @include('home.footer')
    </div>

    @include('home.js')

    <script>
        function revealOnScroll() {
            const elements = document.querySelectorAll('.fade-in');
            const windowHeight = window.innerHeight;

            elements.forEach(el => {
                const elementTop = el.getBoundingClientRect().top;
                if (elementTop < windowHeight - 100) {
                    el.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);

        // Auto swipe logic
        const scrollContainer = document.getElementById("sourceScroll");
        let scrollAmount = 0;
        const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;

        function autoScrollSource() {
            scrollAmount += 1;
            if (scrollAmount >= maxScroll) scrollAmount = 0;
            scrollContainer.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }

        setInterval(autoScrollSource, 30); // Semakin kecil, semakin cepat
    </script>
</body>

</html>
