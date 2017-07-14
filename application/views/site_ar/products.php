<?php if ($pageIndex == 1): ?>
    <link rel="stylesheet" href="<?= assets('vendor/flexslider/flexslider.css') ?>" type="text/css" media="screen" />
    <!-- Start Content Section -->
         <section id="content-section">
              <div class="container">
                  <div class="row">
                      <div class="col-md-7 col-xs-12">
                           <h4 class="Property-name"> <?= $product['title_ar'] ?>  </h4>
                           <h5 class="text-muted"><i class="fa fa-map-o" aria-hidden="true"></i><?= $product['address_ar'] ?> </h5>
                          <div id="slider" class="flexslider">
                              <ul class="slides">
                                   <?php foreach ($product['image'] as $img): ?>
                                      <li>
                                          <img src="<?= base_url($img) ?>" />
                                      </li>
                                   <?php endforeach; ?>
                              </ul>
                          </div>
                          <div id="carousel" class="flexslider">
                              <ul class="slides">
                                <?php foreach ($product['image'] as $imge): ?>
                                  <li>
                                      <img src="<?= base_url($imge) ?>" />
                                  </li>
                            <?php endforeach; ?>
                              </ul>
                          </div>

                          <div class="price-tab">
                              <span class="ref-num">Ref # : <?=$product['ref']?> </span>
                              <span class="prop-price"><i class="fa fa-money" aria-hidden="true"></i> <?=$product['price']?> جنية </span>
                              <span class="prop-type"> <?= $product['purpose'] == 1 ? 'للبيع' : 'للإيجار'; ?></span>
                          </div>

                          <?php if('' != $product['video']):?>
                          <div class="prop-video">
                              <h4 class="Property-name"> مشاهدة الفيديو </h4>
                              <iframe width="100%" height="315" src="<?= $product['video'] ?>" frameborder="0" allowfullscreen></iframe>
                          </div>
                        <?php endif; ?>

                      </div>

                      <div class="col-sm-5 col-xs-12">
                          <h4 class="Property-name"> تفاصيل العقار </h4>
                          <h5 class="text-muted"><i class="fa fa-cubes" aria-hidden="true"></i> <?= $product['description_ar'] ?> </h5>
                          <table class="table table-bordered table-hover prop-table">
                             <?php if($product['year']): ?>
                             <tr>
                                 <th> - أضيف في</th>
                                 <td><?= $product['year'] ?></td>
                             </tr>
                           <?php endif; if(!empty($product['amenities'])): ?>
                              <tr>
                                  <th>- الكماليات</th>
                                  <td>
                                    <?php foreach ($product['amenities'] as $a) {
                                      echo $a . " - ";
                                    }?>
                                  </td>
                              </tr>
                            <?php endif; if($product['area']): ?> 
                              <tr>
                                  <th>- المساحة</th>
                                  <td><?= $product['area'] ?> م</td>
                              </tr>
                            <?php endif; if($product['rooms']): ?>
                              <tr>
                                  <th>- عدد الغرف</th>
                                  <td><?= $product['rooms'] ?></td>
                              </tr>
                            <?php endif; if($product['baths']): ?>
                              <tr>
                                  <th>- عدد الحمامات</th>
                                  <td><?= $product['baths'] ?></td>
                              </tr>
                            <?php endif; if($product['floor']): ?>
                              <tr>
                                  <th>- الطوابق</th>
                                  <td><?= $product['floor'] ?></td>
                              </tr>
                            <?php endif; if($product['rate']): ?>
                              <tr>
                                  <th>- التقييم </th>
                                  <td>
                                      <ul class="nav prop-rate">
                                          <?php for ($i = 1; $i <= $product['rate']; $i++): ?>
                                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                          <?php endfor; ?>
                                      </ul>
                                  </td>
                              </tr>
                            <?php endif; if('' != $product['cat_title']):?>
                              <tr>
                                  <th>- القسم </th>
                                  <td><a href=""><?= $product['cat_title'] ?> </a></td>
                              </tr>
                            <?php endif; ?>
                          </table>

                          <div class="social-tab">
                              <!--
                              <a class="btn btn-dark" href="<?= base_url('ar/add-to-wishlist/'.$product['id'].'/'.$product['title_ar']) ?>">
                                  <i class="fa fa-heart" aria-hidden="true"></i> إضافة إلي قائمة الامنيات
                              </a>
                              -->

                              <a class="btn btn-dark" href="<?= base_url('ar/add-to-compare/'.$product['id'].'/'.$product['title_ar']) ?>"><i class="fa fa-exchange" aria-hidden="true"></i> أضف للمقارنه</a>

                              <a class="btn btn-dark" href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url('ar/properties/'.$product['id'].'/'.$product['title_ar'])?>"><i class="fa fa-facebook" aria-hidden="true"></i> </a>

                              <a class="btn btn-dark" 
                                  href="https://twitter.com/home?status=<?=base_url('ar/properties/'.$product['id'].'/'.$product['title_ar'])?>"><i class="fa fa-twitter" aria-hidden="true"></i> </a>

                              <a class="btn btn-dark" 
                                 href="https://plus.google.com/share?url=<?=base_url('ar/properties/'.$product['id'].'/'.$product['title_ar'])?>">
                                <i class="fa fa-google-plus" aria-hidden="true"></i> </a>
                          </div>
                      </div>

                      <div class="col-xs-12"><hr/>
                          <h4 class="Property-name"> أيضا يمكنك مشاهدة</h4>

                              <div id="gallery" class="owl-carousel" dir="ltr">
                                <?php foreach($other_products as $product): ?>
                                    <div>
                                        <?php if($product['soled']): ?>
                                          <img src="<?= assets('images/sold_icon.png') ?>" alt="" title="" class="sold_icon">
                                        <?php endif; ?>
                                        <a href="<?= base_url('ar/properties/'.$product['id'].'/'.$product['title_ar'])?>">
                                            <img src="<?= base_url($product['images'][0]) ?>" alt="<?= $product['title_ar'] ?>" 
                                                 title="<?= $product['title_ar'] ?>" class="img-thumbnail"/>
                                        </a>
                                        <div class="gallery-caption">
                                             <h4>
                                                <a href="<?= base_url('ar/properties/'.$product['id'].'/'.$product['title_ar'])?>">
                                                  <?= $product['title_ar'] ?>
                                                </a>
                                              </h4>
                                              <p>
                                                  <?= (($product['purpose'] == 1)? "للبيع" : "للإيجار") ?>  <br>
                                                  <?= $product['address_ar'] ?>
                                              </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                        </div>
                      </div>
                  </div>
              </div>
         </section>
    <!-- end Content Section -->
    <script src="<?= assets('vendor/flexslider/jquery.flexslider-min.js') ?>"></script>
    <script type="text/javascript">

        $(window).load(function () {
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                itemWidth: 100,
                itemMargin: 3,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                sync: "#carousel",

            });
        });
    </script>

<?php elseif ($pageIndex == 2): ?>
    
     <!-- Start Content Section -->
         <section id="content-section">

              <div class="container">

                  <div class="row contact-page">
                      <div class="col-xs-12">
                           <h4 class="Property-name"> العقارات </h4>
                           <ul class="nav listing-prop">
                           <?php foreach ($data['projects'] as $key => $p) : ?>
                               <li class="col-md-4 col-sm-6 col-xs-12">
                                   <div class="thumbnail">
                                       <div class="image-block">
                                            <img src="<?= base_url($p->img) ?>" alt="<?= $p->title_ar ?>" title="<?= $p->title_ar ?>" >
                                        </div>
                                       <div class="prop-option">
                                           <ul class="nav">
                                               <li><i class="fa fa-arrows" aria-hidden="true"></i> <?= $p->area ?> م</li>
                                               <li><i class="fa fa-bed" aria-hidden="true"></i> <?= $p->rooms ?></li>
                                               <li><i class="fa fa-bath" aria-hidden="true"></i> <?= $p->baths ?></li>
                                           </ul>
                                       </div>
                                       <div class="caption">
                                           <h4 class="text-blue">
                                               <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title_ar)) ?>">
                                                  <?= $p->title_ar ?> 
                                               </a>
                                            </h4>
                                           <p class="text-muted">
                                               <?= word_limiter(strip_tags($p->description_ar), 15) ?>
                                           </p>
                                           <h4 class="text-right text-blue"><?= $p->price ?> جنية</h4>
                                           <a href="<?= base_url('ar/properties/' . $p->id . '/' . str_replace(' ', '-', $p->title_ar)) ?>" 
                                              class="btn btn-block btn-dark"> عرض المزيد <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                           </a>
                                       </div>
                                   </div>
                               </li>
                           <?php endforeach; ?>
                           </ul>
                          <Div class="text-center">
                              <nav aria-label="Page navigation">
                                  <?= $data['links'] ?>
                              </nav>
                          </Div>
                      </div>
                  </div>
              </div>
         </section>
      <!-- end Content Section -->


<?php endif; ?>
