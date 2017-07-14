<?php $this->load->view('admincp/header'); ?>
<script type="text/javascript">
$(document).ready(function(){
    var img = new Image();
    var w = 0;
    var h = 0;
   $('img').each(function(index){
    //alert(this.width +' X '+ this.height);
       if(this.height > 150){
        x = this.height;
        y = this.width;
        $( this ).css("height", x/1.5);
        $( this ).css("width", y/1.5);
       }     
       var theImage = new Image();
       theImage.src = $(this).attr("src");
        $(this).attr('title',theImage.height+'h '+theImage.width+'w ');
   });
   
   $('#sel_imgs').submit(function (){
       var x = 0 ;
       $('[name="gal_del[]"]').each( function (){
           if($(this).prop('checked') == true){
                x++;
            }
                
            });
       if(x >= 1){
         console.log(x);  
       }else{
         alert("يجب اختيار صورة قبل حفظ البيانات !!");  
          return false;  
       }      
       
       
      
       
       
   });
});

</script>
<?if($page_index == 1):?>
      <!--left Side -->
           <div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i> اضافة الى استديو الصور</h5>
   
          <div class="tab-content">
             
              <div class="" id="media">
                            <div class="table-responsive" >
                
                  
                             <table class="table">
                             <tr>
                              <form action="<?=base_url()?>gallery/images/<?=$action?>/<?=$nd?>" method="post" id="upload_gal" enctype="multipart/form-data">
                                 <td class="text-right top">
                                <!--  <table>
                                  <tr>
                                  <td><i class="fa fa-camera-retro fa-5"></i> القسم الرئيسى : &nbsp;</td>
                                  <td><select class="form-control top-form-width" id="catid_sel" name="catid">
                                      <option value="" selected="true">بدون قسم</option>
                                      <?if(!empty($gallery_cats)):?>
                                      <?foreach ($gallery_cats as $cat):?>
                                      <option <? if(isset($sel_cat)): if($sel_cat == $cat->id):?>selected="true"<?endif; endif;?> value="<?=$cat->id?>"><?=$cat->title?></option>
                                      <?endforeach;?>
                                      <?endif;?>
                                    </select></td>
                                  </tr>
                                  <br />
                                  <tr>
                                  <td><i class="fa fa-camera-retro fa-5"></i> القسم الفرعى :&nbsp;</td>
                                  <td><select class="form-control top-form-width" id="subcatid_sel" name="sub_catid">
                                      <option value="" selected="true">بدون قسم</option>
                                      <?if(!empty($gallery_subcats)):?>
                                      <?foreach ($gallery_subcats as $subcat):?>
                                      <option <? if(isset($sel_subcat)): if($sel_subcat == $subcat->id):?>selected="true"<?endif; endif;?> value="<?=$subcat->id?>"><?=$subcat->title?></option>
                                      <?endforeach;?>
                                      <?endif;?>
                                    </select></td>
                                  </tr>
                                  </table> 
                                 
                                    </td>
                                 <td class="top">
                                    
                                 </td>
                                 <td class="text-right top"><i class="fa fa-camera-retro fa-5"></i> إعدادات الصورة :</td>
                                 <td>                                   
                                    <input type="checkbox" name="ratio" value="1" /> المحافظة على نسبة الطول والعرض <br />
                                    <input type="checkbox" name="thumb"  value="1" checked /> الحصول على صورة مصغرة <br /><br />-->
                                    <table>
                                        <!-- <tr>
                                           <td ><span>عرض الصورة : </span></td>
                                           <td ><input type="text" name="width" class="form-control image_setting" placeholder="500px"/></td>                                       
                                         
                                           <td>طول الصورة : </td>
                                           <td><input type="text" name="height" class="form-control image_setting img_width" placeholder="800px"/></td>
                                          </tr>
                                         <tr class="thumb_hide">
                                           <td ><span >عرض الصورة المصغرة   : </span></td>
                                           <td ><input type="text" name="thumb_width" class="form-control image_setting" placeholder="70px"/></td>
                                         
                                           <td>طول الصورة المصغرة  : </td>
                                           <td><input type="text" name="thumb_height" class="form-control image_setting img_width" placeholder="100px"/></td>
                                           </tr>-->
                                         <tr>
                                         
                                           <td class="text-center" colspan="4">
                                           
                                                <span class="btn btn-success btn-file btn-sm">                            
                                                    رفع الصور <input type="file" name="gal[]" multiple="true" onchange="$('#upload_gal').submit();" />
                                                    <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                                </span>
                                           </td>
                                                <?php if(in_array(999,$privacy)):?>                                                                   
                                           <td><a  onclick="get_cats(); $('#delete_form').submit(); "  id="del_all"  class="btn btn-danger pull-left mr_right btn-sm">حذف الصور المحددة <i class="fa fa-trash-o fa-5"></i></a></td>
                                                <?php endif; ?>
                                           <td><button id="select_all" st="sel" class="btn btn-orange pull-left btn-sm"> تحديد كل الصور <i class="fa fa-share-alt fa-5"></i></button>
                                           </td>
                                         </tr>
                                   </table>                                    
                                 </td>
                                 </form>
                                 <form action="<?=base_url()?>gallery/images/<?=$action?>/<?=$nd?>" method="post" id="sel_catid">
                                   <input type="hidden" id="sel_cat" name="sel_catid" value=""/>
                                   <input type="hidden" id="sel_subcat" name="sel_subcatid" value=""/>
                                 </form>
                               </tr>
                               <tr>
                                 <td colspan="4">
                                   <form action="<?=base_url()?>gallery/images/<?=$action?>/<?=$nd?>" method="post" id="delete_form">
                                   
                                    <ul class="nav padding_none">
                                    <?if(!empty($gallery)):?>
                                      <?foreach ($gallery as $gal):?>
                                        <li class="pull-right relative" style="min-height: 150px;"><img title="" src="<?=base_url().$gal->image?>" width="200" height="130" class="img-responsive img-thumbnail"/>
                                           <input name="gal_del[]" type="checkbox"  value="<?=$gal->id?>" class="check_delete"/></li>
                                      <? endforeach; ?>
                                      <?endif;?>                                             
                                     </ul> 
                                     <input type="hidden" name="delete_all" value="1"/> 
                                  </form>
                                  
                               </td>
                               </tr>
                               </table>
                          </div>
              
                        </div>
                         
                     </div>
              <?if($action != ''):?>
               <form action="<?=base_url()?>gallery/images/<?=$action?>/<?=$nd?>" method="post" id="sel_imgs">
                <p class="text-center mr_top">                    
                    <button type="submit"  name="get_images" value="1" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                 </p>
                 </form>
              <?endif;?>
              </div>
           </div>
       <!--/left Side -->
<?elseif($page_index == 2):?>
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
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>gallery/edit_cat'" />  
              <?elseif ($updated == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم يتم تغيير البيانات ..
                  </div>
              <? endif; ?>
        
            <div class="table-responsive">
               <form action="<?= base_url()?>gallery/add_cat" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
               <?if($add != 1):?>
               <input type="hidden" name="cat_id" value="<?=$id?>"/>
               <?endif;?>
                 <table class="table">
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان القسم :</td>
                       <td><input type="text" name="title" value="<?=$title?>" class="form-control inp_width" id="" placeholder="عنوان القسم"/></td>
                   </tr>
                   <tr>
                       <td><i class="fa fa-unlock-alt"></i> نوع القسم :</td>
                       <td>
                          <input type="radio" name="cat" onclick="$('#cat_sel').addClass('hide');" <?php if($add == 1): ?> checked="true" <? else: if($catid == 0): ?> checked="true" <?php endif; endif; ?> value="1" />   رئيسى 
                          <input type="radio" name="cat" onclick="$('#cat_sel').removeClass('hide');" <?php if($add != 1): ?> <? if($catid != 0): ?> checked="true" <?php endif; endif ?> value="0" />  فرعى
                       </td>
                   </tr> 
                   <tr id="cat_sel" <?if($catid == 0|| $add == 1):?>class="hide" <?endif;?> >
                       <td><i class="fa fa-unlock-alt"></i> القسم الرئيسى :</td>
                       <td>
                          <select name="catid">
                              <option  value="0">اختر قسم</option>
                              <?foreach ($main_cats as $cat):?>
                              <option <?if($cat->id == $catid):?> selected="true"<?endif;?> value="<?=$cat->id?>"><?=$cat->title?></option>
                              <?endforeach;?>
                          </select>
                       </td>
                   </tr>
                   <tr>
                       <td><i class="fa fa-unlock-alt"></i> حالة القسم :</td>
                       <td>
                          <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <? else: if($active == 1): ?> checked="true" <?php endif; endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله 
                          <input type="radio" name="active" <?php if($add != 1): ?> <? if($active == 0): ?> checked="true" <?php endif; endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                       </td>
                   </tr> 
                </table>
                 
               </div>
    
    
                 <p class="text-center mr_top">                    
                    <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_cat_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div>
<?elseif ($page_index == 3):?>
<!--left Side -->
           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> اقسام الصور </h5>
              <p class="pull-right">
                   <form action="<?=base_url()?>gallery/edit_cat" method="post" class="form-inline pull-right" id="menu_seach">
                      <div class="form-group">
                        <select class="form-control top-form-width" name="main_cats" onchange="$('#menu_seach').submit();">
                          <option  value="" >كل الاقسام</option>
                          <option  value="0" >الاقسام الرئيسية</option>
                          <?foreach($main_cats as $cat):?>
                          <option <?if($search_id == $cat->id):?>selected="true"<?endif;?> value="<?=$cat->id?>"><?=$cat->title?></option>
                          <?endforeach?>
                        </select>
                      </div>
                      <input type="text"  class="form-control inp_width" value="<?=$search_word?>" name="keyword" placeholder="بحث ..."/>
                     <button type="submit" name="search" value="1" class="btn btn-warning"> بحث <i class="fa fa-search"></i></button>                   
                   </form>
                   </p>
              <p class="text-left">
                <a href="<?=base_url()?>gallery/add_cat" class="btn btn-success"><i class="fa fa-plus"></i> اضافة قسم جديد</a>
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
                   <form action="<?=base_url()?>gallery/edit_cat" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                           <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان القسم</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> القسم الرئيسى </th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                        </tr>
                        <?if(!empty($gal_cats)):?>
                        <?foreach($gal_cats as $k=>$cat):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td class="text-center"><a href="<?=base_url()?>gallery/edit_cat/<?=$cat->id?>/<?=$cat->title?>"><?=$cat->title?></a></td>
                           <?if($cat->catid != 0):?>
                           <td class="text-center"><a href="<?=base_url()?>gallery/edit_cat/<?=$cat->catid?>/<?=$cat->par_title?>"><?=$cat->par_title?></a></td>
                           <?else:?>
                           <td class="text-center"><span style="color: #f00;">قسم رئيسى</span></td>
                           <?endif;?>
                           <td class="text-center"><?if($cat->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                           <td class="text-center"><a href="<?=base_url()?>gallery/edit_cat/<?=$cat->id?>/<?=$cat->title?>">تعديل </a></td>
                           <td class="text-center"><input type="checkbox" name="sel_cat[]" value="<?=$cat->id?>" /></td>
                        </tr>
                        <?endforeach;?>
                        <?endif;?>
                        <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red" style="margin-left: 20% !important"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                        </tr>
                        <tr>
                          <td colspan="7" class="text-left"><button type="submit" name="cat_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                        
                        </tr>
                                            
                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->
<?php endif;
$this->load->view('admincp/footer'); ?>