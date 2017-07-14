<?php $this->load->view('admincp/header'); ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($x==1):?>  كلمة الموقع  <?elseif($x==2):?>منتجاتنا<?elseif($x==3):?>محتوى الصفحة  <?endif;?> </h5>
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

            <?elseif ($updated == 1):?>
            <div class="alert alert-success">
                <i class="fa fa-check font_big"></i>&nbsp;
                تم التعديل بنجاح ..
            </div>
            <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/site_word'" />  
            <?elseif ($updated == 2):?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                لم يتم تغيير البيانات ..
            </div>
            <? endif; ?>
            <ul class="nav nav-tabs padding_none">
                <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning"> الاعدادات </a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="arabic">
                    <div class="table-responsive">
                        <form action="<?= base_url() ?>admincp/site_word/<?= $x ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                            <?if($add != 1):?>
                            <input type="hidden" name="news_id" value="<?= $id ?>"/>
                            <?endif;?>
                            <table class="table">
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> Title En:</td>
                                    <td><input type="text" name="title_en" value="<?= $title_en ?>" class="form-control inp_width" id="" placeholder=" "/></td>
                                </tr>   
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> العنوان :</td>
                                    <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder=" "/></td>
                                </tr>   
                                <tr>
                                    <td><i class="fa fa-files-o"></i>Content En:
                                    </td>
                                    <td colspan="3"><textarea name="content_en" class="form-control ckeditor"   rows="5" placeholder=""><?= $content_en ?></textarea>
                                        <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                                    </td>
                                </tr> 
                                <tr>
                                    <td><i class="fa fa-files-o"></i>المحتوى :
                                    </td>
                                    <td colspan="3"><textarea name="content" class="form-control ckeditor"   rows="5" placeholder="وصف العنصر"><?= $content ?></textarea>
                                        <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                                    </td>
                                </tr> 
                                <tr>
                                    <td><i class="fa fa-unlock-alt"></i> Status En:</td>
                                    <td>
                                        <input type="radio" name="active_en" <?php if ($add == 1): ?> checked="true" <? else: if($active_en == 1): ?> checked="true" <?php endif;
                                endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله 
                                    <input type="radio" name="active_en" <?php if($add != 1): ?> <? if($active_en == 0): ?> checked="true" <?php endif;
                                endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i>  غير مفعله
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> حالة الكلمة  :</td>
                                <td>
                                    <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php endif;
                                endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله 
                                    <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php endif;
                                endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i>  غير مفعله
                                </td>
                            </tr>                   

                        </table>

                </div>
            </div>



        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="save" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>

        </p>
        </form>
    </div>
</div>
<!--/left Side -->
<?php $this->load->view('admincp/footer'); ?>