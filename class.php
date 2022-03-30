<?php 

class User { 
 public $name;
 public $email;

public function __construct(){
    $this->email = 'mt@gmail.com';
    $this->name = 'ali';
}
 public function login(){
     echo 'the user logged in' ;

 }
}
$userOne = new User();

$userOne->login();
echo $userOne->name;

