<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Laporan Perkara</div>
                            <a class="nav-link <?= $judul == 'Laporan Bulanan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-chart-pie"></i></div>
                                Laporan Perkara
                            </a>
                            <a class="nav-link <?= $judul == 'Rekap Laporan Bulanan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper/rekap_laporan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rekap Laporan Perkara
                            </a>
                            <a class="nav-link <?= $judul == 'Laporan Triwulan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper/triwulan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Laporan Triwulan
                            </a>
                            <a class="nav-link <?= $judul == 'Rekap Laporan Triwulan' ? 'active' : '' ?>" href="<?= base_url('hakim/hakim_laper/rekap_triwulan/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rekap Laporan Triwulan
                            </a>

                        </div>
                    </div>
                </nav>
            </div>