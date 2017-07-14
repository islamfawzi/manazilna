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
            <form method="POST" action="<?= base_url('search') ?>" class="form-inline col-xs-12">
                <div class="form-group col-md-3">
                    <input name="search[query]" type="text" class="form-control"  placeholder="Write Your Search Here ....." />
                </div>
                <div class="form-group col-md-2">
                    <select name="search[category]" class="form-control">
                        <option disabled="true" selected="true">Category</option>
                        <?php foreach ($categories as $key => $category): ?>
                          <option value="<?= $category->id ?>"><?= $category->title_en ?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <!-- <select name="search[city]" class="form-control">
                        <option disabled="true" selected="true">select City </option>
                        <option>cairo</option>
                        <option>alex</option>
                        <option>marsa matrouh</option>
                    </select> -->
                    <input name="search[address]" type="text" class="form-control"  placeholder="Address.." />
                </div>
                <div class="form-group col-md-2">
                    <select name="search[purpose]" class="form-control">
                        <option value="1">For Sale</option>
                        <option value="0">For Rent</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" name="search[submit]" value="1" class="btn btn-default btn-block">Search <i class="fa fa-search" aria-hidden="true"></i></button>
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
                                For Sale
                            </label>
                        </div>
                        <div class="radio col-md-3 col-sm-6 col-xs-12">
                            <label>
                                <input type="radio" name="search-option"  value="For Rent" checked>
                                For Rent
                            </label>
                        </div>
                        <div class="radio col-md-3 col-sm-6 col-xs-12">
                            <label>
                                <input type="radio" name="search-option"  value="Residential" checked>
                                Residential
                            </label>
                        </div>
                        <div class="radio col-md-3 col-sm-6 col-xs-12">
                            <label>
                                <input type="radio" name="search-option"  value="Commercial" checked>
                                Commercial
                            </label>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                            <select class="form-control"  placeholder="Email">
                                <option value="Type" selected="true" disabled>Type</option>
                                <option value="">Apartment</option>
                                <option value="">Building</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                            <select class="form-control"  placeholder="Email">
                                <option value="Type" selected="true" disabled>Egypt</option>
                                <option value="">Egypt</option>
                                <option value="">Egypt</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                            <select class="form-control"  placeholder="Email">
                                <option value="Type" selected="true" disabled>City</option>
                                <option value="">Cairo</option>
                                <option value="">Alex</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8 col-sm-6 col-xs-12">
                            <input class="form-control" type="text" placeholder="Search By KeyWords ....." >
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                            <button type="submit" class="btn btn-info">Search <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End search-form -->
<?php endif; ?>
<!-- start feature Properties section -->
<section id="Properties">

    <div class="container">
        <div class="row">
            <!-- Start Left Properties-->
            <div class="col-md-3 col-xs-12">
                <h3 class="text-blue">
                    <img src="<?= assets('images/fetaute-title.png') ?>" alt="Featured Properties" title="Featured Properties"/> Featured Properties
                </h3>
                <hr>
                <ul class="nav featured-properties">
                    <?php foreach ($fetProjects as $m => $p) : ?>
                        <li class="Property">
                            <div class="image-block">
                                <img src="<?= assets('images/ribbon-featured.png') ?>" alt="" title="" class="featured-icon"/>
                                <img src="<?= base_url($p->img) ?>" alt="<?= $p->title ?>" title="<?= $p->title ?>" class="img-responsive Property-img"/>
                                <div class="prop-option">
                                    <ul class="nav">
                                        <li><i class="fa fa-arrows" aria-hidden="true"></i> <?= $p->area ?> m</li>
                                        <li><i class="fa fa-bed" aria-hidden="true"></i> <?= $p->rooms ?> </li>
                                        <li><i class="fa fa-bath" aria-hidden="true"></i> <?= $p->baths ?> </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>">
                               <?= $p->title ?> <span class="pull-right text-muted"><?= $p->price ?> LE.</span>
                             </a>
                            <p>
                                For <?= $p->purpose == 1 ? 'Sale' : 'Rent' ?> <br>
                                <?= $p->address ?>
                            </p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <!-- end Left Properties-->

            <!-- Start Right Properties-->

            <div class="col-md-9 col-xs-12">

                <h3 class="text-blue">
                    <img src="<?= assets('images/new-property.png') ?>" alt="Newest Properties" title="Newest Properties" width="40px"/> Newest Properties
                </h3>
                <hr />
                <div id="projects">
                    <?php $this->load->view('site/projects_small', $projects); ?>
                </div>
            </div>
            <!-- End Right Properties-->
        </div>
    </div>
</section>
<!-- End feature Properties section-->

<!-- Start sold-properties-->

<section id="gallery-section">
    <h3 class="text-center gallery-section-title">
        <img src="<?= assets('images/sold-title-icon.png') ?>" alt="Sold Properties" title="Sold Properties" width="45px"> Sold Properties
    </h3>
    <div class="container">
        <div class="row">
            <div id="gallery" class="owl-carousel" dir="ltr">
			    <?php foreach($soled_projects['projects'] as $project): ?>
                <div>
                    <img src="<?= assets('images/sold_icon.png') ?>" alt="<?= $project->title ?>" title="<?= $project->title ?>" class="sold_icon">
                    <a href="<?= base_url('properties/' . $project->id . '/' . str_replace(' ', '-', $project->title)) ?>">
                        <img src="<?= base_url($project->img) ?>" class="img-thumbnail" />
                    </a>
                    <div class="gallery-caption">
                        <h3>
							<a href="<?= base_url('properties/' . $project->id . '/' . str_replace(' ', '-', $project->title)) ?>">
							 <?= $project->title ?>	
							</a>
						</h3>
                        <p>
                            Soled  <br>
                            <?= $project->address ?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h3 class="bottom-content-title">Top Agents</h3>
                <ul class="nav top-agent">
                    <li>
                        <div class="col-sm-4 col-xs-12">
                            <a href="">
                                <img src="<?= assets('images/agen2_53ccd4895a45c.jpg') ?>" alt="agent name" title="agent name" class="img-circle img-responsive">
                            </a>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                            <a href="">agent name</a>
                            <h4>0214654584</h4>
                            <a href="mailto:agent@osproperty.com">agent@osproperty.com</a>
                        </div>
                    </li>

                    <li>
                        <div class="col-sm-4 col-xs-12">
                            <a href="">
                                <img src="<?= assets('images/agen4_53ccd491c3418.jpg') ?>" alt="agent name" title="agent name" class="img-circle img-responsive">
                            </a>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                            <a href="">agent name</a>
                            <h4>0214654584</h4>
                            <a href="mailto:agent@osproperty.com">agent@osproperty.com</a>
                        </div>
                    </li>

                    <li>
                        <div class="col-sm-4 col-xs-12">
                            <a href="">
                                <img src="<?= assets('images/agen3_53ccd46f30846.jpg') ?>" alt="agent name" title="agent name" class="img-circle img-responsive">
                            </a>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                            <a href="">agent name</a>
                            <h4>0214654584</h4>
                            <a href="mailto:agent@osproperty.com">agent@osproperty.com</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h3 class="bottom-content-title">Featured Properties</h3>
                <ul class="nav bottom-featute-prop">
					<?php foreach($fetProjects2 as $project): ?>
                    <li>
                        <div class="col-sm-5 col-xs-12">
                            <a href="<?= base_url('properties/' . $project->id . '/' . str_replace(' ', '-', $project->title)) ?>">
                                <img src="<?= base_url($project->img) ?>" alt="<?= $project->title ?>" title="<?= $project->title ?>"/></a>
                        </div>
                        <div class="col-sm-7 col-xs-12">
                            <a href="<?= base_url('properties/' . $project->id . '/' . str_replace(' ', '-', $project->title)) ?>">
                                <?= $project->title ?>
                            </a>
                            <p>Category : <span class="text-blue"><?= $project->cat_title ?></span></p>
                            <p>Property type : <span class="text-blue">
							For <?php echo ($project->purpose == 1?  "Sale" : "Rent" ) ?> </span></p>
                        </div>
                    </li>
					<?php endforeach; ?>
                </ul>

            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h3 class="bottom-content-title">Latest Blog</h3>
                <ul class="nav blog">
                    <?php foreach ($all_news as $k => $news): ?>
                        <?php if(!$k): ?>
                            <li>
                                <div class="col-xs-12">
                                    <a href="<?= base_url("news/$news->id/$news->title_en") ?>">
                                        <img src="<?= base_url($news->image) ?>" alt="<?= $news->title_en ?>" title="<?= $news->title_en ?>">
                                        <p>
                                            <?= word_limiter(strip_tags($news->content_en), 15) ?>
                                        </p>
                                    </a>
                                </div>
                            </li>
                        <?php else: ?>
                            <li>
                                <div class="col-sm-5 col-xs-12">
                                    <a href="<?= base_url("news/$news->id/$news->title_en") ?>">
                                        <img src="<?= base_url($news->image) ?>" alt="<?= $news->title_en ?>" title="<?= $news->title_en ?>">
                                    </a>
                                </div>
                                <div class="col-sm-7 col-xs-12">
                                    <a href="<?= base_url("news/$news->id/$news->title_en") ?>"> <?= $news->title_en ?> </a>
                                    <p>
                                        <?= word_limiter(strip_tags($news->content_en), 10) ?>
                                    </p>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end bottom-content section-->
<!-- start feature-pages section-->
<!--   <section id="feature-pages">
   <div class="container">
       <div class="row">
           <ul class="nav pages-ul text-center">
               <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                   <img src="<?= assets('images/icon1.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                   <h3>Page Name</h3>
               </a></li>
               <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                   <img src="<?= assets('images/icon2.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                   <h3>Page Name</h3>
               </a></li>
               <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                   <img src="<?= assets('images/icon3.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                   <h3>Page Name</h3>
               </a></li>
               <li class="col-md-3 col-sm-6 col-xs-12"><a href="">
                   <img src="<?= assets('images/icon4.png') ?>" alt="Page Name" title="Page Name" class="page-icon">
                   <h3>Page Name</h3>
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
                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> address</h4>
                <h5> <?= $config->site_address_en ?> </h5><br/>
                <h4><i class="fa fa-phone" aria-hidden="true"></i> Phone</h4>
                <h5> - <?= $config->site_phone ?> </h5>
                <h5> - <?= $config->site_fax ?> </h5>
                <p class="text-right">
					<a href="<?= base_url('contact-us') ?>" class="btn btn-info">Contact Us </a>
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
