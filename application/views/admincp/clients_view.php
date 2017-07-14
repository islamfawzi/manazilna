<?php $this->load->view('admincp/header'); ?>
<?php if($page_index == 1): ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if($add == 1):?> اضافة <?php else:?>&nbsp;تعديل<?php endif;?></h5>
        <?php if ($added == 1): ?>
            <div class="alert alert-success">
                <i class="fa fa-check font_big"></i>&nbsp;
                تمت الاضافة بنجاح ..
            </div>
        <?php elseif ($added == 2): ?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                لم تتم الاضافة بنجاح ..
            </div> 
            <?php elseif ($updated == 1):?>
            <div class="alert alert-success">
                <i class="fa fa-check font_big"></i>&nbsp;
                تم التعديل بنجاح ..
            </div>
            <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_client'" />  
            <?php elseif ($updated == 2):?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                لم يتم تغيير البيانات ..
            </div>
            <?php endif; ?>
            <ul class="nav nav-tabs padding_none">
                <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">عربى </a></li>
                <li role="presentation" class="nav"><a href="#english" data-toggle="tab" class="btn btn-success">EN</a></li>
                <li role="presentation" class="nav"><a href="#date" data-toggle="tab" class="btn btn-info">الميديا</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="arabic">
                    <div class="table-responsive">
                        <form action="<?= base_url() ?>admincp/add_client" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="add_client">
                            <?php if($add != 1):?>
                            <input type="hidden" name="client_id" value="<?= $id ?>"/>
                            <?php endif;?>
                            <table class="table">

                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> العنوان  :</td>
                                    <td><input type="text" name="cli_title" value="<?= $cli_title ?>" class="form-control inp_width" id="cli_title" placeholder="العنوان   "/></td>
                                </tr>                                 
                                <tr>
                                    <td><i class="fa fa-files-o"></i>المحتوى :
                                    </td>
                                    <td colspan="3"><textarea name="content" class="form-control ckeditor"   rows="5" placeholder=""><?= $content ?></textarea>
                                        <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                                    </td>
                                </tr> 
                                <tr>
                                    <td><i class="fa fa-unlock-alt"></i> الحالة :</td>
                                    <td>
                                        <input type="radio" name="active" <?php if ($add == 1): ?> checked="true" <?php else: if($active == 1): ?> checked="true" <?php endif; endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل 
                                    <input type="radio" name="active" <?php if($add != 1): ?> <?php if($active == 0): ?> checked="true" <?php endif; endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                                </td>
                            </tr>
                        </table>

                </div>
            </div>
            <div class="tab-pane fade" id="english">
                <div class="table-responsive" >
                    <table class="table" dir="ltr">
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Title :</td>
                            <td><input type="text" value="<?= $cli_title_en ?>" class="form-control inp_width" name="cli_title_en" placeholder="title"/></td>
                        </tr>                         
                        <tr class="page_desc_en usage">
                            <td><i class="fa fa-files-o"></i>New content :</td>
                            <td colspan="3"><textarea name="content_en" class="form-control ckeditor"   rows="5" placeholder="Item content.."><?= $content_en ?></textarea>
                                <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                            </td>
                        </tr> 
                        <tr>
                            <td><i class="fa fa-unlock-alt fa-5"></i> Active :</td>
                            <td>
                                <input type="radio"  name="active_en" <?php if($add == 1): ?> checked="true" <?php else: if($active_en == 1): ?> checked="true" <?php endif;  endif; ?> value="1" /> <i class="fa fa-thumbs-o-up fa-5"></i>  Active 
                                <input type="radio" name="active_en" <?php if ($add != 1): if ($active_en == 0): ?> checked="true" <?php endif; endif ?> value="0" /> <i class="fa fa-thumbs-o-down fa-5"></i>  Not Active 
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

            <div class="tab-pane fade in" id="date">
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <td><i class="fa fa-camera-retro"></i> الصور :</td>
                            <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;"><span class="btn btn-success btn-file ">                            
                                   اختيار الصورة  <!--<input id="upload" type="file" name="image[]" multiple /> -->
                                        <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                    </span></a></td>
                        </tr>
                        <?php if($add != 1):?>
                        <tr>
                            <td></td>
                            <td>
                                <?php foreach($images as $id=>$image):?>
                                <?php if ($image != ''): ?>
                        <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url() . $image ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                            <input name="page_images[]" type="checkbox" checked="true"  value="<?= $id ?>" class="check_delete"/></li>
                        <?php endif;?>
                        <?php endforeach;?>
                        </td>
                        </tr>
                        <?php endif;?>                                                                      
                    </table>
                </div>
            </div>

        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_client_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->
<?php elseif($page_index == 2): ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> قائمة الخدمات  </h5>
        <p class="text-left">
            <a href="<?= base_url() ?>admincp/add_client" class="btn btn-success"><i class="fa fa-plus"></i> اضافة جديد</a>
        </p>
        <?php if ($deleted == 1): ?> 
            <div class="alert alert-success">
                <i class="fa fa-check font_big"></i>&nbsp;
                تم الحذف بنجاح ..
            </div>
        <?php elseif ($deleted == 2): ?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                حدث خطأ اثناء الحذف ..
            </div>
        <?php endif;?>
            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/edit_client" method="post" >
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                            <th class="text-center"><i class="fa fa-pencil fa-5"></i> العنوان </th>

                            <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                            <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                            <?php if (in_array(999, $privacy)): ?>
                                <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                            <?php endif; ?>
                        </tr>
                        <?php foreach($all_clients as $k=>$client):?>
                        <tr>
                            <td class="text-center"><?= $k + 1 ?></td>
                            <td class="text-center"><a href="<?= base_url() ?>admincp/edit_client/<?= $client->id ?>/<?= str_replace(' ','-',$client->cli_title) ?>"><?= $client->cli_title ?></a><br />
                                <a href="<?= base_url() ?>admincp/edit_client/<?= $client->id ?>/<?= url_title($client->cli_title_en) ?>"><?= $client->cli_title_en ?></a>
                            </td>

                            <td class="text-center"><?if($client->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                            <td class="text-center"><a href="<?= base_url() ?>admincp/edit_client/<?= $client->id ?>/<?= $client->cli_title ?>">تعديل </a></td>
                            <?php if (in_array(999, $privacy)): ?>
                                <td class="text-center"><input type="checkbox" name="sel_client[]" value="<?= $client->id ?>" /></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach;?>
                        <?php if (in_array(999, $privacy)): ?>
                            <tr>
                                <td colspan="4"></td>

                                <td style="width: 12%" class="text-left"><span style="margin-left: 16% !important;" class="mr_check red"><input id="all" type="checkbox" /> &nbsp; تحديد الكل </span></td>

                            </tr>
                            <tr>
                                <td colspan="6" class="text-left"><button type="submit" name="clients_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>

                            </tr>
                        <?php endif; ?>                    
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!--/left Side -->
<?php endif;?>
<script type="text/javascript">
    $('#add_client').submit(function () {
        var title = $('input[name=cli_title]');
        var title_en = $('input[name=cli_title_en]');
        
        if(title.val() === ''){            
            title.css("border","1px solid red");
            alert('يجب اختيار اسم عربى');
            return false;                      
        }
        
        if(title_en.val() === ''){            
            title_en.css("border","1px solid red");
            alert('يجب اختيار اسم انجليزى');
            return false;                      
        }        
        //return false;        
    });
</script>
<? $this->load->view('admincp/footer'); ?>