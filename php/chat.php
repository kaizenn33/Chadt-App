<?php
session_start();
if(isset($_SESSION['user_id'])){
    include_once "config.php";
    $db = config();
    $out_id = $_POST['outgoing_id'];
    $receive_id = $_POST['receiving_id'];
    $msg = $_POST['message'];

    if(!empty($msg)){
        $statement = $db->prepare("INSERT INTO messages (outgoing_id, receiving_id, msg)
                                    VALUES (:outgoing, :receiving, :msg)") or die();
        $statement->execute([
            "outgoing" => $out_id,
            "receiving" => $receive_id,
            "msg" => $msg,
        ]);
    }


}else{
    header("location: ../login.php");
}