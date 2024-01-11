<?php
session_start();
include_once("config.php");
$outgoing_id = $_SESSION['user_id'];
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