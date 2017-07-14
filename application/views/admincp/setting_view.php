<?php $this->load->view('admincp/header'); ?>
<!--left Side -->
<div class="col-sm-10 col-xs-12">
    <div class="forms">
        <h5 class="form_title text-center"><i class="fa fa-edit"></i> الاعدادات العامة للموقع</h5>
        <?php if ($config->updated == 1): ?>
            <div class="alert alert-success">
                <i class="fa fa-check font_big"></i>&nbsp;
                تم تعديل اعدادات الموقع بنجاح ..
            </div>
        <?php elseif ($config->updated == 2): ?>
            <div class="alert alert-danger">
                <i class="fa fa-remove fa-5 font_big"></i>
                لم يتم تغيير البيانات ..
            </div>
        <?php endif; ?>
        <ul class="nav nav-tabs padding_none">
            <li role="presentation" class="nav active"><a href="#arabic" data-toggle="tab" class="btn btn-warning">الاعدادات العامة </a></li>
            <li role="presentation" class="nav"><a href="#english" data-toggle="tab" class="btn btn-info">English</a></li>
            <li role="presentation" class="nav"><a href="#social" data-toggle="tab" class="btn btn-success">التواصل الاجتماعى</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="arabic">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>admincp/settings" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                        <table class="table">
                            <tr>
                                <td class="label_width input_label"><i class="fa fa-pencil"></i> عنوان الموقع :
                                    <br /><span class="text-muted hint">عنوان موقعك الذى سيظهر فى كافة الصفحات  </span></td>
                                <td><input type="text" name="site_name" value="<?= $config->site_name ?>" class="form-control inp_width" id="" placeholder="عنوان الموقع"/></td>
                            </tr>
                            <tr>
                                <td class="label_width"><i class="fa fa-pencil"></i> الكلمات المفتاحية :
                                    <br /><span class="text-muted hint"> لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; افصل بينهم بفاصلة ,</span></td>
                                <td><input type="text" name="metakey" value="<?= $config->metakey ?>" class="form-control inp_width" id="" placeholder="Meta Keyswords"/></td>
                            </tr>
                            <tr>
                                <td class="label_width"><i class="fa fa-pencil"></i> وصف الموقع :
                                    <br /><span class="text-muted hint">لمساعدة محركات البحث ورفع كقاءة موقعك فيها <br />&nbsp;&nbsp;&nbsp; لا يزيد عن 255 حرف </span></td>
                                <td><input type="text" name="metadesc" value="<?= $config->metadesc ?>" class="form-control inp_width" id="" placeholder="Meta Description"/></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-files-o"></i>وسوم الميتا :
                                    <br /><span class="text-muted hint"> HTML Tags</span></td>
                                <td colspan="3">
                                  <textarea style="direction: ltr;" name="meta_tags" class="form-control mceNoEditor inp_width"  rows="5" placeholder="وسوم ميتا..">
                                    <?= $config->meta_tags ?>
                                  </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="label_width"><i class="fa fa-pencil"></i> بريد الموقع :
                                    <br /><span class="text-muted hint">البريد الالكترونى الذى سوف يتم ارسال الايميلات عليه  </span></td>
                                <td>
                                  <input type="text"  name="site_email" value="<?= $config->site_email ?>" class="form-control inp_width dir_ltr" id="" placeholder="Site Mail"/></td>
                            </tr>
                            <tr>
                                <td class="label_width"><i class="fa fa-pencil"></i> رقم الفاكس :</td>
                                <td><input type="text"  name="site_fax" value="<?= $config->site_fax ?>" class="form-control inp_width dir_ltr" id="" placeholder="Fax Number"/></td>
                            </tr>
                            <tr>
                                <td class="label_width"><i class="fa fa-pencil"></i> رقم الهاتف :</td>
                                <td><input type="text"  name="site_phone" value="<?= $config->site_phone ?>" class="form-control inp_width dir_ltr" id="" placeholder="Phone Number"/></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-files-o"></i>العنوان :</td>
                                <td><input type="text"  name="site_address" value="<?= $config->site_address ?>" class="form-control inp_width" id="" placeholder="Address"/></td>
                            </tr>
							<tr>
                                <td><i class="fa fa-files-o"></i>Google Map :</td>
                                <td>
									<textarea style="width: 60%;" name="gmap" class="form-control"><?= $config->gmap ?></textarea> 
								</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i> حالة الموقع :</td>
                                <td>
                                    <input type="radio" name="site_status" <?php if ($config->site_status == 1): ?> checked="true" <?php endif; ?> value="1" /> <i class="fa fa-thumbs-o-up"></i>  مفتوح
                                    <input type="radio" name="site_status" <?php if ($config->site_status == 0): ?> checked="true" <?php endif; ?> value="0" /> <i class="fa fa-thumbs-o-down"></i> مغلق
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock-alt"></i>الصور المتحركة :</td>
                                <td>
                                    <input type="radio" name="slider" <?php if ($config->slider == 0): ?> checked="true" <?php endif; ?> value="0" />الصور المتحركة فقط
                                    <input type="radio" name="slider" <?php if ($config->slider == 1): ?> checked="true" <?php endif; ?> value="1" />البحث فقط
                                    <input type="radio" name="slider" <?php if ($config->slider == 2): ?> checked="true" <?php endif; ?> value="2" />الصور المتحركة مع البحث
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-files-o"></i>رسالة الاغلاق :</td>
                                <td colspan="3">
                                  <textarea name="close_msg" class="form-control ckeditor"  placeholder="اكتب رسالة الاغلاق"><?= $config->close_msg ?></textarea>

                                </td>
                            </tr>

                        </table>

                </div>
            </div>

            <div class="tab-pane fade" id="english">
                <div class="table-responsive" >
                    <table class="table" dir="ltr">
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil fa-5"></i> Site Title :</td>
                            <td><input type="text" value="<?= $config->site_name_en ?>" class="form-control inp_width" name="site_name_en" placeholder="site title ...."/></td>
                        </tr>
                        <tr>
                            <td class="label_width"><i class="fa fa-pencil"></i> Meta Keywords :
                                <br /><span class="text-muted hint"> Helping Search Engines  <br /> Increasing Site Quality divided by comma ,</span></td>
                            <td><input type="text" name="metakey_en" value="<?= $config->metakey_en ?>" class="form-control inp_width" id="" placeholder="Meta Keyswords"/></td>
                        </tr>
                        <tr>
                            <td class="label_width"><i class="fa fa-pencil"></i> Meta Description :
                                <br /><span class="text-muted hint">Helping search Engines <br /> Not More than 255 char. </span></td>
                            <td><input type="text" name="metadesc_en" value="<?= $config->metadesc_en ?>" class="form-control inp_width" id="" placeholder="Meta Description"/></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-files-o"></i>Meta Tags :
                                <br /><span class="text-muted hint"> HTML Tags</span></td>
                            <td colspan="3"><textarea name="meta_tags_en" class="form-control mceNoEditor inp_width"  rows="5" placeholder="write Meta Tags.."><?= $config->meta_tags_en ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="label_width"><i class="fa fa-pencil"></i> Address : </td>
                            <td><input type="text" name="site_address_en" value="<?= $config->site_address_en ?>" class="form-control inp_width" id="" placeholder="Address"/></td>
                        </tr>
                        <tr class="page_desc_en">
                            <td><i class="fa fa-files-o"></i>Closing Message :</td>
                            <td colspan="3"><textarea name="close_msg_en" class="form-control ckeditor"   rows="5" placeholder="Closing Message .."><?= $config->close_msg_en ?></textarea>
                                <?php echo display_ckeditor($ckeditor['ckeditor']); ?>
                            </td>
                        </tr>

                    </table>
                </div>

            </div>

            <div class="tab-pane fade" id="social">
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> Facebook :
                            </td>
                            <td><input type="text" name="social[facebook]" value="<?= $social->facebook ?>" class="form-control inp_width dir_ltr" id="facebook" placeholder="facebook link"/></td>
                        </tr>
                        <tr>
                            <td class="label_width"><i class="fa fa-pencil"></i> Twitter :
                            </td>
                            <td><input type="text" name="social[twitter]" value="<?= $social->twitter ?>" class="form-control inp_width dir_ltr" id="twitter" placeholder="twitter link"/></td>
                        </tr>
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> YouTube :
                            </td>
                            <td><input type="text" name="social[utube]" value="<?= $social->utube ?>" class="form-control inp_width dir_ltr" id="utube" placeholder="YouTube link"/></td>
                        </tr>
                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> Linkedin :
                            </td>
                            <td><input type="text" name="social[linkedin]" value="<?= $social->linkedin ?>" class="form-control inp_width dir_ltr" id="linkedin" placeholder="Linkedin link"/></td>
                        </tr>

                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> Google Plus :
                            </td>
                            <td><input type="text" name="social[gplus]" value="<?= $social->gplus ?>" class="form-control inp_width dir_ltr" id="gplus" placeholder="Google Plus link"/></td>
                        </tr>

                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> Instagram :
                            </td>
                            <td><input type="text" name="social[instagram]" value="<?= $social->instagram ?>" class="form-control inp_width dir_ltr" id="instagram" placeholder="Instagram link"/></td>
                        </tr>

                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> Pinterest :
                            </td>
                            <td><input type="text" name="social[pinterest]" value="<?= $social->pinterest ?>" class="form-control inp_width dir_ltr" id="pinterest" placeholder="Pinterest link"/></td>
                        </tr>

                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> Tumblr :
                            </td>
                            <td><input type="text" name="social[tumblr]" value="<?= $social->tumblr ?>" class="form-control inp_width dir_ltr" id="tumblr" placeholder="Tumblr link"/></td>
                        </tr>

                        <tr>
                            <td class="label_width input_label"><i class="fa fa-pencil"></i> Vimeo :
                            </td>
                            <td><input type="text" name="social[vimeo]" value="<?= $social->vimeo ?>" class="form-control inp_width dir_ltr" id="vimeo" placeholder="Vimeo link"/></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>

        <p class="text-center mr_top">
            <button type="submit" name="setting_submit" value="1"  class="btn btn-success">حفظ البيانات <i class="fa fa-save"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">إسترجاع البيانات <i class="fa fa-undo"></i></button>
        </p>
        </form>
    </div>
</div>
<!--/left Side -->
</div> <!--/End Of Row-->

</div><!--/End Of Container-fluid-->

<!--/Content -->
<?php $this->load->view('admincp/footer'); ?>
