<?
include ('code.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./css/style3.css">
    <link rel="stylesheet" href="./css/main.css">
    
</head>
<body>

<div class=" admin-container">

    <div class="">
        <div class="card-header">
            <h4>Products</h4>
        </div>
        <div class="card-body" id="products_table">
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
               
                <tbody>
                <hr>
                    <?
                    $query = "SELECT * FROM `products`";
                    $products = mysqli_query($conn, $query);

                    if (mysqli_num_rows($products) > 0) {
                        foreach ($products as $item) {
                            ?>

                            <tr>
                                <td>
                                    <?= $item['id']; ?>
                                </td>
                                <td>
                                    <?= $item['name']; ?>
                                </td>
                                <td><img src="images/product/<?= $item['image']; ?>" width="100px" height="100px"
                                        alt="<?= $item['name']; ?>"></td>
                                <td>
                                    <?= $item['status'] == '0' ? "Visible" : "Hidden"; ?>
                                </td>
                                <td>
                                    <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn-edit">Edit</a>

                                </td>
                                <td>
                                    <form action="" method="post">
                                        <button type="button" class="btn-del" name="delete_items"
                                            value="<?=$item['id']; ?>">Delete</button>

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
