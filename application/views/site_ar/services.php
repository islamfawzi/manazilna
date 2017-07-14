<?php $this->load->view('site/header'); ?>

<?php if ($pageIndex == 1): ?>
<div class="container"> 
    <div class="col-md-12 col-sm-8 ">
        <div class="about-int">
            <div class="title-about"><?=$service['cli_title_en']?></div>
            <div class="row">
                <div class="col-md-5 padding-none">                                        
                    <a class="example-image-link" data-lightbox="<?=$service['cli_title_en']?>" data-title="<?=$service['cli_title_en']?>" href="<?=base_url($service['img'])?>">
                      <img style="width: 100%; height: 300px;" class="img-thumbnail" src="<?=base_url($service['img'])?>" />
                    </a>
                </div>
                <div class="col-md-7">                    
                    <?=$service['content_en']?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php elseif ($pageIndex == 2): ?>
<div class="container"> 
    <div class="row margin-small">
       <?foreach($services as $key => $s):?> 
        <div class="col-md-6">
            <div class="about-int">
                <div class="title-about"><?=$s->cli_title_en?></div>
                <div class="row">
                    <div class="col-sm-4 col-sm-pull-0 pull-right text-center col-xs-pull-2 col-xs-8 ">
                       <a href="<?=base_url('services/'.$s->id.'/'.url_title($s->cli_title_en))?>" class="more"> 
                        <img src="<?=base_url($s->img)?>" style="width: 100%; height: 140px;border-radius: 8px;" class="img-archive img-responsive " alt="<?=$s->cli_title_en?>" />
                        </a>
                    </div>
                    <div class="col-sm-8 col-xs-12 pull-left">
                        <div class="archive-content">
                        <div class="msg">
                            <?=word_limiter(strip_tags($s->content_en),45)?> 
                        </div>
                        <div> 
                            <a href="<?=base_url('services/'.$s->id.'/'.url_title($s->cli_title_en))?>" class="more"> More</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?endforeach?>         
    </div>
</div>
<div class="text-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?= $links ?>
        </ul>
    </nav>
</div> 
<?php
endif;
$this->load->view('site/footer');
?>