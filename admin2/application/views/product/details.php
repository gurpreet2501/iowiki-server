<?php $this->load->view('partials/header'); ?>
 <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<?php $this->load->view('partials/categories') ?>
					</div>
				</div>
			 <div class="col-sm-9 padding-right">
	        <?php $this->load->view('product/product_template',array(
             'prod_details'  => $data,
           )); ?>
			 </div>
			</div>
	 	</div>
	 </section>
	
<?php $this->load->view('partials/footer'); ?>
</body>
</html>