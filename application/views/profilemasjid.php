 <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile Masjid
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Profile Masjid</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">

            <?php foreach ($dataprofilemasjid as $row) {?> 
            <div class="col-md-6">
                <?php if($row['foto'] == null)
                { ?>
                <img src="<?php echo base_url()?>assets/frontend/images/no_image_available.png" width="100%" style="height:300px; width:300px;" class="img-responsive" alt="">
                <?php } else { ?>
                    <img class="img-responsive img-hover" style="height:300px; width:600px;" src="<?php echo base_url()?>upload/datamasjid/<?php echo $row['foto']; ?>" alt="">
             
                <?php } ?>
            </div>
            <div class="col-md-6">
                <h2>Masjid Jami Baitul Muttaqin</h2>
                <p><?php echo $row['deskripsi'];?></p>
            </div>
             <?php } ?>
        </div>
        <!-- /.row -->



        <hr>
