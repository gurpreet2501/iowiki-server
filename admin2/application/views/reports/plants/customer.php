<?php $this->load->view('admin/partials/header');?>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
  <div class="col-lg-12">
  <hr />
  <div class='filters'>
    <form class='form'>
    <div class='row'>
      <div class="col-sm-2">
        <input name='filters[from]' class='form-control col-sm-2 date-input' type='text' placeholder="From Date" 
          value="<?=av(isset($filters['from'])?$filters['from']:'')?>" />
      </div>
      <div class="col-sm-1 text-center">- TO -</div>
      <div class="col-sm-2">
        <input name='filters[to]' class='form-control col-sm-2 date-input' type='text' placeholder="To Date" 
          value="<?=av(isset($filters['to'])?$filters['to']:'')?>" />
      </div>
      
      
      <div class="col-sm-1 text-center">Customer</div>
      <div class="col-sm-2">
        <select name='filters[user_id]' class='form-control'>
          <option value="0">-- ALL --</option>
          <? foreach($customers as $customer): ?>
            <? $selected = (isset($filters['user_id']) && ($filters['user_id']==$customer['id']))?'Selected':'';  ?>
            <option value="<?=av($customer['id'])?>" <?=$selected?>>
              <?=t($customer['full_name'])?>
            </option>
          <? endforeach; ?>
        </select>
      </div>
      
      
      <div class="col-sm-2">
        <input class="btn btn-primary" type='submit' value="Generate Report" />
      </div>
    </div>
    </form>
  </div>
  <hr />
  
  <? if(empty($measures)): ?>
    <h1>Welcome! Please select your options from above to generate reports.</h1>
  <? else: ?>
    <table class="table table-striped">
      <tr>
        <th>Total Weight</th>
      </tr>
      <? foreach($measures as $measure_unit => $total_weight): ?>
        <tr>
          <td><?=t($total_weight)?> <?=t($measure_unit)?></tdh>
        </tr>
      <? endforeach; ?>
    </table>
    
  <? endif; ?>
  
  
  
  
  </div>
</div>
</div>
</div>
<?php $this->load->view('admin/partials/footer');?>