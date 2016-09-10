<?php
use Former\Facades\Former;
use Bootstrapper\Facades\Button;
use App\Libs\Bootstrap as BS;

Former::setOption('TwitterBootstrap3.labelWidths', ['large' => 4, 'small' => 4]);
$this->load->view('admin/partials/header');
$items = $order->items()
              ->whereFromPlant($this->tank_auth->get_user_id())
              ->get();
?>
<div class="row">
  <div class="col-lg-12">
    <h2 class='text-center'>Details of items</h2>
    <hr />
    <?php
      echo Former::horizontal_open()
                  ->id('shipment-export-create-form')
                  ->method('POST');


      foreach($items as $item)
        echo Former::text("shipped_items[{$item->id}]")
                    ->label($item->product_name)
                    ->type('number')->setAttribute('data-validation', 'required')
                    ->placeholder('Shipped Quantitiy');

    ?>
    <p>&nbsp;</p>
    <h2 class='text-center'>Shipping/Transportation Details</h2>
    <hr />

    <?php
    echo Former::select('expected_inspection')
                ->options(['0' => 'No',
                           '1' => 'Yes',])
                ->select('0');

    echo Former::select('inspection_completed')
                ->options(['0' => 'No',
                           '1' => 'Yes',])
                ->select('0');

    echo Former::select('documents_filed')
                ->options(['0' => 'No',
                           '1' => 'Yes',])
                ->select('0');

    echo Former::select('documents_cleared')
                ->options(['0' => 'No',
                           '1' => 'Yes',])
                ->select('0');

    echo Former::select('handed_over_to_transporter')
                ->options(['0' => 'No',
                           '1' => 'Yes',])
                ->select('0');

    echo Former::text('received_at_dry_port')->setAttribute('data-validation', 'required');

    echo Former::select('custom_clearence_received')
        ->options(['0' => 'No',
                   '1' => 'Yes',])
        ->select('0');

    echo Former::select('moved_from_dry_port')
        ->options(['0' => 'No',
                   '1' => 'Yes',])
        ->select('0');

    echo Former::text('received_at_port')->setAttribute('data-validation', 'required');


    echo Former::select('loaded_in_ship')
        ->options(['0' => 'No',
                   '1' => 'Yes',])
        ->select('0');

    echo Former::text('company_name')->setAttribute('data-validation', 'required');

    echo Former::text('tracking_id')->setAttribute('data-validation', 'required');

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
