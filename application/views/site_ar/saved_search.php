<!-- Start Content Section -->
   <section id="content-section">
        <div class="container">
            <div class="row">

              <div class="row">
                  <h4 class="Property-name"> البحث السابق</h4>
              </div>

              <div class="row">
                <div id="avdanced-search">
                  <?php if(isset($deleted)): ?>
                      <?php if($deleted == true): ?>
                        <div class="alert alert-success">
                            <i class="fa fa-check font_big"></i>&nbsp;
                            تم الحذف ..
                        </div>
                      <?php else: ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-remove fa-5 font_big"></i>
                            حدث خطأ برجاء المحاولة لاحقا ..
                        </div>
                      <?php endif?>
                  <?php endif ?>
                  <table class="table table-bordered table-hover">
                    <tr>
                      <th>
                        تاريخ البحث
                      </th>
                      <th>
                        عدد نتائج البحث
                      </th>
                      <?php if(!empty($saved_search)): ?>
                      <th></th>
                      <?php endif ?>
                    </tr>
                    <?php if(!empty($saved_search)): ?>
                        <form method="post">
                            <?php foreach ($saved_search as $key => $search):?>
                            <tr>
                              <td>
                                <?= $search->created_date ?>
                              </td>
                              <td>
                                <?= $search->count ?>
                              </td>
                              <td  align="center">
                                <a target="_blank" class="btn btn-primary" href="<?= base_url('ar/search?/'.$search->search_query) ?>">
                                  عرض
                                </a>
                                <button class="btn btn-danger" type="submit" name="del_saved_search" value="<?= $search->id ?> ">
                                  حذف
                                </button>
                              </td>
                             </tr>
                            <?php endforeach?>
                        </form>
                      <?php else: ?>
                        <tr>
                          <td colspan="3">
                            لا يوجد بحث سابق
                          </td>
                        </tr>
                    <?php endif?>
                  </table>

                </div>
              </div>




        </div>
   </section>
<!-- end Content Section -->
