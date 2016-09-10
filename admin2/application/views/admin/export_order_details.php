<? $this->load->view('admin/partials/header') ?>


<div class="row">

  <div class="col-lg-12">
  <?php 
  			$this->load->view('partials/export_order_admin_view', array('order'=> $order)); 
  ?>
  </div>
</div>

<? $this->load->view('admin/partials/footer') ?>
