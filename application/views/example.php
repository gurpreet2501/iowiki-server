<?php $this->load->view('admin/header');?>

<body>

	<div class="container-fluid">

		<div class="row pull-right">

			<div class="col-md-12">

				<a href="<?=site_url('auth/logout')?>">Logout</a> 

			</div>

		</div>

		<hr/>

		<div class="row">

			<div class="col-md-2">

				<ul class="list-group text-center admin-menu">

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_posts')?>'>Add Posts</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_categories')?>'>Add Categories</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_tags')?>'>Add Tags</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_pages')?>'>Add Pages</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_add_media')?>'>Add Media</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/tech_events')?>'>Add Tech Events</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/hiring_agencies')?>'>Add Hiring Agencies</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_comments')?>'>Comments</a>

				  	</li>

				</ul>

			</div>

			<div class="col-md-10">

				<?php echo $output; ?>

			</div>

		</div>

	</div>



    <div>



    </div>

</body>
</html>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fancybox").fancybox();
});
</script>
