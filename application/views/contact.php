<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact Us
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Contact Us</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Contact Details</h3>
                <p><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                     <?php
                        foreach ($datacontact as $d) { 
                            echo $d['lokasi'];
                            }
                    ?> 
                </p>
                <p><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                    <?php
                        foreach ($datacontact as $d) { 
                            echo $d['telp'];
                            }
                    ?> 
                </p>
            </div>

        </div>
        <!-- /.row -->

       
        <hr>