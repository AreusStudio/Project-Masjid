<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan Kegiatan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Laporan Kegiatan</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">

                <hr>
               <div class="col-md-12">
                <table class="table table-striped">
                    <!-- On rows -->
                    <thead class="active">

                        <th >Nama Kegiatan</th>
                        <th >File</th>
                    </thead>
                    <tbody>

                    <?php foreach ($datakegiatan as $row) {?>  
                        <tr>
                            <td><?php echo $row['Nama_kegiatan']; ?></td>
                            <td>
                               
                                <object height="950" data="" type="application/pdf" width="860">
                                  <p><?php echo $row['file_kegiatan']; ?> <br><a href="<?php echo base_url()?>upload/datakegiatan/<?php echo $row['file_kegiatan']; ?>"> click here to
                                    download the PDF file.</a>
                                  </p>
                                </object>
                            </td>
                        </tr>

                    <?php } ?>
                    </tbody>                     
                </table>
 
               </div>

               

            </div>
        </div>
        <!-- /.row -->


        <hr>
