<?php
session_start();
include_once("config.php");
$db = config();
$state = $db->prepare("SELECT * FROM users");
$state -> execute();
$output = '';

if($state->rowCount() == 1){
    $output .= "No one avaiable to chat";
}elseif($state->rowCount()>1){
    include "data.php";
}
echo $output;