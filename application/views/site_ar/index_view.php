  <link href="<?= assets('css/select2.min.css')?>" rel="stylesheet" />
<!-- Start main-slider -->
<?php if($config->slider == 0 || $config->slider == 2):?>
<section id="main-slider">
    <div id="slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach ($sliders as $key => $s) : ?>
                <li data-target="#slider" data-slide-to="<?= $key ?>" <?php if ($key == 0) : ?>class="active"<?php endif; ?>></li>
            <?php endforeach; ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($sliders as $k => $slider) : ?>
                <div class="item <?php if ($k == 0): ?>active<?php endif ?>">
                    <img src="<?= base_url($slider->image) ?>" alt="<?= $slider->title_en ?>" title="<?= $slider->title_en ?>" />
                </div>
            <?php endforeach ?>
        </div>

        Controls
        <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</section>
<!-- End main-slider -->
<?php endif;


if($config->slider == 1): ?>
<!-- Start Home Search -->
         <section id="home-search">
             <div class="container">
                <div class="row">
                   <form method="POST" action="<?= base_url('ar/search') ?>" class="form-inline col-xs-12">
                      <div class="form-group col-md-3"> 
                        <input name="search[query]" type="text" class="form-control"  placeholder="ماذا تريد أن تبحث عن ..... " />
                      </div>
                      <div class="form-group col-md-3"> 
                        <select name="search[category]" class="form-control">
                            <option disabled="true" selected="true">إختر القسم</option>
                            <?php foreach ($categories as $key => $category): ?>
                              <option value="<?= $category->id ?>"><?= $category->title ?></option>
                            <?php endforeach?>
                        </select>
                      </div>
                      <div class="form-group col-md-2"> 
                        <input name="search[address]" type="text" class="form-control"  placeholder="العنوان.." />
                      </div>
                      <div class="form-group col-md-2"> 
                        <select name="search[purpose]" class="form-control">
                          <option value="1">للبيع</option>
                          <option value="0">للإيجار</option> 
                        </select>
                      </div>
                      <div class="form-group col-md-2">   
                         <button type="submit" 
                                 name="search[submit]" 
                                 value="1" 
                                 class="btn btn-default btn-block"
                                 style="text-align: center;" 
                                 >البحث 
                         <i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                    </form>
                </div>
             </div>
         </section>
    <!-- /End Home Search -->

<?php endif;
if($config->slider == 2): ?>
   <!-- Start search-form -->
         <section id="search-form">
              <div class="container">
                <div class="row">
                     <div class="col-md-9">
                        <div class="search-property col-md-9">
                            <form class="form-inline"> 
                                    <div class="radio col-md-3 col-sm-6 col-xs-12">
                                      <label>
                                        <input type="radio" name="search-option"  value="For Sale" checked>
                                          للبيع
                                      </label>
                                    </div>
                                     <div class="radio col-md-3 col-sm-6 col-xs-12">
                                      <label>
                                        <input type="radio" name="search-option"  value="For Rent" checked>
                                          للإيجار
                                      </label>
                                    </div>
                                     <div class="radio col-md-3 col-sm-6 col-xs-12">
                                      <label>
                                        <input type="radio" name="search-option"  value="Residential" checked>
                                          سكني
                                      </label>
                                    </div>
                                     <div class="radio col-md-3 col-sm-6 col-xs-12">
                                      <label>
                                        <input type="radio" name="search-option"  value="Commercial" checked>
                                          تجاري
                                      </label>
                                    </div> 
                                  <div class="form-group col-md-4 col-sm-6 col-xs-12">                                    
                                    <select class="form-control"  placeholder="Email">
                                        <option value="Type" selected="true" disabled>النوع</option>
                                        <option value="">شقة</option>
                                        <option value="">برج</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control"  placeholder="Email">
                                        <option value="Type" selected="true" disabled>مصر</option>
                                        <option value="">مصر</option>
                                        <option value="">مصر</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control"  placeholder="Email">
                                        <option value="Type" selected="true" disabled>المدينة</option>
                                        <option value="">القاهره</option>
                                        <option value="">الإسكندرية</option>
                                    </select>
                                  </div>
                                   <div class="form-group col-md-8 col-sm-6 col-xs-12">
                                     <input class="form-control" type="text" placeholder="البحث بالكلمات ....." >
                                  </div>
                                  <div class="form-group col-md-4 col-sm-6 col-xs-12"> 
                                    <button type="submit" class="btn btn-info"> البحث <i class="fa fa-search" aria-hidden="true"></i></button>
                                   </div>
                          </form>
                        </div>
                     </div>   
                </div>
              </div>
         </section>
    <!-- End search-form -->
<?php endif; ?>

<section id="Properties">
             <div class="container">
                 <div class="row">

                  <!-- Start Left Properties-->
                     <div class="col-md-3 col-xs-12">
                         <h4 class="text-blue"><img src="<?= assets('images/fetaute-title.png') ?>" alt=" العقارات المميزة" title=" العقارات المميزة"/> العقارات المميزة</h4><hr>
                         <ul class="nav featured-properties">
                         <?php foreach ($fetProjects as $m => $p) : ?>
                             <li class="Property">
                                 <Div class="image-block">
                                     <img src="<?= assets('images/ribbon-featured.png') ?>" alt="<?= $p->title_ar ?>" title="<?= $p->title_ar ?>" class="featured-icon"/>
                                     <img src="<?= base_url($p->img) ?>" alt="<?= $p->title_ar ?>" title="<?= $p->title_ar ?>" class="img-responsive Property-img"/>
                                     <div class="prop-option">
                                         <ul class="nav">
                                             <li><i class="fa fa-arrows" aria-hidden="true"></i>م <?= $p->area ?> </li>
                                             <li><i class="fa fa-bed" aria-hidden="true"></i> <?= $p->rooms ?></li>
                                             <li><i class="fa fa-bath" aria-hidden="true"></i> <?= $p->baths ?></li>
                                         </ul>
                                     </div>
                                 </Div>
                                 <a href="<?= base_url('ar/properties/' . $p->id . '/' . str_replace(' ', '-', $p->title_ar)) ?>">
                                      <?= $p->title_ar ?> 
                                      <span class="pull-right text-muted"><?= $p->price ?> LE</span>
                                </a>
                                 <p>
                                   <?= $p->purpose == 1 ? "للبيع" : "للإيجار" ?>                       
                                    <br>
                                     <?= $p->address_ar ?>
                                 </p>
                             </li>
                             <?php endforeach; ?>
                         </ul>
                     </div>
                 <!-- end Left Properties-->

                 <!-- Start Right Properties-->

                     <div class="col-md-9 col-xs-12">

                         <h4 class="text-blue"><img src="<?= assets('images/new-property.png') ?>" alt="أحدث العقارات المضافة" title="أحدث العقارات المضافة" width="40px"/> أحدث العقارات المضافة</h4><hr>


                          <div id="projects">
                               <?php $this->load->view('site_ar/projects_small', $projects); ?>
                          </div>

                     </div>
                     <!-- End Right Properties-->

                 </div>
             </div>

         </section>


         <!-- End feature Properties section-->


        <!-- Start sold-properties-->

        <section id="gallery-section">
            
          <h4 class="text-center gallery-section-title"><img src="<?= assets('images/sold-title-icon.png') ?>" alt="العقارات المباعة" title="العقارات المباعة" width="45px"> العقارات المباعة </h4>
             
            <div class="container">
                <div class="row">
                    
                    <div id="gallery" class="owl-carousel" dir="ltr">
                       <?php foreach($soled_projects['projects'] as $project): ?>
                            <div>
                                <img src="<?= assets('images/sold_icon.png') ?>" alt="" title="" class="sold_icon">
                                <a href="<?= base_url('ar/properties/' . $project->id . '/' . str_replace(' ', '-', $project->title_ar)) ?>">
                                    <img src="<?= base_url($project->img) ?>" alt="<?= $project->title_ar ?>" title="<?= $project->title_ar ?>" class="img-thumbnail"/>
                                </a>
                                <div class="gallery-caption">
                                      <h4>
                                        <a href="<?= base_url('ar/properties/' . $project->id . '/' . str_replace(' ', '-', $project->title_ar)) ?>">
                                            <?= $project->title_ar ?>
                                        </a>
                                      </h4>
                                      <p>
                                          مباعة  <br>
                                          <?= $project->address_ar ?>
                                      </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>


        <!-- End sold-properties-->

        <!-- Start bottom-content section-->
        <section id="bottom-content">
            <Div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h4 class="bottom-content-title">أنشط العملاء</h4>
                        <ul class="nav top-agent">
                            <li>
                                <div class="col-sm-4 col-xs-12">
                                    <a href="">
                                       <img src="<?= assets('images/agen2_53ccd4895a45c.jpg') ?>" alt="إسم العميل" title="إسم العميل" 
                                            class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <a href="">إسم العميل</a>
                                    <h4>0214654584</h4>
                                    <a href="mailto:agent@osproperty.com">agent@osproperty.com</a>
                                </div>
                            </li>

                            <li>
                                <div class="col-sm-4 col-xs-12">
                                    <a href=""><img src="<?= assets('images/agen4_53ccd491c3418.jpg') ?>" alt="إسم العميل" title="إسم العميل" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <a href="">إسم العميل</a>
                                    <h4>0214654584</h4>
                                    <a href="mailto:agent@osproperty.com">agent@osproperty.com</a>
                                </div>
                            </li>

                            <li>
                                <div class="col-sm-4 col-xs-12">
                                    <a href=""><img src="<?= assets('images/agen3_53ccd46f30846.jpg') ?>" alt="إسم العميل" title="إسم العميل" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <a href="">إسم العميل</a>
                                    <h4>0214654584</h4>
                                    <a href="mailto:agent@osproperty.com">agent@osproperty.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h4 class="bottom-content-title"> العقارات المميزة</h4>
                        <ul class="nav bottom-featute-prop">
                            <?php foreach($fetProjects2 as $project): ?>
                                <li>
                                    <div class="col-sm-5 col-xs-12">
                                        <a href="<?= base_url('ar/properties/' . $project->id . '/' . str_replace(' ', '-', $project->title_ar)) ?>">
                                            <img src="<?= base_url($project->img) ?>" alt="<?= $project->title_ar ?>" title="<?= $project->title_ar ?>"/>
                                        </a>
                                    </div>
                                    <div class="col-sm-7 col-xs-12">
                                        <a href="<?= base_url('ar/properties/' . $project->id . '/' . str_replace(' ', '-', $project->title_ar)) ?>"> 
                                            <?= $project->title_ar ?> 
                                        </a>
                                        <p>القسم : <span class="text-blue"><?= $project->cat_title_ar ?></span></p>
                                        <p>نوع العقار : <span class="text-blue">
                                            <?php echo ($project->purpose == 1?  "للبيع" : "للإيجار" ) ?>
                                        </span></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h4 class="bottom-content-title">اخر الأخبار</h4>
                        <ul class="nav blog">
                            <?php foreach ($all_news as $k => $news): ?>
                              <?php if(!$k): ?>
                                <li>
                                    <Div class="col-xs-12">
                                        <a href="<?= base_url("ar/news/$news->id/$news->title") ?>">
                                            <img src="<?= base_url($news->image) ?>" alt="<?= $news->title ?>" title="<?= $news->title ?>">
                                            <p>
                                                <?= word_limiter(strip_tags($news->content), 15) ?>
                                            </p>
                                        </a>
                                    </Div>
                                </li>
                              <?php else: ?>
                                <li>
                                   <div class="col-sm-5 col-xs-12">
                                       <a href="<?= base_url("ar/news/$news->id/$news->title") ?>">
                                           <img src="<?= base_url($news->image) ?>" alt="<?= $news->title ?>" title="<?= $news->title ?>">
                                       </a>
                                   </div>
                                    <div class="col-sm-7 col-xs-12">
                                        <a href="<?= base_url("ar/news/$news->id/$news->title") ?>">
                                          <?= $news->title ?>
                                        </a>
                                        <p>
                                           <?= word_limiter(strip_tags($news->content), 10) ?>
                                        </p>
                                    </div>
                                </li>
                              <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </Div>


        </section>

        <!-- end bottom-content section-->

        <!-- start feature-pages section-->
  <!--      <section id="feature-pages">
           <div class="container">
               <div class="row">
                   <ul class="nav pages-ul text-center">
                       <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                           <img src="<?= assets('images/icon1.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                           <h4> إسم الصفحة</h4>
                       </a></li>
                       <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                           <img src="<?= assets('images/icon2.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                           <h4>إسم الصفحة</h4>
                       </a></li>
                       <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                           <img src="<?= assets('images/icon3.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                           <h4>إسم الصفحة</h4>
                       </a></li>
                       <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                           <img src="<?= assets('images/icon4.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                           <h4>إسم الصفحة</h4>
                       </a></li>
                   </ul>
               </div>
           </div>
        </section>
-->
         <!-- end feature-pages section-->


        <!-- start map section-->
          <section id="map">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 col-sm-6 col-xs-12" style="padding: 0;">
                        <?= htmlspecialchars_decode($config->gmap) ?>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 mapContent">
                        <h4><i class="fa fa-map-marker" aria-hidden="true"></i> العنوان </h4>
                        <h5> <?= $config->site_address ?> </h5><br/>
                        <h4><i class="fa fa-phone" aria-hidden="true"></i> التليفونات</h4>
                        <h5> - <?= $config->site_phone ?> </h5>
                        <h5> - <?= $config->site_fax ?> </h5>
                        <p class="text-right">
                            <a href="<?= base_url('ar/contact-us') ?>" class="btn btn-info"> إتصل بنا </a>
                        </p>
                    </div>
                </div>
            </div>

          </section>


        <!-- end map section-->

<script src="<?= assets('js/select2.min.js') ?>"></script>
<script>
$(document).ready(function (){
   $('select').select2();
});
</script>
