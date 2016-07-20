<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Jadwal Kegiatan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Jadwal Kegiatan</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-6"> 

                     <h3>Jadwal Sholat</h3>
                <hr>
                <table class="table table-striped">
                    <!-- On rows -->
                    <thead class="active">
                        <th>No</th>
                        <th >Sholat</th>
                        <th >Waktu</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Subuh</td>
                            <td>4.48 AM</td>
                        </tr>
                         <tr>
                            <td>2</td>
                            <td>Dzuhur</td>
                            <td>11.56 AM</td>

                        </tr>
                         <tr>
                            <td>3</td>
                            <td>Ashar</td>
                            <td>3.18 PM</td>

                        </tr>
                         <tr>
                            <td>4</td>
                            <td>Maghrib</td>
                            <td>5.49 PM</td>

                        </tr>
                         <tr>
                            <td>5</td>
                            <td>Isya</td>
                            <td>7.00 PM</td>

                        </tr>


                    </tbody>

                     
                </table>
                </div>

               <div class="col-md-6">
                <h3>Jadwal Masjid</h3>
                <hr>
                <table class="table table-striped">
                    <!-- On rows -->
                    <thead class="active">
                        <th>No</th>
                        <th >Hari/Tanggal</th>
                        <th >Waktu</th>
                        <th >Jenis Kegiatan</th>
                    </thead>
                    <tbody>

                    <?php foreach ($datajadwal as $row) { ?>
                        <tr>
                            <td><?php echo $row['id_kegiatan'];?></td>
                            <td><?php echo $row['tanggal_kegiatan'];?></td>
                            <td><?php echo $row['waktu'];?></td>
                            <td><?php echo $row['nama_kegiatan'];?></td>
                        </tr>

             <?php } ?>
                    </tbody>                     
                </table>

 
               </div>

               

            </div>
        </div>
        <!-- /.row -->


        <hr>
