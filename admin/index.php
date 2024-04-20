<?
include_once ('../config/dbcon.php');
if (isset ($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['psw']));

    $select = mysqli_query($conn, "SELECT * FROM `admin-user` WHERE email = '$email' AND password = '$pass'") or die ('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];

        session_start();
        $_SESSION['profile_pic'] = $row['image'];
        $_SESSION['name'] = $row['name'];
        header('location:admins.php');
    } else {
        $message[] = 'Неверный адрес электронной почты или пароль!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>

    
    <div class="bg-img">
    <h2>Ari-Ana</h2>
        <form action="" method="post" enctype="multipart/form-data" class="container">
            <h1>Login</h1>

            <?php
            if (isset ($message)) {
                foreach ($message as $message) {
                    echo '<script>alert("Welcome")</script>';
                }
            }
            ?>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" class="btn" name="submit">Login</button>
            
        </form>
    </div>

    <p> </p>

</body>

</html>