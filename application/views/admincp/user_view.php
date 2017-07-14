<?php $this->load->view('admincp/header'); ?>
<?if($page_index == 1):?>
<div class="col-sm-10 col-xs-12">
             <div class="forms">
                <h5 class="form_title text-center"><i class="fa fa-edit"></i><?if($add == 1):?> اضافة عضو <?else:?>&nbsp;تعديل عضو <?endif;?></h5>
                
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
                   اسم المستخدم مستخدم من قبل ..
                  </div>
              <?elseif ($updated == 1):?>
              <div class="alert alert-success">
                   <i class="fa fa-check font_big"></i>&nbsp;
                  تم التعديل بنجاح ..
                  </div>
                  <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/edit_user'" />  
              <?elseif ($updated == 2):?>
              <div class="alert alert-danger">
                   <i class="fa fa-remove fa-5 font_big"></i>
                   لم يتم تغيير البيانات ..
                  </div>
              <? endif; ?>
        
            <div class="table-responsive">
               <form action="<?= base_url()?>admincp/add_user" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="user_form">
               <?if($add != 1):?>
               <input type="hidden" name="user_id" value="<?=$id?>"/>
               <?endif;?>
                 <table class="table">
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> الاسم بالكامل :</td>
                       <td><input type="text" name="fullname" value="<?=$fullname ?>" class="form-control inp_width" id="fullname" placeholder="اسم العضو بالكامل"/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> اسم الدخول :</td>
                       <td><input type="text" name="username" value="<?=$username  ?>" class="form-control inp_width" id="username" placeholder="اسم الدخول"/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> كلمة المرور :</td>
                       <td><input type="password" name="password" value="" class="form-control inp_width" id="password" placeholder="كلمة المرور"/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> تاكيد كلمة المرور :</td>
                       <td><input type="password" name="re_password"  class="form-control inp_width" id="re_password" placeholder="تاكيد كلمة المرور"/></td>
                   </tr>
                   <tr>
                       <td class="label_width input_label"><i class="fa fa-pencil"></i> البريد الالكترونى :</td>
                       <td><input type="text" name="email" value="<?=$email?>"  class="form-control inp_width" id="" placeholder="البريد الالكترونى"/></td>
                   </tr>                                                                     
                </table>
                 
               </div>
    
    
                 <p class="text-center mr_top">                    
                    <button type="submit"  name="<?if($add == 1):?>add<?else:?>edit<?endif;?>_user_submit" class="btn btn-success">حفظ البيانات <i class="fa-5 fa fa-save"></i></button>
                    <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
                 </p>
                 </form>
              </div>
           </div>
<?elseif ($page_index == 2):?>
<!--left Side -->
           <div class="col-sm-10 col-xs-12">
              <div class="forms">
              <h5 class="form_title text-center"><i class="fa fa-edit"></i> الأعضاء </h5>
             <!-- <p class="text-left">
                <a href="<?=base_url()?>admincp/add_user" class="btn btn-success"><i class="fa fa-plus"></i> اضافة عضو</a>
              </p>-->
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
                   <form action="<?=base_url()?>admincp/edit_user" method="post">
                     <table class="table table-bordered table-hover">
                        <tr>
                           <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                           <th class="text-center"><i class="fa fa-pencil fa-5"></i> اسم المستخدم</th>
                           <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                           <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                           
                        </tr>
                        <?if(!empty($all_users)):?>
                        <?foreach($all_users as $k=>$user):?>
                        <tr>
                           <td class="text-center"><?=$k+1?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/edit_user/<?=$user->id?>/<?=$user->username?>"><?=$user->username?></a></td>
                           <td class="text-center"><?if($user->active == 1): ?><i class="fa fa-check font_big green"></i><?else:?><i class="fa fa-remove fa-5 font_big red"></i><?endif;?></td>
                           <td class="text-center"><a href="<?=base_url()?>admincp/edit_user/<?=$user->id?>/<?=$user->username?>">تعديل </a></td>
                           
                        </tr>
                        <?endforeach;?>
                        <?endif;?>
                        
                     </table>
                    </form>
                </div>
              </div>
           </div>
       <!--/left Side -->
<?php  endif; ?>
<script type="text/javascript">
$('#user_form').submit(function(){
    var x = 0;
    $('.inp_width').removeClass('red_border');
    if($('#fullname').val() == ''){
       $('#fullname').addClass('red_border');
       x = 1;
    }
    if($('#username').val() == ''){
       $('#username').addClass('red_border');
       x = 1;
    }
    if($('#password').val() == ''){
       $('#password').addClass('red_border');
       x = 1;
    }
    
     if($('#password').val() != $('#re_password').val()){
         $('#password').addClass('red_border');
         $('#re_password').addClass('red_border');
       x = 1;
    }
    if(x != 0){
       return false;    
    }
    
});
</script>
<?php $this->load->view('admincp/footer'); ?>