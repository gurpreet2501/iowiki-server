<div class="row">
 <div class="col-xs-12">
    <?php $quantity_error = lako::get('flash')->get('p_quant');
     if(!is_null($quantity_error)):?>
      <div class="alert alert-danger" role="alert"><p><?=htmlentities($quantity_error);?></p></div>
    <?endif;?> 

    <?php $book_success = lako::get('flash')->get('booking_success');
      if(!is_null($book_success)):?>
      <div class="alert alert-success" role="alert"><p><?=htmlentities($book_success);?></p></div>
    <?endif;?> 
 </div>
</div>
<? if(!count($data)): ?>
  <h1 class='text-center'><small>Sorry no Products to show ;( </small></h1>
<? endif; ?>
  <?php 
    $form_act = site_url('order_session/');

    if($this->tank_auth->is_logged_in())
      $form_act = site_url('cart/complete');
  ?>
<div class="home_page_products">  
  <form method="post" action="<?=$form_act?>" class='items-form'>
    <table class="table table-hover products-table">
     <thead>
      <tr class="success">
        <th></th>
        <th>Product Name</th>
        <th>Price / Item</th>
        <th>Quantity</th>
        <th>Sub Total</th>
      </tr>
    </thead>
  <tbody>
      <?php foreach($data as $key => $value): ?>
          <tr class="back_orange">
            <input type='hidden' class='product_id' value="<?=av($value['id'])?>"/>
            <td class="col-xs-1">
              <? if($value['image']): ?>
                    <img class="live_support pop_up_open_btn btn-lg" data-toggle="modal" data-target="#myModal-khanna-<?=$key?>" src="<?=base_url('/images/processing.gif')?>"  class="img-thumbnail img-fit-container" alt="" data-echo="<?=base_url('/timthumb.php?src=')?><?=base_url('assets/uploads/files/'.$value['image'].'&w=50&h=50')?>" /> 
                  <? else: ?>                    
                    <img src="<?=base_url('/assets/images/no-image.png')?>" class="" alt="">
                  <? endif; ?>
            </td>
             <td class="col-xs-3"> 
              <h5 class="text-center p_name">
                <strong><?=t($value['product_name'])?>
                (<?=t($value['weight'])?> <?=t($value['weight_unit'])?>)</strong>
              </h5>
               <div class="product_image_home">                 
                   <div class="modal fade" id="myModal-khanna-<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <!-- Modal cross button -->
                          </div>
                          <div class="modal-body text-center">
                            <!-- html contact form  -->
                          <img class="img-fit-container" src="<?=base_url('assets/uploads/files/'.$value['image'])?>" />
                          <!-- html contact form  -->
                          </div>
                        </div>
                      </div>
                    </div>    <!-- modal  --> 
               </div> 
             </td>
             <td>
             	  Rs. <span class="pprice-<?=$value['id']?>"><?=t(current_user_price($value))?></span>
                <hr />
                <? if($show_stock): ?>
                  <strong class="stock-<?=$value['id']?>"><?=t($value['stock'])?></strong> 
                  <?=t($stock_text)?>
                <? endif; ?>
                
                <input type='hidden' name='products[<?=$value['id']?>][stock]' class='stock' value="<?=av($value['stock'])?>" />
                <input type='hidden' name='products[<?=$value['id']?>][price]' value="<?=av(current_user_price($value))?>" />
             </td>

             <td width="25%">
              <? if(!isset($disable_buy) || !$disable_buy):  ?>
             		<div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-default btn-minus" type="button">-</button>
                  </span>
                  <input type="text" class="form-control quantity product_quant" type="text" value="0" data-id="<?=$value['id']?>" name="products[<?=$value['id']?>][qty]" />
                  <span class="input-group-btn">
                    <button class="btn btn-default btn-plus" type="button">+</button>
                  </span>
                </div>
             		<div class="error_msg error_id-<?=$value['id']?>">Please enter a valid input..</div>
              <? endif; ?>
             </td>

            <td>
              <div class="calculations"></div>
              <div class="subtotal"><span class="amount"></span></div>
            </td>
          </tr>  

     <?php endforeach; ?>  
      </tbody> 
      
  </table>

    
    <? if(isset($source)): ?>
      <input type="hidden" name='source' value="<?=$source?>" />
    <? endif; ?>
    
    <? if(isset($booking_id)): ?>
      <input type="hidden" name='booking_id' value="<?=$booking_id?>" />
    <? endif; ?>
    
    
    
    <div class="modal fade" id='remarks_model'>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Remarks</h4>
          </div>
          <div class="modal-body">
            <textarea name="remarks" class='form-control' placeholder='Please type any additional requests or remarks regarding this order...'></textarea>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Place my Order" />
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    <div class='stick-wrap'>
      <div id="stick">
        <div class='text-center'>
          <strong>Total: Rs <span class='order_total'>0.00</span></strong>
          <? if($allow_booking): ?>
            <input id="order-book" type="submit" name="__book"  class="btn btn-danger" value="Book Order" />
          <? endif; ?>
        
          <? if(!isset($disable_buy) || !$disable_buy):  ?>
            <input type="button" class="btn btn-primary" data-toggle="modal" 
                   data-target="#remarks_model" value='Place Order' />
          <? endif; ?>
        </div>
      </div>
    </div>
    
  </form>   
 </div> 
 <br />
