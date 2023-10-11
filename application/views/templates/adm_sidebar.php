<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user/dashboardbu') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LANDAS </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/dashboardbu') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
            <i class="fas fa-fw fa-user"></i>
            <span>Akun Penduduk</span>
        </a>
        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user') ?>">Data Akun Penduduk</a>
                <a class="collapse-item" href="<?= base_url('user/activ') ?>">Aktivasi Akun Penduduk</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Permohonan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/viewpermohonan') ?>">View Permohonan</a>
                <a class="collapse-item" href="<?= base_url('user/monitora') ?>">Monitoring Permohonan</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/recmus') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Daftar Penduduk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
            <i class="fas fa-chart-pie"></i>
            <span>Data Monografi</span>
        </a>
        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/view_rekjk') ?>">Data Rekap Penduduk</a>
                <a class="collapse-item" href="<?= base_url('user/view_saranap') ?>">Data Sarana dan Prasarana</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Arsip Surat</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/surat_masuk') ?>">Surat Masuk</a>
                <a class="collapse-item" href="<?= base_url('user/surat_keluar') ?>">Surat Keluar</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->