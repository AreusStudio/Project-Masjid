 <style type="text/css">

.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  background: -webkit-linear-gradient(45deg, #ff89e9 0%, #05abe0 100%);
  background: linear-gradient(45deg, #ff89e9 0%,#05abe0 100%);
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  padding: 3em;
  text-align: left;
}

.hovereffect img {
  display: block;
  position: relative;
  max-width: none;
  width: calc(100% + 60px);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-40px,0,0);
  transform: translate3d(-40px,0,0);
}

.hovereffect h2 {
  text-transform: uppercase;
  color: #fff;
  position: relative;
  font-size: 17px;
  background-color: transparent;
  padding: 15% 0 10px 0;
  text-align: left;
}

.hovereffect .overlay:before {
  position: absolute;
  top: 20px;
  right: 20px;
  bottom: 20px;
  left: 20px;
  border: 1px solid #fff;
  content: '';
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-20px,0,0);
  transform: translate3d(-20px,0,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-10px,0,0);
  transform: translate3d(-10px,0,0);
}

.hovereffect:hover img {
  opacity: 0.6;
  filter: alpha(opacity=60);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect:hover .overlay:before,
.hovereffect:hover a, .hovereffect:hover p {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
 </style>

 <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Gallery
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Gallery</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Foto Kegiatan</h2>
            </div>

            <?php
            $no = $this->uri->segment('3') + 1;
             foreach ($datafotodetail as $row) {?>  
            <div class="col-md-4 col-sm-6">
            <div class="hovereffect">
               <?php if($row['foto'] == null)
                { ?>
                <img src="<?php echo base_url()?>assets/frontend/image/no_image_available.png" width="100%" style="height:300px; width:300px;" class="img-responsive" alt="">
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
                  <h4><?php echo $no++;?></h4>
                    <h2><?php echo $row['judul']; ?></h2>
                    <?php echo anchor(site_url('fotodetail/'.$id.'/'.$detail),'<h5 class="info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></h5>'); ?>
                </div>
            </div>
            </div>
            <?php }?>

           



        </div>
        <!-- /.row -->

        <hr>

     