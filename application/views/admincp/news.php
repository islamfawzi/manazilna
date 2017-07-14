<?php $this->load->view("admincp/header.php"); ?>

<?php if($page_index == "add"): ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i>
        	<?php if(!$news):?> اضافة خبر جديدة <?php else:?>&nbsp;تعديل خبر <?php endif;?>
        </h5>
        <?php if($added === 1): ?>
        <div class="alert alert-success">
            <i class="fa fa-check font_big"></i>&nbsp;
            تمت الاضافة بنجاح ..
        </div>
        <?php elseif ($added === 0): ?>
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            لم تتم الاضافة بنجاح ..
        </div>
        <?php elseif ($added === 3): ?> 
        <div class="alert alert-danger">
            <i class="fa fa-remove fa-5 font_big"></i>
            برجاء ملىء الحقول المطلوبة
        </div>
        <?php endif; ?>   
        <ul class="nav nav-tabs padding_none">
            <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">عربي</a></li>        
            <li role="presentation" class="nav"><a href="#english" data-toggle="tab" class="btn btn-success">إنجليزي</a></li>
            <li role="presentation" class="nav"><a href="#media" data-toggle="tab" class="btn btn-info">اعدادات</a></li>
        </ul>
        <?php 
            $action = isset($news)? base_url("admincp/edit_news") : base_url("admincp/add_news"); 
        ?>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="arabic">
                <div class="table-responsive">
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8" id="main_menu">
                        
                        <?php if($news):?>
                        	<input type="hidden" name="news_id" value="<?= $news->id ?>"/>
                        <?php endif;?>

                        <table class="table">
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الخبر* :</td>
                                <td>
                                <input type="text" name="news[title]" 
                                       value="<?= $news->title ?>" class="form-control inp_width" 
                                       placeholder="عنوان الخبر ...."/>
                                </td>
                            </tr>

                            <tr>
                            	<td class="label_width input_label"><i class="fa fa-pencil"></i> مجتوى الخبر* :</td>
                                <td>
	                                <textarea class="form-control inp_width ckeditor"  rows="5" name="news[content]"><?= $news->content ?></textarea>
	                            </td>
                            </tr>
                            
                            
                        </table>

                </div>
            </div>
            
             <div class="tab-pane fade" id="english">
                <div class="table-responsive" >
                    <table class="table" dir="ltr">
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> News Title* :</td>
                            <td>
                            <input type="text" name="news[title_en]" 
                            	   value="<?= $news->title_en ?>" class="form-control inp_width"  
                            	   placeholder="news title ...."/>
                            </td>
                        </tr> 

                        <tr>
                        	<td class="label_width input_label"><i class="fa fa-pencil"></i> News Content* :</td>
                            <td>
                                <textarea class="form-control inp_width ckeditor"  rows="5" name="news[content_en]"><?= $news->content_en ?></textarea>
                            </td>
                        </tr>
                        
                       
                    </table>
                </div>

            </div>

            <div class="tab-pane fade in" id="media">
                <div class="table-responsive">

                    <table class="table"> 
                        
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> حالة الخبر :</td>
                                <td>
                                    <input type="radio" name="news[active]" 
                                        <?php if(!$news): ?> checked="true" 
                                        <?php else: if($news->active == 1): ?> checked="true" 
                                        <?php endif; endif; ?> value="1" /> 
                                        <i class="fa fa-thumbs-o-up"></i>  مفعله 

                                    <input type="radio" name="news[active]" 
                                    	<?php if(isset($news) && $news->active == 0): ?> 
                                    		checked="true" 
                                    	<?php endif; ?> value="0" /> 
                                    	<i class="fa fa-thumbs-o-down"></i> غير مفعله
                                </td>
                            </tr> 


							<tr>
                                <td><i class="fa fa-camera-retro"></i> الصور :</td>
                                <td>
                                	<a  href="<?= base_url('gallery/images/add_menu') ?>" onclick="$('.check_delete').prop('checked', false); window.open(this.href, 'newwindow', 'scrollbars=yes,location=no,width=900, height=700,top=150,left=300'); return false;">
                                	    <span class="btn btn-success btn-file ">
                                            اختيار الصور  
                                            <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <?php if($news->image): ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <li class="pull-right relative" style="list-style: none;">
                                        	<a href="">
                                        		<img src="<?= base_url($news->img) ?>" width="200" height="130" class="img-responsive img-thumbnail" />
                                        	</a>
                                            <input name="news_image" type="checkbox" checked="true"  value="<?= $news->image ?>" class="check_delete"/>
                                        </li>
                                    </td>
                                </tr>
                            <?php endif; ?>

                    </table>                
                </div>
            </div>

        </div>
        <p class="text-center mr_top">                    
            <button type="submit"  name="<?= isset($news) ? "edit" : "add" ?>_news_submit" class="btn btn-success">حفظ البيانات 
            		<i class="fa-5 fa fa-save"></i></button>
            <button type="reset" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo fa-5"></i></button>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->

<?php elseif($page_index == "list"): ?>

<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <div class="top_select text-center">
            <h5 class="form_title text-center"><i class="fa fa-edit"></i> أخر الأخبار </h5>

            <?php if ($deleted == 1): ?> 
                <div class="alert alert-success text-right">
                    <i class="fa fa-check font_big"></i>&nbsp;
                    تم الحذف بنجاح ..
                </div>
            <?php elseif ($deleted == 2): ?>
                <div class="alert alert-danger text-right">
                    <i class="fa fa-remove fa-5 font_big"></i>
                    حدث خطأ اثناء الحذف ..
                </div>
                <?php elseif ($updated === 1):?>
                    <div class="alert alert-success text-right">
                        <i class="fa fa-check font_big"></i>&nbsp;
                        تم التعديل بنجاح ..
                    </div>
                <?php elseif ($updated === 0):?>
                    <div class="alert alert-danger text-right">
                        <i class="fa fa-remove fa-5 font_big"></i>
                        لم يتم تغيير البيانات ..
                    </div>
                <?php endif; ?>
            

            <div class="table-responsive">
            <form action="<?= base_url('admincp/edit_news') ?>" method="post">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center"><i class="fa fa-sort-numeric-asc fa-5"></i> #</th>
                        <th class="text-center"><i class="fa fa-pencil fa-5"></i> عنوان الخبر</th>
                        <th class="text-center"><i class="fa fa-mail-reply-all fa-5"></i> الصورة</th>
                        <th class="text-center"><i class="fa fa-smile-o fa-5"></i> الحالة</th>
                        <th class="text-center"><i class="fa fa-edit fa-5"></i> تعديل</th>
                        <th width="10%" class="text-center"><i class="fa fa-trash-o fa-5"></i> حذف</th>
                    </tr>

                    <?
                    $num = 0;
                    foreach($all_news as $k => $news):?>
                    <tr>
                        <td class="text-center"><?= ++$num; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url("admincp/edit_news/$news->id/$news->title") ?>"><?= $news->title ?></a><br />
                        </td>
                        <td class="text-center">
                            <img src="<?= base_url($news->image) ?>" class="img-thumbnail" style="width: 100px;">
                        </td>
                        <td class="text-center">
                            <?if($news->active == 1): ?>
                                <i class="fa fa-check font_big green"></i>
                            <?else:?>
                                <i class="fa fa-remove fa-5 font_big red"></i>
                            <?endif;?>
                        </td>
                        
                        <td class="text-center">
                            <a href="<?= base_url("admincp/edit_news/$news->id/$news->title") ?>">تعديل </a></td>
                   
                        <td class="text-center">
                            <input type="checkbox" name="del_news[]" value="<?= $news->id ?>" />
                        </td>

                    </tr>
                    <?endforeach;?>

                    <tr>
                        <td class="text-left" colspan="5">
                            <span class="mr_check red" style="margin-left: 6% !important;">حذف الكل</span>
                        </td>
                        <td>
                            <span>
                                <input id="all" type="checkbox" />
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-left">
                            <button type="submit" name="news_del" value="1" class="btn btn-danger btn-lg">
                                <i class="fa fa-trash-o"></i> حذف 
                            </button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>


        </div>
    </div>
</div>


	
<?php endif; ?>
<?php $this->load->view("admincp/footer.php"); ?>