<div class="row">
  <?php
        
   $lang=site_lang();
   $array = $this->uri->uri_to_assoc(3);
    
   foreach($data['products'] as $all_prod):
     
      $remote_url = 'http://shop.brandoff.co.jp/'.substr($all_prod['link'],3);
      $hash = rawurlencode($this->encrypt->encode($remote_url));
      $product_url = site_lang()
                             .'/product/details/?product='
                             .$hash;
       
  ?>
  <div class="col-sm-4">
    <div class="product-image-wrapper">
      <div class="single-products">
          
          <div class="productinfo text-center">
             <a href="<?=site_url($product_url)?>">
               <img src="<?=image("http://shop.brandoff.co.jp/".trim($all_prod['image'],'.'))?>" alt="" />
             </a> 
            
            <h2 class="price">
            <?php $price=lng_translate($all_prod['prices'][0],site_lang(),'ja');?>
                  <a href="<?=site_url($product_url)?>">
                    <?=calculate_price($price);?>
                  </a>  
            </h2>
                        
            <p><a href="<?=site_url($product_url)?>">
              <?=lng_translate($all_prod['brand'],site_lang(),'ja');?>, 
              <?=lng_translate($all_prod['name'],site_lang(),'ja');?>
            </a></p>
            
            <a href='<?=site_url("{$lang}/cart/add/?hash={$hash}")?>' class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>
      </div>
    </div>
  </div>
<? endforeach; ?>
</div>
<? if(isset($data['pagination'])): ?>
  <nav>
    <ul class="pager">
      
      <? if($data['pagination']['prev']): ?>    
        <li>
          <a href="<?= site_url(site_lang().'/category/view/'.$category.'/'.($data['pagination']['page']-1))?>">Previous</a>
        </li>
      <? endif; ?>
      
      <? if($data['pagination']['next']): ?>    
        <li>
          <a href="<?= site_url(site_lang().'/category/view/'.$category.'/'.($data['pagination']['page']+1))?>">Next</a>
        </li>
      <? endif; ?>
    </ul>
  </nav>
<? endif; ?>