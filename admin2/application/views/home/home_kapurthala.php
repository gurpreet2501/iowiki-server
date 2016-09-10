<?php $this->load->view('partials/header'); ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="left-sidebar">
						<?php $this->load->view('partials/bookings') ?>
					</div>
				</div>
				<div class="col-sm-10">
					<div class="features_items"><!--features_items-->
            <h2 class="title text-center">Products</h2>
            <?php
             $this->load->view('partials/items-grid-kapurthala',array( 'data' => $data,
                                                            'allow_booking' =>  $allow_booking,
                                                            'source'        =>  'main')); ?>
          </div>
				</div>
      </div>
		</div>
	</section>

	<?php $this->load->view('partials/footer'); ?>
</body>

</html>