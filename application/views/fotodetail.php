

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Foto Detail
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Foto Detail</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <?php foreach ($datafotodetail as $row) {?> 
            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                <?php if($row['foto'] == null)
                { ?>
                <img src="<?php echo base_url()?>assets/frontend/image/no_image_available.png" width="100%" style="height:300px; width:300px;" class="img-responsive" alt="">
                <?php } else { ?>
                <img class="img-responsive img-hover" style="height:300px; width:600px;" src="<?php echo base_url()?>upload/datafoto/<?php echo $row['foto']; ?>" alt="">    
                <?php } ?>
                </div>
            </div>

            <div class="col-md-4">
                <h3><?php echo $row['judul']; ?></h3>
                <hr>
                <p>Posted by <?php echo $row['posted_by']; ?></p>
               
                <h4><?php echo $row['deskripsi']; ?></h4>
               
            </div>
              <?php } ?>

        </div>
        <!-- /.row -->

       

        <hr>
