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
                    <h1 class="page-header">Daftar Laporan Contact</h1>
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
                                            <th>No</th>
                                            <th>Lokai</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php 
                        $u = 1;
                        foreach($tb_contact->result() as $photo) { ?>
                        <tr>

                            <td><?php echo $u?></td>
                            <td><?php echo $photo->lokasi?></td>
                            <td>
                                <?php echo $photo->telp?>
                            </td>
                            <!--<th>
          <img src="<?php echo base_url()?>upload/artikel/<?php echo $artikels->icon?>" width="70px" height="40px" alt="" class="img-responsive"></th>-->
                            <td><a href='#Modal<?php echo $photo->id_contact?>' class='portfolio-link' data-toggle='modal'>
                            <i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="bottom" title="Ubah Contact"></i></td>
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
foreach($tb_contact->result() as $photo) { ?>
<div class="modal fade" id="Modal<?php echo $photo->id_contact?>" style="z-index:9999;" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
                        <h3>Ubah Data Contact</h3><br>
                        <form role="form" action="ubahcontactprocess" id="update-contact" method="post" enctype="multipart/form-data">
                             <input type="hidden" name="id_contact" id="id_contact" value="<?php echo $photo->id_contact?>"/>
                            <p>Lokasi</p>
                            <input class="form-control" type="text" name="lokasi" value="<?php echo $photo->lokasi?>" maxlength="250" id="lokasi" placeholder="Lokasi" style="width:250px;">       <br> 

                                <br>
                                <p>Telepon</p> 
                                <input class="form-control" type="text" name="telp" value="<?php echo $photo->telp?>" maxlength="250" id="telp" placeholder="Telepon" style="width:250px;">       <br>
                               
                                <br>        
         
                                <br>
                                <br>
                            <button type="submit" class="btn btn-default" name="update-contact" id="update-contact">Simpan</button>
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