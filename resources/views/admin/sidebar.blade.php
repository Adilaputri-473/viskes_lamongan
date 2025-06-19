<aside class="main-sidebar" style="background-color: white;">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link" style="border-bottom: 1px solid #AAAAAA;">
        <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text" style="font-size: 1.3rem; color: #16b3ac; margin-left:10px;">Lamongan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid #AAAAAA;">
            <div class="image">
                <img src="{{ asset('lte/dist/img/username.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('admin/dashboard') }}" class="d-block"
                    style="font-size: 1.2rem; color: #262626;">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Menu Master -->
                <li class="nav-item has-treeview {{ request()->is('view_tahun') || request()->is('view_kecamatan') || request()->is('view_puskesmas') || request()->is('view_jenis_imunisasi') || request()->is('view_target_imunisasi') || request()->is('view_penyakit') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link" style="color: white; background-color: #16b3ac">
                        <i class="nav-icon fas fa-database"></i>
                        <p>Master<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('view_tahun') || request()->is('view_kecamatan') || request()->is('view_ibu_anak') || request()->is('view_target_gizi') || request()->is('view_penyakit_menular') ? 'display: block;' : 'display: none;' }}">
                        <li class="nav-item">
                            <a href="{{ url('view_tahun') }}" class="nav-link {{ request()->is('view_tahun') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-calendar-alt" style="font-size: 0.9rem;"></i>
                                <p>Tahun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_kecamatan') }}" class="nav-link {{ request()->is('view_kecamatan') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-map" style="font-size: 0.9rem;"></i>
                                <p>Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_topik_kesehatan') }}" class="nav-link {{ request()->is('view_topik_kesehatan') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-map" style="font-size: 0.9rem;"></i>
                                <p>Topik Kesehatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_ibu_anak') }}" class="nav-link {{ request()->is('view_ibu_anak') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-syringe" style="font-size: 0.9rem;"></i>
                                <p>Ibu Anak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_gizi') }}" class="nav-link {{ request()->is('view_gizi') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-users" style="font-size: 0.9rem;"></i>
                                <p>Gizi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_penyakit_menular') }}" class="nav-link {{ request()->is('view_penyakit_menular') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-virus" style="font-size: 0.9rem;"></i>
                                <p>Penyakit</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menu Kasus -->
                <li class="nav-item has-treeview {{ request()->is('view_kesehatan_ibu_anak') || request()->is('view_gizi') || request()->is('view_kasus_penyakit_menular') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link" style="color: white; background-color: #16b3ac">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>Kasus<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('view_kesehatan_ibu_anak') || request()->is('view_gizi') || request()->is('view_kasus_penyakit_menular') ? 'display: block;' : 'display: none;' }}">
                        <li class="nav-item">
                            <a href="{{ url('view_kesehatan_ibu_anak') }}" class="nav-link {{ request()->is('view_kesehatan_ibu_anak') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-syringe" style="font-size: 0.9rem;"></i>
                                <p>Kesehatan Ibu dan Anak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_status_gizi') }}" class="nav-link {{ request()->is('view_status_gizi') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-users" style="font-size: 0.9rem;"></i>
                                <p>Status Gizi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_kasus_penyakit_menular') }}" class="nav-link {{ request()->is('view_kasus_penyakit_menular') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-virus" style="font-size: 0.9rem;"></i>
                                <p>Kasus Penyakit Menular</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menu Visualisasi -->
                <li class="nav-item has-treeview {{ request()->is('view_visualisasi_kesehatan_ibu_anak') || request()->is('view_visualisasi_status_gizi') || request()->is('view_visualisasi_kasus_penyakit_menular') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link" style="color: white; background-color: #16b3ac">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Link Visualisasi<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('view_visualisasi_kesehatan_ibu_anak') || request()->is('view_visualisasi_status_gizi') || request()->is('view_visualisasi_kasus_penyakit_menular') ? 'display: block;' : 'display: none;' }}">
                        <li class="nav-item">
                            <a href="{{ url('view_visualisasi_kesehatan_ibu_anak') }}" class="nav-link {{ request()->is('view_visualisasi_kesehatan_ibu_anak') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-chart-area" style="font-size: 0.9rem;"></i>
                                <p>Visualisasi KIA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_visualisasi_status_gizi') }}" class="nav-link {{ request()->is('view_visualisasi_status_gizi') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-chart-line" style="font-size: 0.9rem;"></i>
                                <p>Visualisasi Status Gizi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_visualisasi_kasus_penyakit_menular') }}" class="nav-link {{ request()->is('view_visualisasi_kasus_penyakit_menular') ? 'active' : '' }}"
                                style="color: #262626;">
                                <i class="nav-icon fas fa-chart-pie" style="font-size: 0.9rem;"></i>
                                <p>Visualisasi Penyakit</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                            <a href="{{ url('view_user') }}" class="nav-link {{ request()->is('view_user') ? 'active' : '' }}"
                                style="color: white; background-color: #16b3ac">
                                <i class="nav-icon fas fa-users" style="font-size: 0.9rem;"></i>
                                <p>User</p>
                            </a>
                        </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="nav-link" style="color: white; background-color:rgb(87, 87, 87); border: none; width: 100%; text-align: left;">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p class="ml-2 mb-0" style="display: inline;">{{ __('Log Out') }}</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<style>
    .nav-link.active {
        color: black !important;
        background-color: #e0f7f6 !important;
        border-radius: 0.5rem;
    }

    .nav-treeview {
        display: none;
    }

    .nav-item.has-treeview:hover > .nav-treeview,
    .nav-item.has-treeview.menu-open > .nav-treeview {
        display: block;
    }
</style>
