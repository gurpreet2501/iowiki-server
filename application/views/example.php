<?php $this->load->view('admin/header');?>

<body>

	<div class="container-fluid">

		<div class="row pull-right">

			<div class="col-md-12">

				<a href="<?=site_url('auth/logout')?>">Logout</a> 

			</div>

		</div> <!-- row -->

		<hr/>

		<div class="row">

			<div class="col-md-2">

				<ul class="list-group text-center admin-menu">

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/posts')?>'>Add Posts</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_categories')?>'>Add Categories</a>

				  	</li>


				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/dggsjm_pages')?>'>Add Pages</a>

				  	</li>

				  	<li class="list-group-item">

			  			<a href='<?php echo site_url('settings/add_media')?>'>Add Media</a>

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

			</div> <!-- col-md-10 -->

		</div> <!-- row -->

	</div> <!-- container-fluid -->

<?php $this->load->view('admin/footer');?>