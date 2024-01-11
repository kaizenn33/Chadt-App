<?php
session_start();
include_once("php/config.php");
$db = config();

if(!isset($_SESSION['user_id'])){
    header("location: login.php");
}else{
    $user = $_GET['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Chat Area</title>
</head>
<?php 
    $statement = $db->prepare("SELECT * FROM users WHERE user_id = :user");
    $statement->execute([
        "user" => $user
    ]);
    if($statement->rowCount()>0){
        $row = $statement->fetch();
    }
?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <div class="content">
                    <img src="php/images/<?php echo $row['image'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] ." ".  $row['lname'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
            </header>
            <div class="chat-box">
                
            </div> 
            <form action="#" class="typing-area" autocomplete="off">
                <input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['user_id'] ?>">
                <input type="hidden" name="receiving_id" value="<?php echo $user ?>">
                <input type="text" name="message" class="input-field" placeholder="Type a message...">
                 <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="JavaScript/chat.js"></script>

</body>
</html>