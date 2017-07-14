<?php $this->load->view('admincp/header'); ?>
<? if($page_index == 1):?>
<div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة قسم عروض <?else:?>&nbsp;تعديل قسم <?endif;?></h5>
                
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
              <? elseif ($added == 3):?>
                  <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                    ID مستخدم من قبل ...
                  </div>
              <?elseif ($updated == 1):?>
              <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                  تم التعديل بنجاح ..
                  </div>
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/edit_offer'" />  
              <?elseif ($updated == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم يتم تغيير البيانات ..
                  </div>
              <? endif; ?>
        
            <div class="table-responsive">
               <form action="<?= base_url()?>admincp/add_offer" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
               <?if($add != 1):?>
               <input type="hidden" name="offer_cat" value="<?=$id?>"/>
               <?endif;?>
                 <table class="table">
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم بالعربية :</td>
                       <td><input type="text" name="title" value="<?=$title?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم بالانجليزية :</td>
                       <td><input style="direction: ltr; text-align:right;" type="text" name="title_en" value="<?=$title_en?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                   </tr>
                  <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> ID :</td>
                       <td><input type="text" style="direction: ltr; text-align:right;" name="alias" value="<?=$alias?>" class="form-control inp_width" id="" placeholder="الرابط"/></td>
                   </tr>
                   <tr>
                       <td><i class="fa fa-unlock-alt"></i> حالة القسم :</td>
                       <td>
                          <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php endif; endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل 
                          <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php endif; endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                       </td>
                   </tr> 
                </table>
                 
               </div>
    
    
                 <p class="text-center mr_top">                    
                    <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_offer_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div>
<?elseif ($page_index == 2):?>
<!--left Side -->
           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> اقسام العروض </h5>
              <div class="top_select text-center">
                <p class="pull-right">
                   <form action="<?=base_url()?>admincp/edit_offer" method="post" id="search_form" class="form-inline pull-right" >
                      <div class="form-group">
                        <input type="text"  class="form-control inp_width" value="<?=$search_word?>" name="keyword" placeholder="بحث ..."/>
                        <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>
                      </div>
                    </form>
                   </p>
                
                 </div>
              <p class="text-left">
                <a href="<?=base_url()?>admincp/add_offer" class="btn btn-success"><i class="fa fa-plus"></i> إضافة قسم جديد</a>
              </p>
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
                   <form action="<?=base_url()?>admincp/edit_offer" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                           <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان القسم</th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           <?php if(in_array(999,$privacy)):?>
                           <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                           <?php endif; ?>
                        </tr>
                        <?if(!empty($all_offer_cats)):?>
                        <?foreach($all_offer_cats as $k=>$cat):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td class="text-center"><a title="<?=$cat->alias?>" href="<?=base_url()?>admincp/edit_offer/<?=$cat->id?>/<?=$cat->title?>"><?=$cat->title?></a><br />
                           <a title="<?=$cat->alias?>" href="<?=base_url()?>admincp/edit_offer/<?=$cat->id?>/<?=$cat->title_en?>"><?=$cat->title_en?></a>
                           </td>
                           <td class="text-center"><?if($cat->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/edit_offer/<?=$cat->id?>/<?=$cat->title?>">تعديل </a></td>
                           <?php if(in_array(999,$privacy)):?>
                           <td class="text-center"><input type="checkbox" name="sel_offer_cat[]" value="<?=$cat->id?>" /></td>
                           <?php endif; ?>
                        </tr>
                        <?endforeach;?>
                        <?endif;?>
                        <?php if(in_array(999,$privacy)):?>
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
<? elseif($page_index == 3):?>
<div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة باقة  <?else:?>&nbsp;تعديل قسم <?endif;?></h5>
                
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
              <? elseif ($added == 3):?>
                  <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                    ID مستخدم من قبل..
                  </div>
              <?elseif ($updated == 1):?>
              <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                  تم التعديل بنجاح ..
                  </div>
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/edit_package'" />  
              <?elseif ($updated == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم يتم تغيير البيانات ..
                  </div>
              <? endif; ?>
        
            <div class="table-responsive">
               <form action="<?= base_url()?>admincp/add_package" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
               <?if($add != 1):?>
               <input type="hidden" name="package_id" value="<?=$id?>"/>
               <?endif;?>
                 <table class="table">
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الباقة بالعربية :</td>
                       <td><input type="text" name="title" value="<?=$title?>" class="form-control inp_width" id="" placeholder="عنوان الباقة"/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الباقة بالانجليزية :</td>
                       <td><input style="direction: ltr; text-align:left;" type="text" name="title_en" value="<?=$title_en?>" class="form-control inp_width" id="" placeholder="عنوان الباقة"/></td>
                   </tr>
                  <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> ID :</td>
                       <td><input style="direction: ltr; text-align:left;" type="text" name="alias" value="<?=$alias?>" class="form-control inp_width" id="" placeholder="الرابط"/></td>
                       <?if($add != 1):?>
                       <input type="hidden" name="old_alias" value="<?=$alias?>" />
                       <?endif;?>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i>صفحة الشكر العربى :</td>
                       <td><input style="direction: ltr; text-align:left;" type="text" name="thnx" value="<?=$thnx?>" class="form-control inp_width" id="" placeholder="Thanks Pages"/></td>
                       
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> صفحة الشكر الانجليزى :</td>
                       <td><input style="direction: ltr; text-align:left;" type="text" name="thnx_en" value="<?=$thnx_en?>" class="form-control inp_width" id="" placeholder="Thanks Pages"/></td>
                       
                   </tr>
                   <tr class="page_cat">
                       <td><i class="fa fa-reply-all"></i> القسم :</td>
                       <td> 
                         <select class="form-control inp_width" name="catid">
                          <option value="0">اختر قسم</option>
                          <?foreach($all_cats as $cat):?>
                            <option <?if($cat->id == $catid):?>selected="true" <?endif?> value="<?=$cat->id?>"><?=$cat->title?></option>
                          <?endforeach?>
                        </select>
                       </td>
                  </tr>
                   <tr>
                       <td><i class="fa fa-unlock-alt"></i> حالة الباقة :</td>
                       <td>
                          <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php endif; endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعل 
                          <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php endif; endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعل
                       </td>
                   </tr> 
                </table>
                 
               </div>
    
    
                 <p class="text-center mr_top">                    
                    <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_package_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div> 
<?elseif ($page_index == 4):?>
<!--left Side -->
           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> الباقات </h5>
              <div class="top_select text-center">
                <p class="pull-right">
                   <form action="<?=base_url()?>admincp/edit_package" method="post" id="search_form" class="form-inline pull-right" >
                      <div class="form-group">
                        <input type="text"  class="form-control inp_width" value="<?=$search_word?>" name="keyword" placeholder="بحث ..."/>
                        <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>
                      </div>
                    </form>
                   </p>
                
                 </div>
              <p class="text-left">
                <a href="<?=base_url()?>admincp/add_package" class="btn btn-success"><i class="fa fa-plus"></i> إضافة باقة</a>
              </p>
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
                   <form action="<?=base_url()?>admincp/edit_package" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                           <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان الباقة</th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> القسم</th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           <?php if(in_array(999,$privacy)):?>
                           <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                           <?php endif; ?>
                        </tr>
                        <?if(!empty($all_packages)):?>
                        <?foreach($all_packages as $k=>$package):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td class="text-center"><a title="<?=$package->alias?>" href="<?=base_url()?>admincp/edit_package/<?=$package->id?>/<?=$package->title?>"><?=$package->title?></a><br />
                           <a title="<?=$package->alias?>" href="<?=base_url()?>admincp/edit_package/<?=$package->id?>/<?=$package->title_en?>"><?=$package->title_en?></a>
                           </td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/edit_offer/<?=$package->catid?>/<?=$package->cat_title?>"><?=$package->cat_title?></a><br />
                           <a href="<?=base_url()?>admincp/edit_offer/<?=$package->catid?>/<?=$package->cat_title_en?>"><?=$package->cat_title_en?></a>
                           </td>
                           <td class="text-center"><?if($package->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/edit_package/<?=$package->id?>/<?=$package->title?>">تعديل </a></td>
                           <?php if(in_array(999,$privacy)):?>
                           <td class="text-center"><input type="checkbox" name="sel_package[]" value="<?=$package->id?>" /></td>
                           <?php endif; ?>
                        </tr>
                        <?endforeach;?>
                        <?endif;?>
                        <?php if(in_array(999,$privacy)):?>
                        <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red" style="margin-left: 20% !important"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                        </tr>
                        <tr>
                          <td colspan="7" class="text-left"><button type="submit" name="package_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                        </tr>
                        <?php endif; ?>
                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->             
<? endif; ?>
<?php $this->load->view('admincp/footer'); ?>