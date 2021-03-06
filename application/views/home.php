<?php $this->load->view('partials/header');  ?>
    <div class="row">
        <div class="col-md-9">
               <?php foreach ($posts as $key => $value):
                    $seo_friendly_post_name = seo_url(htmlentities($value['post_name']));
                    $featured_img = htmlentities($value['featured_image']);
                    $post_name = htmlentities($value['post_name']);
         ?><div class="single-post-iowiki">
            <div class="row"> <!-- Single post row -->
                <div class="col-md-4">
                     <?php if(!empty($value['featured_image'])):?>
                        <img alt="<?=$seo_friendly_post_name?>" src="<?=base_url('assets/uploads/files/'.$featured_img)?>" class="img-thumbnail img-fit-container" align="left"/>
                         <?php else: ?>
                            <img alt="<?=$seo_friendly_post_name?>" src="<?=base_url('assets/uploads/files/iowiki-empty.png')?>" class="img-circle img-fit-container" align="left"/>
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
        <div class="col-md-3">
            <div class="row">
                <div class="middle-block">  
                    <?php $this->load->view('partials/sidebar_left');?>
                    <br/>
                    <?php $this->load->view('partials/sidebar_right');?>    
                    </div>
                </div>   <!-- middle block -->
            </div>    
            <hr/>
        </div>        
    </div>
<?php $this->load->view('partials/footer');?>