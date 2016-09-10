<?php
use App\Models;

// function place_export_order($remarks=null, $ordered_products, $userId){
//     $customer = obj('users')->read(array(
//     'select'    =>   array('username','email','full_name','phone_number','address_line_1','state','city','zip_code','district.district_name','country','address_line_2','customer_type'),
//     'where'     =>   array('id',user_id())
//   ));

//   $customerData = $customer[0];

//   $customerData['district'] = $customer['district']['district_name'] ? $customer['district']['district_name'] : 'Not Defined';
  
//   $order = Models\Orders::create([
//     'type'     => 'Export',
//     'user_id'  => $userId,
//     'status'   => 'Pending',
//     'remarks'  => 'Export order'
//   ]);
//   // Creating customer entry in order_customer table
//   $order->customer()->create($customerData);

//   foreach($ordered_products as $id => $data){
//     $qty = intval($data['qty']);
//     if(!$qty)
//       continue;
//     $product = Models\Products::find($id);
//     if(!$product)
//       continue;
//     $item = $product->toArray();
//     $item['product_id'] = $product->id;
//     $item['qty'] = $qty;
//     $order->items()->create($item);
//   }
//   return $order;
// }

function place_order($remarks, $ordered_products, &$status, $booking_id =0){
  $customer = obj('users')->read(array(
    'select'    =>   array('username','email','full_name','phone_number','address_line_1','state','city','zip_code','district.district_name','country','address_line_2','customer_type'),
    'where'     =>   array('id',user_id())
  ));


  $customer = $customer[0];
  $customer['district'] = $customer['district']['district_name'];

  $order = [
    'remarks'   => $remarks,
    'user_id'   => user_id(),
    'plant_id'  => plant(),
    'status'    => 'Pending',
    'booking_id'=> $booking_id,
    'date'      => date('Y-m-d H:i:s'),
    'customer'  => $customer,
    'items'     => array(),
    'payment_details'     => ['receipt'                     => ''],
    'shpiment_export'     => ['stock_ready_for_inspection'  => 0],
    // 'shipment_domestic'   => [],
  ];

  remove_zero_quantity_items($ordered_products);
  if(empty($ordered_products)){
    $status = false;
    return false;
  }

  $prod_ids = array_keys($ordered_products);
  $products = obj('products')->read([
    'select'  => ['id','product_name','price','weight','weight_unit','customer_category_price.^*'],
    'where'   => ['id','IN',$prod_ids]
  ]);

  foreach($products as $product){
    $item =  $product;
    unset($item['id']);
    $item['product_id'] = $product['id'];
    $item['qty'] = $ordered_products[$product['id']]['qty'];

    if($booking_id){
      $discounts_taxes =  obj('booking_items')->read([
                              'select'  =>  ['discounts.^*','taxes.^*'],
                              'where'   =>  [['product_id',$item['product_id']],
                                            'AND',
                                            ['booking_id',$booking_id]]
                            ]);

      $item['discounts']  = $discounts_taxes[0]['discounts'];
      $item['taxes']      = $discounts_taxes[0]['taxes'];
      format_order_booking_discounts($item['discounts']);
      format_order_booking_taxes($item['taxes']);
      reduce_booking_product_stock($product['id'],$booking_id, $item['qty']);
    }else{
      $options = get_current_user_price($item);
      $final_price = false;
      if($options)
        list($item['price'],$final_price) = $options;

      $item['discounts'] = [];
      $item['taxes'] = [];

      if(!$final_price){
        $item['discounts'] = applied_discounts($item['qty'], $product['id'], user_id());
        $item['taxes'] = applied_taxes($item['qty'], $product['id'],user_id());
        format_order_discounts($item['discounts']);
        format_order_taxes($item['taxes']);
      }
      reduce_product_stock($product['id'],$item['qty']);
      unset($item['customer_category_price']);
    }
    $order['items'][] = $item;
  }

  try{
    $saved_order = obj('orders')->insert($order);
    $status = true;
    return $saved_order['orders'];
  }catch(Exception $e){
    $status = false;
    return null;
  }
}
function place_export_order($remarks, $ordered_products, $status=null){
  
  $customer = obj('users')->read(array(
    'select'    =>   array('username','email','full_name','phone_number','address_line_1','state','city','zip_code','district.district_name','country','address_line_2','customer_type'),
    'where'     =>   array('id',user_id())
  ));

  $customer = $customer[0];
  $customer['district'] = $customer['district']['district_name'];

  $order = [
    'remarks'   => $remarks,
    'user_id'   => user_id(),
    'type'    =>  'Export',
    'status'    => 'Pending',
    'booking_id'=> $booking_id,
    'date'      => date('Y-m-d H:i:s'),
    'customer'  => $customer,
    'items'     => array(),
    // 'shpiment_export'     => ['stock_ready_for_inspection'  => 0],
    // 'shipment_domestic'   => [],
  ];
  
  remove_zero_quantity_items($ordered_products);
  if(empty($ordered_products)){
    $status = false;
    return false;
  }

  $prod_ids = array_keys($ordered_products);
  
  $products = obj('products')->read([
    'select'  => ['id','product_name','price','weight','weight_unit','customer_category_price.^*'],
    'where'   => ['id','IN',$prod_ids]
  ]);

  foreach($products as $product){
    $item =  $product;
    unset($item['id']);
    $item['product_id'] = $product['id'];
    $item['qty'] = $ordered_products[$product['id']]['qty'];
   
      $options = get_current_user_price($item);
      
      $final_price = false;
      if($options)
        list($item['price'],$final_price) = $options;

      $item['discounts'] = [];
      $item['taxes'] = [];

      if(!$final_price){
        $item['discounts'] = applied_discounts($item['qty'], $product['id'], user_id());
        $item['taxes'] = applied_taxes($item['qty'], $product['id'],user_id());
        format_order_discounts($item['discounts']);
        format_order_taxes($item['taxes']);
      }
      
      reduce_product_stock($product['id'],$item['qty']);
      unset($item['customer_category_price']);
   
    $order['items'][] = $item;
  }
  
  try{
    $saved_order = obj('orders')->insert($order);
   
    // $status = true;
    return $saved_order;
  }catch(Exception $e){
    $status = false;
    return null;
  }
}

function get_current_user_price($product){
  foreach($product['customer_category_price'] as $customer_category_price)
    if($customer_category_price['customer_category_id'] == user_category()->id)
      return [(Float)$customer_category_price['price'], (Boolean)user_category()->no_price_mod];

  return false;
}

function remove_zero_quantity_items(&$order_items){
  foreach($order_items as $key => $order_item)
    if(!intval($order_item['qty']))
      unset($order_items[$key]);
}



function order_details($id){
  $order = lako::get('objects')->get('orders')->read(array(
    'select'  => array( '^*',
                        'items.^*',
                        'items.taxes.^*',
                        'items.discounts.^*' ,
                        'customer.^*',
                        'payment_details.^*',
                        'depots_orders.^*',
                        'shpiment_export.^*',
                        'shipment_domestic.^*',
                        'plant.full_name'),
    'where'   => array('id',$id),
  ));

  return empty($order)? null: $order[0];
}


function stage_name($name){
  return ucwords(str_replace('_',' ',$name));
}
function stage_value($val){
  if(($val == '0') || ($val == ''))
    return "<span class='mute'>Pending</span>";
  else if($val == '1')
    return "<span class='success'>Completed</span>";
  return '<span class="success">'.htmlentities($val).'</span>';
}


function make_order_id($id){
  return 'MFP'.($id+100);
}


function reduce_product_stock($product_id,$by){
  $stock = obj('products')->read([
    'select'  => ['stock'],
    'where'   => ['id',$product_id]
  ]);
  if(empty($stock))
    return;
  $stock = $stock[0]['stock'];
  return obj('products')->update(
    ['stock'  => $stock-intval($by)],
    ['id',$product_id]
  );
}
function reduce_booking_stock($product_id,$book_id, $by){

  $stock = obj('booking_items')->read([
    'select'  => ['remaining_stock','id'],
    'where'   => [['product_id',$product_id],
                  'AND',
                  ['book_id',$book_id]]
  ]);
  if(empty($stock))
    return;
  $stock = $stock[0]['remaining_stock'];

  return obj('booking_items')->update(
    ['remaining_stock'  => $stock-intval($by)],
    [['product_id',$product_id],
      'AND',
      ['book_id',$book_id]]
  );
}

function format_order_discounts(&$discounts){
  return format_booking_discounts($discounts);
}

function format_order_taxes(&$taxes){
  return format_booking_taxes($taxes);
}

function format_order_booking_discounts(&$discounts){
  foreach($discounts as $key => $discount){
    unset($discounts[$key]['id']);
    unset($discounts[$key]['booking_item_id']);
  }
}

function format_order_booking_taxes(&$taxes){
  return format_order_booking_discounts($taxes);
}
