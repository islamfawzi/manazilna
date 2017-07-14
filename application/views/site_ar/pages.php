<!-- Start Content Section -->
 <section id="content-section">
      <div class="container">
          <div class="row contact-page">
              <div class="col-xs-12">
                   <h4 class="Property-name"> <?= $news['title'] ?> </h4>
                  <img src="<?= base_url( $news['img'] ) ?>" alt="<?= $news['title'] ?>" title="<?= $news['title'] ?>" class="img-responsive">
              </div>
              <div class="col-xs-12">
                   <p class="page-desc">
                      <?= $news['content'] ?>
                   </p>
              </div>
          </div>
      </div>
 </section>
<!-- end Content Section -->