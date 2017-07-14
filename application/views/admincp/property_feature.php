<?php $this->load->view('admincp/header'); ?>
<?php if($page_index == 1): ?>
      <!--left Side -->
           <div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i><?php if($add == 1):?>اضافة جديد <?else:?>&nbsp; تعديل <?php endif;?></h5>
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
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url('admincp/property_feature/'.$table)?>'" />
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
               <form action="<?= base_url('admincp/property_feature/'.$table)?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8" >
               <?php if($add != 1):?>
               <input type="hidden" name="id" value="<?=$data->id?>"/>
               <?php endif;?>
                 <table class="table">
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i>العنوان بالعربى :</td>
                       <td>
                         <input type="text" name="title_ar" value="<?=$data->title_ar?>" class="form-control inp_width" />
                       </td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> Address :</td>
                       <td><input type="text" name="title" value="<?=$data->title?>" class="form-control inp_width" /></td>
                   </tr>
                </table>
               </div>
       </div>


   </div>
                 <p class="text-center mr_top">
                    <button type="submit"  name="<?php if($add == 1):?>add<?else:?>edit<?php endif;?>_resource" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div>

<?php elseif($page_index == 2): ?>

           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> </h5>
              <p class="text-left">
                <a href="<?=base_url('admincp/property_feature/'.$table.'/new')?>" class="btn btn-success"><i class="fa fa-plus"></i> اضافة جديد</a>
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
                   <form action="<?=base_url('admincp/property_feature/'.$table)?>" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                           <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                           <th class="text-center">
                             <i class="fa fa-pencil fa-5"></i> العنوان بالعربى</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i>العنوان بالانجليزى</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           <?php if(in_array(999,$privacy)):?>
                           <th class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                           <?php endif; ?>
                        </tr>
                        <?foreach($data as $k => $row):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td class="text-center">
                             <a href="<?=base_url()?>admincp/property_feature/<?= $table . "/edit/" . $row->id ?>"><?=$row->title_ar?></a>
                           </td>
                           <td class="text-center">
                              <a href="<?=base_url()?>admincp/property_feature/<?= $table . "/edit/" . $row->id ?>"><?=$row->title?></a>
                           </td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/property_feature/<?= $table . "/edit/" . $row->id ?>">تعديل </a></td>
                           <?php if(in_array(999,$privacy)):?>
                           <td class="text-center"><input type="checkbox" name="sel_ids[]" value="<?=$row->id?>" /></td>
                           <?php endif; ?>
                        </tr>
                        <?endforeach;?>
                        <?php if(in_array(999,$privacy)):?>
                        <tr>
                        <td colspan="4"></td>
                        <td class="text-left"><span class="mr_check red"><input id="all" type="checkbox" /> &nbsp; حذف الكل </span></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-left">
                            <button type="submit" name="destroy" value='TRUE' class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> حذف </button></td>
                        </tr>
                        <?php endif; ?>
                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->
<?php endif;  $this->load->view('admincp/footer'); ?>
