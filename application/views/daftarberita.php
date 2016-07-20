   
<script language="javascript" type="text/javascript"
src="<?php echo base_url()?>assets/backend/editor/tiny_mce_src.js"></script>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
        
        theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle,fontselect,fontsizeselect",
        theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
        theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
        theme_advanced_buttons3_add : "emotions,flash",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        extended_valid_elements : "hr[class|width|size|noshade]",
        file_browser_callback : "fileBrowserCallBack",
        paste_use_dialog : false,
        theme_advanced_resizing : true,
        theme_advanced_resize_horizontal : false,
        theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
        apply_source_formatting : true
});

    function fileBrowserCallBack(field_name, url, type, win) {
        var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
        var enableAutoTypeSelection = true;
        
        var cType;
        tinymcpuk_field = field_name;
        tinymcpuk = win;
        
        switch (type) {
            case "image":
                cType = "Image";
                break;
            case "flash":
                cType = "Flash";
                break;
            case "file":
                cType = "File";
                break;
        }
        
        if (enableAutoTypeSelection && cType) {
            connector += "&Type=" + cType;
        }
        
        window.open(connector, "tinymcpuk", "modal,width=600,height=400");
    }
</script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Berita</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID Berita</th>
                                            <th>Judul</th>
                                            <th>Image</th>
                                            <th>Tanggal</th>
                                            <th>Posted_by</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php 
                        $u = 1;
                        foreach($berita->result() as $artikels) { ?>
                        <tr>

                            <td><?php echo $u?></td>
                            <td><?php echo $artikels->judul?></td>
                            <td>
                            <img src="<?php echo base_url()?>upload/datanews/<?php echo $artikels->foto?>" width="50px" height="50px">
                            </td>
                            <td><?php echo $artikels->tanggal?></td>
                            <td><?php echo $artikels->posted_by?></td>
                            <!--<th>
          <img src="<?php echo base_url()?>upload/artikel/<?php echo $artikels->icon?>" width="70px" height="40px" alt="" class="img-responsive"></th>-->
                            <td><a href='#Modal<?php echo $artikels->id_berita?>' class='portfolio-link' data-toggle='modal'>
                            <i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="bottom" title="Ubah Berita"></i></td>
                       </tr>
                        <?php 
                        $u = $u + 1;
                        } ?>
                        </tbody>
                                </table>
                            </div>

  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>

<!-- Modal -->
<?php
foreach($berita->result() as $artikels) { ?>
<div class="modal fade" id="Modal<?php echo $artikels->id_berita?>" style="z-index:9999;" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
                        <h3>Ubah Data Berita</h3><br>
                        <form role="form" action="ubahartikelprocess" id="update-berita" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_berita" id="id_berita" value="<?php echo $artikels->id_berita?>"/>
                            <p>Judul</p>
                            <input class="form-control" type="text" name="judul" value="<?php echo $artikels->judul?>" maxlength="250" id="judul" placeholder="Judul Berita" style="width:250px;">       <br>
                            <p>Isi Berita </p>
                                <textarea id="textareas" rows="30" cols="50" name="isi_berita" style="width:80%;"><?php echo $artikels->isi_berita?></textarea>
                                <br>
                                <p>Gambar</p>
                                                        
                                <input type="file" name="photo" id="photoimg" class="btn btn-default" value="<?php //echo $artikels->icon?>"/> 
                                <font color="#FF0000" size="4">* </font><font>Maksimal Gambar Berukuran 1MB!</font>
                                <br>
                                <br>
                                <p>Tanggal Kegiatan</p>
                                 <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tanggal" value="<?php echo $artikels->tanggal?>" maxlength="250" id="tanggal" placeholder="Tanggal" style="width:250px;">       <br>
                                </div>
                                <input type="hidden" id="dtp_input2" value=""/>      
                                <br>        
                                <p>Posted By</p>   
                                <input class="form-control" type="text" name="posted_by" value="<?php echo $artikels->posted_by?>" maxlength="250" id="posted_by" placeholder="Posted By" style="width:250px;">      
                                <br>   
                                <br>
                                <br>
                                <br>
                            <button type="submit" class="btn btn-default" name="update-berita" id="update-berita">Simpan</button>
                            <button type="reset" class="btn btn-default">Batal</button>
                        </form> 
                        <hr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                        <?php 
                            } ?>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

                


        </div>
        <!-- /#page-wrapper -->