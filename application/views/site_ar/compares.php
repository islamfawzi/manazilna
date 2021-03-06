<div class="containter">

  <?php foreach ($products as $key => $product): ?>
    <div class="col-md-4 col-sm-5 col-xs-12" style="border-right: 1px solid #426990;margin-bottom: 15px;">
        <h4 class="Property-name"> <?= $product['title_ar'] ?> </h4>
        <h5 class="text-muted"><i style="float: left;" class="fa fa-cubes" aria-hidden="true"></i><?= $product['description_ar'] ?></h5>
        <hr />
        <table class="table table-bordered table-hover prop-table">
          <?php if('' != $product['year']):?>
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
          <?php endif; if('' != $product['area']):?>
            <tr>
                <th>- المساحة</th>
                <td><?= $product['area'] ?></td>
            </tr>
          <?php endif; if('' != $product['rooms']):?>
            <tr>
                <th>- عدد الغرف</th>
                <td><?= $product['rooms'] ?></td>
            </tr>
            <?php endif; if('' != $product['baths']):?>
            <tr>
                <th>- عدد الحمامات</th>
                <td><?= $product['baths'] ?></td>
            </tr>
            <?php endif; if('' != $product['floor']):?>
            <tr>
                <th>- الطوابق</th>
                <td><?= $product['floor'] ?></td>
            </tr>
            <?php endif; if($product['rate']):?>
            <tr>
                <th>- التقييم</th>
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
    </div>
  <?php endforeach?>

</div>
<div class="clearfix"></div>

<div class="container" style="margin-bottom: 20px;">
  <form action="<?= base_url('ar') ?>" method="post">
    <button type="submit" name="clear_somparelist_submit" value="1" class="btn btn-primary pull-right" >مسح قائمة المقارنة</a>
  </form>
</div>
