<?
include_once ('../config/dbcon.php');

if (isset($_POST['add-admin'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['psw']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['psw-repeat']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/admin/' . $image;

    $select = mysqli_query($conn, "SELECT * FROM `admin-user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Пользователь уже существует';
    } else {
        if ($pass != $cpass) {
            $message[] = 'подтвердить пароль не совпадает!';
        } elseif ($image_size > 2000000) {
            $message[] = 'размер изображения слишком велик!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `admin-user`(`name`, `email`, `image`, `phone`, `password`) VALUES('$name', '$email', '$image_folder', '$phone', '$pass')" ) or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Регистрация прошла успешно!';
                header('location: admin-user.php');
            } else {
                $message[] = 'регистрация не удалась!';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <link rel="stylesheet" href="css/style2.css">
    <title>Users</title>
</head>

<body>

    <div class="form" id="from-reg">
        <form action="" method="post" id="regForm" enctype="multipart/form-data">

            <h1>Register Admin:</h1>
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>

                <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
            }
        }
        ?>
                <hr>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" id="name" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>

                <label for="foto"><b>Foto</b></label>
                <input type="file" name="image" id="image">

                <label for="phone"><b>Phone</b></label>
                <input type="text" placeholder="Enter Phone" name="phone" id="phone" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                <hr>

                <button type="submit" class="registerbtn" name="add-admin">Register</button>
            </div>

            <div class="container signin">
                <p>Already have an account? <a class="back" href="index.php">Sign in</a>.</p>
            </div>

        </form>



    </div>

    <script src="js/main2.js"></script>

</body>

</html>