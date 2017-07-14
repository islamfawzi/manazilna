<ul class="nav newest-properties">
    <?php foreach ($projects as $k => $p): ?>
        <li class="col-md-4 col-sm-6 col-xs-12">
            <div class="newest-img-block">
                <img src="<?= base_url($p->img) ?>" alt="" title="" class="img-responsive"/>

                <!--<?php if ($p->purpose != ''): ?><span class="prop-lease"><?= $p->purpose == 1 ? 'للبيع' : 'للإيجار'; ?></span><?php endif; ?>-->
                <span class="prop-lease"><?= $p->title_ar.' '.$p->price?>  جنية</span>
                <?php if ($p->feature == 1): ?><span class="prop-feature">مميز</span><?php endif; ?>
                <?php if ($p->soled == 1): ?><span class="prop-sold">تم بيعة</span><?php endif; ?>

                <a href="<?= base_url('ar/properties/' . $p->id . '/' . str_replace(' ', '-', $p->title_ar)) ?>" class="read-more">
                    <i class="fa fa-link" aria-hidden="true"></i>
                </a>
            </div>

            <div class="prop-option">
                <ul class="nav">
                    <li><i class="fa fa-arrows" aria-hidden="true"></i> <?= $p->area ?> م</li>
                    <li><i class="fa fa-bed" aria-hidden="true"></i> <?= $p->rooms ?></li>
                    <li><i class="fa fa-bath" aria-hidden="true"></i> <?= $p->baths ?></li>
                </ul>
            </div>

            <!--<a href="<?= base_url('ar/properties/' . $p->id . '/' . str_replace(' ', '-', $p->title_ar)) ?>">
                <?= word_limiter($p->title_ar, 1) ?>
                <span class="pull-right">
                    <?= $p->price ?> جنية
                </span>
            </a>-->

            <a href="<?= base_url('ar/properties/' . $p->id . '/' . str_replace(' ', '-', $p->title_ar)) ?>">
                <?= $p->purpose == 1 ? 'للبيع' : 'للإيجار'; ?>
                <span class="pull-right">
                    <?php if ($p->feature == 1): ?>مميز<?php endif; ?>
                </span>
            </a>
            <p>
                <?= $p->address_ar ?>
            </p>
        </li>
    <?php endforeach; ?>
</ul>
<div class="text-center">
    <nav aria-label="Page navigation">
        <?= $links ?>
    </nav>
</div>
