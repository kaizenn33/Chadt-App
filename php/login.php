<?php
session_start();
include_once("config.php");

$db = config();

$email = $_POST['email'];
$password = $_POST['password'];

if($email && $password){
   $statement = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
   $statement->execute([
    "email" => $email,
    "password" => $password
   ]);
   if($statement->rowCount()>0){
       $row = $statement->fetch();
       $_SESSION['user_id'] = $row['user_id'];
       echo "success";
   }else{
    echo ("Email or password is incorrect. Try again!");
   }
}