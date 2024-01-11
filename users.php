<?php
session_start();
include_once("php/config.php");
$db = config();

if(!isset($_SESSION['user_id'])){
    header("location: login.php");
}else{
    $user = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style2.css">
    
    <title>User</title>
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
        <section class="users">
            <header>
                <div class="content">
                    <img src="php/images/<?php echo $row['image'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname']?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="php/logout.php" class="logout">Logout</a>
            </header>
            <form action="#" method="POST">
                <div class="search">
                    <!-- <span class="text">Search</span><br> -->
                        <input type="text" id="search" name="SearchTerm" placeholder="Search">
                        <button id="search-btn"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <div class="users-list">
                                
            </div>
        </section>
    </div>
    <script src="JavaScript/user.js"></script>
</body>
</html>