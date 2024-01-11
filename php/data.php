<?php
include_once('config.php');
while($row = $state->fetch()){
    $db = config();
    $statement = $db->prepare("SELECT * FROM messages WHERE (receiving_id = {$row['user_id']}) OR (outgoing_id = {$row['user_id']}) ORDER BY msg_id DESC LIMIT 1");
    $output .= '<a href="chat-area.php?user_id='. $row['user_id']  .'">
                <div class="content">
                    <img src="php/images/'. $row['image'] .'" alt="">
                    <div class="details">
                        <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                        <p>Test Message</p>
                    </div>
                </div>
                <div class="status-dot">
                    <i class="fas fa-circle"></i>
                </div>
            </a>';
}