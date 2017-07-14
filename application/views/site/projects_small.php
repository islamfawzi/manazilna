<ul class="nav newest-properties">
    <?php foreach ($projects as $k => $p): ?>
        <li class="col-md-4 col-sm-6 col-xs-12">
            <div class="newest-img-block">
                <img src="<?= base_url($p->img) ?>" alt="" title="" class="img-responsive"/>

                <!--<?php if ($p->purpose != ''): ?>
                  <span class="prop-lease">
                    For <?= $p->purpose == 1 ? 'Sale' : 'Rent'; ?>
                  </span>
                <?php endif; ?>-->
                <span class="prop-lease"><?= $p->title.' '.$p->price ?> L.E</span>
                <?php if ($p->feature == 1): ?><span class="prop-feature">Featured</span><?php endif; ?>
                <?php if ($p->soled == 1): ?><span class="prop-sold">SOLD</span><?php endif; ?>

                <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>" class="read-more">
                    <i class="fa fa-link" aria-hidden="true"></i>
                </a>
            </div>

            <div class="prop-option">
                <ul class="nav">
                    <li><i class="fa fa-arrows" aria-hidden="true"></i> <?= $p->area ?> m</li>
                    <li><i class="fa fa-bed" aria-hidden="true"></i> <?= $p->rooms ?></li>
                    <li><i class="fa fa-bath" aria-hidden="true"></i> <?= $p->baths ?></li>
                </ul>
            </div>

            <!--<a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>">
                <?= word_limiter($p->title, 1) ?>
                <span class="pull-right">
                    <?= $p->price ?> L.E
                </span>
            </a>-->
            <a href="<?= base_url('properties/' . $p->id . '/' . str_replace(' ', '-', $p->title)) ?>">
                For <?= $p->purpose == 1 ? 'Sale' : 'Rent'; ?>
                <span class="pull-right">
                    <?php if ($p->feature == 1): ?>Featured<?php endif; ?>
                </span>
            </a>
            <p>
                <?= $p->address ?>
            </p>
        </li>
    <?php endforeach; ?>
</ul>
<div class="text-center">
    <nav aria-label="Page navigation">
        <?= $links ?>
    </nav>
</div>
