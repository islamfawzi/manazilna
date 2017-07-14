<?php $this->load->view('admincp/header'); ?>
<? if($page_index == 1): ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i>تعديل صفحة اتصل بنا </h5>
        <?if ($updated == 1):?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تم التعديل بنجاح ..
        </div>
        <?elseif ($updated == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم يتم تغيير البيانات ..
        </div>
        <? endif; ?>
        <ul class="nav nav-tabs padding_none">
            <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">عربي</a></li>

            <li role="presentation" class="nav"><a href="#settings" data-toggle="tab" class="btn btn-info">اخرى</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="arabic">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>admincp/contact_page" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
                        <table class="table">
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
                                <td colspan="2"><textarea name="meta_tags"  style="direction: ltr;" class="form-control mceNoEditor inp_width"  rows="5" placeholder="write HTML Meta Tags.."><?= $meta_tags ?></textarea>

                                </td>
                            </tr>  
                            <tr>
                                <td class="label_width"><i class="fa fa-pencil"></i> العنوان :
                                </td>
                                <td><input type="text" name="title" value="<?= $title ?>" class="form-control inp_width" id="" placeholder="العنوان"/></td>
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

            <div class="tab-pane fade in" id="settings">
                <div class="table-responsive">


                    <table class="table">

                        <tr>
                            <td><i class="fa fa-camera-retro"></i> الصور :</td>
                            <td><a  href="<?= base_url() ?>gallery/images/add_menu" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;"><span class="btn btn-success btn-file ">                            
                                  الصورة <!--<input id="upload" type="file" name="image[]" multiple /> -->
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
            <button type="submit"  name="edit_contact_submit" value="1" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
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
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> رسائل اتصل بنا </h5>
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
            <form action="<?= base_url() ?>admincp/contact_inbox" method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> الاسم</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> الايميل</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> الهاتف</th>
                        <th class="text-center"><i class="fa fa-edit fa-5"></i> التاريخ</th>
                        <?php if(in_array(999, $privacy)): ?>
                        <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        <?php endif; ?>
                    </tr>
                    <?foreach($inbox as $k=>$msg):?>
                    <tr>
                        <td class="text-center"><?= $k+1 ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/contact_inbox/<?= $msg->id ?>/<?= $msg->name ?>"><?= $msg->name ?></a></td>
                        <td class="text-center"><?= $msg->email ?></td>
                        <td class="text-center"><?= $msg->phone ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/contact_inbox/<?= $msg->id ?>/<?= $msg->name ?>"><?= $msg->send_time ?></a></td>
                        <?php if(in_array(999, $privacy)): ?>
                        <td class="text-center"><input type="checkbox" name="sel_inbox[]" value="<?= $msg->id ?>" /></td>
                        <?php endif; ?>
                    </tr>
                    <?endforeach;?>
                    <?php if(in_array(999, $privacy)): ?>
                    <tr>
                        <td colspan="5"></td>
                        <td class="text-left">

                            <span class="mr_check red"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-left">
                            <button type="submit" name="inbox_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button>
                        </td>
                    </tr>
                    <?php endif; ?>

                </table>
            </form>
        </div>
    </div>
</div>
<!--/left Side -->
<? elseif($page_index == 3):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> <?= $name ?> </h5>
        <?if ($deleted == 1):?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تم الحف بنجاح ..
        </div>
        <?elseif ($deleted == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم يتم الحذف بنجاح ..
        </div>
        <? endif; ?>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="arabic">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>admincp/contact_inbox" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
                        <input type="hidden" name="msg_id" value="<?= $id ?>"/>
                        <table class="table">
                            <tr>
                                <td><i class="fa fa-pencil"></i> الاسم : </td>
                                <td><?= $name ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> الايميل : </td>
                                <td><?= $email ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> الهاتف : </td>
                                <td><?= $phone ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> الرسالة : </td>
                                <td style="width: 900px;"><?= $message ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> التاريخ : </td>
                                <td><?= $send_time ?></td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="del_inbox_submit" value="1" class="btn btn-danger">حذف الرسالة <i class="fa fa-trash-o"></i></button>
            <a href="<?= base_url() ?>admincp/contact_inbox"><button type="submit" class="btn btn-primary">العودة الى الرسائل <i class="fa fa-undo fa-5"></i></button></a>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->
<? elseif($page_index == 4): ?>

<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> الطلبات </h5>
        <form action="<?= base_url() ?>admincp/show_orders" method="post" class="form-inline pull-right" id="order_form">
            <div class="form-group">
                <select class="form-control top-form-width" name="catid" onchange="$('#order_form').submit();">
                    <option value="" selected="true">كل الاقسام</option>
                    <?foreach($all_cats as $cat):?>
                    <option <?if($search_id == $cat->title):?>selected="true"<?endif;?> value="<?= $cat->title ?>"><?= $cat->title ?></option>
                    <?endforeach?>
                </select>
                <select class="form-control top-form-width" name="package" onchange="$('#order_form').submit();">
                    <option value="" selected="true">كل الباقات</option>

                    <?php foreach($all_package as $package): ?>
                    <option <?if($search_sub == $package->title):?>selected="true"<?endif;?> value="<?= $package->title ?>"><?= $package->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>                    
        </form>
        <div style="clear:both;"></div><br />
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
            <form action="<?= base_url() ?>admincp/show_orders" method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> الاسم</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> الايميل</th>
                        <th class="text-center"><i class="fa fa-smile-o fa-5"></i> التليفون</th>
                        <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الباقة</th>
                        <th class="text-center"><i class="fa fa-edit fa-5"></i> التاريخ</th>
                        <?php if(in_array(999, $privacy)): ?>
                        <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        <?php endif; ?>
                    </tr>
                    <?foreach($inbox as $k=>$msg):?>
                    <tr>
                        <td class="text-center"><?= $k+1 ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/show_orders/<?= $msg->id ?>/<?= $msg->name ?>"><?= $msg->name ?></a></td>
                        <td class="text-center"><a href="mailto:<?= $msg->email ?>" target="_top"><?= $msg->email ?></a></td>
                        <td class="text-center"><?= $msg->phone ?></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/show_orders/<?= $msg->id ?>/<?= $msg->name ?>"><?= $msg->package ?></a></td>
                        <td class="text-center"><a href="<?= base_url() ?>admincp/show_orders/<?= $msg->id ?>/<?= $msg->name ?>"><?= $msg->send_time ?></a></td>
                        <?php if(in_array(999, $privacy)): ?>
                        <td class="text-center"><input type="checkbox" name="sel_inbox[]" value="<?= $msg->id ?>" /></td>
                        <?php endif; ?>
                    </tr>
                    <?endforeach;?>
                    <?php if(in_array(999, $privacy)): ?>
                    <tr>
                        <td colspan="6"></td>
                        <td class="text-left">

                            <span class="mr_check red"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-left">
                            <button type="submit" name="inbox_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button>
                        </td>
                    </tr>
                    <?php endif; ?>

                </table>
            </form>
        </div>
    </div>
</div>
<!--/left Side -->
<? elseif($page_index == 5):?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> <?= $package ?> </h5>
        <?if ($deleted == 1):?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تم الحف بنجاح ..
        </div>
        <?elseif ($deleted == 2):?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم يتم الحذف بنجاح ..
        </div>
        <? endif; ?>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="arabic">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>admincp/show_orders" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
                        <input type="hidden" name="msg_id" value="<?= $id ?>"/>
                        <table class="table">
                            <tr>
                                <td><i class="fa fa-pencil"></i> الاسم : </td>
                                <td><?= $name ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> الايميل : </td>
                                <td><a href="mailto:<?= $email ?>" target="_top"><?= $email ?></a></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> التليفون :</td>
                                <td><?= $phone ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> الباقة :</td>
                                <td><?= $package ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> القسم :</td>
                                <td><?= $offer_cat ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> الرسالة : </td>
                                <td style="width: 900px;"><?= $message ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-pencil"></i> التاريخ : </td>
                                <td><?= $send_time ?></td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="del_inbox_submit" value="1" class="btn btn-danger">حذف الرسالة <i class="fa fa-trash-o"></i></button>
            <a href="<?= base_url() ?>admincp/show_orders"><button type="submit" class="btn btn-primary">العودة الى الرسائل <i class="fa fa-undo fa-5"></i></button></a>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->
<? endif; ?>
<?php $this->load->view('admincp/footer'); ?>