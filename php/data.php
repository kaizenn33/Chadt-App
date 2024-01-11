<?php
include_once('config.php');
while($row = $state->fetch()){
    $db = config();
    $statement = $db->prepare("SELECT * FROM messages WHERE (receiving_id = :user) OR (outgoing_id = :user) ORDER BY msg_id DESC LIMIT 1");
    $statement->execute([
        "user" => $row['user_id'],
    ]);
    if($statement->rowCount()>0){
        $row1 = $statement->fetch();
        $result = $row1['msg'];
    }else{
        $result = "No Messages Yet.";
    }

    //trimming message
    (strlen($result) > 30) ? $msg = $result : $msg = substr($result, 0, 18).'..';
    ($row['user_id'] == $row1['outgoing_id']) ? $you = "You: " : $you = "";
    $output .= '<a href="chat-area.php?user_id='. $row['user_id']  .'">
                <div class="content">
                    <img src="php/images/'. $row['image'] .'" alt="">
                    <div class="details">
                        <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                </div>
                <div class="status-dot">
                    <i class="fas fa-circle"></i>
                </div>
            </a>';
}