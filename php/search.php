<?php
include_once("config.php");
$db = config();
$searchTerm = $_POST['SearchTerm'];
$output = "";
$sql = 'SELECT * FROM users WHERE fname LIKE :searchTerm or lname LIKE :searchTerm';

$state = $db->prepare($sql);
$state->execute([
    "searchTerm" => '%'. $searchTerm .'%'
]);
if($state->rowCount()>0){
    include "data.php";
}else{
    $output .= "No Relevant User Found To Chat";
}
echo $output;