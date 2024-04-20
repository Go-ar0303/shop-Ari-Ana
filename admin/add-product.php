<?php

include ('code.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/style3.css">
    <title>Document</title>
</head>

<body>


    <div class="container">
    <?include('sidebar.php');?>

        <div class="card">
            <div class="card-header">
                <h4>Add Product</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="">
                        <label class="">Select Category</label>
                        <select class="" name="category_id">
                            <option selected>Select Category</option>
                            <?php
    
                            $categories = getAll("categories");
    
                            if (mysqli_num_rows($categories) > 0) {
                                foreach ($categories as $item) {
                                    ?>
                            <option value="<?= $item['id']; ?>">
                                <?= $item['name']; ?>
                            </option>

                            <?
    
                                }
                            } else {
                                echo "No category available";
                            }
    
                            ?>

                        </select>
                    </div>

                    <div class="">
                        <label class="">Name</label>
                        <input type="text" class="" name="name" placeholder="Enter category name">
                    </div>

                    <div class="">
                        <label class="">Slug</label>
                        <input type="text" class="" name="slug" placeholder="Enter Slug">
                    </div>

                    <div class="">
                        <label class="">Small Description</label>
                        <textarea rows="3" class="text" name="small_description" placeholder="Enter small Description"
                            required></textarea>
                    </div>

                    <div class="">
                        <label class="">Description</label>
                        <textarea rows="3" class="text" name="description" placeholder="Enter Description"
                            required></textarea>
                    </div>

                    <div class="">
                        <label class="">Original Price</label>
                        <input type="number" class="" name="price" value="price" placeholder="Enter original price"
                            required>
                    </div>

                    <div class="">
                        <label for="" class="">Selling Price</label>
                        <input type="number" class="" name="selling_price" placeholder="Enter Selling Price" required>
                    </div>

                    <div class="">
                        <label class="">Upload Image</label>
                        <input type="file" class="img" name="image">
                    </div>


                    <div class="">
                        <label class="">Quantity</label>
                        <input type="number" class="" name="qty" placeholder="Enter Quantity" required>
                    </div>
                    <div class="check">
                        <div class="">
                            <label class="">Status</label> <br>
                            <input type="checkbox" name="status">
                        </div>

                        <div class="">
                            <label class="">Trending</label> <br>
                            <input type="checkbox" name="trending">
                        </div>
                    </div>



                    <div class="">
                        <button type="submit" class="btn_add_product" name="add_product_btn">Save</button>
                    </div>

            </div>
            </form>
        </div>
    </div>

</body>

</html>