<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile DKM Masjid
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Profile DKM Masjid</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

       

        <!-- Team Members -->
        <div class="row">
            <div class="col-lg-12">            </div>
            <?php foreach ($dataprofiledkm as $row) {?> 
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                <?php if($row['foto'] == null)
                { ?>
                <img src="<?php echo base_url()?>assets/frontend/images/no_image_available.png" width="100%" style="height:300px; width:300px;" class="img-responsive" alt="">
                <?php } else { ?>
                    <img class="img-responsive img-hover" style="height:300px; width:600px;" src="<?php echo base_url()?>upload/datakepengurusan/<?php echo $row['foto']; ?>" alt="">
             
                <?php } ?>
                    <div class="caption">
                        <h3><?php echo $row['nama'];?>
                        </h3>
                        <p><?php echo $row['deskripsi'];?></p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        <?php } ?>
        </div>
        <!-- /.row -->
