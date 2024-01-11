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
        <section class="form signup">
            <header>Signup To Chadt!</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">
                </div>
                <div class="name-details">
                    <div class="name-wrapper">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter Your First Name" name="fname" required/>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter Your Last Name" name="lname" required/>
                        </div>
                    </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter Your Email Address" name="email" required/>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Your Password" name="password" required/>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field Image">
                        <label>Select Image</label>
                        <input type="file" name="image" required/>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chadt">
                    </div>
                    <div class="link">Already have an account? <a href="login.php">Login Now</a></div>
                </div>
            </form>
        </section>
    </div>
    <script src="JavaScript/pass-show-hide.js"></script>
    <script src="JavaScript/signup.js"></script>
</body>
</html>