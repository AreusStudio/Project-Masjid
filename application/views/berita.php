 <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Berita
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">berita</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        
            <?php foreach ($datanews as $row) {?>   
        <div class="row">            
            <div class="col-md-7">
                <?php if($row['foto'] == null)
                { ?>
                <img src="<?php echo base_url()?>assets/frontend/image/no_image_available.png" width="100%" style="height:300px; width:600px;" class="img-responsive" alt="">
                <?php } else { ?>
                    <img class="img-responsive img-hover" style="height:300px; width:600px; background-size:100% 100%;" src="<?php echo base_url()?>upload/datanews/<?php echo $row['foto']; ?>" alt="">
             
                <?php } ?>
            </div>
            <div class="col-md-5">
                <h3><?php echo $row['judul']; ?> </h3>
                <p><?php echo $row['tanggal']; ?></p>
                <p><?php echo $row['posted_by']; ?></p><br>
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
        <!-- /.row -->
        <br>

    <?php } ?>
        <hr>
