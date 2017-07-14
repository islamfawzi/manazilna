<?php $this->load->view('site/header');?>

<link href="<?=base_url()?>css/inside_css_ar.css" rel="stylesheet"/>
         <div class="container-fluid">
      <div class="row">
        <div class="page">
           <div class="container padding_left">
              <div class="row">
                 <h3 class="color_white">Error 404 </h3>
              </div>
           </div>
         </div>
        </div>
      </div>
   <div class="container gray_background">
   <p><?=$config->close_msg?></p>
   </div> 
   
<?php $this->load->view('site/footer');?>