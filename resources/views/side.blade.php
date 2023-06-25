<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                   with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ route('file.import') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Kontrol Paneli
                    </p>
                </a>

            </li>

            <li class="nav-item ">
                <a href="#" class="nav-link bg-red"><span class="iconify nav-icon" data-icon="mdi:cow"
                        data-inline="true"></span>
                    <p> BÜYÜK BAŞ</p>
                </a>


                <ul class="nav nav-treeview">


                    <li class="nav-item">
                        <a href="{{ route('buyukbas.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list text-info"></i>
                            <p class="text">Liste</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('buyukbas.video') }}" class="nav-link">
                            <i class="nav-icon fas fa-video text-purple"></i>
                            <p>Video</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('buyukbas.arama') }}" class="nav-link">
                            <i class="nav-icon fas fa-phone text-gray"></i>
                            <p>Arama</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('buyukbas.tamamlanan') }}" class="nav-link">
                            <i class="nav-icon fas fa-check text-teal"></i>
                            <p>Tamamlanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('buyukbas.kesilmemis') }}" class="nav-link">
                            <i class="nav-icon fas fa-times text-danger"></i>
                            <p>Kesilmeyen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('buyukbas.rapor') }}" class="nav-link">
                            <i class="nav-icon far fa-flag text-warning"></i>
                            <p>Rapor</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link bg-info"><span class="iconify nav-icon" data-icon="mdi:sheep"
                        data-inline="false"></span>
                    <p> KÜÇÜK BAŞ</p>
                </a>


                <ul class="nav nav-treeview">


                    <li class="nav-item">
                        <a href="{{ route('kucukbas.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list text-info"></i>
                            <p class="text">Liste</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kucukbas.video') }}" class="nav-link">
                            <i class="nav-icon fas fa-video text-purple"></i>
                            <p>Video</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kucukbas.arama') }}" class="nav-link">
                            <i class="nav-icon fas fa-phone text-gray"></i>
                            <p>Arama</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kucukbas.tamamlanan') }}" class="nav-link">
                            <i class="nav-icon fas fa-check text-teal"></i>
                            <p>Tamamlanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kucukbas.kesilmemis') }}" class="nav-link">
                            <i class="nav-icon fas fa-times text-danger"></i>
                            <p>Kesilmeyen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kucukbas.rapor') }}" class="nav-link">
                            <i class="nav-icon far fa-flag text-warning"></i>
                            <p>Rapor</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('kamera.buyukbas') }}" class="nav-link">
                    <i class="nav-icon far fa-flag text-warning"></i>
                    <p>Büyükbaş Video Kayıt</p>
                </a>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
