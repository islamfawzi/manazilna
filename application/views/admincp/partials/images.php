<style>
    .images-ul{
        display: inline-flex;
    }
    .images-ul li{
        list-style-type: none;
        margin: 10px;
        width: 125px;
    }

    .images-ul img{
        border: 2px solid #0066cc;
        height: 150px;
        width: 100%;
    }
    .images-ul button{
        margin-top: 3px;
    }
</style>

<ul class="images-ul">
<?php
    foreach($images as $img):
?>
    <li id="image-<?=$img['id']?>">
        <img src="<?= base_url($img['path']) ?>" />
        <button class="btn btn-danger delete_image" value="<?= $img['id'] ?>" >Delete</button>
    </li>
<?php
    endforeach;
?>

</ul>

<script>
    $('.delete_image').click(function(){
        var image_id = $(this).val();
        console.log("delete image: " + image_id );

        $.ajax({
            url: "<?= base_url('delete-image')?>",
            method: "POST",
            data: {image_id: image_id},
            cache: false,
            success: function(data){
                console.log("deleted " + data);
                $('#image-'+image_id).remove();
            }
        });
    });
</script>