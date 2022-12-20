<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Information</div>
                    <a class="nav-link" href="<?= base_url(); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Layanan Perkara</div>
                    <a class="nav-link" href="<?= base_url('pa/banding/banding'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-gavel"></i></div>
                        Perkara Banding
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></i></div>
                        Laporan Perkara
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('pa/PA_laper') ?>"><i class="fas fa-calendar-day"></i> &nbspLaporan Bulanan</a>
                            <a class="nav-link" href="<?= base_url('pa/PA_laper/triwulan') ?>"><i class="fas fa-calendar-minus"></i> &nbspLaporan Triwulan</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">user</div>
                    <a class="nav-link" href="<?= base_url('pa/userprofile') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-astronaut"></i></div>
                        User Setting
                    </a>
                    <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $this->session->userdata('nama'); ?>
            </div>
        </nav>
    </div>