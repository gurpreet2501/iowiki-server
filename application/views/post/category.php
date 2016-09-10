<?php $this->load->view('partials/header'); ?>

<?php if (!$results): ?>

<div class="row">

	<div class="col-md-12">

		<div class="no-result-found text-center">

          	<h1>No Results found !</h1>

		</div>

	</div>

</div>

<?php else: ?>

	<div class="row">

		<div class="col-md-9">

			<div class="title">

				 Category Results: <?=$total_results?> posts found under category <span class="cat-name"><?=$category_name?> </span>

			</div>

		    <div class="search-results">

				<?php foreach($results as $key => $data):

				    $featured_image =   $data['featured_image'];

				    if(!$featured_image)

				    	$featured_image = 'iowiki-empty.png';

				?>	

					<div class="search-rows">

						<div class="row">

							<div class="col-md-1">

								<span class="glyphicon glyphicon-hand-right"></span>

							</div>

							<div class="col-md-2">

								<div class="featured-image">

									<img src="<?=base_url()?>/timthumb.php?src=<?=base_url('assets/uploads/files/'.$featured_image)?>&amp;h=300&amp;w=300" class="img-fit-container img-thumbnail img-circle" />

								</div>

							</div>

							<div class="col-md-9">

								<div class="post-name">

									<a target="_BLANK" href="<?=site_url('post/'.seo_url($data['post_name']))?>">

										<?=$data['post_name']?>

									</a>	

								</div>	

							</div>

						</div> <!-- row -->

					</div>	

		 		<?php endforeach;?>

			</div>
				<div class="pagination clearfix">

		         		<div class="previous-btn">

		         			<?php

		         			if($pagination['previous']):?>

		         				<a href="<?=site_url('category/'.$cat_id.'/?page_no='.$pagination['previous'])?>">

		         					<button class="btn btn-warning" type="button">Previous</button>

		         				</a>

		         			<?php endif;?>	

		         		</div>
		         		<div class="next-btn">

		         			<?php 

		         			if($pagination['next']):?>

		         				<a href="<?=site_url('category/'.$cat_id.'/?page_no='.$pagination['next'])?>">

		         					<button class="btn btn-warning" type="button">NEXT</button>

		         				</a>

		         			<?php endif;?>

		         		</div>

		         	</div>


		</div> <!-- col-md-9 -->

		<div class="col-md-3">

		</div>

	</div>

<?php endif; ?>	

<?php $this->load->view('partials/footer');?>