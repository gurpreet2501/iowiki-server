</div> <!-- container ends -->

<div class="sp-40"></div>

<div class="brown-rule"></div>
<div class="bg-black">
	<div class="container">
		<div class="footer">
			<div class="row">
				<div class="col-md-2">
				<div class="footer-widget">
						<div class="title">DONATE</div>
  							<a href=""><div class="links">Paypal</div></a>
							<a href=""><div class="links">Wire Transfer</div></a>
							<a href=""><div class="links">Cheque/Draft</div></a>
					</div>
				</div>
				<div class="col-md-2">
						<div class="footer-widget">
						<div class="title">SOCIAL</div>
							<a href="http://www.facebook.com/iowiki/" target="_BLANK"><div class="links">Facebook</div></a>
							<a href="" target="_BLANK"><div class="links">Twitter</div></a>
							<a href="https://www.youtube.com/channel/UC4HgMfW9s_AdADMMeGDmAcg" target="_BLANK"><div class="links">Youtube</div></a>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-widget language-widget">
						<div class="title">LANGUAGE</div>
							<div id="google_translate_element"></div>
							<ul class="translation-links">
							  <li><a href="#" class="english" data-lang="English">English</a></li>
							  <li><a href="#" class="spanish" data-lang="Spanish">Español</a></li>
	                          <li><a href="#" class="german" data-lang="German">Deutsche</a></li>
	                          <li><a href="#" class="japanese" data-lang="Japanese">日本語</a></li>
	                          <li><a href="#" class="french" data-lang="French">français</a></li>
	                          <li><a href="#" class="chinese" data-lang="Chinese">中文</a></li>
							</ul>
	<!-- Code provided by Google -->
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-widget">
						<div class="title">PAGES</div>
	                    <ul>
							  <?php foreach(get_pages_list() as $key => $value): ?>        
	                                <li>
	                                    <a href="<?=site_url('pages/'.$value['page_slug'].'/'.$value['id'])?>">
	                                        <?=$value['page_name']?>
	                                    </a>
	                                </li>
	                            <?php endforeach; ?> 
	                    </ul>   
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-widget">
						<div class="title">CONTACT</div>
							<a href=""><div class="links">tech@iowiki.com</div></a>
							<a href=""><div class="links">editor@iowiki.com</div></a>
	                        <a href=""><div class="links">#internet</div></a>
							<a href=""><div class="links">#iowiki</div></a>
					</div>
				</div>
				<div class="col-md-2">
					    <!-- BEGIN: Powered by Supercounters.com -->
					<center><script type="text/javascript" src="http://widget.supercounters.com/flag.js"></script><script type="text/javascript">sc_flag(1213894,"FFFFFF","000000","cccccc",2,10,0,0)</script><br>
					</center>
					<!-- END: Powered by Supercounters.com -->
				</div>
			</div> <!-- row -->
			<hr/>
			<div class="copyright-text">Copyright &copy;2015</div>
		</div> <!-- footer -->
	</div>	<!-- contaienr -->
</div> <!-- bg-black -->


<script type="text/javascript" src="<?=base_url('js/jquery.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/highlight.pack.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/jquery-form-validator.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/bootstrap.min.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/bootstrap-submenu.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/script.js')?>"></script>

<script type="text/javascript" src="<?=base_url('js/jquery.fancybox-1.3.4.js')?>"></script>

<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">

  function googleTranslateElementInit() {

    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');

  }

</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
<!-- Flag click handler -->

<script type="text/javascript">

    $('.translation-links a').click(function() {

      var lang = $(this).data('lang');

      var $frame = $('.goog-te-menu-frame:first');

      if (!$frame.size()) {

        alert("Error: Could not find Google translate frame.");

        return false;

      }

      $frame.contents().find('.goog-te-menu2-item span.text:contains('+lang+')').get(0).click();

      return false;

    });

</script>

<script>
  jQuery(function(){
   
    jQuery('.validate').each(function(){

      jQuery(this).validate();

    })

  });

</script>
<script>hljs.initHighlightingOnLoad();</script>

<?php

$detect = new Mobile_Detect;
if($detect->isMobile()): ?>

<script>
 jQuery(function($){
 		$('img').css('width', '100%');
 		$('img').css('align', 'left');
 })
</script>
	
<?php endif; ?>
</body>
</html>