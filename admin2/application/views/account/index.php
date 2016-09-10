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
            <h2 class="title text-center">Account</h2>
            <div class="row">
              <div class="col-md-offset-3 col-md-5">
                <form method="post">
                  <? foreach($user as $key => $val): ?>
                  <div class="form-group">
                    <label for="<?=htmlspecialchars($key)?>">
                      <?=htmlentities(ucwords(str_replace('_',' ',$key)))?>
                    </label>
                    <? if(strstr($key,'address')): ?>
                      <textarea name="<?=htmlspecialchars($key)?>" class="form-control" id="<?=htmlspecialchars($key)?>" ><?=htmlspecialchars($val)?></textarea>
                    <? else: ?>
                      <input name="<?=htmlspecialchars($key)?>" class="form-control" id="<?=htmlspecialchars($key)?>" value="<?=htmlspecialchars($val)?>">
                    <? endif; ?>
                  </div>
                  <? endforeach; ?>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type='password' class="form-control" id="password" value="^__MARF35_^" />
                  </div>
                  
                  <div class="form-group">
                    
                    <input name="_save_accnt" type='submit' class="btn btn-lg btn-success btn-block" value="Update" />
                  </div>
                </form>
              </div>
            </div>
          </div>
				</div>
      </div>
		</div>
	</section>

	<?php $this->load->view('partials/footer'); ?>
</body>

</html>