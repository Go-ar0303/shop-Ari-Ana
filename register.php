<?
include ('config/dbcon.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style2.scss" />
    <link rel="stylesheet" href="css/style2.css" />
</head>
<body>
    <?
    
if (isset ($_POST['register_btn'])) {
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['psw-repeat']));


    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE  'email' = '$email' AND 'password' = '$password' ")
        or die ('query failed');

        $query = "INSERT INTO `users`( `name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['user_name'] = $name;
            echo "  
            <div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>
                 ";
        } else {
            echo "  
            <div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>
                  ";
        }
    } else {

        ?>
    
        <div class="py-5  mx-auto">
            <div class="container">
               
        
                
                <form action="" method="post" enctype="multipart/form-data">
                <p> *  поля являются обязательными</p>
                    <div class="container">
                        <h1>Register</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        *<label for="name"><b>Name</b></label>
                        <input type="text" placeholder="Enter Name" name="name" id="name" required>
        
                        *<label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>
        
                        *<label for="phone"><b>Phone</b></label>
                        <input type="text" placeholder="Enter phone" name="phone" id="phone" required>
        
                        *<label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="psw" required>
        
                        *<label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                        <hr>
        
                        <button type="submit" class="registerbtn" name="register_btn">Register</button>
                    </div>
        
                    <div class="container signin">
                        <p>Already have an account? <a href="index.php">Sign in</a>.</p>
                    </div>
                </form>

                <?
                

};


?>
        


</body>
</html>