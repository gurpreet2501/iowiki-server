<div class='sidebar-background'>

	<div class="sidebar-right">

		<div class="title text-center">

			JOBS

		</div>

		<div class="sidebar-widget">

        <?php foreach(get_hiring_agencies() as $key => $value): ?>

            <div class="row">

                <div class="col-md-4 hidden-xs hidden-sm">

                    <div class="company-logo">

                        <img src="<?=base_url()?>/timthumb.php?src=<?=base_url('assets/uploads/files/'.$value['company_logo'])?>&amp;h=150&amp;w=150" class="img-fit-container img-circle" />

                    </div>

                </div>              

                <div class="col-md-8">

                    <div class="company-title">

                        <a target="_BLANK" href="<?=trim($value['url'])?>"><?=$value['company_name']?></a>

                    </div>    

                </div>                

            </div>

            <hr class="record-separator"/>

        <?php endforeach; ?>    
         
		</div>

	</div> <!-- sidebar -->

</div>





