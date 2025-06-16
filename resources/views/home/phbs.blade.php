<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
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
        }

        .visualisasi-section {
            background-color: #ffffff;
            color: #16b3ac;
        }

        .sumberdata-section {
            background-color: #16b3ac;
            color: white;
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
            background-color: #e0f7f6;
            color: var(--text-color);
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            transform: translateY(0);
        }
        #iframeContainer, 
        .iframe-container {
            width: 100%;
            max-width: 1200px; /* Bisa kamu sesuaikan */
            margin: 0 auto;
        }


        .card:hover,
        .card:focus-within {
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

        .source-card {
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

        .source-card:hover {
            background-color: #16b3ac;
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
            <!-- Visualisasi Data Section -->
            
            <div class="visualisasi-section" id="dataCards">
            <div class="text-center mb-4">
    <select id="yearSelect" class="form-control d-inline w-auto">
        <option value="">Pilih Tahun</option>
        @foreach($tahuns as $tahun)
            <option value="{{ (string) $tahun->id }}">{{ $tahun->tahun }}</option>
        @endforeach
    </select>

    <select id="phbsSelect" class="form-control d-inline w-auto ml-2">
        <option value="">Pilih Indikator PHBS</option>
        @foreach($hidup_bersih_sehats as $hidup_bersih_sehat)
            <option value="{{ (string) $hidup_bersih_sehat->id }}">{{ $hidup_bersih_sehat->indikator }}</option>
        @endforeach
    </select>
</div>
<div id="iframeContainer">
    @foreach($visualisasi as $data)
        <div class="iframe-container" 
             data-tahun="{{ $data->tahun_id }}" 
             data-phbs="{{ $data->indikator_id }}" 
             style="display: none;">
            <h3 class="text-center">{{ $data->hidup_bersih_sehat->indikator }} Tahun {{ $data->tahun->tahun }}</h3>
            <iframe 
                src="{{ $data->link_visualisasi }}" 
                width="100%" height="1000" 
                frameborder="0" allowfullscreen
                style="border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            </iframe>
        </div>
    @endforeach
</div>

            </div>

            

            <div id="iframe-difteri-2021" class="iframe-container" style="display: none;">
                <h3 class="text-center">Difteri Tahun 2021</h3>
                <iframe 
                    src="http://localhost:3000/public/question/078dece0-05e3-4a02-a3f7-54f85ee1adf7" 
                    width="100%" height="600" frameborder="0" allowfullscreen
                    style="border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                </iframe>
            </div>



        </div>

        <!-- Footer -->
        @include('home.footer')
    </div>

    @include('home.js')
    <script>
    const yearSelect = document.getElementById('yearSelect');
    const phbsSelect = document.getElementById('phbsSelect');

    function updateIframeVisibility() {
        const tahun = yearSelect.value;
        const phbs = phbsSelect.value;

        const iframes = document.querySelectorAll('.iframe-container');
        iframes.forEach(iframe => {
            iframe.style.display = 'none';
            if (
                iframe.getAttribute('data-tahun') === tahun &&
                iframe.getAttribute('data-phbs') === phbs
            ) {
                iframe.style.display = 'block';
            }
        });
    }

    yearSelect.addEventListener('change', updateIframeVisibility);
    phbsSelect.addEventListener('change', updateIframeVisibility);
</script>


</body>

</html>
