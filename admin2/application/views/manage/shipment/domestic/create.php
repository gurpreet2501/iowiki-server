<?php
use Former\Facades\Former;
use Bootstrapper\Facades\Button;
use App\Libs\Bootstrap as BS;

Former::setOption('TwitterBootstrap3.labelWidths', ['large' => 4, 'small' => 4]);
$this->load->view('admin/partials/header');

?>
<div class="row">
  <div class="col-lg-12">
    <h2 class='text-center'>Details of items</h2>
    <hr />
    <?php
      echo Former::horizontal_open()
                  ->id('shipment-domestic-create-form')
                  ->method('POST');

      foreach($order->items as $item)
        echo Former::text("shipped_items[{$item->id}]")
                    ->label($item->product_name)
                    ->type('number')
                    ->placeholder('Shipped Quantitiy')->setAttribute('data-validation', 'required')->setAttribute('data-validation-error-msg', 'This field is required');

    ?>
    <p>&nbsp;</p>
    <h2 class='text-center'>Shipping/Transportation Details</h2>
    <hr />

    <?php
    echo Former::select('handed_over_to_transporter')
                ->options(['0' => 'No',
                           '1' => 'Yes',])
                ->select('0');

  foreach(['dispatched_vehicle_number',
           'challan_number',
           'invoice_number'] as $key)
    echo Former::text($key)->setAttribute('data-validation', 'required')->setAttribute('data-validation-error-msg', 'This field is required');
  ?>

  <div class="form-group">
    <div class="col-lg-offset-4 col-sm-offset-4 col-lg-8 col-sm-8">
      <?= BS::Button()->success('Submit')->submit() ?>
      <?= BS::Button()->normal('Cancel')->asLinkTo(site_url('admin/order_details/'.$order->id)) ?>
    </div>
  </div>

  <?php
    echo Former::close();
  ?>
  </div>
</div>
<? $this->load->view('admin/partials/footer') ?>
