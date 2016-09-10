<div class="booking_ids">
	<h2>Products</h2>
	<div class="p_list"> 
    <a href="<?=site_url('/')?>">All Products</a>

    <? if(!empty($categories)):
      foreach($categories as $category): ?>
      <a href="<?=site_url("/home/index/{$category['id']}")?>"><?=$category['category_name']?></a>
    <? endforeach; 
    	endif; ?>
  </div>
</div>
<hr />
<?php if(!is_export_user()): ?>
<div class="booking_ids">
	<h2>Bookings</h2>
	<?php foreach(current_user_bookings() as $book_id): ?>
	 <div class="booking_lists"> <a href="<?=site_url('/booking/'.$book_id['id'])?>">Booking #<?=$book_id['id']?></a></div>
	<? endforeach; ?>

</div> 
<?php endif; ?>
