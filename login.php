<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Chadt | A Realtime Chat App </title>
</head>
<body>
    <div class="wrapper">
        <section class="form signup login">
            <header>Login To Chadt!</header>
            <form action="#">
                <div class="error-txt">
                </div>
                <div class="name-details">
    
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter Your Email Address" name="email" require>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Your Password Correctly" name="password" require>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Login to Chadt">
                    </div>
                    <div class="link">Don't have an account? <a href="index.php">Sign Up Now</a></div>
                </div>
            </form>
        </section>
    </div>
    <script src="JavaScript/pass-show-hide.js"></script>
    <script src="JavaScript/login.js"></script>
</body>
</html>