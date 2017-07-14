<?php $this->load->view('admincp/header'); ?>
<? if($page_index == 1): ?>

<!--left Side -->
           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> القائمة البريدية </h5>
                 <?php if ($deleted == 1):?>
                    <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                   تم الحذف بنجاح ..
                  </div>
              <?php elseif ($deleted == 2):?>
                  <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   حدث خطأ اثناء الحذف ..
                  </div>
              <?endif;?>
                <div class="table-responsive">
                   <form action="<?=base_url()?>admincp/mail_list" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                          <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>

                          <th class="text-center"><i class="fa fa-pencil fa-5"></i> الايميل</th>

                          <th class="text-center"><i class="fa fa-pencil fa-5"></i> الحالة</th>
                          <th class="text-center"><i class="fa fa-smile-o fa-5"></i> تاريخ الاشتراك</th>
                          <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                          <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        </tr>

                        <?foreach($mail_list as $k=>$mail):?>
                        <tr>
                           <td class="text-center"><?= $k+1 ?></td>

                           <td class="text-center"><a href="<?=base_url()?>admincp/mail_list/<?=$mail->id?>/<?=$mail->email?>"><?=$mail->email?></a></td>

                           <td class="text-center">
                             <?php if($mail->active == 1): ?>
                              <i class="fa fa-check font_big green"></i>
                            <?else:?>
                              <i class="fa fa-remove fa-5 font_big red"></i>
                            <?endif;?>
                          </td>
                           <td class="text-center"><?=$mail->time?></td>
                           <td class="text-center">
                             <a href="<?=base_url()?>admincp/mail_list/<?=$mail->id?>/<?=$mail->email?>">تعديل </a>
                           </td>
                           <td class="text-center"><input type="checkbox" name="sel_mails[]" value="<?=$mail->id?>" /></td>
                        </tr>
                        <?endforeach;?>
                        <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red" ><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-left"><button type="submit" name="emails_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                        </tr>
                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->
<?elseif($page_index == 2):?>
<div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center">
                  <i class="fa fa-edit"></i>
                  <?php if($add == 1): ?>اضافة الى القائمة البريدية<?php else: ?>تعديل فى القائمة البريدية  <?php endif; ?>
                </h5>
              <?if ($added == 1):?>
                <div class="alert alert-success">
                     <i class="fa fa-check font_big"></i>&nbsp;
                    تمت الاضافة بنجاح ..
                </div>
              <?elseif ($added == 2):?>
                <div class="alert alert-danger">
                     <i class="fa fa-remove fa-5 font_big"></i>
                     لم تتم الاضافة بنجاح ..
                </div>
              <?elseif ($updated == 1):?>
              <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                  تم التعديل بنجاح ..
                  </div>
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/mail_list'" />
              <?elseif ($updated == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم يتم تغيير البيانات ..
                  </div>
              <? endif; ?>

            <div class="table-responsive">
               <form action="<?= base_url()?>admincp/mail_list" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                 <?php if($add != 1): ?>
                   <input type="hidden" name="mail_id" value="<?=$id?>" />
                 <?php endif?>
                 <table class="table">
                   <!--<tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> الاسم  :</td>
                       <td><input type="text" name="fullname" style="direction: ltr; text-align:right;" value="<?=$fullname?>" class="form-control inp_width" id="" placeholder="الاسم "/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> الهاتف :</td>
                       <td><input type="text" name="phone" style="direction: ltr; text-align:right;" value="<?=$phone?>" class="form-control inp_width" id="" placeholder="الهاتف"/></td>
                   </tr>-->
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> الايميل :</td>
                       <td><input type="text" name="email" style="direction: ltr; text-align:right;" value="<?=$email?>" class="form-control inp_width" id="" placeholder="الايميل"/></td>
                   </tr>
                   <tr>
                       <td><i class="fa fa-unlock-alt"></i> الحالة :</td>
                       <td>
                          <input type="radio" name="active" <?php if($add == 1): ?> checked="true "<?php else: if($active == 1): ?> checked="true" <?php endif; endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله
                          <input type="radio" name="active" <?php if($add != 1): if($active == 0): ?> checked="true" <?php endif; endif  ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                       </td>
                   </tr>
                </table>

               </div>


                 <p class="text-center mr_top">
                    <button type="submit"  name="<?php if($add == 1): ?>add<?php else:?>edit<?php endif;?>_mail_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div>
<?elseif($page_index == 3):?>
<div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if($send == 1): ?>ارسال رسالة الى القائمة البريدية<?php else: ?>تعديل ايميل فى القائمة البريدية<?php endif; ?></h5>
              <?if ($sent == 1):?>
              <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                  تم الارسال بنجاح ..
                  </div>
              <?elseif ($sent == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم تتم عمليه الارسال بنجاح ..
                  </div>
              <?elseif ($updated == 1):?>
             <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                   تم التعديل بنجاح ..
                  </div>
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/newsletter'" />
               <?elseif ($updated == 3):?>
              <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                   تم التعديل والارسال بنجاح ..
                  </div>
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/newsletter'" />
              <?elseif ($updated == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم تتم العملية بنجاح ..
                  </div>
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/newsletter'" />
              <? endif; ?>

            <div class="table-responsive">
               <form action="<?= base_url()?>admincp/send_newsletter" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
               <input type="hidden" name="msg_id" value="<?=$id?>"/>
                 <table class="table">
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الرسالة :</td>
                       <td><input type="text" name="title" value="<?=$title?>" class="form-control inp_width" id="" placeholder="عنوان الرسالة"/></td>
                   </tr>
                  <tr>
                     <td><i class="fa fa-files-o"></i>محتوى الرسالة :</td>
                     <td ><textarea name="message" class="form-control tinyMCE"  rows="5" placeholder="اكتب محتوى الرسالة .."><?=$message?></textarea></td>
                   </tr>
                  <tr>
                   <td><i class="fa fa-files-o"></i>الايميلات المرسل لها :</td>
                   <td class="text-right"><span class="mr_check red" ><input id="all" class="mail_check" type="checkbox" /> &nbsp; كل الايميلات </span></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td>
                  <table>
                  <?php foreach($mail_list as $k=>$mail):?>
                  <?php if($k == 0):?><tr><?php endif;?>
                    <td>
                      <input class="mail_check" <?php if($mails && in_array($mail->email,$mails)):?> checked="true" <?php endif; ?> type="checkbox" name="mail_list[]" value="<?= $mail->email ?>" />
                        <?= $mail->email ?>
                    </td>
                    <?php if($k%4 == 0 && $k != 0 && $k != count($mail_list)):?>
                    </tr>
                    <tr><?php endif;?>
                  <?php if($k == count($mail_list)):?></tr><?php endif;?>
                  <?php endforeach;?>
                  </table>
                  </td>
                  </tr>

                  <?php if($send != 1):?>
                  <tr>
                  <td><i class="fa fa-files-o"></i>الغرض من الرسالة :</td>
                  <td>
                      <input type="radio" name="purpose"  checked="true"   value="1" /> <i class="fa fa-thumbs-o-up"></i>  تعديل
                      <input type="radio" name="purpose"                   value="2" /> <i class="fa fa-thumbs-o-down"></i> ارسال
                      <input type="radio" name="purpose"                   value="3" /> <i class="fa fa-thumbs-o-down"></i> تعديل وارسال
                  </td>
                  </tr>
                  <?php endif; ?>
                </table>

               </div>


                 <p class="text-center mr_top">
                    <button type="submit"  name="<?php if($send == 1): ?>send<?php else:?>edit<?php endif;?>_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div>
<? elseif($page_index == 4): ?>

<!--left Side -->
           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> الرسائل المرسلة</h5>
                 <?php if ($deleted == 1):?>
                    <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                   تم الحذف بنجاح ..
                  </div>
              <?php elseif ($deleted == 2):?>
                  <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   حدث خطأ اثناء الحذف ..
                  </div>
              <?endif;?>
                <div class="table-responsive">
                   <form action="<?=base_url()?>admincp/newsletter" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                           <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                           <th colspan="2" class="text-center"><i class="fa fa-pencil fa-5"></i> العنوان</th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> اخر تعديل</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        </tr>

                        <?php
                        if($all_messages):
                        foreach($all_messages as $k=>$msg):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td colspan="2" class="text-center"><a href="<?=base_url()?>admincp/newsletter/<?=$msg->id?>/message"><?=$msg->title?></a></td>
                           <td class="text-center"><?=$msg->last_updated?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/newsletter/<?=$msg->id?>/message">تعديل </a></td>
                           <td class="text-center"><input type="checkbox" name="sel_msgs[]" value="<?=$msg->id?>" /></td>
                        </tr>
                        <?php endforeach;
                              endif; ?>
                        <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red" style="margin-left: 17% !important;"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                        </tr>
                        <tr>
                          <td colspan="7" class="text-left"><button type="submit" name="msgs_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>

                        </tr>

                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->
<? endif; ?>
<?php $this->load->view('admincp/footer'); ?>
