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
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> الوحدة</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> الحالة</th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> تاريخ الاشتراك</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        </tr>
                        <?foreach($mail_list as $k=>$mail):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/mail_list/<?=$mail->id?>/<?=$mail->email?>"><?=$mail->email?></a></td>
                           <td class="text-center"><?=$mail->unit?></td>
                           <td class="text-center"><?if($mail->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                           <td class="text-center"><?=$mail->time?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/mail_list/<?=$mail->id?>/<?=$mail->email?>">تعديل </a></td>
                           <td class="text-center"><input type="checkbox" name="sel_mails[]" value="<?=$mail->id?>" /></td>
                        </tr>
                        <?endforeach;?>
                        <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red" ><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                        </tr>
                        <tr>
                          <td colspan="7" class="text-left"><button type="submit" name="emails_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                        
                        </tr>
                                            
                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->
<? endif; ?>
<?php $this->load->view('admincp/footer'); ?>