<div class="col-sm-2 col-xs-12 padding_none">
    <div class="right_menu">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div  class="panel panel-default">
                    <div class="panel-heading" role="tab" >
                        <h4 class="panel-title">
                            <a val="1" class="menu" href="<?= base_url() ?>admincp/settings">
                                <i class="fa fa-gears"></i> الإعدادات العامة</a>
                            </a>
                        </h4>
                    </div>
                </div>
              <!--  <div  class="panel panel-default">
                    <div class="panel-heading" role="tab" >
                        <h4 class="panel-title">
                            <a val="1" class="menu" href="<?= base_url() ?>admincp/site_word/1">
                                <i class="fa fa-gears"></i>  كلمة الموقع  </a>
                            </a>
                        </h4>
                    </div>
                </div>


                <div  class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a val="2" class="menu" data-toggle="collapse" data-parent="#accordion" href="#menu" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-list"></i> القائمة الرئيسية <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="menu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <ul class="nav list-unstyled padding_none">
                               <li><a href="<?= base_url() ?>admincp/add_menu"><i class="fa fa-plus"></i> إضافة عنصر جديد</a></li>
                                <li><a href="<?= base_url() ?>admincp/edit_menu"><i class="fa fa-edit"></i> تعديل / حذف عنصر</a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            

                <div  class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a val="3" class="menu" data-toggle="collapse" data-parent="#accordion" href="#slider" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-sort-amount-asc"></i> الصور المتحركة<i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>

                    </div>
                    <div id="slider" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                        <div class="panel-body">
                            <ul class="nav list-unstyled padding_none">
                                <li><a href="<?= base_url() ?>admincp/add_slider"><i class="fa fa-plus"></i> إضافة صورة جديدة </a></li>
                                <li><a href="<?= base_url() ?>admincp/edit_slider"><i class="fa fa-edit"></i> كل الصور المتحركة</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div  class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a val="4" class="menu" data-toggle="collapse" data-parent="#accordion" href="#pages" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-file-text-o"></i> صفحات الموقع <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="pages" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                        <div class="panel-body">
                            <ul  class="nav list-unstyled padding_none">
                                <li><a href="<?= base_url() ?>admincp/add_page"><i class="fa fa-plus"></i> إضافة صفحة جديدة</a></li>
                                <li><a href="<?= base_url() ?>admincp/edit_page"><i class="fa fa-edit"></i> كل الصفحات</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

               <div  class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a val="6" class="menu" data-toggle="collapse" data-parent="#accordion" href="#projects" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-newspaper-o"></i> العقارات  <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="projects" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                        <div class="panel-body">
                            <ul  class="nav list-unstyled padding_none" >
                               <li><a href="<?= base_url() ?>admincp/add_project_cat"><i class="fa fa-plus"></i> اضافة قسم </a></li>
                                <li><a href="<?= base_url() ?>admincp/edit_project_cat"><i class="fa fa-edit"></i> تعديل / حذف قسم</a></li>
                                <!-- <li><a href="<?= base_url() ?>admincp/add_project_subcat"><i class="fa fa-plus"></i> اضافة قسم فرعى </a></li>
                                <li><a href="<?= base_url() ?>admincp/edit_project_subcat"><i class="fa fa-edit"></i>حذف /تعديل قسم فرعى</a></li> -->
                                <li><a href="<?= base_url() ?>admincp/add_project"><i class="fa fa-plus"></i> اضافة عقار جديد</a></li>
                                <li><a href="<?= base_url() ?>admincp/edit_project"><i class="fa fa-edit"></i> تعديل / حذف عقار</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div  class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a val="8" class="menu" data-toggle="collapse" data-parent="#accordion" href="#clients" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-users"></i> خصائص العقارات <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>

                    </div>
                    <div id="clients" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                        <div class="panel-body">
                            <ul class="nav list-unstyled padding_none">
                                <li><a href="<?= base_url() ?>admincp/property_feature/amenities"><i class="fa fa-plus"></i> Amenities </a></li>
                                <li><a href="<?= base_url() ?>admincp/property_feature/finish_types"><i class="fa fa-plus"></i> Finish types </a></li>
                                <li><a href="<?= base_url() ?>admincp/property_feature/property_types"><i class="fa fa-edit"></i> Property types </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a val="7" class="menu" data-toggle="collapse" data-parent="#accordion" href="#video" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-video-camera"></i> اتصل بنا <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="video" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                        <div class="panel-body">
                            <ul class="nav list-unstyled padding_none" >
                                <li><a href="<?= base_url() ?>admincp/contact_page"><i class="fa fa-edit"></i> صفحة اتصل بنا</a></li>
                                <li><a href="<?= base_url() ?>admincp/contact_inbox"><i class="fa fa-edit"></i> الرسائل الواردة</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingtwo">
                     <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#audio" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-soundcloud"></i> القائمة البريدية <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                      </h4>

                  </div>
                   <div id="audio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                      <div class="panel-body">
                         <ul class="nav list-unstyled padding_none">
                           <li><a href="<?=base_url()?>admincp/send_newsletter"><i class="fa fa-plus"></i> ارسال الى القائمة البريدية</a></li>
                            <li><a href="<?=base_url()?>admincp/newsletter"><i class="fa fa-plus"></i> الرسائل المرسلة</a></li>
                            <li><a href="<?=base_url()?>admincp/mail_list"><i class="fa fa-plus"></i> عرض القائمة البريدية</a></li>
                            <li><a href="<?=base_url()?>admincp/add_mail"><i class="fa fa-plus"></i> اضافة الى القائمة البريدية</a></li>
                          </ul>
                      </div>
                    </div>
               </div>

               <div val="11" class="panel panel-default menu">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#users" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-users"></i> الاعضاء <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="users" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                        <div class="panel-body">
                            <ul class="nav list-unstyled padding_none">
                                <li><a href="<?= base_url() ?>admincp/add_user"><i class="fa fa-plus"></i> اضافة عضو </a></li>
                                <li><a href="<?= base_url() ?>admincp/edit_user"><i class="fa fa-edit"></i> تعديل / حذف عضو </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a val="6" class="menu" data-toggle="collapse" data-parent="#accordion" href="#certificates" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-newspaper-o"></i> اخر الأخبار <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="certificates" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                        <div class="panel-body">
                            <ul  class="nav list-unstyled padding_none" >
                                <li><a href="<?= base_url('admincp/add_news') ?>"><i class="fa fa-plus"></i> اضافة خبر  </a></li>
                                <li><a href="<?= base_url('admincp/edit_news') ?>"><i class="fa fa-edit"></i> تعديل / حذف خبر</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    var xmlhttp;
    createAjax();

    $(document).ready(function () {
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var x = xmlhttp.responseText;

                $('.menu').each(function (index) {
                    if ($(this).attr('val') == x) {
                        id = $(this).attr('href');
                        $(id).removeClass('collapse');
                    }
                });
            }
        }
        xmlhttp.open("POST", "<?= base_url() ?>admincp/menu", true);
        xmlhttp.send();
    });
    $('.menu').click(function () {
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var x = xmlhttp.responseText;
                $('.menu').each(function (index) {
                    if ($(this).attr('val') == x) {
                        id = $(this).attr('href');
                        $('.panel-collapse').addClass('collapse');
                        $(id).removeClass('collapse');
                    }
                });
            }
        }
        var x = $(this).attr('val');
        xmlhttp.open("POST", "<?= base_url() ?>admincp/menu/" + x, true);
        xmlhttp.send();
    });
    // create ajax object
    function createAjax() {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
</script>
