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
            <h2 class="title text-center">Order History</h2>
            <table class='table table-striped table-hover'>
              <thead>
                <tr class="success">
                  <th>#</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Booking</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              <? foreach($orders as $order): ?>
                <tr>
                  <td><strong>#<?=$order['id']?></strong></td>
                  <td><?=$order['status']?></td>
                  <td><?=date1($order['date'])?></td>
                  <td>
                    <? if($order['booking_id']): ?>
                      <a href='<?=site_url("booking/{$order['booking_id']}")?>'>
                        #<?=$order['booking_id']?>
                      </a>
                    <? else: ?>
                      -
                    <? endif; ?>
                  </td>
                  <td><a href='<?=site_url("user/view/{$order['id']}")?>'>Details</a></td>
                </tr>
              <? endforeach; ?>
              </tbody>
            </table>
            
            
            
            
            
          </div>
				</div>
      </div>
		</div>
	</section>

	<?php $this->load->view('partials/footer'); ?>
</body>

</html>