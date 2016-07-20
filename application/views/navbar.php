   <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Masjid Jami Baitul Muttaqin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                        <li><a href="<?php echo base_url()?>">Home</a></li>
                    <li>
			<a href="<?php echo base_url() ?>jadwal">Jadwal Kegiatan</a>
                        <?php //echo anchor('jadwal','Jadwal Kegiatan'); ?>
                    </li>
                    <li>    
                        <?php echo anchor('berita','Berita'); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                  <?php echo anchor('profiledkm','Profile DKM Masjid'); ?>
                            </li>
                            <li>
                                  <?php echo anchor('profilemasjid','Profile Masjid'); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo anchor('kegiatan','Laporan Kegiatan'); ?>
                            </li>
                            <li>
                                <?php echo anchor('keuangan','Laporan Keuangan'); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?php echo anchor('foto','Gallery'); ?>
                    </li>
                    <li>
                        <?php echo anchor('video','Video'); ?>
                    </li>
                    <li>
                        <?php echo anchor('contact','Contact Us'); ?>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
