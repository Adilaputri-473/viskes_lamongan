<aside class="main-sidebar" style="background-color: white;">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                
                    <li class="nav-item">
                            <a href="{{ url('view_tahun') }}"
                                class="nav-link {{ request()->is('view_tahun') ? 'active' : '' }}"
                                style="color: #262626; ">
                                <i class="nav-icon fas fa-calendar-alt"style="font-size: 0.9rem;"></i>
                                <p>Tahun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_kecamatan') }}"
                                class="nav-link {{ request()->is('view_kecamatan') ? 'active' : '' }}"
                                style="color: #262626;  ">
                                <i class="nav-icon fas fa-map"style="font-size: 0.9rem;"></i>
                                <p>Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_ibu_anak') }}"
                                class="nav-link {{ request()->is('view_ibu_anak') ? 'active' : '' }}"
                                style="color: #262626; ">
                                <i class="nav-icon fas fa-syringe"style="font-size: 0.9rem;"></i>
                                <p>Ibu Anak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_gizi') }}"
                                class="nav-link {{ request()->is('view_gizi') ? 'active' : '' }}"
                                style="color: #262626; ">
                                <i class="nav-icon fas fa-users"style="font-size: 0.9rem;"></i>
                                <p>Gizi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('view_penyakit_menular') }}"
                                class="nav-link {{ request()->is('view_penyakit_menular') ? 'active' : '' }}"
                                style="color: #262626; ">
                                <i class="nav-icon fas fa-virus"style="font-size: 0.9rem;"></i>
                                <p>Penyakit</p>
                            </a>
                        </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>

<style>
    .nav-link.active {
        color: white !important;
        background-color: #93c5fd !important;
        border-radius: 0.5rem;
    }

    .nav-treeview {
        display: none;
    }

    .nav-item.has-treeview:hover>.nav-treeview {
        display: block;
    }

    .nav-item.has-treeview.active>.nav-treeview {
        display: block;
    }
</style>
