<?php
  Flight::route('GET /products/type', function(){
    $data = apache_request_headers();
    $user_data = Auth::decode_jwt($data);
    if($user_data['data']['id']){
        $type = Flight::request()->query['type'];
        $products = Flight::product_service()->get_products_by_type($type);
        Flight::json($products);
    }
});

Flight::route('POST /product_to_cart', function () {
    $data = apache_request_headers();
    $user_data = Auth::decode_jwt($data);
    if($user_data['data']['id']){
      Flight::cart_service()->add_to_cart(Flight::request()->data->getData());
      Flight::json('Product has been added');
    }
});



?>
