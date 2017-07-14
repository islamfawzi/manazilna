<?php if ($pageIndex == 1): ?>
    <link rel="stylesheet" href="<?= assets('vendor/flexslider/flexslider.css') ?>" type="text/css" media="screen" />
    <section id="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12">
                    <h4 class="Property-name"> <?= $product['title'] ?> </h4>
                    <h5 class="text-muted"><i class="fa fa-map-o" aria-hidden="true"></i> <?= $product['address'] ?> </h5>

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
                        <span class="prop-price"><i class="fa fa-money" aria-hidden="true"></i> <?=$product['price']?> EGP </span>
                        <span class="prop-type">For <?= $product['purpose'] == 1 ? 'Sale' : 'Rent'; ?> </span>
                    </div>
                    <?php if('' != $product['video']):?>
                    <div class="prop-video">
                        <h4 class="Property-name"> Property Video </h4>
                        <iframe width="100%" height="315" src="<?= $product['video'] ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                  <?php endif ?>
                </div>

                <div class="col-sm-5 col-xs-12">
                    <h4 class="Property-name">Property Description </h4>
                    <h5 class="text-muted"><i style="float: left;" class="fa fa-cubes" aria-hidden="true"></i><?= $product['description'] ?></h5>
                    <hr />
                    <table class="table table-bordered table-hover prop-table">
                      <?php if($product['year']):?>
                        <tr>
                            <th>- CREATED AT</th>
                            <td><?= $product['year'] ?></td>
                        </tr>
                      <?php endif; if(!empty($product['amenities'])): ?>
                        <tr>
                            <th>- amenities</th>
                            <td>
                              <?php foreach ($product['amenities'] as $a) {
                                echo $a . " - ";
                              }?>
                            </td>
                        </tr>
                      <?php endif; if($product['area']): ?>
                        <tr>
                            <th>- SQUARE FEET</th>
                            <td><?= $product['area'] ?></td>
                        </tr>
                      <?php endif; if($product['rooms']):?>
                        <tr>
                            <th>- ROOMS</th>
                            <td><?= $product['rooms'] ?></td>
                        </tr>
                        <?php endif; if($product['baths']):?>
                        <tr>
                            <th>- BATHROOM</th>
                            <td><?= $product['baths'] ?></td>
                        </tr>
                        <?php endif; if($product['floor']):?>
                        <tr>
                            <th>- FLOORS</th>
                            <td><?= $product['floor'] ?></td>
                        </tr>
                        <?php endif; if($product['rate']):?>
                        <tr>
                            <th>- RATING</th>
                            <td>
                                <ul class="nav prop-rate">
                                    <?php for ($i = 1; $i <= $product['rate']; $i++): ?>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <?php endfor; ?>
                                </ul>
                            </td>
                        </tr>
                        <?php endif; if('' != $product['cat_title_en']):?>
                        <tr>
                            <th>- CATEGORY</th>
                            <td><a href=""><?= $product['cat_title_en'] ?></a></td>
                        </tr>
                        <?php endif; ?>
                    </table>

                    <div class="social-tab">
                        <!--
                        <a class="btn btn-dark" href="<?= base_url('add-to-wishlist/'.$product['id'].'/'.$product['title']) ?>"><i class="fa fa-heart" aria-hidden="true"></i> Add to wishList</a>
                        -->
                        <a class="btn btn-dark" href="<?= base_url('add-to-compare/'.$product['id'].'/'.$product['title']) ?>"><i class="fa fa-exchange" aria-hidden="true"></i> Add to Compare</a>
                        <a class="btn btn-dark"
                           href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url('properties/'.$product['id'].'/'.$product['title'])?>"
                           target="_blank">
                           <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-dark"
                            href="https://twitter.com/home?status=<?=base_url('properties/'.$product['id'].'/'.$product['title'])?>"
                            target="_blank">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-dark"
                           href="https://plus.google.com/share?url=<?=base_url('properties/'.$product['id'].'/'.$product['title'])?>"
                           target="_blanl">
                           <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12"><hr/>
                    <h4 class="Property-name">You May Also Like </h4>

                    <div id="gallery" class="owl-carousel" dir="ltr">
                        <?php foreach($other_products as $product): ?>
                        <div>
                            <a href="<?=base_url('properties/'.$product['id'].'/'.$product['title'])?>">
                                <img src="<?= base_url($product['images'][0]) ?>" alt="<?= $product['title'] ?>" title="<?= $product['title'] ?>" 
                                class="img-thumbnail"/></a>
                            <div class="gallery-caption">
                                <h3>
                                    <a href="<?=base_url('properties/'.$product['id'].'/'.$product['title'])?>">
                                        <?= word_limiter($product['title'], 2) ?>
                                    </a>
                                </h3>
                                <p>
                                    For <?= $product['purpose'] == 1 ? 'Sale' : 'Rent'; ?>  <br>
                                    <?= $product['address'] ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        </div>
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
                    <h4 class="Property-name"> Listing Properties </h4>
                    <ul class="nav listing-prop">
                        <?php foreach ($data['projects'] as $key => $p) : ?>
                            <li class="col-md-4 col-sm-6 col-xs-12">
                                <div class="thumbnail">
                                    <div class="image-block">
                                        <img src="<?= base_url($p->img) ?>" alt="<?= $p->title ?>" title="<?= $p->title ?>" >
                                    </div>
                                    <div class="prop-option">
                                        <ul class="nav">
                                            <li><i class="fa fa-arrows" aria-hidden="true"></i> <?= $p->area ?> m</li>
                                            <li><i class="fa fa-bed" aria-hidden="true"></i> <?= $p->rooms ?> </li>
                                            <li><i class="fa fa-bath" aria-hidden="true"></i> <?= $p->baths ?> </li>
                                        </ul>
                                    </div>
                                    <div class="caption">
                                        <h4 class="text-blue">
                                            <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>"><?= $p->title ?></a>
                                        </h4>
                                        <p class="text-muted">
                                            <?= word_limiter(strip_tags($p->description), 15) ?>
                                        </p>
                                        <h4 class="text-right text-blue"><?= $p->price ?> EGP</h4>
                                        <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>" class="btn btn-block btn-dark">Show More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="text-center">
                        <nav aria-label="Page navigation">
                            <?= $data['links'] ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Content Section -->
<?php endif; ?>
