<?php $this->load->view('partials/header'); ?>
<hr/>
<div class="container"> 
  <div class="row text-center">
		<div class="col-xs-12">
      <h1>Choose Markfed Plant</h1><hr/>
		</div>
	</div>
	<div class="row">
    <div class='col-sm-4 col-sm-offset-4'>
      <form method="post">
        <select name='plant' class='form-control'>
          <? foreach($plants as $plant): ?>
            <option value="<?=$plant['id']?>">
              <?=htmlentities($plant['full_name'])?>
            </option>
          <? endforeach;?>
        </select>
        <p>
          <input type="submit" class="btn btn-primary btn-block" value="Select" name="_submit" />
        </p>
      </form>
    </div>
	</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div class="row">
    <!--<div id="" class="scroller_roll">
      <ul>
        <? foreach($products['results'] as $product):?>
          <?
            $name = '';//"{$product['product_name']} ({$product['weight']} {$product['weight_unit']})";
            $clipped_name = '';//substr($name,0,35).'...';
            //$clipped_name = $name;
            
            $image_query = http_build_query([
                  'src' => base_url('assets/uploads/files/'.$product['image']),
                  'w'   => 140,
                ]);
            $image = base_url('/timthumb.php?'.$image_query);
            $style = "background: url({$image}) center/100% no-repeat;";;
          ?>
          <li>
            <a  href="<?=base_url("product/{$product['id']}/{$product['plant_id']}")?>"
                title="<?=av($clipped_name)?>">
              <img src="<?=av(base_url('assets/images/FF4D00-0.0.png'))?>" 
                   style="<?=av($style)?>"
                   class="img-fit-container" 
                   alt="<?=av($name)?>" 
                   width='140'
                   height='200' />
            </a>
          </li>
        <? endforeach;?>
      </ul>
      <div style="clear: both"></div>
    </div>-->
    
    <div class="str3 str_wrap">
      <? foreach($products['results'] as $product):?>
        <?
          $name = '';//"{$product['product_name']} ({$product['weight']} {$product['weight_unit']})";
          $clipped_name = '';//substr($name,0,35).'...';
          //$clipped_name = $name;
          
          $image_query = http_build_query([
                'src' => base_url('assets/uploads/files/'.$product['image']),
                'h'   => 140,
              ]);
          $image = base_url('/timthumb.php?'.$image_query);
          $style = "background: url({$image}) 100%  no-repeat;";;
        ?>
        <a href="<?=site_url("product/view/{$product['id']}/{$product['plant_id']}")?>">
          <img  src="<?=av($image)?>" 
                alt="<?=av($name)?>" 
                height='140px'/>
        </a>
      <? endforeach;?>
    
    </div>
    
    
  </div>
  
</div> 
<?php  $this->load->view('partials/footer'); ?>