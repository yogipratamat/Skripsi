<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">
        <!-- Main -->
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="icon-home4"></i>
                <span>
                    Dashboard
                    <span class="d-block font-weight-normal opacity-50"></span>
                </span>
            </a>
        </li>

        @role('penyuluh')
        <li class="nav-item ">
            <a href="{{ route('penyuluh.group-farm.index') }}" class="nav-link"><i
                    class="icon-users"></i><span>Kelompok Tani</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('penyuluh.education.index') }}" class="nav-link"><i class="icon-megaphone"></i>
                <span>Informasi & Edukasi</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('penyuluh.product.index') }}" class="nav-link"><i
                    class="icon-spray"></i><span>Produk Pestisida</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('penyuluh.order.index') }}" class="nav-link"><i
                    class="icon-basket"></i><span>Pesanan Pestisida</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('penyuluh.report.index') }}" class="nav-link"><i
                    class="icon-copy2"></i><span>Laporan Pesanan</span></a>
        </li>
        @endrole

        @role('admin')
        <li class="nav-item ">
            <a href="{{ route('admin.farmer.index') }}" class="nav-link"><i
                    class="icon-user"></i><span>Data Petani</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.subsidy.index') }}" class="nav-link"><i
                    class="icon-city"></i><span>Subsidi Pemerintah</span></a>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-collaboration"></i> <span>Kelola Jasa Tani</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Informasi & Edukasi">
                <li class="nav-item"><a href="{{ route('admin.farm-worker.index') }}"
                        class="nav-link">Buruh Tani</a></li>
                <li class="nav-item"><a href="{{ route('admin.buyer.index') }}" class="nav-link">Pembeli
                        Padi</a></li>
            </ul>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-calendar52"></i> <span>Kelola Jadwal</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Informasi & Edukasi">
                <li class="nav-item"><a href="{{ route('admin.plant.index') }}" class="nav-link">Jadwal
                        Tanam</a></li>
                <li class="nav-item"><a href="{{ route('admin.meeting.index') }}" class="nav-link">Jadwal
                        Rapat</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tool.index') }}" class="nav-link"><i class="icon-train"></i><span>Alat
                    Pertanian</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.rent.index') }}" class="nav-link"><i class="icon-clipboard6"></i>
                <span>Pesanan Sewa Alat</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.report.index') }}" class="nav-link"><i class="icon-copy2"></i>
                <span>Laporan Sewa Alat</span></a>
        </li>
        @endrole

        @role('petani')
        <li class="nav-item">
            <a href="{{ route('petani.tool.index') }}" class="nav-link"><i
                    class="icon-train"></i><span>Sewa Alat Pertanian</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('petani.rent.index') }}" class="nav-link"><i
                    class="icon-clipboard6"></i><span>Pesanan Sewa Alat</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('petani.product.index') }}" class="nav-link"><i
                    class="icon-spray"></i><span>Produk Pestisida</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('petani.order.index') }}" class="nav-link"><i
                    class="icon-basket"></i><span>Pesanan Pestisida</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('petani.subsidy.index') }}" class="nav-link"><i class="icon-city"></i>
                <span>Subsidi Pemerintah</span></a>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-collaboration"></i> <span>Pesan Jasa</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Sewa Jasa">
                <li class="nav-item"><a href="{{ route('petani.service.farm-worker') }}"
                        class="nav-link">Buruh
                        Tani</a></li>
                <li class="nav-item"><a href="{{ route('petani.service.buyer') }}"
                        class="nav-link">Pembeli Padi</a></li>
            </ul>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-megaphone"></i> <span>Informasi & Edukasi</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Informasi & Edukasi">
                <li class="nav-item"><a href="{{ route('petani.information.education') }}"
                        class="nav-link">Pengendalian</a></li>
                <li class="nav-item"><a href="{{ route('petani.information.plant') }}"
                        class="nav-link">Jadwal Tanam</a></li>
                <li class="nav-item"><a href="{{ route('petani.information.meeting') }}"
                        class="nav-link">Jadwal Rapat</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('petani.galery.index') }}" class="nav-link"><i
                    class="icon-images2"></i><span>Galeri Petani</span></a>
        </li>
        @endrole

    </ul>
</div>
