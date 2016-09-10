<?php $this->load->view('partials/header');
$lang=site_lang();
?>

<div class="row">
  <div class="col-xs-12">
  	 <table class="table table-hover">
          <tr>
           	 <th>Order No</th>
           	 <th>Order_items</th>
           	 <th>Total Price</th>
           	 <th>Date</th>
           	 <th>Status</th>
           </tr>   
      <? foreach($all_orders as $key => $val ):  
            if(empty($val['order_items']))
                continue; 
      ?>

           <tr>
           	 <td><?=$val['id']?></td>
           	 <td>
           	 	 <? $i=1; foreach($val['order_items'] as $products):?>
           	 	     <a target="_BLANK" href='<?=site_url("{$products['url']}");?>'><?=lng_translate($products['product_name'], site_lang(),'ja');?></a>
           	 	     <?if($i<count($val['order_items']))
           	 	     	  echo ',  ';
           	 	     $i++;	
           	 	   endforeach; ?>
             </td>
           	 <td><?=$val['total_price']?></td>
           	 <td><?=$val['order_items'][0]['date']?></td>
           	 <td><?=$val['status']?></td>
           </tr>
       <? endforeach; ?>
            
    </table>
    
   </div>
</div>
<?php $this->load->view('partials/footer');?>