<?php $this->load->view('admincp/header'); ?>
<?php if($page_index == 1): ?>
      <!--left Side -->
           <div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if($add == 1):?> اضافة صوره جديدة <?else:?>&nbsp;تعديل صورة <?php endif;?></h5>
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
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/edit_slider'" />
              <?php elseif ($updated == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم يتم تغيير البيانات ..
                  </div>
              <?php endif; ?>
                <ul class="nav nav-tabs padding_none">
                      <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">الاعدادات </a></li>
                      <li role="presentation" class="nav"><a href="#media" data-toggle="tab" class="btn btn-info">الصورة</a></li>
                  </ul>

          <div class="tab-content">
             <div class="tab-pane fade in active" id="arabic">
               <div class="table-responsive">
               <form action="<?= base_url()?>admincp/add_slider" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
               <?php if($add != 1):?>
               <input type="hidden" name="slider_id" value="<?=$id?>"/>
               <?php endif;?>
                 <table class="table">
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الصورة :</td>
                       <td><input type="text" name="title" value="<?=$title?>" class="form-control inp_width" id="" placeholder="عنوان الصورة"/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> Address :</td>
                       <td><input type="text" name="title_en" value="<?=$title_en?>" class="form-control inp_width" id="" placeholder="عنوان الصورة انجليزى"/></td>
                   </tr>
                </table>
               </div>
       </div>
        <div class="tab-pane fade in" id="media">
        <div class="table-responsive">

                 <table class="table">
                   <tr>
                       <td><i class="fa fa-unlock-alt"></i> حالة الصورة :</td>
                       <td>
                          <input type="radio" name="active" <?php if($add == 1): ?> checked="true" <?php else: if($active == 1): ?> checked="true" <?php endif; endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفعله
                          <input type="radio" name="active" <?php if($add != 1): ?> <?php if($active == 0): ?> checked="true" <?php endif; endif ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> غير مفعله
                       </td>
                   </tr>
                   <tr>
                     <td><i class="fa fa-camera-retro"></i> الصورة :<br /><span class="text-muted hint"> يجب اضافه صورة بأبعاد  800 * 1200   </span></td>
                     <td><span class="btn btn-success btn-file ">
                            رفع الصورة <input id="upload" type="file" name="slider" />
                            <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                        </span></td>
                   </tr>
                   <tr>
                     <td></td>
                     <td>
                     <?php if($add != 1):?>
                     <input type="hidden" name="old_img" value="<?=$image?>" />
                     <?php endif;?>
                     <img id="blah" <?php if(!isset($image)):?> style="display: none;" <?php endif?>src="<?=base_url().$image?>"  width="200" height="130" class="img-responsive img-thumbnail" /></td>
                   </tr>


                 </table>

               </div>
        </div>

   </div>
                 <p class="text-center mr_top">
                    <button type="submit"  name="<?php if($add == 1):?>add<?else:?>edit<?php endif;?>_slider_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div>
       <!--/left Side -->
<?php elseif($page_index == 2): ?>

<!--left Side -->
           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> جميع صور البانر </h5>
              <p class="text-left">
                <a href="<?=base_url()?>admincp/add_slider" class="btn btn-success"><i class="fa fa-plus"></i> إضافة صورة جديدة</a>
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
              <?php endif;?>
                <div class="table-responsive">
                   <form action="<?=base_url()?>admincp/edit_slider" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                           <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان الصورة</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> الصورة</th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           <?php if(in_array(999,$privacy)):?>
                           <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                           <?php endif; ?>
                        </tr>
                        <?foreach($all_images as $k=>$image):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/edit_slider/<?=$image->id?>/<?=$image->title?>"><?=$image->title?></a><br />
                           <a href="<?=base_url()?>admincp/edit_slider/<?=$image->id?>/<?=$image->title_en?>"><?=$image->title_en?></a>
                           </td>
                           <td class="text-center"><img src="<?=base_url().$image->image?>" title="<?=$image->title?>" alt="<?=$image->title?>" class="img-responsive img-thumbnail" width="130" height="130"/></td>
                           <td class="text-center"><?php if($image->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?php endif;?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/edit_slider/<?=$image->id?>/<?=$image->title?>">تعديل </a></td>
                           <?php if(in_array(999,$privacy)):?>
                           <td class="text-center"><input type="checkbox" name="sel_image[]" value="<?=$image->id?>" /></td>
                           <?php endif; ?>
                        </tr>
                        <?endforeach;?>
                        <?php if(in_array(999,$privacy)):?>
                        <tr>
                        <td colspan="5"></td>
                        <td class="text-left"><span class="mr_check red"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                        </tr>
                        <tr>
                          <td colspan="7" class="text-left"><button type="submit" name="images_del" value="1" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                        </tr>
                        <?php endif; ?>
                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->
<?php endif;  $this->load->view('admincp/footer'); ?>
