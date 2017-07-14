<!-- Start Content Section -->
 <section id="content-section">

      <div class="container">

          <div class="row contact-page">
              <div class="col-xs-12">
                   <h4 class="Property-name"> <?= $news['title_en'] ?> </h4>
                  <img src="<?= base_url($news['img']) ?>" alt="<?= $news['title_en'] ?>" title="<?= $news['title_en'] ?>" class="img-responsive">

              </div>

              <div class="col-xs-12">
                   <p class="page-desc">
                       <?= $news['content_en'] ?>
                   </p>
              </div>
          </div>
      </div>
 </section>
<!-- end Content Section -->
