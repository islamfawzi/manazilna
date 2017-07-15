<link type="text/css" rel="stylesheet" href="<?=assets('css/admin/bootstrap.css')?>"/>
<link type="text/css" rel="stylesheet" href="<?=assets('css/admin/font-awesome.min.css')?>"/>
<link rel="stylesheet" href="<?=assets('fonts/font.css')?>" type="text/css" media="screen"/>
<link type="text/css" rel="stylesheet" href="<?=assets('css/admin/droid.css')?>"/>
<link rel="stylesheet" href="<?=assets('css/admin/animate.css')?>">
<script type="text/javascript" src="<?=assets('js/jquery-1.12.3.min.js'); ?>"></script>

<style>
    .file_drag_area{
        width: 600px;
        height: 200px;
        border: 5px dashed #ccc;
        padding-top: 70px;
        text-align: center;
        font-size: 50px;
        color: #ccc;
    }
    .file_drag_over{
        color: #0066cc;
        border-color: #0066cc;
    }
    #file_upload_btn{
        display: none;
    }

</style>
<?php $object = "properties"; ?>
<div class="container" width="700px" align="center">
    <input type="file" name="file[]" id="file_upload_btn" multiple/>
    <div class="file_drag_area">
        <i class="fa fa-upload" aria-hidden="true"></i>
    </div>
    <div class="uploaded_files">

    </div>

</div>

<script>

    $(document).ready(function(){

        $('.file_drag_area').on('dragover', function(){
            $(this).addClass("file_drag_over");
            return false;
        });

        $('.file_drag_area').on('dragleave', function(){
            $(this).removeClass("file_drag_over");
            return false;
        });

        $('.file_drag_area').on('drop', function(e){
            e.preventDefault();
            $(this).removeClass("file_drag_over");

            var files_list = e.originalEvent.dataTransfer.files;
            console.log(files_list);

            upload(files_list);
        });

        $('.file_drag_area').on('click', function(){
            $('#file_upload_btn').trigger('click');
        });

        $('#file_upload_btn').on('change', function(e){
            e.preventDefault();
            var formData = new FormData();
            var files_list  = e.target.files;
            console.log(files_list);

            upload(files_list);
        });


        function upload(files_list){

            var formData = new FormData();

            for(var i=0; i < files_list.length; i++ ){
                formData.append("file[]", files_list[i]);
            }

            formData.append("object", "<?=$object?>");
            $.ajax({
                url: "<?= base_url('do-upload')?>",
                method: "POST",
                data: formData,
                cache: false,
                contentType:false,
                processData:false,
                success: function(data){

                    $('.uploaded_files').append(data);
                }
            });
        }

    });



</script>