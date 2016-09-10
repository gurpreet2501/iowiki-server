<?php $this->load->view('partials/header'); ?>
<hr/>
<div class="container"> 
  <div class="row text-center">
		 <div class="col-xs-12">
        <h1>Cart Contents</h1><hr/>
		 </div>
     
	</div>
	 <div class="row">
 	 	<div class="col-sm-3">
		<div class="left-sidebar">
				<?php $this->load->view('partials/categories') ?>
			</div>
		</div>
	 <div class='col-sm-9'>
 	 <?php if(!empty($cart_data)):?>
 	  	 <table class="table table-striped">
			   <tr>
			   	  <th>Product</th>
			   	  <th>Price</th>
			   	  <th>Qty</th>
			   	  <th>Total</th>
			   	  <th>&nbsp;</th>
			   </tr>
			   <tr>
          <?php foreach($cart_data['products'] as $key => $item):?>
            <tr>
              <td>
                <?=htmlentities($item['data']['products']['product_name'])?>
              </td>
              <td>
                <?=htmlentities($item['data']['price'])?>
              </td>
              <td>
                x <?=htmlentities($item['qty'])?>
              </td>
              <td><?=htmlentities($item['subtotal'])?></td>
              <td><a href="<?=site_url('cart/remove/'.$key)?>">Remove</a></td>
            </tr> 
			    <? endforeach;?>
          <tr>
            <th colspan='5' class="text-right">
              Cart Total: <?=htmlentities($cart_data['total'])?>
            </th>
          </tr>
        </table>
	  <? else: ?> 
	    <div class="cart_empty_msg"><h4>No products to Show. <a href="<?=site_url()?>">Continue Shopping</a></h4></div>
	  <? endif; ?> 
 	  </div>
 </div>
	<?php if(!empty($cart_data)): ?>
    <div class="checkout-btn pull-right">	 
      <a href='<?=site_url("cart/complete")?>'>
         <button type="button" class="btn btn-success">Complete Order</button>
      </a>
    </div>	
    <div class="emt-cart-btn pull-right">	 
      <a href='<?=site_url("cart/clear")?>'>
         <button type="button" class="btn btn-danger">Empty Cart</button>
      </a>
    </div>
  <?php endif; ?> 
	</div>
</div> 
<?php  $this->load->view('partials/footer'); ?>