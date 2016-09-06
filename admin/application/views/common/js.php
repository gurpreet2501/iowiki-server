<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script> -->
<!-- <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
			 -->			
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<script type="text/javascript" src="<?=base_url('assets/grocery_crud/js/jquery-1.11.1.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/ckeditor/ckeditor.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/ckconfig.js')?>"></script>
<script src="<?=base_url('assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js')?>"></script>

<?php 
if(isset($js_files)){
  foreach($js_files as $file): 
	    if (strpos($file, 'jquery-1.11.1.min.js')) continue; ?>
	  <script src="<?= $file; ?>"></script>
	<?php endforeach; 
}	
?>
<script type="text/javascript">
	jQuery(function() {
		
		jQuery(".fancybox").fancybox({
					'width'         : 940,
					'height'        : 700,
				 });
	});
</script>


<script src="<?=base_url('assets/admin/canvas/js/libs/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/canvas/js/App.js')?>"></script>
<!-- Sort spouts and replies -->
