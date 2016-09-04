<div class='sidebar-background'>

	<div class="sidebar-left">

		<div class="title text-center">

			Popular Posts

		</div>

		<div class="sidebar-widget">

            <ul class="list-group">

            <?php  $data = get_most_visited(8);

               foreach ($data as $key => $value): ?>

              <a target="_BLANK" href="<?=site_url('post/'.seo_url($value['post_name']))?>">

                <li class="list-group-item"><?=$value['post_name']?></li>        

              </a>  

             <?php endforeach;?> 

            </ul>

		</div>

	</div> <!-- sidebar -->

</div>





