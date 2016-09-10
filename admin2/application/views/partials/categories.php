<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
<?php //Fetching from helper
  $categories = plant_categories(); 
   foreach ($categories as $value):
   ?>
     <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a href='<?=site_url('/category/view/'.$value['id'])?>'>
                <?=$value['category_name']?>
            </a>
          </h4>
         </div>
      </div>
 <?  endforeach; ?>      
</div><!--/category-products-->