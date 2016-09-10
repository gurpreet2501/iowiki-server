   
<h2 class="title text-center">Product Detail</h2>
<div class="row">
  <div class="col-sm-4">
    <? if($prod_details['image']): ?>
      <img src="<?=base_url('assets/uploads/files/'.$prod_details['image'])?>" class="img-fit-container img-thumbnail main_image" />
    <? else: ?>
      <img src="<?=base_url('assets/images/no-image.png')?>" class="img-fit-container img-thumbnail main_image" />
    <? endif; ?>
    <h4 class="text-center">
      
    </h4>
  </div>
  <div class="col-sm-8">
    <h2><?=$prod_details['product_name']?></h2>
    <h3>Rs.<span class='price-display'></span></h3>
    <form action='<?=site_url('cart/add')?>' method='post'>
    <div class="row">
      <div class="col-xs-3">
        <label>Package</label>
        <select class='price-selector' name='price'>
        <? foreach($prod_details['prices'] as $price):?>
          <option data-price="<?=htmlspecialchars($price['price'])?>" 
                  value='<?=htmlspecialchars($price['id'])?>'>
            <?=htmlentities($price['package'])?>
          </option>
        <? endforeach;?>
        </select>
      </div>
      
      <div  class="col-xs-3">
        <!-- <label>Quantity</label> -->
        <!-- <input type='number' name='qty' value="1" class='form-control' />   -->
      </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
      <div  class="col-md-6">
        <!-- <button type="submit" class="btn btn-danger cart_btn">Add To Cart</button> -->
      </div>
    </div>
    </form>
    
    
  </div>
  <div class="col-md-12">
    <table class="table table-striped">
    <tbody> <?/*
      <tr>
       <td>SKU</td>    
       <td><?=htmlentities($prod_details['sku'])?></td>    
      </tr>*/?>
      <tr>
       <td>Description</td>    
       <td><?=$prod_details['description']?></td>    
      </tr>
    </tbody>
    </table>
  </div>
  
</div>

