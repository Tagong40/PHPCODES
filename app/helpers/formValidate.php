<?php 


function ValidationForm($user)

{

    global $conn;

    $errors = array();

    if(empty($user['username'])){
        array_push($errors, "Please Enter Your User Name");
    }

    if(empty($user['email'])){
        array_push($errors,"Please Enter Your User Email");
    }

    if(empty($user['password'])){
        array_push($errors,"Please Enter Your User Password");
    }
    if ($user['password2'] !== $user['password']){
        array_push($errors,"Password do no match");       
    }
    $existingUser = selectOne('users', ['email' => $user['email']]);

    if(isset($existingUser)){
        array_push($errors, 'email in use');
    }

 


    return $errors;
}


function loginUser($user){
    $errors = array();


    if(empty($user['username'])){
        array_push($errors,'username is required');
    }

    if(empty($user['password'])){
        array_push($errors,"Password is required");
    }

    return $errors;
}