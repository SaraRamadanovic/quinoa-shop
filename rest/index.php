<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');

require_once '../vendor/autoload.php';

require_once 'config/config.php';
require_once 'utils/Auth.php';
require_once 'dao/BaseDao.php';
require_once 'dao/UserDao.php';
require_once 'dao/ProductDao.php';
require_once 'dao/CartDao.php';
require_once 'service/UserService.php';
require_once 'service/ProductService.php';
require_once 'service/CartService.php';
require_once 'routes/products.php';
require_once 'routes/cart.php';

Flight::register('user_service', 'UserService');
Flight::register('user_dao', 'UserDao');
Flight::register('product_service', 'ProductService');
Flight::register('cart_service', 'CartService');


Flight::route('POST /login', function(){
  $user = Flight::request()->data->getData();
  Flight::user_service()->get_user_by_email($user);
});


Flight::start();
?>
