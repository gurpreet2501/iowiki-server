<?php $this->load->view('partials/header'); ?>

<div class="row">

	<div class="col-md-9">
  <div class="single-post-iowiki">			
		<div class="title">
		<?php  $seo_friendly_post_name = seo_url(htmlentities($single_post['post_name'])); ?>
			<?=$single_post['post_name']?>
		</div>	
		<div class="fb-share-button" data-href="<?=site_url('post/'.$seo_friendly_post_name)?>" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=site_url('post/'.$seo_friendly_post_name)?>&amp;src=sdkpreparse"></a></div>

		<div class="post-content">

			<?php if(!empty($single_post['featured_image'])):?>

			<div class="featured-image">

			   <a class="fancybox" href="<?=base_url('assets/uploads/files/'.$single_post['featured_image'])?>">
			   		<img alt="<?=seo_url($single_post['post_name'])?>" src="<?=base_url()?>/timthumb.php?src=<?=base_url('assets/uploads/files/'.$single_post['featured_image'])?>&amp;h=200&amp;w=300" class="img-thumbnail img-fit-container" />	
			   	</a>	

			</div>

			 <?php endif;?>  

			<?=$single_post['post_description']?>

			<div class="post-tags">

				<span class="tag-label">Tags:</span>

				<?php  foreach ($single_post['dggsjm_tags'] as $key => $value): 

					 	echo "<a href=".site_url('/tag/'.seo_url($value['tag_name']))."><span class='label label-default'>".$value['tag_name']."</span></a>";

					endforeach;

				 ?>

			</div>

		</div>

		<div class="row">

			<div class="col-md-12">

				<hr/>

				<div class="comments-box">

					<div class="reviews">Reviews and Queries:</div>

					<form method="post" action="<?=site_url('comments/index')?>"> 

					  <div class="form-group">

					    <label for="email">Your Name:</label>

					    <input type="text" class="form-control" required name="name">

					  </div>

					  <div class="form-group">

					    <label for="email">Email address:</label>

					    <input type="email" class="form-control" required name="user_email">

					  </div>

					  <div class="form-group">

					    <label for="pwd">Your Comment:</label>

					    <textarea rows="5" cols="10" class="form-control" required name="comments"></textarea>

					  </div>

					  <div class="form-group">

					    <input type="hidden" class="form-control" required name="post_slug" value="<?=seo_url($single_post['post_name'])?>">

					  </div>

					  <div class="form-group">

					    <input type="hidden" class="form-control" required name="created_at" value="<?=date('Y-m-d H:i:s')?>">

					  </div>

					  <div class="form-group">

					    <input type="hidden" class="form-control" required name="post_url" value="<?=current_url()?>">

					  </div>

					  <?php  echo recaptcha_get_html('6LeloRcTAAAAAOUhxpnJv28ztPv2om2P3HO-PnBd'); ?>
					  <hr/>
					  <button type="submit" class="btn btn-default">Post Comment</button>

					</form>

				</div>

			</div>	

		</div>		
		<hr/>
		<div class="user-comments">

		<?php foreach($comments as $key => $value): ?>	

			<div class="row">

				<div class="col-md-2 text-center">

					<img src="<?=base_url('img/avatar.png')?>" class="img-fit-container img-circle" />

				</div>

				<div class="col-md-5">

					<div class="name">

						<span><?=$value['name']?></span> says on 

						<span class="comment-date"><?=date("d M, Y h:i:s a", strtotime($value['created_at']))?></span>

					</div>

					<div class="comment">

						<p>"<?=$value['comments']?>"</p>

					</div>

				</div>

			</div>

			<hr/>

		<?php endforeach;?>	

		</div>
	 </div>		
	</div>

	<div class="col-md-3">

		<?php $this->load->view('partials/sidebar_left');?>

		<hr/>

		<?php $this->load->view('partials/sidebar_right');?>

	</div>

</div>

<?php $this->load->view('partials/footer');?>