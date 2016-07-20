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
<script type="text/javascript" src="<?php echo base_url()?>assets/backend/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#tambah-iklan").validate({
    rules:{ judul:{required:true
    },
    photo:{required:true
    }
    },
    messages:{ 
            judul:{required:'Judul Harus Di Isi !!!...'},
            photo:{required:'Photo Harus Di Isi!!!...'}
                    }});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#edit-iklan").validate({
    rules:{ judul_edit:{required:true
    }
    },
    messages:{ 
            judul:{required:'Judul Harus Di Isi !!!...'}
                    }});
});
</script>
<style type="text/css">
#tambah-iklan label.error, #edit-iklan label.error {
color:#F00;
font-size:12px;
}
</style>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Kepengurusan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
         <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                        <?php foreach($konfirmasi as $k){
                            if($k==2){
                        ?>
                            <div class="alert alert-success">
                                <a href="#" class="alert-link">Berhasil Menambahkan Data Kepengurusan</a>
                            </div>
                        <?php 
                        } } ?>  

                        <?php echo form_open_multipart('backend/addkepengurusanprocess'); ?>   <!-- ini tambahannya -->
                        <?php echo form_open('backend/addkepengurusanprocess'); ?>  
                            <input class="form-control" type="text" name="nama" maxlength="250" id="nama" placeholder="Nama" style="width:250px;">  
                            <br>           
                             <br>
                                <textarea id="textareas" rows="15" cols="50" name="deskripsi" style="width:80%;"></textarea> 
                                <br>                         
                                <input type="file" name="photo" id="photoimg" class="btn btn-default" /> 
                                <font color="#FF0000" size="4">*</font><font>Maksimal Gambar Berukuran 1MB!</font>
                                <br>
                            <button type="submit" class="btn btn-default" name="simpan-iklan" id="tambah-iklan">Simpan</button>
                            <button type="reset" class="btn btn-default">Batal</button>                            
                                    </form>
                                </div>
                     
                                </div>

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->