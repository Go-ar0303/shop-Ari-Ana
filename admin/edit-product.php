<?php

include('code.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    
<div class="container">
<?include('sidebar.php');?>
    <div class="row">
    
            <?php 
            global $conn, $id;
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $product = getByID("products", $id);

                if(mysqli_num_rows($product) > 0)
                {
                    $data = mysqli_fetch_array($product);
                   
                    ?>
                    
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="">
                            
                                <label class="mb-0" for="">Select Category</label>
                                <select class="form-select mb-2" name="category_id" value="<?= $data['category_id'];?>">
                                    <option selected>Select Category</option>
                                    <?php
                                    $categories = getAll("categories");

                                    if (mysqli_num_rows($categories) > 0) {
                                        foreach ($categories as $item) {
                                    ?>

                                            <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':''?>><?= $item['name']; ?></option>

                                    <?

                                        }
                                    } else {
                                        echo "No category available";
                                    }

                                    ?>

                                </select>
                            </div>
                            <input type="" name="product_id" value="<?= $data['id'];?>" >

                            <div class="">
                                <label class="mb-0" for="">Name</label>
                                <input type="text" class="" value="<?= $data['name'];?>" name="name" placeholder="Enter category name">
                            </div>

                            <div class="">
                                <label class="mb-0" for="">Slug</label>
                                <input type="text" class="" value="<?= $data['slug'];?>" name="slug" placeholder="Enter Slug">
                            </div>

                            <div class="">
                                <label class="mb-0" for="">Small Description</label>
                                <textarea rows="3" class="text" name="small_description" placeholder="Enter small Description"><?=$data['small_description'];?></textarea>
                            </div>

                            <div class="">
                                <label for="" class="mb-0">Description</label>
                                <textarea rows="3" class="text" name="description" placeholder="Enter Description" ><?=$data['description'];?></textarea>
                            </div>

                            <div class="">
                                <label for="" class="mb-0">Original Price</label>
                                <input type="number" class="" value="<?= $data['price'];?>"  name="price" value="price" placeholder="Enter original price">
                            </div>

                            <div class="">
                                <label for="" class="mb-0">Selling Price</label>
                                <input type="number" class="" value="<?= $data['selling_price'];?>"  name="selling_price" placeholder="Enter Selling Price">
                            </div>

                            <div class="col-md-12">
                                <label for="" class="mb-0">Upload Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['image'];?>">
                                <input type="file" class="form-control mb-2 img"  name="image">
                                <label for="" class="mb-0">Current Image</label>
                                <img src="images/product/<?= $data['image'];?>" alt="Product image" height="50px" width="50px">
                            </div>


                            <div class="">
                                <label for="" class="mb-0">Quantity</label>
                                <input type="number" class="form-control mb-2"  value="<?= $data['qty'];?>" name="qty" placeholder="Enter Quantity">
                            </div>

                            <div class="">
                                <label for="" class="mb-0">Status</label><br>
                                <input type="checkbox" <?=$data['status'] == '0'?'':'checked'?> name="status">
                            </div>

                            <div class="">
                                <label for="" class="mb-0">Trending</label><br>
                                <input type="checkbox" <?=$data['trending'] == '0'?'':'checked'?> name="trending">
                            </div>
                            

                            <div class="col-md-12">
                                <button type="submit" class="btn_update_product" name="update_product_btn">Update</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
                <?

                }else{
                    echo "Product not found for given id";
                }

            }else{
                echo "Id missing from url";
            }
            ?>

        </div>
    </div>
</div>

</body>
</html>
