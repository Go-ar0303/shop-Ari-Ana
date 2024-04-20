<?php

require_once "./config/dbcon.php";
session_start();

if (isset($_POST['login_btn'])) {
    $_SESSION['user_id'] = true;

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn,  md5($_POST['password']));
    //$userId =  mysqli_real_escape_string($conn, $_POST['id']);
    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE  email = '$email' AND password = '$password' ")
        or die('query failed');


    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        
        echo $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $userId = $_SESSION['id'];
        header('location: index.php');
    
    } else {
        
        $message[] = 'incorrect password or email!';
    }
}
?>




<!-- login -->

<button class="open-button" onclick="openForm()">Log In</button>

<div class="form-popup" id="myForm">

    <form action="" class="form-container form" method="post" name="login" onsubmit="return validate();">
    
        <h1>Login</h1>
        <?php
        if (isset ($message)) {
           
                $message[] = 'вы успешно вошли';
            
        }
        ?>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" id="email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" id="password" name="password" required>

        <button type="submit" name="login_btn" id="btn" class="btn">Login</button>
        <button type="submit"  class="btn reg"> <a href="register.php">Register now</a></button>
       
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>