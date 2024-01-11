<?php

while($row = $state->fetch()){
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