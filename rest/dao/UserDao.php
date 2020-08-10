<?php


class UserDao extends BaseDao{

  public $table = 'user';

  public function __construct(){
    parent::__construct($this->table);
  }

  public function update_user($user, $user_id){
    $entity[':id'] = $user_id;
    $query= 'UPDATE '.  $this->table . ' SET ';
    foreach ($user as $key => $value) {
      $query .= $key . '=:' . $key . ', ';
      $entity[':' . $key] = $value;
    }
    $query = rtrim($query,', ') . ' WHERE id=:id';
    return $this->update($entity, $query);
  }

  public function delete_user($user_id){
    $entity[':id'] = $user_id;
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    return $this->execute($entity, $query);
  }

  public function remove_user($user_id){
    $this->execute([':user_id' => $user_id], 'UPDATE ' . $this->table . ' SET status = 0 WHERE id = :user_id');
  }

  public function get_user_by_email($user_email){
    return $this->execute_query("SELECT * FROM " . $this->table . " WHERE email = :email", [":email" => $user_email])[0];
  }

}

 ?>
