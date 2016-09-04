<?php $this->load->view('partials/header');?>
<div class="row">
    <div class="col-md-9">
        <div class="title">
            <?=$data['page_name']?>
         </div>
         <div class="title-separator"></div>
         <div class="description">
         <?php if(!empty($data['page_image'])):?>
                 <img src="<?=base_url()?>/timthumb.php?src=<?=base_url('assets/uploads/files/'.$data['page_image'])?>&amp;w=400&amp;h=250" align="left" class="page-desc-image " />
              <?php endif; ?>    

             <?=$data['description']?>
         </div>
    </div>

    <div class="col-md-3">
        <div class="sidebar">
            <?php $this->load->view('partials/sidebar_left');?>
            <hr/>
            <?php $this->load->view('partials/sidebar_right');?>
        </div>    
    </div>
</div>
<div class="sp-40"></div>
<?php $this->load->view('partials/footer');?>
