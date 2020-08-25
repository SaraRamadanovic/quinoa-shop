<?php
/**
 *
 */
class ProductService{

  private $product_dao;

  public function __construct(){
    $this->product_dao = new ProductDao();
  }


  public function get_products_by_type($type){
    $products = $this->product_dao->get_products_by_type($type);

    foreach ($products as $idx => $product) {
      $products[$idx]['add_to_cart'] = '<button onclick="add_to_cart('.$product['id'].')"> Add </button>';
    }
    return $products;
  }


}


 ?>
