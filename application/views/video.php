<style type="text/css">
.video-list-thumbs{}
.video-list-thumbs > li{
    margin-bottom:12px;
}
.video-list-thumbs > li:last-child{}
.video-list-thumbs > li > a{
	display:block;
	position:relative;
	background-color: #111;
	color: #fff;
	padding: 8px;
	border-radius:3px
    transition:all 500ms ease-in-out;
    border-radius:4px
}
.video-list-thumbs > li > a:hover{
	box-shadow:0 2px 5px rgba(0,0,0,.3);
	text-decoration:none
}
.video-list-thumbs h2{
	bottom: 0;
	font-size: 14px;
	height: 33px;
	margin: 8px 0 0;
}
.video-list-thumbs .glyphicon-play-circle{
    font-size: 60px;
    opacity: 0.6;
    position: absolute;
    right: 39%;
    top: 31%;
    text-shadow: 0 1px 3px rgba(0,0,0,.5);
    transition:all 500ms ease-in-out;
}
.video-list-thumbs > li > a:hover .glyphicon-play-circle{
	color:#fff;
	opacity:1;
	text-shadow:0 1px 3px rgba(0,0,0,.8);
}
.video-list-thumbs .duration{
	background-color: rgba(0, 0, 0, 0.4);
	border-radius: 2px;
	color: #fff;
	font-size: 11px;
	font-weight: bold;
	left: 12px;
	line-height: 13px;
	padding: 2px 3px 1px;
	position: absolute;
	top: 12px;
    transition:all 500ms ease;
}
.video-list-thumbs > li > a:hover .duration{
	background-color:#000;
}
@media (min-width:320px) and (max-width: 480px) { 
	.video-list-thumbs .glyphicon-play-circle{
    font-size: 35px;
    right: 36%;
    top: 27%;
	}
	.video-list-thumbs h2{
		bottom: 0;
		font-size: 12px;
		height: 22px;
		margin: 8px 0 0;
	}
}

</style>


<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Video
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Video</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


<ul class="list-unstyled video-list-thumbs row">
	<?php foreach ($datavideo as $row) {?> 
	<li class="col-lg-3 col-sm-4 col-xs-6">
		<a href="#"> 
			 <?php if($row['url_video'] == null)
              { ?>
              <img src="<?php echo base_url()?>assets/frontend/images/no-video.png" width="100%"  style="height:200px !important;" class="img-responsive" alt="">
              <?php } else { ?>
               <div class="embed-responsive embed-responsive-16by9">
			    	<iframe class="embed-responsive-item" width="640" height="480" src="<?php echo $row['url_video']; ?>" frameborder="0" allowfullscreen></iframe>
				</div>            
			<h2><?php echo $row['judul'];?></h2>
		</a>
		 <?php } ?>
	</li>

    <?php }?>
	
</ul>

        <hr>


