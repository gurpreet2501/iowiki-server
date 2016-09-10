  </div> <!-- Container ends -->
</div> <!-- Container wrap ends -->
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">© Markfed Punjab.</p>
					</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
  <script src="<?=base_url('assets/js/jquery.js')?>"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('assets/js/main.js')?>"></script>
  <script src="<?=base_url('assets/js/validator.min.js')?>"></script>
  <script src="<?=base_url('assets/js/accounting.js')?>"></script>
  <script src="<?=base_url('assets/js/echo.js')?>"></script>
  <script src="<?=base_url('assets/js/img-loading.js')?>"></script>
  
  <script type="text/javascript">
    jQuery(function(){
      jQuery('.myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
       })
    });
     
  </script>
  <? if(isset($for_js)): ?>
    <script>
      function base_url(url){
        var base = "<?=base_url()?>"
        if(url)
          return base+url;
        return base;
      }
      window.vals = <?=json_encode($for_js)?>;
    </script>
  <? endif; ?>
  
 
   <script> jQuery("form").validate(); </script>
  <? if(isset($js_files)): ?>
    <? foreach($js_files as $js_file): ?>
      <script src="<?=av($js_file)?>"></script>
    <? endforeach; ?>
  <? endif; ?>
</body>
</html>
  
  
  