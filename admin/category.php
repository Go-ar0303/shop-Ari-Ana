<?

include ('code.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="./css/style3.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>




<div class="admin-container">
    <div class="">

        <div class="card-header">
            <h4>Categories</h4>
        </div>
        <div class="card-body" id="category_table">
        <?
   include('sidebar.php');

?>
            <table class="table">
   
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>


                </thead>
                <tbody>
                    <?
                    $category = getAll("categories");

                    if (mysqli_num_rows($category) > 0) {
                        foreach ($category as $item) {
                            ?>

                            <tr>
                                <td>
                                    <?= $item['id']; ?>
                                </td>
                                <td>
                                    <?= $item['name']; ?>
                                </td>
                                <td><img src="images/categories/<?= $item['image']; ?>" width="100px" height="100px"
                                        alt="<?= $item['name']; ?>"></td>
                                <td>
                                    <?= $item['status'] == '0' ? "Visible" : "Hidden"; ?>
                                </td>
                                <td>
                                    <a href="edit-category.php? id=<?= $item['id']; ?>" class="btn-edit ">Edit</a>


                                    <form action="" method="post">
                                        <button type="submit" class="btn-del" name="delete_item"
                                            value="<?= $item['id']; ?>">Delete</button>

                                    </form>


                                </td>
                            </tr>
                        <?
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>
</div>
    
</body>
</html>








