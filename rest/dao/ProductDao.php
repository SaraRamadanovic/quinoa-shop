<?php


class ProductDao extends BaseDao{

  public $table = 'products';

  public function __construct(){
    parent::__construct($this->table);
  }

  public function get_products_by_type($type){
    return $this->execute_query("SELECT * FROM " . $this->table . " WHERE type = :type", [":type" => $type]);
  }

}

 ?>
