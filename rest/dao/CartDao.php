<?php


class CartDao extends BaseDao{

  public $table = 'cart';

  public function __construct(){
    parent::__construct($this->table);
  }

  public function get_by_user_id($id){
    return $this->execute_query("SELECT * FROM $this->table WHERE user_id = :id AND amount > 0 AND status NOT IN ('CANCELED', 'FINISHED')", ["id" => $id]);
  }

  public function update_amount($id, $amount){
      $this->execute([':id' => $id, ':amount' => $amount], " UPDATE $this->table SET amount = :amount WHERE id = :id");
  }

  public function update_cart_status($customer_id, $status){
      $this->execute([':user_id' => $customer_id, ':status' => $status], " UPDATE $this->table SET status = :status WHERE amount > 0 AND user_id = :user_id");
  }


}

 ?>
