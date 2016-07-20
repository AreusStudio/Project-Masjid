<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Masjid Jami Baitul Muttaqin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        </li>
                        <li style="margin-top:10px;"> <a href="<?php echo base_url()?>backend/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="index.html"><i class="fa fa-user fa-fw"></i> Admin Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Berita<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('dashboard','Daftar Berita'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahberita','Tambah Berita'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa  fa-table fa-fw"></i> Laporan Kegiatan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarkegiatan','Daftar Kegiatan'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahkegiatan','Tambah Kegiatan'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa  fa-edit fa-fw"></i> Laporan Keuangan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarkeuangan','Daftar Keuangan'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahkeuangan','Tambah Keuangan'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa  fa-calendar fa-fw"></i> Jadwal Kegiatan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarjadwal','Daftar Jadwal Kegiatan'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahjadwal','Tambah Jadwal Kegiatan'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-picture-o fa-fw"></i> Gallery<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarfoto','Daftar Gallery'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahfoto','Tambah Foto'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="">
                            <a href="#"><i class="fa  fa-film fa-fw"></i> Video<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarvideo','Daftar Video'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahvideo','Tambah Video'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="">
                            <a href="#"><i class="fa  fa-users fa-fw"></i> Kepengurusan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarpengurus','Daftar Kepengurusan'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahpengurus','Tambah Kepengurusan'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="">
                            <a href="#"><i class="fa  fa-archive fa-fw"></i> Profil Masjid<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarmasjid','Daftar Profil Masjid'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahmasjid','Tambah Profil Masjid'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="">
                            <a href="#"><i class="fa  fa-phone fa-fw"></i> Contact<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarcontact','Daftar Contact'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahcontact','Tambah Contact'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
                         <li class="">
                            <a href="#"><i class="fa  fa-laptop fa-fw"></i> Slide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                  <?php echo anchor('daftarslide','Daftar Slide'); ?>
                                </li>
                                <li>
                                  <?php echo anchor('tambahslide','Tambah Slide'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

