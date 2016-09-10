<html>
<head>
	  <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<title></title>
</head>
<body>
<style>
	 .return_items_form{
		display: none;
	}
	.other_reason{
		display: none;
	}
	.save_btn{
		display: none
	}
	label.error {
    background-color: RED;
    display: inline;
    color: #fff;
    padding: 3px;
    margin-right: 5px;
   }
</style>
<div class="container">
	<div class="row>" 
		<div class="col-xs-2"></div> 
		<div class="col-xs-8">
     <form method="post" action="<?=site_url('/orders/update_missing_item_detail')?>">
     	  <input type="radio" name="return_items" class="required return_items">Return Items<br/>
				<div class="return_items_form"> 
					<hr/>
		     	<h1 class="title">Damaged/Missing Items</h1>
					  <div class="form-group">
					    <label for="exampleInputEmail1">How many items to be returned?</label>
					    <input type="text" class="form-control required" id="exampleInputEmail1" name='returned_quantity'   placeholder="Enter quantity to return">
					    <input type="hidden" name="prod_id" value="<?=$data['product_id']?>" />
					    <input type="hidden" name="order_id" value="<?=$data['order_id']?>" />
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Reason for returning</label>
					    <textarea  class="form-control required" name="reason" rows="3" cols="12"></textarea>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Shipping Details</label>
					    <textarea class="form-control required" name="shipping_details" rows="3" cols="12"></textarea>
					  </div>
				 </div>
				<input type="radio" name="return_items_reason" class="otherreason"> Other/Reason
				 <div class="other_reason">
				 	<hr/>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Explain the problem in details</label>
					    <textarea class="form-control" name="other_reason" rows="3" cols="12"></textarea>
					  </div>
         </div>
    <br/><br/>
				  <button type="submit" class="btn btn-success save_btn">SAVE</button>
				</form>
     </div>
     <div class="col-xs-2"></div>
	 </div>			
	</div>			
</body>
</html>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script>
  jQuery(function(){
    $("form").validate();
  	$('.return_items').on('click', function(){

      $('.return_items_form').show();
      $('iframe').height('400');
      $('.save_btn').show();
  	});
  	$('.otherreason').on('click', function(){
      $('.save_btn').show();
      $('.other_reason').show();
  	}); 
  })
</script>		