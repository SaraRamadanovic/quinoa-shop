<?php
Flight::route('GET /cart', function () {
    $data = apache_request_headers();
    $user_data = Auth::decode_jwt($data);
    if($user_data['data']['id']){
      $customer_id = $user_data['data']['id'];
      $cart = Flight::cart_service()->get_customer_cart($customer_id);
      Flight::json($cart);
    }
});

Flight::route('PATCH /cart/@id/amount', function ($id) {
    $data = apache_request_headers();
    $user_data = Auth::decode_jwt($data);
    if($user_data['data']['id']){
      $cart = Flight::cart_service()->update_amount($id, Flight::request()->query['type']);
      Flight::json($cart);
    }
});

Flight::route('PATCH /cart/status', function () {
    $data = apache_request_headers();
    $user_data = Auth::decode_jwt($data);
    if($user_data['data']['id']){
      $customer_id = $user_data['data']['id'];
      $cart = Flight::cart_service()->update_cart_status($customer_id, Flight::request()->query['status']);
      Flight::json($cart);
    }
});


 ?>
