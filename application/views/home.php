
 

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0"></li>
            <li data-target="#myCarousel" data-slide-to="1" ></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>



       <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php foreach ($dataslide2 as $row2) { ?>
            <div class="item active">
                <div class="fill" style="background-image:url('<?php echo base_url()?>upload/dataslide/<?php echo $row2['foto']; ?>');"></div>
                <div class="carousel-caption">
                </div>
            </div>             
            <?php } ?>
             <?php foreach ($dataslide as $row) { ?>
            <div class="item ">
                <div class="fill" style="background-image:url('<?php echo base_url()?>upload/dataslide/<?php echo $row['foto']; ?>');"></div>
                <div class="carousel-caption">
                </div>
            </div>           
            <?php } ?>
        </div>


        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>


    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                	Berita Terbaru
                </h1>
            </div>
            <?php foreach ($datanewnews as $row) { ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i><?php echo $row['judul']; ?></h4>
                    </div>
                    <div class="panel-body">
                    <p><?php echo substr($row['isi_berita'], 0, 140) ?> [.....]</p>
                 <?php 
                    $id = $row['id_berita'];
                    $detailreplace = str_replace(array(' ', '<', '>', '&', '{', '}', '*', '"',
                    '/[^A-Za-z0-9]/', ',', '\/s/'), array('-'), $row['judul']);
                    $detail = strtolower(url_title($detailreplace,'-',TRUE)); 

                ?>
                <?php echo anchor(site_url('beritadetail/'.$id.'/'.$detail), '<h5 class="btn btn-primary">Baca Selengkapnya</h5>'); ?>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Foto Kegiatan</h2>
            </div>

            <?php foreach ($datafoto2 as $row) {?>  
            <div class="col-md-4 col-sm-6">
		    <div class="hovereffect">
		       <?php if($row['foto'] == null)
                { ?>
                <img src="<?php echo base_url()?>assets/frontend/images/no_image_available.png" width="100%" style="height:300px; width:300px;" class="img-responsive" alt="">
                <?php } else { ?>
                <img class="img-responsive img-hover" style="height:300px; width:600px;" src="<?php echo base_url()?>upload/datafoto/<?php echo $row['foto']; ?>" alt="">    
                <?php } ?>
                  <?php 
                    $id = $row['id_foto'];
                    $detailreplace = str_replace(array(' ', '<', '>', '&', '{', '}', '*', '"',
                    '/[^A-Za-z0-9]/', ',', '\/s/'), array('-'), $row['judul']);
                    $detail = strtolower(url_title($detailreplace,'-',TRUE)); 

                ?>
		        <div class="overlay">
		            <h2><?php echo $row['judul']; ?></h2>
                    <?php echo anchor(site_url('fotodetail/'.$id.'/'.$detail),'<h5 class="info">Lihat Detail</h5>'); ?>
		        </div>
		    </div>
			</div>

            <?php }?>
			

        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Video</h2>
            </div>

            <?php foreach ($datavideo2 as $row) {?> 
            <div class="col-md-6">
            <h2><?php echo $row['judul'];?></h2>
               <?php if($row['url_video'] == null)
              { ?>
              <img src="<?php echo base_url()?>assets/frontend/images/no-video.png" width="100%"  style="height:200px !important;" class="img-responsive" alt="">
              <?php } else { ?>
                 <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="640" height="480" src="<?php echo $row['url_video']; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                       
        </a>
         <?php } ?>
            </div>
            <?php }?>
			</div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                   
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>

        <hr>


