<?php
/**
 *
 */
class UserService{

  private $user_dao;

  public function __construct(){
    $this->user_dao = new UserDao();
  }

  public function get_all_users(){
    $users = $this->user_dao->get_all();

    foreach ($users as $idx => $user) {
      $users[$idx]['delete_user'] = '<a onclick="delete_user('.$user['id'].')"> Delete </a>';
    }

    return $users;
  }

  public function get_user_by_email($user){
    $db_user = $this->user_dao->get_user_by_email($user['user_email']);
    if($db_user){
      if($db_user['password'] == $user['password']){
        $token_data = [
          'id' => $db_user['id'],
          'email' => $db_user['email'],
          'name' => $db_user['name']
        ];

        $jwt = Auth::encode_jwt($token_data);
        Flight::json(['user_token' => $jwt]);
      } else {
        Flight::halt(404, 'Password is not correct');
      }
    } else {
      Flight::halt(404, 'User not found');
    }
  }
}



 ?>
