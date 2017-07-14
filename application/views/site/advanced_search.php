  <link href="<?= assets('css/select2.min.css')?>" rel="stylesheet" />
<!-- Start Content Section -->
   <section id="content-section">
        <div class="container">
            <div class="row">

              <div class="row">
                <div class="col-md-6" style="padding-left: 15px;">
                  <h4 class="Property-name"> Advanced Search</h4>
                </div>
                <?php if (auth()): ?>
                <div class="col-md-6" style="padding-top: 15px;">
                  <a class="btn btn-primary pull-right" href="<?= base_url('saved_search') ?>" >Saved Search</a>
                </div>
              <?php endif; ?>
              </div>


                <form class="form-inline" id="avdanced-search" method="post" action="<?= base_url('search') ?>" enctype="multipart/form-data" accept-charset="UTF-8" style="margin-bottom: 10px;" >
                    <!--1nd row -->
                        <div class="row">

                          <div class="form-group col-md-2">
                              <input type="number" name="search[price][from]" placeholder="Price from" class="form-control">
                          </div>
                          <div class="form-group col-md-2">
                              <input type="number" name="search[area][from]" placeholder="Area From (m2)" class="form-control">
                          </div>

                          <div class="form-group col-md-2">
                              <select name="search[baths]" class="form-control">
                                  <option disabled selected value="" >Bathrooms</option>
                                  <?php for($i=1;$i<13;$i++):?>
                                    <option><?=$i?></option>
                                  <?php endfor;?>
                              </select>
                          </div>
                          <div class="form-group col-md-2">
                              <select name="search[rooms]" class="form-control">
                                  <option disabled selected value="" >Bedrooms</option>
                                  <?php for($i=1;$i<13;$i++):?>
                                    <option><?=$i?></option>
                                  <?php endfor;?>
                              </select>
                          </div>

                            <div class="form-group col-md-2">
                                <select name="search[property_type]" class="form-control">
                                      <option disabled selected value="" > Property types</option>
                                    <?php foreach ($_property_types as $p) :?>
                                      <option value="<?= $p->id ?>"><?= $p->title ?></option>
                                    <?php endforeach?>
                                </select>
                            </div>


                            <div class="form-group col-md-2">
                                <select class="form-control">
                                    <option value="Giza">Giza</option>
                                    <option value="Nourth Coast">Nourth Coast</option>
                                    <option value="Ain El Sokhna">Ain El Sokhna</option>
                                </select>
                            </div>

                        </div>
                    <!--/1nd row -->

                    <!-- 2nd row -->
                        <div class="row">
                          <div class="form-group col-md-2">
                              <input type="number" name="search[price][to]" placeholder="Price To" class="form-control">
                          </div>

                          <div class="form-group col-md-2">
                              <input type="number" name="search[area][to]" placeholder="Area To   (m2)" class="form-control">
                          </div>

                          <div class="form-group col-md-2">
                              <select name="search[purpose]" class="form-control">
                                  <option value="1"> For Sale</option>
                                  <option value="0"> For Rent</option>
                              </select>
                          </div>
                          <!--<div class="form-group col-md-2">
                              <select class="form-control">
                                  <option value="New Cairo">New Cairo</option>
                                  <option value="6th of October">6th of October</option>
                              </select>
                          </div>-->
                          <div class="form-group col-md-2">
                              <select name="search[finish_types]" class="form-control">
                                <option disabled selected value="" > Property finish types</option>
                                  <?php foreach ($_finish_types as $f) :?>
                                    <option value="<?= $f->id ?>"><?= $f->title ?></option>
                                  <?php endforeach?>
                              </select>
                          </div>
                          <div class="form-group col-md-2">
                              <select name="search[floor]" class="form-control">
                                <option disabled selected value="" > Level </option>
                                <?php for($i=1;$i<21;$i++):?>
                                  <option><?=$i?></option>
                                <?php endfor;?>
                              </select>
                          </div>

                        </div>
                    <!--/2nd row -->

                    <!--3rd row -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <span class="text-blue col-md-2">
                                  <strong>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> Amenities
                                  </strong>
                                </span>
                                <?php foreach($_amenities as $a):?>
                                  <?php if($a->title): ?>
                                      <div class="checkbox col-md-2">
                                          <label>
                                              <input name="search[amenities][]" type="checkbox" value="<?= $a->id ?>"> <?= $a->title ?>
                                          </label>
                                      </div>
                                  <?php endif; ?>
                              <?php endforeach ?>
                            </div>
                        </div>
                    <!--/3rd row -->
                    <div class="row text-center"> <hr/>
                        <button type="submit" value="1" name="search[submit]" class="btn btn-primary">
                           Find Result <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
   </section>
<!-- end Content Section -->
<?php if(!empty($search_results)): ?>
<section id="Properties" class="container">

  <div class="col-md-12 col-xs-12">
    <?php if (auth()): ?>
    <div style="margin-right: 15px;" class="pull-right"> <hr/>
        <?php if(!isset($saved_before)): ?>
        <a id="save_search_query" query="<?=$search_query?>" result_count="<?= count($search_results) ?>" class="btn btn-primary">
           Save Search <i class="fa fa-save" aria-hidden="true"></i>
        </a>
      <?php else: ?>
        <a class="btn btn-success" disabled>
           Saved <i class="fa fa-save" aria-hidden="true"></i>
        </a>
      <?php endif?>
    </div>

    <script type="text/javascript">
      $("#save_search_query").click(function(){

        var search_query = $(this).attr('query');
        var result_count = $(this).attr('result_count');
        $.ajax({
            type: 'POST',
            url: "<?= base_url('save_search_query') ?>",
            data: {search_query: search_query,
                   result_count: result_count},
            success: function (data) {
              if(data){
                 $("#save_search_query").html('Saved <i class="fa fa-save" aria-hidden="true"></i>');
                 $("#save_search_query").removeClass("btn-primary");
                 $("#save_search_query").addClass("btn-success");
                 $("#save_search_query").attr('disabled', true).css("opacity", 1);
               }
            }
        });
      });
    </script>

  <?php  endif ?>

      <h3 class="text-blue"><img src="<?= assets('images/new-property.png') ?>" alt="Search Results" title="Search Results" width="40px"/> Search Results</h3><hr>
      <ul class="nav newest-properties">

        <?php foreach ($search_results as $k => $p): ?>
         <li class="col-md-4 col-sm-6 col-xs-12">
              <Div class="newest-img-block">
                  <img src="<?= base_url($p->img) ?>" alt="" title="" class="img-responsive"/>
                  <?php if ($p->purpose != ''): ?><span class="prop-lease">For <?= $p->purpose == 1 ? 'Sale' : 'Rent'; ?></span><?php endif; ?>
                  <?php if ($p->feature == 1): ?><span class="prop-feature">Featured</span><?php endif; ?>
                  <?php if ($p->soled == 1): ?><span class="prop-sold">SOLD</span><?php endif; ?>

                  <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>" class="read-more">
                      <i class="fa fa-link" aria-hidden="true"></i>
                  </a>
              </Div>
              <div class="prop-option">
                  <ul class="nav">
                    <li><i class="fa fa-arrows" aria-hidden="true"></i> <?= $p->area ?> m</li>
                    <li><i class="fa fa-bed" aria-hidden="true"></i> <?= $p->rooms ?></li>
                    <li><i class="fa fa-bath" aria-hidden="true"></i> <?= $p->baths ?></li>
                  </ul>
              </div>
              <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>">
                  <?= word_limiter($p->title, 1) ?>
                  <span class="pull-right">
                      <?= $p->price ?> L.E
                  </span>
              </a>
              <p>
                  For <?= $p->purpose == 1 ? 'Sale' : 'Rent'; ?> <br />
                  <?= $p->address ?>
              </p>
          </li>
        <?php endforeach?>
      </ul>
       <Div class="text-center">
          <nav aria-label="Page navigation">
              <ul class="pagination">
          <!--        <li>
                      <a href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                      </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                      <a href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                      </a>
                  </li>
                  -->
              </ul>

          </nav>
      </Div>

  </div>
  <!-- End Right Properties-->
</section>
<?php endif?>
<!-- End feature Properties section-->

<script src="<?= assets('js/select2.min.js') ?>"></script>
<script>
$(document).ready(function (){
  $('select').select2();
});
</script>
