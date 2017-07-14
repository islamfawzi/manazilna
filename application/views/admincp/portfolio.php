<?php $this->load->view('admincp/header'); ?>
<?if($page_index == 1):?>
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة قسم جديد <?else:?>&nbsp;تعديل قسم <?endif;?></h5>

        <? if($added == 1): ?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تمت الاضافة بنجاح ..
        </div>
        <? elseif ($added == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم تتم الاضافة بنجاح ..
        </div>
        <?elseif ($updated == 1):?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تم التعديل بنجاح ..
        </div>
        <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_port_cat'" />  
        <?elseif ($updated == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم يتم تغيير البيانات ..
        </div>
        <? endif; ?>

        <div class="table-responsive">
            <form action="<?= base_url() ?>admincp/add_port_cat" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                <?if($add != 1):?>
                <input type="hidden" name="cat_id" value="<?= $id ?>"/>
                <?endif;?>
                <table class="table">
                    <tr>
                        <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم بالعربية :</td>
                        <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                    </tr>
                    <tr>
                        <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم بالانجليزية :</td>
                        <td><input type="text" name="title_en" value="<?= $title_en ?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-unlock-alt"></i> حالة القسم :</td>
                        <td>
                            <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php
                            endif;
                            endif;
                            ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله 
                            <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php
                            endif;
                            endif
                            ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                        </td>
                    </tr> 
                </table>
                <table class="table">

                    <tr>
                        <td><i class="fa fa-camera-retro"></i> الصور :</td>
                        <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false);
                                window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300');
                                return false;"><span class="btn btn-success btn-file ">                            
                               اختيار الصورة  <!--<input id="upload" type="file" name="image[]" multiple /> -->
                                    <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                </span></a></td>
                    </tr>
                    <?if($add != 1):?>
                    <tr>
                        <td></td>
                        <td>
                            <?foreach($images as $id=>$image):?>
                            <? if ($image != ''): ?>
                    <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url().$image ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                        <input name="page_images[]" type="checkbox" checked="true"  value="<?= $id ?>" class="check_delete"/></li>
                    <?endif;?>
                    <?endforeach;?>
                    </td>
                    </tr>
                    <?endif;?>
                </table>

        </div>


        <p class="text-center mr_top">                    
            <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_cat_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<?elseif ($page_index == 2):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
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
        <?endif;?>
        <div class="table-responsive">
            <form action="<?= base_url() ?>admincp/edit_port_cat" method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان القسم</th>
                        <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                        <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                        <?php if(in_array(999, $privacy)): ?>
                        <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        <?php endif; ?>
                    </tr>
                    <?if(!empty($all_cats)):?>
                    <?foreach($all_cats as $k=>$cat):?>
                    <tr>
                        <td class="text-center"><?= $k+1 ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_port_cat/<?= $cat->id ?>/<?= $cat->title ?>"><?= $cat->title ?></a><br />
                            <a href="<?= base_url() ?>admincp/edit_port_cat/<?= $cat->id ?>/<?= $cat->title_en ?>"><?= $cat->title_en ?></a>
                        </td>
                        <td class="text-center"><?if($cat->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_port_cat/<?= $cat->id ?>/<?= $cat->title ?>">تعديل </a></td>
                        <?php if(in_array(999, $privacy)): ?>
                        <td class="text-center"><input type="checkbox" name="sel_cat[]" value="<?= $cat->id ?>" /></td>
                        <?php endif; ?>
                    </tr>
                    <?endforeach;?>
                    <?endif;?>
                    <?php if(in_array(999, $privacy)): ?>
                    <tr>
                        <td colspan="4"></td>
                        <td class="text-left"><span class="mr_check red" style="margin-left: 20% !important"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-left"><button type="submit" name="cat_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                    </tr>
                    <?php endif; ?>

                </table>
            </form>
        </div>
    </div>
</div>
<!--/left Side -->
<?elseif($page_index == 3):?>
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة قسم فرعى <?else:?>&nbsp;تعديل قسم فرعى <?endif;?></h5>

        <? if($added == 1): ?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تمت الاضافة بنجاح ..
        </div>
        <? elseif ($added == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم تتم الاضافة بنجاح ..
        </div>
        <?elseif ($updated == 1):?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تم التعديل بنجاح ..
        </div>
        <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_port_subcat'" />  
        <?elseif ($updated == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم يتم تغيير البيانات ..
        </div>
        <? endif; ?>

        <div class="table-responsive">
            <form action="<?= base_url() ?>admincp/add_port_subcat" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                <?if($add != 1):?>
                <input type="hidden" name="subcat_id" value="<?= $id ?>"/>
                <?endif;?>
                <table class="table">
                    <tr>
                        <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم بالعربية :</td>
                        <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                    </tr>
                    <tr>
                        <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم بالانجليزية :</td>
                        <td><input type="text" name="title_en" value="<?= $title_en ?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                    </tr>

                    <tr class="main_menu">
                        <td><i class="fa fa-reply-all"></i> القسم الرئيسي :</td>
                        <td> 
                            <select class="form-control inp_width" name="cat_FK">
                                <option value="0" >اختر قسم</option>
                                <? foreach($all_main_cats as $cat):?>
                                <option <?if($cat_FK == $cat->id || $main_cat == $cat->id):?>selected="selected"<?endif;?>value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                <?endforeach;?>
                            </select>
                        </td>
                    </tr> 
                    <tr>
                        <td><i class="fa fa-unlock-alt"></i> حالة القسم :</td>
                        <td>
                            <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php
                            endif;
                            endif;
                            ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله 
                            <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php
                            endif;
                            endif
                            ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                        </td>
                    </tr> 
                </table>
                <table class="table">

                    <tr>
                        <td><i class="fa fa-camera-retro"></i> الصور :</td>
                        <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false);
                                window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300');
                                return false;"><span class="btn btn-success btn-file ">                            
                               اختيار الصورة  <!--<input id="upload" type="file" name="image[]" multiple /> -->
                                    <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                </span></a></td>
                    </tr>
                    <?if($add != 1):?>
                    <tr>
                        <td></td>
                        <td>
                            <?foreach($images as $id=>$image):?>
                            <? if ($image != ''): ?>
                    <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url().$image ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                        <input name="page_images[]" type="checkbox" checked="true"  value="<?= $id ?>" class="check_delete"/></li>
                    <?endif;?>
                    <?endforeach;?>
                    </td>
                    </tr>
                    <?endif;?>
                </table>
        </div>


        <p class="text-center mr_top">                    
            <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_cat_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<?elseif ($page_index == 4):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <div class="top_select text-center">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i> الاقسام الفرعيه </h5>
            <p class="pull-right">
            <form action="<?= base_url() ?>admincp/edit_port_subcat" method="post" id="porto_sub_cat" class="form-inline pull-right" >
                <div class="form-group">
                    <select class="form-control top-form-width" name="main_cat" onchange="$('#porto_sub_cat').submit();">
                        <option value="" selected="true">كل الاقسام</option>

                        <?foreach($all_main_cats as $p_cat):?>
                        <option <?if($search_id == $p_cat->id):?>selected="true"<?endif;?> value="<?= $p_cat->id ?>"><?= $p_cat->title ?></option>
                        <?endforeach?>
                    </select>
                    <input type="text"  class="form-control inp_width" value="<?= $search_word ?>" name="keyword" placeholder="بحث ..."/>
                    <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button> 
                </div>

            </form>
            </p>
            <p class="text-left">
                <a href="<?= base_url() ?>admincp/add_port_subcat/<?= $search_id ?>" class="btn btn-success"><i class="fa fa-plus"></i> إضاف قسم فرعى</a>
            </p>
        </div>
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
        <?endif;?>
        <div class="table-responsive">
            <form action="<?= base_url() ?>admincp/edit_port_subcat" method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان القسم</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> القسم الرئيسى</th>
                        <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                        <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                        <?php if(in_array(999, $privacy)): ?>
                        <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        <?php endif; ?>
                    </tr>
                    <?if(!empty($all_cats)):?>
                    <?foreach($all_cats as $k=>$cat):?>
                    <tr>
                        <td class="text-center"><?= $k+1 ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_port_subcat/<?= $cat->id ?>/<?= $cat->title ?>"><?= $cat->title ?></a><br />
                            <a href="<?= base_url() ?>admincp/edit_port_subcat/<?= $cat->id ?>/<?= $cat->title_en ?>"><?= $cat->title_en ?></a>
                        </td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_port_cat/<?= $cat->cat_FK ?>/<?= $cat->cat_title ?>"><?= $cat->cat_title ?></a></td>
                        <td class="text-center"><?if($cat->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_port_subcat/<?= $cat->id ?>/<?= $cat->title ?>">تعديل </a></td>
                        <?php if(in_array(999, $privacy)): ?>
                        <td class="text-center"><input type="checkbox" name="sel_cat[]" value="<?= $cat->id ?>" /></td>
                        <?php endif; ?>
                    </tr>
                    <?endforeach;?>
                    <?endif;?>
                    <?php if(in_array(999, $privacy)): ?>
                    <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red" style="margin-left: 10% !important"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-left"><button type="submit" name="cat_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>

                    </tr>
                    <?endif; ?>
                </table>
            </form>
        </div>
    </div>
</div>
<!--/left Side -->
<?elseif($page_index == 5):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة منتج  جديد <?else:?>&nbsp;تعديل عنصر <?endif;?></h5>
        <?php if($added == 1): ?>
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
        <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_port/back'" />  
        <?elseif ($updated == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم يتم تغيير البيانات ..
        </div>
        <? endif; ?>
        <ul class="nav nav-tabs padding_none">
            <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">عربي</a></li>
            <li role="presentation" class="nav"><a href="#english" data-toggle="tab" class="btn btn-success">إنجليزي</a></li>                     
            <li role="presentation" class="nav"><a href="#media" data-toggle="tab" class="btn btn-info">اعدادات اخرى</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="arabic">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>admincp/add_port" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                        <?if($add != 1):?>
                        <input type="hidden" name="port_id" value="<?= $id ?>"/>
                        <?endif;?>
                        <table class="table">
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> اسم المنتج :</td>
                                <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="العنوان"/></td>
                            </tr>

                            <tr>
                                <td><i class="fa fa-files-o"></i> وصف المنتج :
                                </td>
                                <td colspan="3"><textarea name="content" class="form-control ckeditor"   rows="5" placeholder="Describtion"><?= $content ?></textarea>
                                    <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> الحاله  :</td>
                                <td>
                                    <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php
                                    endif;
                                    endif;
                                    ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله 
                                    <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php
                                    endif;
                                    endif
                                    ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                                </td>
                            </tr> 
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> منتج مميز  :<br /><span class="text-muted hint"> يظهر فى الصفحة الرئيسية</span></td></td>
                                <td>
                                    <input type="radio" name="fet" <?php if($add == 1): ?> checked="true" <? else: if($fet == 1): ?> checked="true" <?php
                                    endif;
                                    endif;
                                    ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مميز 
                                    <input type="radio" name="fet" <?php if($add != 1): ?> <? if($fet == 0): ?> checked="true" <?php
                                    endif;
                                    endif
                                    ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مميز
                                </td>
                            </tr>                  
                        </table>

                </div>
            </div>
            <div class="tab-pane fade" id="english">
                <div class="table-responsive" >
                    <table class="table" dir="ltr">
                        <tr id="name">
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Name :</td>
                            <td><input type="text" value="<?= $title_en ?>" class="form-control inp_width" name="title_en" placeholder=""/></td>
                        </tr>                                                 
                        <tr class="page_desc_en usage">
                            <td><i class="fa fa-files-o"></i> Content :</td>
                            <td colspan="3"><textarea name="content_en" class="form-control ckeditor"   rows="5" placeholder="Item content.."><?= $content_en ?></textarea>
                                <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                            </td>
                        </tr> 
                        <tr>
                            <td><i class="fa fa-unlock-alt fa-5"></i> Active Item  :</td>
                            <td>
                                <input type="radio"  name="active_en" <?php if($add == 1): ?> checked="true" <? else: if($active_en == 1): ?> checked="true" <?php
                                endif;
                                endif;
                                ?> value="1" /> <i class="fa fa-thumbs-o-up fa-5"></i>  Active 
                                <input type="radio" name="active_en" <?php if($add != 1): if($active_en == 0): ?> checked="true" <?php
                                endif;
                                endif
                                ?> value="0" /> <i class="fa fa-thumbs-o-down fa-5"></i>  Not Active 
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-unlock-alt fa-5"></i> Feature Item  :</td>
                            <td>
                                <input type="radio"  name="fet_en" <?php if($add == 1): ?> checked="true" <? else: if($fet_en == 1): ?> checked="true" <?php
                                endif;
                                endif;
                                ?> value="1" /> <i class="fa fa-thumbs-o-up fa-5"></i>  Feature 
                                <input type="radio" name="fet_en" <?php if($add != 1): if($fet_en == 0): ?> checked="true" <?php
                                endif;
                                endif
                                ?> value="0" /> <i class="fa fa-thumbs-o-down fa-5"></i>  Not Feature 
                            </td>
                        </tr>
                    </table>
                </div></div>
            <div class="tab-pane fade in" id="media">
                <div class="table-responsive">

                    <table class="table">
                        <tr class="main_menu">
                            <td><i class="fa fa-reply-all"></i> القسم  :</td>
                            <td> 
                                <select id="porto_cat" class="form-control inp_width" name="catid">
                                    <option value="0" >اختر قسم</option>
                                    <? foreach($all_main_cats as $cat):?>
                                    <option <?if($catid == $cat->id || $main_cat == $cat->id):?>selected="selected"<?endif;?>value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                    <?endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr class="main_menu">
                            <td><i class="fa fa-reply-all"></i> القسم الفرعى  :</td>
                            <td> 
                                <select id="sub_catid" class="form-control inp_width" name="sub_catid">
                                    <option value="0" >اختر قسم رئيسى اولاً</option>
                                    <?php foreach ($all_sub_cats as $key => $subCat) : ?>
                                    <option <?php if($sub_catid == $subCat->id): ?>selected="selected"<?php endif; ?> value="<?= $subCat->id ?>" ><?= $subCat->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <!--  <select class="form-control inp_width" name="catid">
                               <option value="0" >اختر قسم</option>
                               <? foreach($all_main_cats as $cat):?>
                               <option <?if($catid == $cat->id || $main_cat == $cat->id):?>selected="selected"<?endif;?>value="<?= $cat->id ?>"><?= $cat->title ?></option>
                               <?endforeach;?>
                             </select> -->
                            </td>
                        </tr>
                        <!--<tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> لينك الفيديو :</td>
                            <td><textarea name="ytubelink" class="form-control"   rows="2" placeholder="youtube link"><?= $ytubelink ?></textarea></td>
                        </tr>-->
                        <tr>
                            <td><i class="fa fa-camera-retro"></i> الصور :</td>
                            <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;"><span class="btn btn-success btn-file ">                            
                                   اختيار الصورة  <!--<input id="upload" type="file" name="image[]" multiple /> -->
                                        <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                    </span></a></td>
                        </tr>
                        <?if($add != 1):?>
                        <tr>
                            <td></td>
                            <td>
                                <?foreach($images as $id=>$image):?>
                                <? if ($image != ''): ?>
                        <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url().$image ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                            <input name="page_images[]" type="checkbox" checked="true"  value="<?= $id ?>" class="check_delete"/></li>
                        <?endif;?>
                        <?endforeach;?>
                        </td>
                        </tr>
                        <?endif;?>
                    </table>

                </div>
            </div>

        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_work_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->
<?elseif ($page_index == 6):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <div class="top_select text-center">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i> منتجاتنا </h5>
            <p class="pull-right">
            <form action="<?= base_url() ?>admincp/edit_port" method="post" class="form-inline pull-right" id="ports_form">
                <div class="form-group">
                    <input type="text"  class="form-control inp_width" value="<?= $search_word ?>" name="keyword" placeholder="بحث ..."/>
                    <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button> 
                </div>

            </form>
            </p>
            <p class="text-left">
                <a href="<?= base_url() ?>admincp/add_port/<?= $search_id ?>/<?= $search_sub ?>" class="btn btn-success"><i class="fa fa-plus"></i> إضافة مـنتج  جديد</a>
            </p>
        </div>
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
        <?endif;?>
        <div class="table-responsive">
            <form action="<?= base_url() ?>admincp/edit_port" method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> العنوان</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> الصورة</th>
                        <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                        <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                        <?php if(in_array(999, $privacy)): ?>
                        <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        <?php endif; ?>
                    </tr>
                    <?if(!empty($all_ports)):?>
                    <?foreach($all_ports as $k=>$port):?>
                    <tr>
                        <td class="text-center"><?= $port->id ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_port/<?= $port->id ?>/<?= $port->title ?>"><?= $port->title ?></a><br />
                            <a href="<?= base_url() ?>admincp/edit_port/<?= $port->id ?>/<?= $port->title_en ?>"><?= $port->title_en ?></a>
                        </td>
                        <td class="text-center"><img  src="<?= base_url().$port->img ?>" width="100px" height="100px" /></td>
                        <td class="text-center"><?if($port->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_port/<?= $port->id ?>/<?= $port->title ?>">تعديل </a></td>
                        <?php if(in_array(999, $privacy)): ?>
                        <td class="text-center"><input type="checkbox" name="sel_port[]" value="<?= $port->id ?>" /></td>
                        <?php endif; ?>
                    </tr>
                    <?endforeach;?>
                    <tr>
                        <td></td><td></td>
                        <td colspan="3"><?= $pages; ?></td>
                        <td></td>
                    </tr>
                    <?endif;?>
                    <?php if(in_array(999, $privacy)): ?>
                    <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red" style="margin-left: 13% !important"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-left"><button type="submit" name="port_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                    </tr>
                    <?php endif; ?>
                </table>
            </form>
        </div>
    </div>
</div>
<!--/left Side -->
<?elseif($page_index == 7):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">

    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة عنصر جديد <?else:?>&nbsp;تعديل عنصر <?endif;?></h5>
        <form action="" method="post">
            <input type="text"  class="form-control" style="width: 12%; float:right; margin-left:20px;" value="<?= $search_word ?>" name="port_num" placeholder="ادخل رقم العناصر"/>
            <button type="submit" name="add_port_num" value="1" class="btn btn-warning"> انشاء <i class="fa fa-plus"></i></button>
            <span style="clear: both;"></span>
        </form>
        <br />
        <?php if($added == 1): ?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تمت الاضافة بنجاح ..
        </div>
        <?php elseif ($added == 2): ?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم تتم الاضافة بنجاح ..
        </div>
        <?php elseif ($added == 3): ?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            برجاء اختيار صورة لكل عمل ..
        </div>
        <? endif; ?>
        <ul class="nav nav-tabs padding_none" id="port_ul">
            <?for($i=1;$i<=$len;$i++):?>
            <li role="presentation" class="port_tab nav <?if($i==1):?>active<?endif;?>"><a href="#<?= $i ?>" data-toggle="tab" class="btn btn-success"><?= $i ?></a></li>
            <?endfor;?>  
            <li   class="nav"><a  id="add_port_tab" class="btn btn-success"><i class="fa fa-plus"></i></a></li>
        </ul>


        <div class="tab-content" id="port_tab_div">
            <?for($i=1;$i<=$len;$i++):?>
            <div class="tab-pane fade in <?if($i==1):?>active<?endif;?>" id="<?= $i ?>">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>admincp/add_multi_port" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                        <table class="table">
                            <tr>
                                <td ><i class="fa fa-pencil"></i> عنوان العنصر :</td>
                                <td><input type="text" name="title[]" value="<?= $title[$i-1] ?>"  class="form-control" id="" placeholder="بالعربية"/></td>
                                <td ><i class="fa fa-pencil"></i> عنوان العنصر :</td>
                                <td><input type="text" name="title_en[]" value="<?= $title_en[$i-1] ?>" class="form-control" id="" placeholder="English"/></td>
                            </tr>
                            <!--
                            <tr>
                                <td ><i class="fa fa-pencil"></i> لينك التحويل :</td>
                                <td><input type="text" name="link[]" value="<?= $link[$i-1] ?>"  class="form-control" id="" placeholder="للعربى"/></td>
                                <td ><i class="fa fa-pencil"></i> لينك التحويل :</td>
                                <td><input type="text" name="link_en[]" value="<?= $link_en[$i-1] ?>" class="form-control" id="" placeholder="English"/></td>
                            </tr>
                            -->
                            <tr>
                                <td><i class="fa fa-files-o"></i>وصف العنصر : </td>
                                <td><textarea name="content[]" class="form-control" rows="5" placeholder="بالعربية"><?= $content[$i-1] ?></textarea></td>
                                <td><i class="fa fa-files-o"></i>وصف العنصر : </td>
                                <td><textarea name="content_en[]" class="form-control" rows="5" placeholder="English"><?= $content_en[$i-1] ?></textarea></td>
                            </tr> 
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i>  حالة العتصر العربى :</td>
                                <td>
                                    <input type="radio" name="active[<?= $i ?>]" <?php if($add == 1 || $active[$i] == 1 || $new == 1): ?> checked="true"  <? endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل 
                                    <input type="radio" name="active[<?= $i ?>]" <?php if($add != 1 && $active[$i] == 0 && $new != 1): ?>  checked="true" <? endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                                </td>
                                <td><i class="fa fa-unlock-alt"></i> حاله العنصر الانجليزى :</td>
                                <td>
                                    <input type="radio" name="active_en[<?= $i ?>]" <?php if($add == 1 || $active_en[$i] == 1 || $new == 1): ?> checked="true"  <? endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل 
                                    <input type="radio" name="active_en[<?= $i ?>]" <?php if($add != 1 && $active_en[$i] == 0 && $new != 1): ?>  checked="true" <? endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i>  عنصر مميز :</td>
                                <td>
                                    <input type="radio" name="fet[<?= $i ?>]" <?php if($add == 1 || $fet[$i] == 1 || $new == 1): ?> checked="true"  <? endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مميز 
                                    <input type="radio" name="fet[<?= $i ?>]" <?php if($add != 1 && $fet[$i] == 0 && $new != 1): ?>  checked="true" <? endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مميز
                                </td>
                                <td><i class="fa fa-unlock-alt"></i> عنصر مميز :</td>
                                <td>
                                    <input type="radio" name="fet_en[<?= $i ?>]" <?php if($add == 1 || $fet_en[$i] == 1 || $new == 1): ?> checked="true"  <? endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مميز 
                                    <input type="radio" name="fet_en[<?= $i ?>]" <?php if($add != 1 && $fet_en[$i] == 0 && $new != 1): ?>  checked="true" <? endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مميز
                                </td>
                            </tr>
                            <tr class="main_menu">
                                <td><i class="fa fa-reply-all"></i> القسم الرئيسى :</td>
                                <td> 
                                    <select class="form-control" id="porto_cat" name="catid[]">
                                        <option value="0" >اختر قسم</option>
                                        <? foreach($all_main_cats as $cat):?>
                                        <option <?if($catid[$i-1] == $cat->id):?>selected="selected"<?endif;?>value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                        <?endforeach;?>
                                    </select>

                                </td>

                                <td><!--i class="fa fa-reply-all"></i> القسم الفرعى : --></td>
                                <td> <!--
                                  <select class="form-control" id="sub_catid" name="sub_catid[]">
                                   <option value="0" >اختر قسم</option>
                                    <?php foreach($all_sub_cats as $subcat): ?>
                                     <option <?php if($sub_catid[$i-1] == $subcat->id): ?> selected="true" <?php endif; ?>value="<?= $subcat->id ?>" ><?= $subcat->title ?></option>
                                    <?php endforeach; ?>
                                 
                                 </select> -->
                                </td>
                            </tr> 
                            <tr>
                                <td><i class="fa fa-camera-retro"></i> الصور :</td>
                                <td><a  href="<?= base_url() ?>gallery/images/add_menu/3rd" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;"><span class="btn btn-success btn-file ">                            
                                       رفع الصور <!--<input id="upload" type="file" name="image[]" multiple /> -->
                                            <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                        </span></a></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>

                </div>
            </div>
            <?endfor;?>

        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="add_multi_work_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->
<?endif;?>
<script type="text/javascript">

    $('#porto_cat').change(function () {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                console.log(xmlhttp.responseText);
                $('#sub_catid').html(xmlhttp.responseText)
                // alert(xmlhttp.responseText);
            }
        }
        var x = $(this).val();
        xmlhttp.open("POST", "<?= base_url() ?>admincp/get_porto_cat/" + x, true);
        xmlhttp.send();

    });

</script>
<?php $this->load->view('admincp/footer'); ?>