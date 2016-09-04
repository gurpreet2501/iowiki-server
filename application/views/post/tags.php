<?php $this->load->view('partials/header'); ?>

<?php if (!$results): echo "<pre>";
print_r($results);
exit; ?>

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

				 Tagged Posts: <?=$total_results?> posts found under tag <span class="cat-name"><?=$tag_name?> </span>

			</div>

		    <div class="search-results">

				<?php foreach($results as $key => $data):

				    $featured_image =   $data['featured_image'];

				    if(!$featured_image)

				    	$featured_image = 'demo.png';

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



		</div> <!-- col-md-9 -->

		<div class="col-md-3">

		</div>

	</div>

<?php endif; ?>	

<?php $this->load->view('partials/footer');?>