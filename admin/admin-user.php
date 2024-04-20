<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?
    include ('sidebar.php');
    ?>
    <h1>Admins</h1>

    <form action="" method="post" enctype="multipart/form-data" class="admin-form">

        <table id="customers">
            <thead>
                <th>Id</th>
                <th>First name</th>
                <th>Email</th>
                <th> Photo</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?
                include_once ('../config/dbcon.php');
                

                $sql = "SELECT * FROM `admin-user`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <? echo $row['id']; ?>
                        </td>
                        <td>
                            <? echo $row['name']; ?>
                        </td>
                        <td>
                            <? echo $row['email']; ?>
                        </td>
                        <td>
                            <? echo $row['image']; ?>
                        </td>
                        <td>
                            <? echo $row['phone']; ?>
                        </td>
                        <td>
                            <a href="user-edit.php" class="btn-edit">Edit</a>
                            <a href="user-delete.php" class="btn-delete">Delete</a>
                        </td>


                    </tr>


                <?
                }

                ?>

            </tbody>
        </table>
        <div>
            <a href="users-create.php" class="btn-add">Add-Admin</a>
        </div>
    </form>


</body>

</html>