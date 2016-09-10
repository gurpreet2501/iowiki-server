<?php $this->load->view('partials/header');?>
 <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<?php $this->load->view('partials/categories') ?>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
            <?php $this->load->view('category/get-items',array(
               'data'  				=>   $data,
               'get_cat_flag' =>    1
            )); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<? $this->load->view('partials/footer'); ?>