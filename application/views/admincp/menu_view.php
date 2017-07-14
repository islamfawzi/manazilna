<?php $this->load->view('admincp/header'); ?>
<? if($page_index == 1): ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة قائمة جديدة <?else:?>&nbsp;تعديل قائمة <?endif;?></h5>
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
            عنوان الرابط يجب ان يكون غير مستخدم من قبل
        </div>   
        <?elseif ($updated == 1):?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تم التعديل بنجاح ..
        </div>
        <meta http-equiv="Refresh" content="2; URL='<?= base_url() ?>admincp/edit_menu'" />  
        <?elseif ($updated == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم يتم تغيير البيانات ..
        </div>
        <? endif; ?>
        <ul class="nav nav-tabs padding_none">
            <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">عربي</a></li>        
            <li role="presentation" class="nav"><a href="#english" data-toggle="tab" class="btn btn-success">إنجليزي</a></li>
            <li role="presentation" class="nav"><a href="#media" data-toggle="tab" class="btn btn-info">اعدادات</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="arabic">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>admincp/add_menu" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                        <?if($add != 1):?>
                        <input type="hidden" name="menu_id" value="<?= $id ?>"/>
                        <?endif;?>
                        <table class="table">
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان العنصر :</td>
                                <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="عنوان القائمة"/></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان المتصفح :</td>
                                <td><input type="text" name="browser_title" value="<?= $browser_title ?>" class="form-control inp_width" id="" placeholder="العنوان الذى يظهر فى تاب المتصفح"/></td>
                            </tr>
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الرابط :
                                    <br /><span class="text-muted hint">العنوان الذى سيظهر فى رابط الصفحة<br />&nbsp;&nbsp;&nbsp;&nbsp;بدون مسافات  </span></td>
                                <td><input type="text" name="alias" value="<?= $alias ?>" class="form-control inp_width" style="direction: ltr; text-align:right;" id="" placeholder="عنوان الرابط"/></td>
                            <input type="hidden" value="<?= $alias ?>" name="old_alias"/>
                            </tr>
                            <!--    
                                <tr>
                                    <td><i class="fa fa-unlock-alt"></i> مكان العنصر :</td>
                                    <td>
                                       <input type="checkbox" name="pos1" <?php if($add == 1): ?> checked="true" <? else: if($pos1 == 1): ?> checked="true" <?php endif;
        endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>فى الاعلى
                                       <input type="checkbox" name="pos2" <?php if($add != 1): ?> <? if($pos2 == 1): ?> checked="true" <?php endif;
        endif ?> value="1" /> <i class="fa fa-thumbs-o-down"></i> فى الاسفل
                                    </td>
                                </tr> 
                            -->
                            <tr class="meta_div">
                                <td class="label_width"><i class="fa fa-pencil"></i> الكلمات المفتاحية :
                                    <br /><span class="text-muted hint"> لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; افصل بينهم بفاصلة ,</span></td>
                                <td><input type="text" name="meta_key" value="<?= $meta_key ?>" class="form-control inp_width" id="" placeholder="Meta Keyswords"/></td>
                            </tr>
                            <tr class="meta_div">
                                <td class="label_width"><i class="fa fa-pencil"></i> وصف الصفحة :
                                    <br /><br /><span class="text-muted hint">لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; لا يزيد عن 255 حرف </span></td>
                                <td><input type="text" name="meta_desc" value="<?= $meta_desc ?>" class="form-control inp_width" id="" placeholder="Meta Description"/></td>
                            </tr>
                            <tr class="meta_div">
                                <td><i class="fa fa-files-o"></i>وسوم الميتا :
                                    <br /><span class="text-muted hint">وسوم HTML  </span></td>
                                <td colspan="3"><textarea name="meta_tags" style="direction: ltr; text-align: right;" class="form-control mceNoEditor inp_width"  rows="5" placeholder="HTML Meta Tags .."><?= $meta_tags ?></textarea></td>
                            </tr>

                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> حالة العنصر :</td>
                                <td>
                                    <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php endif;
        endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله 
                                    <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php endif;
        endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                                </td>
                            </tr> 
                        </table>

                </div>
            </div>
            
             <div class="tab-pane fade" id="english">
                <div class="table-responsive" >
                    <table class="table" dir="ltr">
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Menu Title :</td>
                            <td><input type="text" value="<?= $title_en ?>" class="form-control inp_width" name="title_en" placeholder="menu title ...."/></td>
                        </tr> 
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Browser Title :</td>
                            <td><input type="text" value="<?= $browser_title_en ?>" class="form-control inp_width" name="browser_title_en" placeholder="Browser Tab Title ...."/></td>
                        </tr> 
                      <!--  <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Menu Link :</td>
                            <td><input type="text" value="<?= $alias_en ?>" class="form-control inp_width" name="alias_en" placeholder="menu link ...."/></td>
                        <input type="hidden" value="<?= $alias_en ?>" name="old_alias_en"/>
                        </tr>   -->                                      
                        <tr class="meta_div">
                            <td class="label_width"><i class="fa fa-pencil"></i> Meta Keywords :
                                <br /><span class="text-muted hint"> Helping Search Engines  <br /> Increasing Site Quality divided by comma ,</span></td>
                            <td><input type="text" name="meta_key_en" value="<?= $meta_key_en ?>" class="form-control inp_width" id="" placeholder="Meta Keyswords"/></td>
                        </tr>
                        <tr class="meta_div">
                            <td class="label_width"><i class="fa fa-pencil"></i> Meta Description :
                                <br /><span class="text-muted hint">Helping search Engines <br /> Not More than 255 char. </span></td>
                            <td><input type="text" name="meta_desc_en" value="<?= $meta_desc_en ?>" class="form-control inp_width" id="" placeholder="Meta Description"/></td>
                        </tr>
                        <tr class="meta_div">
                            <td><i class="fa fa-files-o"></i>Meta Tags :
                                <br /><span class="text-muted hint"> HTML Tags</span></td>
                            <td colspan="3"><textarea name="meta_tags_en" class="form-control mceNoEditor inp_width"  rows="5" placeholder="write Meta Tags.."><?= $meta_tags_en ?></textarea></td>
                        </tr> 

                        <tr>
                            <td><i class="fa fa-unlock-alt fa-5"></i> Menu Active :</td>
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



                    </table>
                </div>

            </div>

            <div class="tab-pane fade in" id="media">
                <div class="table-responsive">

                    <table class="table"> 
                        <tr>
                            <td><i class="fa fa-reply-all"></i> رابط الصفحة :</td>
                            <td>
                                <table style="width: 70%;">
                                    <tr>

                                        <td>
                                            <input type="hidden" name="old_parent" value="<?= $parent ?>"/>
                                            <select class="form-control" name="parent" id="parent" style="width: 200px;">
                                                <option value="">بدون رابط</option>
                                                <?foreach($all_pages as $page):?>
                                                <option <? if($page->id == $parent):?> selected="true" <?endif;?> value="<?= $page->id ?>"><?= $page->title ?></option>
                                                <?endforeach;?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>                         
                            </td>
                        </tr>
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> الترتيب :</td>
                            <td><input type="text" name="ordering" value="<?= $ordering ?>" class="form-control inp_width"  placeholder="الترتيب"/></td>
                        </tr>                                             
                    </table>                
                </div>
            </div>

        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_menu_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->
<? elseif($page_index == 2): ?>

<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <div class="top_select text-center">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i> القوائم </h5>
          <!--  <p class="pull-right">
            <form action="<?= base_url() ?>admincp/edit_menu" method="post" class="form-inline pull-right" id="menu_seach">
                <div class="form-group">
                    <select class="form-control top-form-width" name="main_menu" onchange="$('#menu_seach').submit();">
                        <option value="" selected="true">كل القوائم</option>
                        <option  value="0" >القائمة الرئيسية</option>
                        <?foreach($main_menus as $m_menu):?>
                        <option <?if($search_id == $m_menu->id):?>selected="true"<?endif;?> value="<?= $m_menu->id ?>"><?= $m_menu->title ?></option>
                        <?endforeach?>
                    </select>
                </div>
                <input type="text"  class="form-control inp_width" value="<?= $search_word ?>" name="keyword" placeholder="بحث ..."/>
                <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>                   
            </form>
            </p>
            <p class="text-left">

                <a href="<?= base_url() ?>admincp/add_menu/<?= $search_id ?>" class="btn btn-success"><i class="fa fa-plus"></i> إضافة قائمة جديدة</a>
            </p>-->
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
            <form action="<?= base_url() ?>admincp/edit_menu" method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان العنصر</th>
                        <th class="text-center"><i class="fa fa-mail-reply-all fa-5"></i> الصفحة الرئيسية</th>
                        <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                        <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                        <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                    </tr>



                    <?foreach($all_menus as $k=>$menu):?>
                    <tr>
                        <td class="text-center"><?= $menu->ordering ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_menu/<?= $menu->id ?>/<?= $menu->title ?>"><?= $menu->title ?></a><br />
                            <a href="<?= base_url() ?>admincp/edit_menu/<?= $menu->id ?>/<?= $menu->title_en ?>"><?= $menu->title_en ?></a>
                        </td>
                        <td class="text-center"><?if($menu->sub == 0):?> <span class="red">قائمة رئيسية</span> <?else:?> <a href="<?= base_url() ?>admincp/edit_menu/<?= $menu->menu ?>/<?= $menu->parent_title ?>"><?= $menu->parent_title ?></a> <?endif;?> </td>
                        <td class="text-center"><?if($menu->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/edit_menu/<?= $menu->id ?>/<?= $menu->title ?>">تعديل </a></td>
                   
                        <td class="text-center"><input type="checkbox" name="sel_menu[]" value="<?= $menu->id ?>" /></td>

                    </tr>
                    <?endforeach;?>

                    <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-left"><button type="submit" name="menu_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>
<!--/left Side -->
<? endif; ?>
<script type="text/javascript">
    $('#page_cat').change(function () {
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
                $('#parent').html(xmlhttp.responseText)
                // alert(xmlhttp.responseText);
            }
        }
        var x = $(this).val();
        var p = $('#old_parent').val();
        xmlhttp.open("POST", "<?= base_url() ?>admincp/get_pages_cat/" + x + "/" + p, true);
        xmlhttp.send();

    });

</script>
<?php $this->load->view('admincp/footer'); ?>