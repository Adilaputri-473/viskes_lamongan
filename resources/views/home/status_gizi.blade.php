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
        
        .visualisasi-section {
            min-height: 100vh;
            padding: 50px 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            background-color: #ffffff;
            color: #16b3ac;
        }

        #dataCards {
            background: linear-gradient(180deg, #ffffff 0%, #f0fefc 100%);
        }

        h2.text-center {
            width: 100%;
            text-align: center;
            margin-bottom: 0px;
            transition: all 0.3s ease;
        }
        h3.text-center {
            color: #16b3ac;
            font-weight: bold;
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
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

        /* Style khusus agar h2 tetap di tengah mengikuti konten */
        .visualisasi-section h2.text-center {
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        @media (max-width: 992px) {
            .visualisasi-section h2.text-center {
                text-align: center;
                padding: 0 20px;
            }
        }

        /* Layout utama */
        .main-content {
            display: flex;
            gap: 30px;
            align-items: flex-start;
        }

        /* Sidebar kanan */
        .sidebar-kanan-wrapper {
            position: fixed;
            top: 70px;
            right: 0;
            bottom: 0;
            width: 300px;
            background-color: #f9f9f9;
            border-left: 3px solid #16b3ac;
            padding: 20px;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1020;
        }

        /* Sidebar hidden (minimized) */
        .sidebar-kanan-wrapper.minimized {
            transform: translateX(100%);
        }

        .sidebar-kanan h4 {
            color: #16b3ac;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .sidebar-kanan p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .sidebar-kanan select {
            margin-bottom: 10px;
            width: 100%;
        }

        /* Tombol toggle sidebar */
        .toggle-sidebar-btn {
            position: fixed;
            top: 90px;
            right: 310px;
            z-index: 1030;
            background-color: #16b3ac;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: right 0.3s ease;
        }

        /* Tombol posisi saat sidebar minimize */
        .toggle-sidebar-btn.minimized {
            right: 10px !important;
        }

        /* Margin agar konten tidak tertutup sidebar */
        .content-data {
            flex: 1;
            margin-right: 300px; /* sesuai lebar sidebar */
            transition: margin-right 0.3s ease;
        }

        /* Jika sidebar disembunyikan, content melebar */
        .content-data.full-width {
            margin-right: 0;
        }

        /* iframe container dan iframe full width */
        .iframe-container {
            width: 900px;
            margin: 20px auto;
            padding: 10px 0px; 
        }

        .iframe-container iframe {
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: width 0.3s ease;
        }

        @media (max-width: 992px) {
            .main-content {
                flex-direction: column;
            }

            .sidebar-kanan-wrapper {
                width: 100%;
                top: 0;
                height: auto;
                position: relative;
                transform: none !important; /* override minimized transform */
                border-left: none;
                border-top: 3px solid #16b3ac;
            }

            .toggle-sidebar-btn {
                display: none;
            }

            .content-data {
                margin-right: 0 !important;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #f0fefc;">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                height="100" width="120">
        </div>

        @include('home.navbar')

        <button class="toggle-sidebar-btn" id="toggleBtn" onclick="toggleSidebar()">☰</button>

        <div class="content-wrapper" style="margin: 0; padding: 0; background-color: #f0fefc;">
            <div class="visualisasi-section" id="dataCards">
                <div class="main-content">
                    <div class="content-data" id="contentData">
                        <h2 class="text-center">Visualisasi Data Status Gizi</h2>

                        <div class="iframe-container mb-4 default-iframe">
                            <h3 class="text-center">Informasi dan Tren Pertahun</h3>
                            <iframe src="http://localhost:3000/public/dashboard/c9184f88-2a4a-414e-9993-c7122e985c19" 
                                width="100%" height="800px" frameborder="0" allowfullscreen>
                            </iframe>
                        </div>

                        <div id="iframeContainer">
                            @foreach($visualisasi as $data)
                                <div class="iframe-container"
                                    data-tahun="{{ $data->tahun_id }}"
                                    data-indikator="{{ $data->indikator_id }}"
                                    style="display: none;">
                                    <h3 class="text-center">{{ $data->gizi->indikator }} Tahun {{ $data->tahun->tahun }}</h3>
                                    <iframe src="{{ $data->link_visualisasi }}"
                                    width="100%" height="1000px" frameborder="0" allowfullscreen>
                                    </iframe>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-kanan-wrapper" id="sidebarKanan">
            <div class="sidebar-kanan">
                <h4>Filter Visualisasi</h4>
                <p>Untuk melihat data berdasarkan tahun dan indikator status gizi, atur pilihan pada dropdown berikut:</p>

                <label for="yearSelect">Tahun</label>
                <select id="yearSelect" class="form-control">
                    <option value="">Pilih Tahun</option>
                    @foreach($tahuns as $tahun)
                        <option value="{{ (string) $tahun->id }}">{{ $tahun->tahun }}</option>
                    @endforeach
                </select>

                <label for="indikatorSelect">Indikator</label>
                <select id="indikatorSelect" class="form-control">
                    <option value="">Pilih Indikator</option>
                    @foreach($gizis as $indikator)
                        <option value="{{ (string) $indikator->id }}">{{ $indikator->indikator }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include('home.footer')
    </div>

    @include('home.js')

    <script>
        const yearSelect = document.getElementById('yearSelect');
        const indikatorSelect = document.getElementById('indikatorSelect');

        function updateIframeVisibility() {
            const tahun = yearSelect.value;
            const indikator = indikatorSelect.value;

            const iframes = document.querySelectorAll('.iframe-container:not(.default-iframe)');
            iframes.forEach((container) => {
                const tahunData = container.getAttribute('data-tahun');
                const indikatorData = container.getAttribute('data-indikator');

                if ((tahun === "" || tahunData === tahun) && (indikator === "" || indikatorData === indikator)) {
                    container.style.display = 'block';
                } else {
                    container.style.display = 'none';
                }
            });
        }

        yearSelect.addEventListener('change', updateIframeVisibility);
        indikatorSelect.addEventListener('change', updateIframeVisibility);

        const sidebar = document.getElementById('sidebarKanan');
        const contentData = document.getElementById('contentData');
        const toggleBtn = document.getElementById('toggleBtn');

        function toggleSidebar() {
            sidebar.classList.toggle('minimized');
            if (sidebar.classList.contains('minimized')) {
                contentData.classList.add('full-width');
                toggleBtn.classList.add('minimized');
            } else {
                contentData.classList.remove('full-width');
                toggleBtn.classList.remove('minimized');
            }
        }
    </script>
</body>

</html>
