<?php $this->load->view('admin/partials/header'); ?>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row pull-right">
  <div class="col-sm-2">
        <a href="<?=site_url('stock/report/csv')?>"><button class="btn btn-primary">Download Csv</button></a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <hr />
  <div class='filters'>
    <form class='form'>
    <div class='row'>
      <div class="col-sm-2">
        <select class="form-control" name="filters[plant_id]">
        <option value="">-- Filter By Plant --</option>
        <?php foreach (get_plants_list() as $key => $value):?>
          <option value="<?=$value['id']?>" 
                <?=(isset($_GET['filters']['plant_id']) && $_GET['filters']['plant_id']== $value['id']) ? 'selected' : ''?>
          ><?=ucfirst($value['username'])?></option>
        <? endforeach; ?>
        </select>
      </div>
      
      <div class="col-sm-2">
        <input class="btn btn-primary" type='submit' value="Apply" />
      </div>
      
    </div>
    </form>
  </div>

  </div> <!-- col-lg-12 -->
  </div> <!-- row -->
  <hr />
  <div class="row">
    <div class='col-lg-12'>
      <table class="table table-striped">
        <tr>
          <th>Id</th>
          <th>Product Name</th>
          <th>Stock</th>
          <th>Ordered Quantity</th>
          <th>Shipped Quantity</th>
          <th>Pending Shipping</th>
        </tr>
        <?php foreach ($output as $key => $value) :?>
            <tr>
              <td><?=$value['id']?></td>
              <td><?=$value['product_name']?></td>
              <td><?=$value['stock']?></td>
              <td><?=$value['ordered_qty'] ? $value['ordered_qty'] : 0?></td>
              <td><?=$value['shipped_qty'] ? $value['shipped_qty'] : 0?></td>
              <td><?=$value['pending_shipping'] ? $value['pending_shipping'] : 0?></td>
            </tr>
        <?php  endforeach;?>
      </table>
    </div>
  </div>
</div> <!-- container-fluid -->  

</body>
</html>
