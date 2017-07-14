<?php
$this->load->view('admincp/header');
if ($page_index == 1):
    ?>
    <div class="col-sm-10 col-xs-12">
        <div class="forms">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if ($add == 1): ?> اضافة قسم جديد <?php else: ?>&nbsp;تعديل قسم <?php endif; ?></h5>

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
            <?php elseif ($updated == 1): ?>
                <div class="alert alert-success">
                    <i class="fa fa-check font_big"></i>&nbsp;
                    تم التعديل بنجاح ..
                </div>
                <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_project_cat'" />
            <?php elseif ($updated == 2): ?>
                <div class="alert alert-danger">
                    <i class="fa fa-remove fa-5 font_big"></i>
                    لم يتم تغيير البيانات ..
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/add_project_cat" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                    <?php if ($add != 1): ?>
                        <input type="hidden" name="cat_id" value="<?= $id ?>"/>
                    <?php endif; ?>
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
                                <input type="radio" name="active" <?php if ($add == 1): ?> checked="true" <?php else: if ($active == 1): ?> checked="true" <?php
                                    endif;
                                endif;
                                ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله
                                <input type="radio" name="active" <?php if ($add != 1): ?> <?php if ($active == 0): ?> checked="true" <?php
                                    endif;
                                endif
                                ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                            </td>
                        </tr>
                    </table>
            </div>
            <p class="text-center mr_top">
                <button type="submit"  name="<?php if ($add == 1): ?>add<?php else: ?>edit<?php endif; ?>_cat_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
            </p>
            </form>
        </div>
    </div>
<?php elseif ($page_index == 2): ?>
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
            <?php endif; ?>
            <p class="text-left">
                <a href="<?= base_url() ?>admincp/add_project_cat" class="btn btn-success"><i class="fa fa-plus"></i> إضافة  جديد</a>
            </p>
            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/edit_project_cat" method="post">
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
                        <?php if (!empty($all_cats)): ?>
                            <?php foreach ($all_cats as $k => $cat): ?>
                                <tr>
                                    <td class="text-center"><?= $k + 1 ?></td>
                                    <td class="text-center"><a href="<?= base_url() ?>admincp/edit_project_cat/<?= $cat->id ?>/<?= $cat->title ?>"><?= $cat->title ?></a><br />
                                        <a href="<?= base_url() ?>admincp/edit_project_cat/<?= $cat->id ?>/<?= $cat->title_en ?>"><?= $cat->title_en ?></a>
                                    </td>
                                    <td class="text-center"><?php if ($cat->active == 1): ?><i class="fa fa-check font_big green"></i><?php else: ?><i class="fa fa-remove fa-5 font_big red"></i><?php endif; ?></td>
                                    <td class="text-center"><a href="<?= base_url() ?>admincp/edit_project_cat/<?= $cat->id ?>/<?= $cat->title ?>">تعديل </a></td>
                                    <?php if (in_array(999, $privacy)): ?>
                                        <td class="text-center"><input type="checkbox" name="sel_cat[]" value="<?= $cat->id ?>" /></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
<?php elseif ($page_index == 3): ?>
    <div class="col-sm-10 col-xs-12">
        <div class="forms">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if ($add == 1): ?> اضافة قسم فرعى <?php else: ?>&nbsp;تعديل قسم فرعى <?php endif; ?></h5>

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
            <?php elseif ($updated == 1): ?>
                <div class="alert alert-success">
                    <i class="fa fa-check font_big"></i>&nbsp;
                    تم التعديل بنجاح ..
                </div>
                <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_project_subcat'" />
            <?php elseif ($updated == 2): ?>
                <div class="alert alert-danger">
                    <i class="fa fa-remove fa-5 font_big"></i>
                    لم يتم تغيير البيانات ..
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/add_project_subcat" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                    <?php if ($add != 1): ?>
                        <input type="hidden" name="subcat_id" value="<?= $id ?>"/>
                    <?php endif; ?>
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
                                    <?php foreach ($all_main_cats as $cat): ?>
                                        <option <?php if ($cat_FK == $cat->id || $main_cat == $cat->id): ?>selected="selected"<?php endif; ?>value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-unlock-alt"></i> حالة القسم :</td>
                            <td>
                                <input type="radio" name="active" <?php if ($add == 1): ?> checked="true" <?php else: if ($active == 1): ?> checked="true" <?php
                                    endif;
                                endif;
                                ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله
                                <input type="radio" name="active" <?php if ($add != 1): ?> <?php if ($active == 0): ?> checked="true" <?php
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
                        <?php if ($add != 1): ?>
                            <tr>
                                <td></td>
                                <td>
                                    <?php foreach ($images as $id => $image): ?>
                                        <?php if ($image != ''): ?>
                                    <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url() . $image ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                                        <input name="page_images[]" type="checkbox" checked="true"  value="<?= $id ?>" class="check_delete"/></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </td>
                            </tr>
                        <?php endif; ?>
                    </table>

            </div>


            <p class="text-center mr_top">
                <button type="submit"  name="<?php if ($add == 1): ?>add<?php else: ?>edit<?php endif; ?>_cat_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
            </p>
            </form>
        </div>
    </div>
<?php elseif ($page_index == 4): ?>
    <!--left Side -->
    <div class="col-sm-10 col-xs-12">
        <div class="forms">
            <div class="top_select text-center">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i> الاقسام الفرعيه </h5>
                <p class="pull-right">
                <form action="<?= base_url() ?>admincp/edit_project_subcat" method="post" id="porto_sub_cat" class="form-inline pull-right" >
                    <div class="form-group">
                        <select class="form-control top-form-width" name="main_cat" onchange="$('#porto_sub_cat').submit();">
                            <option value="" selected="true">كل الاقسام</option>

                            <?php foreach ($all_main_cats as $p_cat): ?>
                                <option <?php if ($search_id == $p_cat->id): ?>selected="true"<?php endif; ?> value="<?= $p_cat->id ?>"><?= $p_cat->title ?></option>
                            <?php endforeach ?>
                        </select>
                        <input type="text"  class="form-control inp_width" value="<?= $search_word ?>" name="keyword" placeholder="بحث ..."/>
                        <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>
                    </div>

                </form>
                </p>
                <p class="text-left">
                    <a href="<?= base_url() ?>admincp/add_project_subcat/<?= $search_id ?>" class="btn btn-success"><i class="fa fa-plus"></i> إضاف قسم فرعى</a>
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
            <?php endif; ?>
            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/edit_project_subcat" method="post">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                            <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان القسم</th>
                            <th class="text-center"><i class="fa fa-pencil fa-5"></i> القسم الرئيسى</th>
                            <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                            <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                            <?php if (in_array(999, $privacy)): ?>
                                <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                            <?php endif; ?>
                        </tr>
                        <?php if (!empty($all_cats)): ?>
                            <?php foreach ($all_cats as $k => $cat): ?>
                                <tr>
                                    <td class="text-center"><?= $k + 1 ?></td>
                                    <td class="text-center"><a href="<?= base_url() ?>admincp/edit_project_subcat/<?= $cat->id ?>/<?= $cat->title ?>"><?= $cat->title ?></a><br />
                                        <a href="<?= base_url() ?>admincp/edit_project_subcat/<?= $cat->id ?>/<?= $cat->title_en ?>"><?= $cat->title_en ?></a>
                                    </td>
                                    <td class="text-center"><a href="<?= base_url() ?>admincp/edit_project_cat/<?= $cat->cat_FK ?>/<?= $cat->cat_title ?>"><?= $cat->cat_title ?></a></td>
                                    <td class="text-center"><?php if ($cat->active == 1): ?><i class="fa fa-check font_big green"></i><?php else: ?><i class="fa fa-remove fa-5 font_big red"></i><?php endif; ?></td>
                                    <td class="text-center"><a href="<?= base_url() ?>admincp/edit_project_subcat/<?= $cat->id ?>/<?= $cat->title ?>">تعديل </a></td>
                                    <?php if (in_array(999, $privacy)): ?>
                                        <td class="text-center"><input type="checkbox" name="sel_cat[]" value="<?= $cat->id ?>" /></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (in_array(999, $privacy)): ?>
                            <tr>
                                <td colspan="5"></td>
                                <td class="text-left"><span class="mr_check red" style="margin-left: 10% !important"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
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
<?php elseif ($page_index == 5): ?>
    <!--left Side -->
    <div class="col-sm-10 col-xs-12">
        <div class="forms">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if ($add == 1): ?> اضافة   جديد <?php else: ?>&nbsp;تعديل  <?php endif; ?></h5>
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

            <?php elseif ($updated == 1): ?>
                <div class="alert alert-success">
                    <i class="fa fa-check font_big"></i>&nbsp;
                    تم التعديل بنجاح ..
                </div>
                <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_project/back'" />
            <?php elseif ($updated == 2): ?>
                <div class="alert alert-danger">
                    <i class="fa fa-remove fa-5 font_big"></i>
                    لم يتم تغيير البيانات ..
                </div>
            <?php endif; ?>
            <ul class="nav nav-tabs padding_none">
                <li role="presentation" class="nav active"><a href="#maplocation" data-toggle="tab" class="btn btn-info">الموقع على الخريظة</a></li>
                <li role="presentation" class="nav"><a href="#arabic" data-toggle="tab" class="btn btn-warning">عربي</a></li>
                <li role="presentation" class="nav"><a href="#english" data-toggle="tab" class="btn btn-success">إنجليزي</a></li>
                <li role="presentation" class="nav"><a href="#properties" data-toggle="tab" class="btn btn-info">الخصائص</a></li>
                <li role="presentation" class="nav"><a href="#contacts" data-toggle="tab" class="btn btn-info">وسائل الاتصال</a></li>
                <li role="presentation" class="nav"><a href="#media" data-toggle="tab" class="btn btn-info">الميديا</a></li>
                <li role="presentation" class="nav"><a href="#mta" data-toggle="tab" class="btn btn-info">Meta</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in" id="arabic">
                    <div class="table-responsive">
                        <form action="<?= base_url() ?>admincp/add_project" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                            <?php if ($add != 1): ?>
                                <input type="hidden" name="port_id" value="<?= $id ?>"/>
                            <?php endif; ?>
                            <table class="table">
                                <tr class="">
                                    <td> القسم الرئيسى :</td>
                                    <td>
                                        <select class="form-control inp_width" id="catid" name="catid">
                                            <option value="0" >اختر قسم</option>
                                            <?php foreach ($all_main_cats as $cat): ?>
                                                <option <?php if ($catid == $cat->id): ?>selected="selected"<?php endif; ?>value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> العنوان  :</td>
                                    <td><input type="text" name="address_ar" value="<?= $address_ar ?>" class="form-control inp_width" placeholder="القاهرة مصر" /></td>
                                </tr>
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> اسم  :</td>
                                    <td><input type="text" name="title_ar" value="<?= $title_ar ?>" class="form-control inp_width" id="" placeholder="اسم العقار"/></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-files-o"></i> وصف   :
                                    </td>
                                    <td colspan="3"><textarea name="description_ar" class="form-control ckeditor"   rows="5" placeholder="Describtion"><?= $description_ar ?></textarea>
                                        <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
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
                                <td><input type="text" value="<?= $title ?>" class="form-control inp_width" name="title" placeholder=""/></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Address :</td>
                                <td><input type="text" value="<?= $address ?>" class="form-control inp_width" name="address" placeholder="33019 , New York, US"/></td>
                            </tr>
                            <tr class="page_desc_en usage">
                                <td><i class="fa fa-files-o"></i> Content :</td>
                                <td colspan="3"><textarea name="description" class="form-control ckeditor"   rows="5" placeholder="Item content.."><?= $description ?></textarea>
                                    <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade in" id="properties">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> السعر  :</td>
                                <td><input type="text" name="price" value="<?= $price ?>" class="form-control inp_width" /></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> تاريخ الانشاء :</td>
                                <td><input type="text" name="year" value="<?= $year ?>" class="form-control inp_width" /></td>
                            </tr>

                            <tr class="">
                                <td>الكماليات :</td>
                                <td>
                                    <select class="form-control inp_width" multiple name="amenities[]">
                                        <option value=""> </option>
                                        <?php
                                        $amenities = json_decode($amenities);
                                        foreach ($_amenities as $option):
                                            ?>
                                            <option <?php if (in_array($option->id, $amenities)): ?>selected="selected"<?php endif; ?> value="<?= $option->id ?>"><?= $option->title . ' | ' . $option->title_ar ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="">
                                <td>نوع التشطيب :</td>
                                <td>
                                    <select class="form-control inp_width" name="finish_types">
                                        <option value=""> </option>
                                        <?php foreach ($_finish_types as $option): ?>
                                            <option <?php if ($finish_types == $option->id): ?>selected="selected"<?php endif; ?> value="<?= $option->id ?>"><?= $option->title . ' | ' . $option->title_ar ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </td>
                            </tr>
                            <tr class="">
                                <td>النوع :</td>
                                <td>
                                    <select class="form-control inp_width" name="property_type">
                                        <option value=""> </option>
                                        <?php foreach ($_property_types as $option): ?>
                                            <option <?php if ($property_type == $option->id): ?>selected="selected"<?php endif; ?> value="<?= $option->id ?>"><?= $option->title . ' | ' . $option->title_ar ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </td>
                            </tr>

                            <tr class="">
                                <td> عدد الغرف :</td>
                                <td>
                                    <select class="form-control inp_width" name="rooms">
                                        <option value="" > </option>
                                        <?php for ($i = 1; $i < 21; $i++): ?>
                                            <option <?php if ($i == $rooms): ?>selected="selected"<?php endif; ?>value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>

                                </td>
                            </tr>
                            <tr class="">
                                <td> الطابق :</td>
                                <td>
                                    <select class="form-control inp_width" name="floor">
                                        <option value="" > </option>
                                        <?php for ($i = 1; $i < 21; $i++): ?>
                                            <option <?php if ($i == $floor): ?>selected="selected"<?php endif; ?>value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>

                                </td>
                            </tr>
                            <tr class="">
                                <td> عدد الحمامات :</td>
                                <td>
                                    <select class="form-control inp_width" name="baths">
                                        <option value="" > </option>
                                        <?php for ($i = 1; $i < 21; $i++): ?>
                                            <option <?php if ($i == $baths): ?>selected="selected"<?php endif; ?> value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> الحاله  :</td>
                                <td>
                                    <input type="radio" name="active" <?php if ($add == 1): ?> checked="true" <?php else: if ($active == 1): ?> checked="true" <?php
                                        endif;
                                    endif;
                                    ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله
                                    <input type="radio" name="active" <?php if ($add != 1): ?> <?php if ($active == 0): ?> checked="true" <?php
                                        endif;
                                    endif
                                    ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> منتج مميز  :<br /><span class="text-muted hint"> يظهر فى الصفحة الرئيسية</span></td></td>
                                <td>
                                    <input type="radio" name="feature" <?php if ($feature == 1): ?> checked="true" <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مميز
                                    <input type="radio" name="feature" <?php if ($add == 1): ?> checked="true" <?php else: if ($feature == 0): ?> checked="true" <?php
                                        endif;
                                    endif
                                    ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مميز
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> الغرض:</td>
                                <td>
                                    <input type="radio" name="purpose" <?php if ($purpose == 1): ?> checked="true" <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  للبيع
                                    <input type="radio" name="purpose" <?php if ($add == 1): ?> checked="true" <?php else: if ($purpose == 0): ?> checked="true" <?php
                                        endif;
                                    endif
                                    ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> للايجار
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> حاله البيع :</td>
                                <td>
                                    <input type="radio" name="soled" <?php if ($soled == 1): ?> checked="true" <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مباع
                                    <input type="radio" name="soled" <?php if ($add == 1): ?> checked="true" <?php else: if ($soled == 0): ?> checked="true" <?php
                                        endif;
                                    endif
                                    ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مباع
                                </td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> المساحة  :</td>
                                <td><input type="number" name="area" value="<?= $area ?>" class="form-control inp_width" /></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> مساحة الارض  :</td>
                                <td><input type="number" name="land_area" value="<?= $land_area ?>" class="form-control inp_width" /></td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="tab-pane fade in" id="contacts">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> هاتف1 :</td>
                                <td><input type="text" name="phone1" value="<?= $phone1 ?>" class="form-control inp_width" /></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> هاتف 2 :</td>
                                <td><input type="text" name="phone2" value="<?= $phone2 ?>" class="form-control inp_width" /></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> هاتف 3  :</td>
                                <td><input type="text" name="phone3" value="<?= $phone3 ?>" class="form-control inp_width" /></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> بريد الكترونى :</td>
                                <td><input type="text" name="email" value="<?= $email ?>" class="form-control inp_width" /></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <style>
                    #map {
                        height: 350px;
                        width: 90%;
                    }
                </style>
                <div class="tab-pane fade in active" id="maplocation">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> حدد الموقع على الخريطة :</td>
                                <td>
                                    <div id="map"></div>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input id="lat" name="latitude" value="<?= $latitude ?>" />
                                    <input id="lng" name="longitude" value="<?= $longitude ?>" />
                                    <input id="location" type="hidden" name="location" value="<?= $location ?>" />
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="tab-pane fade in" id="media">
                    <div class="table-responsive">
                        <table class="table">

                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i>التقييم  :</td>
                                <td><input type="number" name="rate" value="<?= $rate ?>" class="form-control inp_width" min="0" max="5" /></td>
                            </tr>

                            <tr>
                                <td><i class="fa fa-camera-retro"></i> الصور :</td>
                                <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;"><span class="btn btn-success btn-file ">
                                       اختيار الصور  <!--<input id="upload" type="file" name="image[]" multiple /> -->
                                            <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                        </span></a></td>
                            </tr>
                            <?php if ($add != 1): ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?php foreach ($images as $id => $image): ?>
                                            <?php if ($image != ''): ?>
                                        <li class="pull-right relative" style="list-style: none;"><a href=""><img id="blah"   src="<?= base_url() . $image ?>"  width="200" height="130" class="img-responsive img-thumbnail" /></a>
                                            <input name="page_images[]" type="checkbox" checked="true"  value="<?= $id ?>" class="check_delete"/></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <td><i class="fa fa-files-o"></i> لينك الفيديو   :
                                </td>
                                <td colspan="3">
                                  <input type="text" name="video" value="<?= $video ?>" class="form-control inp_width" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade in" id="mta">
                    <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> meta title  :</td>
                                    <td><input type="text" name="meta_title" value="<?= $meta_title ?>" class="form-control inp_width" /></td>
                                </tr>
                                <tr>
                                    <td class="label_width input_label"><i class="fa fa-pencil"></i> meta keywords :</td>
                                    <td><input type="text" name="meta_keywords" value="<?= $meta_keywords ?>" class="form-control inp_width" /></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-files-o"></i> meta description :
                                    </td>
                                    <td colspan="3">
                                      <textarea name="meta_description" class="form-control" rows="5">
                                        <?= $meta_description ?>
                                      </textarea>
                                    </td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
            <p class="text-center mr_top">
                <button type="submit"  name="<?php if ($add == 1): ?>add<?php else: ?>edit<?php endif; ?>_work_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
            </p>
            </form>
        </div>
    </div>
    <!--/left Side -->
    <script>
        initMap();
        function initMap() {
            var cairo = {
                lat: <?= $latitude ?>,
                lng: <?= $longitude ?>
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: cairo
            });

            var marker = new google.maps.Marker({
                position: cairo,
                draggable: true,
                map: map
            });


            google.maps.event.addListener(marker, 'dragend', function (evt) {
                document.getElementById('lat').value = evt.latLng.lat().toFixed(3);
                document.getElementById('lng').value = evt.latLng.lng().toFixed(3);
                document.getElementById('location').value = evt.latLng;
            });

            google.maps.event.addListener(map, 'click', function (evt) {
                document.getElementById('lat').value = evt.latLng.lat();
                document.getElementById('lng').value = evt.latLng.lng();
                document.getElementById('location').value = evt.latLng;

                marker.setPosition(evt.latLng);
                map.setCenter(evt.latLng);
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDot9ATzfds0wMb7mrzNxmJ15-tDqX6-30&callback=initMap">
    </script>
<?php elseif ($page_index == 6): ?>
    <!--left Side -->
    <div class="col-sm-10 col-xs-12">
        <div class="forms">
            <div class="top_select text-center">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i> المنتجات </h5>
                <!--<p class="pull-right">
                <form action="<?= base_url() ?>admincp/edit_project" method="post" class="form-inline pull-right" id="ports_form">
                    <div class="form-group">
                        <input type="text"  class="form-control inp_width" value="<?= $search_word ?>" name="keyword" placeholder="بحث ..."/>
                        <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>
                    </div>

                </form>
                </p>-->
                <p class="text-left">
                    <a href="<?= base_url() ?>admincp/add_project/<?= $search_id ?>/<?= $search_sub ?>" class="btn btn-success"><i class="fa fa-plus"></i> إضافة  جديد</a>
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
            <?php endif; ?>
            <div class="table-responsive">
                <form action="<?= base_url() ?>admincp/edit_project" method="post">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                            <th width="25%" class="text-center"><i class="fa fa-pencil fa-5"></i> العنوان</th>
                            <th class="text-center"><i class="fa fa-pencil fa-5"></i> الصورة</th>
                            <th width="25%" class="text-center"><i class="fa fa-pencil fa-5"></i> القسم </th>
                            <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                            <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                            <?php if (in_array(999, $privacy)): ?>
                                <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                            <?php endif; ?>
                        </tr>
                        <?php if (!empty($all_ports)): ?>
                            <?php foreach ($all_ports as $k => $port): ?>
                                <tr>
                                    <td class="text-center"><?= $port->id ?></td>
                                    <td class="text-center">

                                        <a href="<?= base_url() ?>admincp/edit_project/<?= $port->id ?>/<?= str_replace(' ', '-', $port->title) ?>"><?= $port->title ?></a><br />
                                        <a href="<?= base_url() ?>admincp/edit_project/<?= $port->id ?>/<?= url_title($port->title_en) ?>"><?= $port->title_en ?></a>

                                    </td>
                                    <td class="text-center"><?php if ($port->img): ?><img  src="<?= base_url() . $port->img ?>" width="100px" height="100px" /><?php else: ?>Not Selected<?php endif; ?></td>
                                    <td class="text-center"><?= $port->cat_title . '<br />' . $port->cat_title_en ?></td>
                                    <td class="text-center"><?php if ($port->active == 1): ?><i class="fa fa-check font_big green"></i><?php else: ?><i class="fa fa-remove fa-5 font_big red"></i><?php endif; ?></td>
                                    <td class="text-center">
                                      <a class="btn btn-sm btn-primary" href="<?= base_url() ?>admincp/edit_project/<?= $port->id ?>/<?= $port->title ?>">تعديل </a>
                                      <a class="btn btn-sm btn-success" target="_blank" href="<?= base_url('properties/' . $port->id) ?>">عرض </a>
                                    </td>
                                    <?php if (in_array(999, $privacy)): ?>
                                        <td class="text-center"><input type="checkbox" name="sel_port[]" value="<?= $port->id ?>" /></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td><td></td>
                                <td colspan="3"><?= $pages; ?></td>
                                <td></td>
                            </tr>
                        <?php endif; ?>
                        <?php if (in_array(999, $privacy)): ?>
                            <tr>
                                <td colspan="6"></td>
                                <td class="text-left"><span class="mr_check red" style="margin-left: 13% !important"><input id="all" type="checkbox" /> &nbsp; تحديد الكل </span></td>
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
<?php elseif ($page_index == 7): ?>
    <!--left Side -->
    <div class="col-sm-10 col-xs-12">

        <div class="forms">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if ($add == 1): ?> اضافة عنصر جديد <?php else: ?>&nbsp;تعديل عنصر <?php endif; ?></h5>
            <form action="" method="post">
                <input type="text"  class="form-control" style="width: 12%; float:right; margin-left:20px;" value="<?= $search_word ?>" name="port_num" placeholder="ادخل رقم العناصر"/>
                <button type="submit" name="add_project_num" value="1" class="btn btn-warning"> انشاء <i class="fa fa-plus"></i></button>
                <span style="clear: both;"></span>
            </form>
            <br />
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
            <?php elseif ($added == 3): ?>
                <div class="alert alert-danger">
                    <i class="fa fa-remove fa-5 font_big"></i>
                    برجاء اختيار صورة لكل عمل ..
                </div>
            <?php endif; ?>
            <ul class="nav nav-tabs padding_none" id="port_ul">
                <?php for ($i = 1; $i <= $len; $i++): ?>
                    <li role="presentation" class="port_tab nav <?php if ($i == 1): ?>active<?php endif; ?>"><a href="#<?= $i ?>" data-toggle="tab" class="btn btn-success"><?= $i ?></a></li>
                <?php endfor; ?>
                <li   class="nav"><a  id="add_port_tab" class="btn btn-success"><i class="fa fa-plus"></i></a></li>
            </ul>


            <div class="tab-content" id="port_tab_div">
                <?php for ($i = 1; $i <= $len; $i++): ?>
                    <div class="tab-pane fade in <?php if ($i == 1): ?>active<?php endif; ?>" id="<?= $i ?>">
                        <div class="table-responsive">
                            <form action="<?= base_url() ?>admincp/add_multi_project" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                                <table class="table">
                                    <tr>
                                        <td ><i class="fa fa-pencil"></i> عنوان العنصر :</td>
                                        <td><input type="text" name="title[]" value="<?= $title[$i - 1] ?>"  class="form-control" id="" placeholder="بالعربية"/></td>
                                        <td ><i class="fa fa-pencil"></i> عنوان العنصر :</td>
                                        <td><input type="text" name="title_en[]" value="<?= $title_en[$i - 1] ?>" class="form-control" id="" placeholder="English"/></td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td ><i class="fa fa-pencil"></i> لينك التحويل :</td>
                                        <td><input type="text" name="link[]" value="<?= $link[$i - 1] ?>"  class="form-control" id="" placeholder="للعربى"/></td>
                                        <td ><i class="fa fa-pencil"></i> لينك التحويل :</td>
                                        <td><input type="text" name="link_en[]" value="<?= $link_en[$i - 1] ?>" class="form-control" id="" placeholder="English"/></td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td><i class="fa fa-files-o"></i>وصف العنصر : </td>
                                        <td><textarea name="content[]" class="form-control" rows="5" placeholder="بالعربية"><?= $content[$i - 1] ?></textarea></td>
                                        <td><i class="fa fa-files-o"></i>وصف العنصر : </td>
                                        <td><textarea name="content_en[]" class="form-control" rows="5" placeholder="English"><?= $content_en[$i - 1] ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-unlock-alt"></i>  حالة العتصر العربى :</td>
                                        <td>
                                            <input type="radio" name="active[<?= $i ?>]" <?php if ($add == 1 || $active[$i] == 1 || $new == 1): ?> checked="true"  <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل
                                            <input type="radio" name="active[<?= $i ?>]" <?php if ($add != 1 && $active[$i] == 0 && $new != 1): ?>  checked="true" <?php endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                                        </td>
                                        <td><i class="fa fa-unlock-alt"></i> حاله العنصر الانجليزى :</td>
                                        <td>
                                            <input type="radio" name="active_en[<?= $i ?>]" <?php if ($add == 1 || $active_en[$i] == 1 || $new == 1): ?> checked="true"  <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل
                                            <input type="radio" name="active_en[<?= $i ?>]" <?php if ($add != 1 && $active_en[$i] == 0 && $new != 1): ?>  checked="true" <?php endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-unlock-alt"></i>  عنصر مميز :</td>
                                        <td>
                                            <input type="radio" name="fet[<?= $i ?>]" <?php if ($add == 1 || $fet[$i] == 1 || $new == 1): ?> checked="true"  <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مميز
                                            <input type="radio" name="fet[<?= $i ?>]" <?php if ($add != 1 && $fet[$i] == 0 && $new != 1): ?>  checked="true" <?php endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مميز
                                        </td>
                                        <td><i class="fa fa-unlock-alt"></i> عنصر مميز :</td>
                                        <td>
                                            <input type="radio" name="fet_en[<?= $i ?>]" <?php if ($add == 1 || $fet_en[$i] == 1 || $new == 1): ?> checked="true"  <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مميز
                                            <input type="radio" name="fet_en[<?= $i ?>]" <?php if ($add != 1 && $fet_en[$i] == 0 && $new != 1): ?>  checked="true" <?php endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مميز
                                        </td>
                                    </tr>
                                    <tr class="main_menu">
                                        <td><i class="fa fa-reply-all"></i> القسم الرئيسى :</td>
                                        <td>
                                            <select class="form-control" id="porto_cat" name="catid[]">
                                                <option value="0" >اختر قسم</option>
                                                <?php foreach ($all_main_cats as $cat): ?>
                                                    <option <?php if ($catid[$i - 1] == $cat->id): ?>selected="selected"<?php endif; ?>value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </td>

                                        <td><!--i class="fa fa-reply-all"></i> القسم الفرعى : --></td>
                                        <td> <!--
                                          <select class="form-control" id="sub_catid" name="sub_catid[]">
                                           <option value="0" >اختر قسم</option>
                                            <?php foreach ($all_sub_cats as $subcat): ?>
                                                                         <option <?php if ($sub_catid[$i - 1] == $subcat->id): ?> selected="true" <?php endif; ?>value="<?= $subcat->id ?>" ><?= $subcat->title ?></option>
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
                <?php endfor; ?>

            </div>
            <p class="text-center mr_top">
                <button type="submit"  name="add_multi_work_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
            </p>
            </form>
        </div>
    </div>
    <!--/left Side -->
<?php endif; ?>
<script type="text/javascript">
    $('#main_menu').submit(function () {
        var catid = $('#catid');
        if (catid.val() === '0') {
            alert('يجب اختيار القسم !!');
            catid.css("border", "1px solid red");
            return false;
        }
    });
</script>
<?php $this->load->view('admincp/footer'); ?>
