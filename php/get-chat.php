<?php
session_start();
if(isset($_SESSION['user_id'])){
    include_once "config.php";
    $db = config();
    $out_id = $_POST['outgoing_id'];
    $receive_id = $_POST['receiving_id'];

    $output = "";
    $statement = $db->prepare("SELECT * FROM messages
                LEFT JOIN users on users.user_id = messages.outgoing_id 
                WHERE (outgoing_id = :outgoing AND receiving_id = :receive) OR (receiving_id = :outgoing AND outgoing_id = :receive) ORDER BY msg_id");
    $statement->execute([
        "outgoing" => $out_id,
        "receive" => $receive_id
    ]);
    if($statement->rowCount()>0){
        while($row = $statement->fetch()){
            if($row['outgoing_id'] == $out_id){//the sender
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                            </div>
                        </div>';
            }else{//the receiver
                $output .= '<div class="chat incoming">
                        <img src="php/images/'. $row['image'] .'" alt="">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                    </div>';
            }
        }
        echo $output;
    }
}else{
    header("location: ../login.php");
}