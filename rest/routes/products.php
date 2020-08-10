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


?>
