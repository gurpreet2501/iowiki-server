<?php $this->load->view('partials/header'); ?>
    <div class="row">
        <div class="col-md-6">
               <?php foreach ($posts as $key => $value):
                    $seo_friendly_post_name = seo_url(htmlentities($value['post_name']));
                    $featured_img = htmlentities($value['featured_image']);
                    $post_name = htmlentities($value['post_name']);
         ?><div class="single-post-iowiki">
            <div class="row"> <!-- Single post row -->
                <div class="col-md-4">
                     <?php if(!empty($value['featured_image'])):?>
                        <img alt="<?=$seo_friendly_post_name?>" src="<?=base_url()?>/timthumb.php?src=<?=base_url('assets/uploads/files/'.$featured_img)?>&amp;h=150&amp;w=150" class="img-thumbnail img-padd" align="left"/>
                         <?php endif;?> 
                </div>
                <div class="col-md-8">
                    <div class="post-title">
                        <a href="<?=site_url('post/'.$seo_friendly_post_name)?>">
                            <?=$value['post_name']?>  
                        </a>    
                    </div>  
                    <div class='post-desc'> 
                         <?=the_excert($value['post_description']);?>

                        <div class="read-more-button">
                            <a href="<?=site_url('post/'.seo_url($post_name))?>">
                                <button type="button" class="btn btn-info pull-right">Read More</button>
                            </a>
                        </div>  
                    </div> <!-- post-desc -->
                   <!-- Single post -->
                </div> <!-- col-md-12 -->
            </div> <!-- row -->
          </div>
            <hr />
        <?php endforeach;?>
        <?php $this->load->view('partials/pagination.php'); ?>
     <!-- row -->
        </div> <!-- left block --> <!-- col-md-6 -->
        <div class="col-md-6">
            <div class="row">
                <div class="middle-block">  
                    <div class="col-md-6">
                    <?php $this->load->view('partials/sidebar_left');?>
                    </div>
                </div>   <!-- middle block -->
                <div class="right-block">   
                    <div class="col-md-6">
                    <?php $this->load->view('partials/sidebar_right');?>    
                    </div>
                </div>   <!-- right block -->
            </div>    
            <hr/>
            <div class="row">
                <div class="col-md-12">
                <?php $this->load->view('partials/tech_events');?>
                </div>
            </div>    
        </div>        
    </div>
<?php $this->load->view('partials/footer');?>