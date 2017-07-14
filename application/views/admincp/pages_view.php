<?php $this->load->view('admincp/header'); ?>
<?php if($page_index == 1): ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if($add == 1):?> اضافة صفحة <?else:?>&nbsp;تعديل صفحة <?php endif;?></h5>
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
            <meta http-equiv="Refresh" content="1; URL='<?= base_url() ?>admincp/edit_page/back'" />
            <?php elseif ($updated == 2):?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                لم يتم تغيير البيانات ..
            </div>
            <?php endif; ?>
            <ul class="nav nav-tabs padding_none">
                <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">الاعدادات العامة </a></li>
                <li role="presentation" class="nav"><a href="#english" data-toggle="tab" class="btn btn-success">English</a></li>
                <li role="presentation" class="nav"><a href="#media" data-toggle="tab" class="btn btn-info">الميديا</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="arabic">
                    <div class="table-responsive">
                        <form action="<?= base_url() ?>admincp/add_page" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
                            <?php if($add != 1):?>
                            <input type="hidden" name="page_id" value="<?= $id ?>"/>
                            <?php endif;?>
                            <table class="table">
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الصفحة :</td>
                                    <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="عنوان الصفحة"/></td>
                                </tr>
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان المتصفح :</td>
                                    <td><input type="text" name="browser_title" value="<?= $browser_title ?>" class="form-control inp_width" id="" placeholder="العنوان الذى يظهر فى تاب المتصفح"/></td>
                                </tr>
                                <tr>
                                    <td class="label_width"><i class="fa fa-pencil"></i> الكلمات المفتاحية :
                                        <br /><span class="text-muted hint"> لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; افصل بينهم بفاصلة ,</span></td>
                                    <td><input type="text" name="meta_key" value="<?= $meta_key ?>" class="form-control inp_width" id="" placeholder="Meta Keyswords"/></td>
                                </tr>
                                <tr>
                                    <td class="label_width"><i class="fa fa-pencil"></i> وصف الصفحة :
                                        <br /><br /><span class="text-muted hint">لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; لا يزيد عن 255 حرف </span></td>
                                    <td><input type="text" name="meta_desc" value="<?= $meta_desc ?>" class="form-control inp_width" id="" placeholder="Meta Description"/></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-files-o"></i>وسوم الميتا :
                                        <br /><span class="text-muted hint">وسوم HTML  </span></td>
                                    <td colspan="3"><textarea dir="ltr" name="meta_tags"  class="form-control inp_width align_left"  rows="5" placeholder="HTML Meta Tags .."><?= $meta_tags ?></textarea></td>
                                </tr>
                                <tr class="page_desc">
                                <td><i class="fa fa-files-o"></i> محتوى الصفحة :</td>
                                <td colspan="3"><textarea name="content" class="form-control ckeditor"   rows="5" placeholder="اكتب محتوى الصفحة .."><?= $content ?></textarea>
<?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                                </td>
                            </tr>
                                <!--<tr>
                                    <td><i class="fa fa-unlock-alt"></i> حالة الصفحة :</td>
                                    <td>
                                        <input type="radio" name="active" <?php if ($add == 1): ?> checked="true" <?php else: if($active == 1): ?> checked="true" <?php endif;
    endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله
                                    <input type="radio" name="active" <?php if($add != 1): ?> <?php if($active == 0): ?> checked="true" <?php endif;
    endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                                </td>
                            </tr>

                            <tr>
                                <td> صفحة مميزة :
                                    <br /><span class="text-muted hint"> تظهر فى الصفحة الرئيسية</span></td>
                                <td>
                                    <input id="fet_rad1" type="radio" name="fet" <?php if ($add != 1): if ($fet == 1): ?> checked="true" <?php endif;
    endif; ?> value="1" /> </i>  مميزة
                                    <input id="fet_rad2" type="radio" name="fet" <?php if($add == 1): ?> checked="true" <?php else: if($fet == 0): ?> checked="true" <?php endif;
    endif ?> value="0" />  غير مميزة
                                </td>
                            </tr>
                             </a><tr id="fet_type">
                               <td> نوع الصفحه المميزة  :
                              </td>
                               <td>
                                  <input id="fet_rad1" type="radio" name="fet_subType" <?php if ($add != 1): if ($fet_subType == 0): ?> checked="true" <?php endif;
    endif; ?> value="0" /> </i>فى الاعلى
                                  <input id="fet_rad2" type="radio" name="fet_subType" <?php if($add == 1): ?> checked="true" <?php else: if($fet_subType == 1): ?> checked="true" <?php endif;
    endif ?> value="1" /> أهم أخبار السوق
                                  <input id="fet_rad2" type="radio" name="fet_subType" <?php if($add == 1): ?> checked="true" <?php else: if($fet_subType == 2): ?> checked="true" <?php endif;
                                    endif ?> value="2" /> أخر الأخبار
                               </td>
                            </tr>-->


                        </table>

                </div>
            </div>

            <div class="tab-pane fade" id="english">
                <div class="table-responsive" >
                    <table class="table" dir="ltr">
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Page Title :</td>
                            <td><input type="text" value="<?= $title_en ?>" class="form-control inp_width" name="title_en" placeholder="page title ...."/></td>
                        </tr>
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Page Title :</td>
                            <td><input type="text" value="<?= $browser_title_en ?>" class="form-control inp_width" name="browser_title_en" placeholder="Browser Tab Title ...."/></td>
                        </tr>
                        <tr>
                            <td class="label_width"><i class="fa fa-pencil"></i> Meta Keywords :
                                <br /><span class="text-muted hint"> Helping Search Engines  <br /> Increasing Site Quality divided by comma ,</span></td>
                            <td><input type="text" name="meta_key_en" value="<?= $meta_key_en ?>" class="form-control inp_width" id="" placeholder="Meta Keyswords"/></td>
                        </tr>
                        <tr>
                            <td class="label_width"><i class="fa fa-pencil"></i> Meta Description :
                                <br /><span class="text-muted hint">Helping search Engines <br /> Not More than 255 char. </span></td>
                            <td><input type="text" name="meta_desc_en" value="<?= $meta_desc_en ?>" class="form-control inp_width" id="" placeholder="Meta Description"/></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-files-o"></i>Meta Tags :
                                <br /><span class="text-muted hint"> HTML Tags</span></td>
                            <td colspan="3"><textarea name="meta_tags_en" class="form-control mceNoEditor inp_width"  rows="5" placeholder="write Meta Tags.."><?= $meta_tags_en ?></textarea></td>
                        </tr>
                        <tr class="page_desc_en" >
                            <td><i class="fa fa-files-o"></i>Page Content :</td>
                            <td colspan="3"><textarea name="content_en" class="form-control ckeditor"   rows="5" placeholder="write page content.."><?= $content_en ?></textarea>
<?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                            </td>
                        </tr>
                       <!-- <tr>
                            <td><i class="fa fa-unlock-alt"></i> Page Status :</td>
                            <td>
                                <input type="radio" name="active_en" <?php if($add == 1): ?> checked="true" <?php else: if($active_en == 1): ?> checked="true" <?php endif;
endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  active
                                <input type="radio" name="active_en" <?php if($add != 1): ?> <?php if($active_en == 0): ?> checked="true" <?php endif;
endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> not active
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-unlock-alt"></i>Feature Page :</td>
                            <td>
                                <input type="radio" name="fet_en" <?php if($add == 1): ?> checked="true" <?php else: if($fet_en == 1): ?> checked="true" <?php endif;
endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  Feature
                                <input type="radio" name="fet_en" <?php if($add != 1): ?> <?php if($fet_en == 0): ?> checked="true" <?php endif;
endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> not Feature
                            </td>
                        </tr>

                       <tr>
                           <td> featured Page :
                           <br /><span class="text-muted hint"> appear in Home Page ? </span></td>
                           <td>
                              <input  type="radio" name="fet_en" <?php if ($add != 1): if ($fet_en == 1): ?> checked="true" <?php endif;
endif; ?> value="1" /> </i>  featured
                              <input  type="radio" name="fet_en" <?php if($add == 1): ?>  checked="true" <?php else: if($fet_en == 0): ?> checked="true" <?php endif;
endif ?> value="0" />  not featured
                           </td>
                        </tr>
                        -->

                    </table>
                </div>

            </div>

            <div class="tab-pane fade in" id="media">
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <td><i class="fa fa-camera-retro"></i> الصورة :<br /><span class="text-muted hint"> يرجى رفع صورة بابعاد <br />350 * 1080</span></td>
                            <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;"><span class="btn btn-success btn-file ">
                                 اختر الصورة <!--  <input id="upload" type="file" name="image[]" multiple />-->
                                        <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                    </span></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>

                                <?php if ($image != ''): ?>
                        <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url() . $img ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                            <input name="page_images[]" type="checkbox" checked="true"  value="<?= $image ?>" class="check_delete"/></li>
                        <?php endif;?>

                        </td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
        <p class="text-center mr_top">
            <button type="submit"  name="<?php if($add == 1):?>add<?else:?>edit<?php endif;?>_page_submit" value="1" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>

<!--/left Side -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#fet_type").hide("slow");
        $("#fet_rad2").click(function () {
            $("#fet_type").hide("slow");
        });
        $("#fet_rad1").click(function () {
            $("#fet_type").show("slow");
        });

    });
</script>
<?php elseif($page_index == 2): ?>

<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> صفحات الموقع </h5>
        <div class="top_select text-center">
         <!--  <p class="pull-right">
            <form action="<?= base_url() ?>admincp/edit_page" method="post" id="search_form" class="form-inline pull-right" >
                <input type="hidden" name="selection_form" value="1"/>
                <div class="form-group">
                    <input type="text"  class="form-control inp_width" value="<?= $this->session_mod->get_session('keyword') ?>" name="keyword" placeholder="بحث ..."/>
                    <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>
                </div>
            </form>
            </p>
            <p class="text-left">
                <a href="<?= base_url() ?>admincp/add_page/<?php if ($type_id == ''): ?>1<?php else: echo $type_id; ?><?php endif; ?>/<?= $search_id ?>" class="btn btn-success"><i class="fa fa-plus"></i> إضافة صفحة جديدة</a>
            </p> -->
        </div>
<?php if ($deleted == 1): ?>
            <div class="alert alert-success animated flash">
                <i class="fa fa-check font_big"></i>&nbsp;
                تم الحذف بنجاح ..
            </div>
<?php elseif ($deleted == 2): ?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                حدث خطأ اثناء الحذف ..
            </div>
<?php elseif ($copy == 1): ?>
            <div class="alert alert-success animated flash">
                <i class="fa fa-check font_big"></i>&nbsp;
                تم نسخ <?echo $no_copyed ?> صفحات بنجاح
            </div>
<?php elseif ($copy == 2): ?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                حدث خطأ اثناء النسخ ...
            </div>
            <?php endif;?>
            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/edit_page" method="post">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                            <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان الصفحة</th>
                            <th class="text-center"><i class="fa fa-pencil fa-5"></i> النوع</th>
                            <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                            <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                            <?php if (in_array(999, $privacy)): ?>
                               <th class="text-center"><i class="fa fa-trash-o fa-5"></i>  اخرى  </th>
                            <?php endif; ?>
                        </tr>
                        <?foreach($all_pages as $k=>$page):?>
                        <tr>
                            <td class="text-center"><?= $k + 1 ?></td>
                            <td class="text-center"><a href="<?= base_url() ?>admincp/edit_page/<?= $page->id ?>/<?= str_replace(' ','-',$page->title) ?>"><?= $page->title ?></a><br />
                                <a href="<?= base_url() ?>admincp/edit_page/<?= $page->id ?>/<?= url_title($page->title_en) ?>"><?= $page->title_en ?></a>
                            </td>
                            <td class="text-center"><?php if($page->fet == 1):?>مميزة<?php elseif($page->type == 1):?>موضوع<?php elseif($page->type == 2):?> قسم مواقع<?php elseif($page->type == 3):?>قسم لوجوهات<?php elseif($page->type == 4):?>Custom HTML<?php endif;?></td>
                            <td class="text-center"><?php if($page->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?php endif;?></td>
                            <td class="text-center"><a href="<?= base_url() ?>admincp/edit_page/<?= $page->id ?>/<?= $page->title ?>">تعديل </a></td>
    <?php if (in_array(999, $privacy)): ?>
                                <td class="text-center"><input type="checkbox" name="sel_pages[]" value="<?= $page->id ?>" /></td>
    <?php endif; ?>
                        </tr>
                        <?endforeach;?>
    <?php if (in_array(999, $privacy)): ?>
                         <tr>
                                <td colspan="5"></td>
                                <td class="text-left"><span style="margin-left: 12% !important;" class="mr_check red"><input id="all" type="checkbox" /> &nbsp; تحديد الكل </span></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td  class="text-left td_padding"><button type="submit" name="pages_del" value="1" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash-o"></i> حذف </button>
                                </td>

                            </tr>
    <?php endif; ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!--/left Side -->
    <?php elseif($page_index == 3):?>
    <div class="col-sm-10 col-xs-12">
        <div class="forms">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if($add == 1):?> اضافة قسم جديد <?else:?>&nbsp;تعديل قسم <?php endif;?></h5>

            <?php if($added == 1): ?>
            <div class="alert alert-success">
                <i class="fa fa-check font_big"></i>&nbsp;
                تمت الاضافة بنجاح ..
            </div>
            <?php elseif ($added == 2):?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                لم تتم الاضافة بنجاح ..
            </div>
            <?php elseif ($updated == 1):?>
            <div class="alert alert-success">
                <i class="fa fa-check font_big"></i>&nbsp;
                تم التعديل بنجاح ..
            </div>
            <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_page_cat'" />
            <?php elseif ($updated == 2):?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                لم يتم تغيير البيانات ..
            </div>
            <?php endif; ?>

            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/add_page_cat" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                    <?php if($add != 1):?>
                    <input type="hidden" name="cat_id" value="<?= $id ?>"/>
                    <?php endif;?>
                    <table class="table">
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم بالعربية :</td>
                            <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-unlock-alt"></i> حالة القسم :</td>
                            <td>
                                <input type="radio" name="active" <?php if ($add == 1): ?> checked="true" <?php else: if($active == 1): ?> checked="true" <?php endif;
endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل
                            <input type="radio" name="active" <?php if($add != 1): ?> <?php if($active == 0): ?> checked="true" <?php endif;
endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                        </td>
                    </tr>
                </table>

        </div>


        <p class="text-center mr_top">
            <button type="submit"  name="<?php if($add == 1):?>add<?else:?>edit<?php endif;?>_cat_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<?php elseif ($page_index == 4):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> اقسام الصفحات </h5>
        <div class="top_select text-center">
            <p class="pull-right">
            <form action="<?= base_url() ?>admincp/edit_page_cat" method="post" id="search_form" class="form-inline pull-right" >
                <div class="form-group">
                    <input type="text"  class="form-control inp_width" value="<?= $search_word ?>" name="keyword" placeholder="بحث ..."/>
                    <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>
                </div>
            </form>
            </p>

        </div>
        <p class="text-left">
            <a href="<?= base_url() ?>admincp/add_page_cat" class="btn btn-success"><i class="fa fa-plus"></i> إضافة قسم جديد</a>
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
                <form action="<?= base_url() ?>admincp/edit_page_cat" method="post">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                            <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان القسم</th>
                            <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                            <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                            <?php if (in_array(999, $privacy)): ?>
                                <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
    <?php endif; ?>
                        </tr>
                        <?php if(!empty($all_cats)):?>
                        <?foreach($all_cats as $k=>$cat):?>
                        <tr>
                            <td class="text-center"><?= $k + 1 ?></td>
                            <td class="text-center"><a href="<?= base_url() ?>admincp/edit_page_cat/<?= $cat->id ?>/<?= $cat->title ?>"><?= $cat->title ?></a><br />
                                <a href="<?= base_url() ?>admincp/edit_page_cat/<?= $cat->id ?>/<?= $cat->title_en ?>"><?= $cat->title_en ?></a>
                            </td>
                            <td class="text-center"><?php if($cat->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?php endif;?></td>
                            <td class="text-center"><a href="<?= base_url() ?>admincp/edit_page_cat/<?= $cat->id ?>/<?= $cat->title ?>">تعديل </a></td>
    <?php if (in_array(999, $privacy)): ?>
                                <td class="text-center"><input type="checkbox" name="sel_cat[]" value="<?= $cat->id ?>" /></td>
    <?php endif; ?>
                        </tr>
                        <?endforeach;?>
                        <?php endif;?>
    <?php if (in_array(999, $privacy)): ?>
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
    <?php elseif ($page_index == 5):?>

    <div class="col-sm-10 col-xs-12">
        <div class="forms">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if($add == 1):?> اضافة صفحة <?else:?>&nbsp;تعديل صفحة <?php endif;?></h5>
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
                <meta http-equiv="Refresh" content="1; URL='<?= base_url() ?>admincp/edit_page/back'" />
                <?php elseif ($updated == 2):?>
                <div class="alert alert-danger">
                    <i class="fa fa-remove fa-5 font_big"></i>
                    لم يتم تغيير البيانات ..
                </div>
                <?php endif; ?>
                <ul class="nav nav-tabs padding_none">
                    <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">الاعدادات </a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="arabic">
                        <div class="table-responsive">
                            <form action="<?= base_url() ?>admincp/add_page" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
                                <?php if($add != 1):?>
                                <input type="hidden" name="page_id" value="<?= $id ?>"/>
                                <?php endif;?>
                                <table class="table">
                                    <tr>
                                        <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الصفحة :</td>
                                        <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="عنوان الصفحة"/></td>
                                    </tr>
                                    <tr>
                                        <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان المتصفح :</td>
                                        <td><input type="text" name="browser_title" value="<?= $browser_title ?>" class="form-control inp_width" id="" placeholder="العنوان الذى يظهر فى تاب المتصفح"/></td>
                                    </tr>
                                    <tr>
                                        <td class="label_width"><i class="fa fa-pencil"></i> الكلمات المفتاحية :
                                            <br /><span class="text-muted hint"> لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; افصل بينهم بفاصلة ,</span></td>
                                        <td><input type="text" name="meta_key" value="<?= $meta_key ?>" class="form-control inp_width" id="" placeholder="Meta Keyswords"/></td>
                                    </tr>
                                    <tr>
                                        <td class="label_width"><i class="fa fa-pencil"></i> وصف الصفحة :
                                            <br /><br /><span class="text-muted hint">لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; لا يزيد عن 255 حرف </span></td>
                                        <td><input type="text" name="meta_desc" value="<?= $meta_desc ?>" class="form-control inp_width" id="" placeholder="Meta Description"/></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-files-o"></i>وسوم الميتا :
                                            <br /><span class="text-muted hint">وسوم HTML  </span></td>
                                        <td colspan="3"><textarea dir="ltr" name="meta_tags"  class="form-control inp_width align_left"  rows="5" placeholder="HTML Meta Tags .."><?= $meta_tags ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-unlock-alt"></i> حالة الصفحة :</td>
                                        <td>
                                            <input type="radio" name="active" <?php if ($add == 1): ?> checked="true" <?php else: if($active == 1): ?> checked="true" <?php endif;
    endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله
                                        <input type="radio" name="active" <?php if ($add != 1): ?> <?php if($active == 0): ?> checked="true" <?php endif;
endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                                </td>
                            </tr>

                            <tr>
                                <td> صفحة مميزة :
                                    <br /><span class="text-muted hint"> تظهر فى الصفحة الرئيسية</span></td>
                                <td>
                                    <input id="fet_rad1" type="radio" name="fet" <?php if ($add != 1): if ($fet == 1): ?> checked="true" <?php endif;
endif; ?> value="1" /> </i>  مميزة
                                    <input id="fet_rad2" type="radio" name="fet" <?php if($add == 1): ?> checked="true" <?php else: if($fet == 0): ?> checked="true" <?php endif;
endif ?> value="0" />  غير مميزة
                                </td>
                            </tr>
                            <tr id="fet_type">
                                <td> نوع الصفحه المميزة  :
                                </td>
                                <td>
                                    <input id="fet_rad1" type="radio" name="fet_subType" <?php if ($add != 1): if ($fet_subType == 1): ?> checked="true" <?php endif;
endif; ?> value="1" /> </i>فى أسفل الصفحة
                                    <input id="fet_rad2" type="radio" name="fet_subType" <?php if($add == 1): ?> checked="true" <?php else: if($fet_subType == 0): ?> checked="true" <?php endif;
endif ?> value="0" /> فى منتصف الصفحة
                                </td>
                            </tr>

                            <tr>
                                <td><i class="fa fa-camera-retro"></i> الصورة :</td>
                                <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;"><span class="btn btn-success btn-file ">
                                     اختر الصورة <!--  <input id="upload" type="file" name="image[]" multiple />-->
                                            <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                        </span></a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>

                                    <?php if ($image != ''): ?>
                            <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url() . $image ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                                <input name="page_images[]" type="checkbox" checked="true"  value="<?= $id ?>" class="check_delete"/></li>
                            <?php endif;?>

                            </td>
                            </tr>

                            <tr class="page_desc">
                                <td><i class="fa fa-files-o"></i>محتوى الصفحة :</td>
                                <td colspan="3"><textarea name="content" class="form-control ckeditor"   rows="5" placeholder="اكتب محتوى الصفحة .."><?= $content ?></textarea>
<?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                                </td>
                            </tr>


                        </table>

                </div>
            </div>

        </div>
        <p class="text-center mr_top">
            <button type="submit"  name="<?php if($add == 1):?>add<?else:?>edit<?php endif;?>_page_submit" value="1" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>

<!--/left Side -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#fet_type").hide("slow");
        $("#fet_rad2").click(function () {
            $("#fet_type").hide("slow");
        });
        $("#fet_rad1").click(function () {
            $("#fet_type").show("slow");
        });

    });


</script>

<?php endif; ?>

<script type="text/javascript">
    $('#main_cat').change(function () {
        var x = $(this).val();
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();

        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                $('#sub_cat').html(xmlhttp.responseText);
            }
        };
        xmlhttp.open("POST", "<?= base_url() ?>admincp/get_porto_cat/" + x, true);
        xmlhttp.send();
    });

    $('#main_cat_en').change(function () {
        var x = $(this).val();
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();

        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                $('#sub_cat_en').html(xmlhttp.responseText);
            }
        };
        xmlhttp.open("POST", "<?= base_url() ?>admincp/get_porto_cat/" + x + "/en", true);
        xmlhttp.send();
    });
</script>
<?php $this->load->view('admincp/footer'); ?>
