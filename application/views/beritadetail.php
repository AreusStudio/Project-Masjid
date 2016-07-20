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
                    <li class="active">Berita</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <?php foreach ($datanews as $row) {?>
                
            <div class="col-lg-12">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <h2><i class="fa fa-clock-o"></i><?php echo $row['judul']; ?></h2>

                <hr>

                <!-- Preview Image -->
                <?php if($row['foto'] == null)
                { ?>
                <img src="<?php echo base_url()?>assets/frontend/image/no_image_available.png" width="100%" style="height:400px;" alt="">
                <?php } else { ?>
                <img src="<?php echo base_url()?>upload/datanews/<?php echo $row['foto']; ?>" width="100%" style="height:400px;" alt="">
                <?php } ?>

                <hr>

                <!-- Post Content -->
                
                <b><p>Posted on <?php echo $row['tanggal']; ?><br> by <?php echo $row['posted_by'] ;?></p></b>
                <p><?php echo $row['isi_berita']; ?></p>

                 <?php }?>
                <hr>

                <!-- Blog Comments -->

             

                <!-- Posted Comments -->

                    
                <!-- Comment -->
                <div class="media">
                   
                    <div class="media-body">
                         <!-- Nested Comment -->
                        <div class="media">
                           
                            <div class="media-body">
                                   </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            



        </div>
        <!-- /.row -->

        <hr>