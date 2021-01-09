<?php

$errors = array(); 
$username = '';
$email = '';
$password = '';
$password2 = '';
$table = 'users';


include (ROOT_PATH . '/app/database/db.php');
include (ROOT_PATH . '/app/helpers/formValidate.php');



function LoginSession($user){
    
    $_SESSION['id'] =  $user['id'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['message'] = "You have logged in as"; 
    header('location: '. BASE_URL . 'index.php');

    return $user;
}




if (isset($_POST['register-btn'])){
    $errors = ValidationForm($_POST);
    
    if (count($errors) === 0 ){
        unset( $_POST['register-btn'], $_POST['password2']);
        $_POST['admin'] = 0;
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user_id = create($table, $_POST);
        $user = SelectOne($table, ['id' => $user_id]);

        // logUser
        LoginSession($user);

    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];


    }



   
}

if(isset($_POST['login-btn'])){
    
    $errors = loginUser($_POST);

  if(count($errors) == 0){
      $user = SelectOne($table, ['username' => $_POST['username']]);

      if($user && password_verify($_POST['password'], $user['password'])){

        LoginSession($user);
      }
      else{
          array_push($errors," wrong Credentials");
      }
      $username = $_POST['username'];
      $password = $_POST['username'];






  }




}
