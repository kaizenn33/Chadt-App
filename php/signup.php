<?php
session_start();
include_once("config.php");

$db = config();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){//checking if email is valid
        $result = $db->prepare("SELECT * FROM users where email = :email");
        $result->execute(["email" => $email]);
        if($result->rowCount()> 0){
            echo "Email Already Existed";
        }else{
            if(isset($_FILES['image']))
            {
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $explode = explode(".", $img_name);
                $img_ext = end($explode);

                $extensions = ['png', 'jpg', 'jpeg'];

                if(in_array($img_ext, $extensions) === true){
                    $time = time();//returning current time to add on user's image name to give a unique name for each img
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name, "images/".$new_img_name ))
                    {
                        $status = "Active Now";
                        $random_id = rand(time(), 10000000);

                        $insert = $db->prepare("INSERT INTO users (unique_id, fname, lname, email, password, image, status)
                        VALUES (:unique_id, :fname, :lname, :email, :password, :img, :status)");
                        $insert->execute([
                            "unique_id" => $random_id,
                            "fname" => $fname,
                            "lname" => $lname,
                            "email" => $email,
                            "password" => $password,
                            "img" => $new_img_name,
                            "status" => $status
                        ]);
                        if($insert){
                            $data = $db->prepare("SELECT * FROM users Where email = :email");
                            $data->execute(["email" => $email]);
                            if($data){
                                $row = $data->fetch();
                                $_SESSION['user_id'] = $row['user_id'];
                                echo "Register Successful, You Can Login Now!";
                                
                            }
                        }
                        else{
                            echo "Something went wrong!";
                        }
                    }
                }
            }
            else
            {
                 echo "Please upload image for profile";           
            }        
        }
    }else{
        echo "$email - This email is not valid";
    }
}else{
    echo "Please fill the data completely";
}