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
<h1>Welcome <span></span></h1>
<div class="container">
<?include('sidebar.php');?>
    <div class="row">

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = getByID('categories', $id);
            if (mysqli_num_rows($category) > 0) {
                $data = mysqli_fetch_array($category);
        ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="">
                                <div class="">
                                    <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                    <label for="">Name</label>
                                    <input type="text" class="" name="name" value="<?= $data['name'] ?>" placeholder="Enter category name">
                                </div>

                                <div class="">
                                    <label for="">Slug</label>
                                    <input type="text" class="" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter Slug">
                                </div>

                                <div class="">
                                    <label for="">Description</label>
                                    <textarea rows="3" class="text" name="description" placeholder="Enter Description"> <?= $data['description'] ?></textarea>
                                </div>

                                <div class="">
                                    <label for="">Upload Image</label>
                                    <input type="file" class="img" name="image">
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                </div>

                                <div class="">
                                    <label for="">Meta Title</label>
                                    <input type="text" class="" name="meta_title" value="<?= $data['meta_title'] ?>" placeholder="Enter meta title">
                                </div>

                                <div class="">
                                    <label for="">Meta Description</label>
                                    <textarea rows="3" class="text" name="meta_description" placeholder="Enter Meta Description"><?= $data['meta_description'] ?></textarea>
                                </div>

                                <div class="">
                                    <label for="">Meta Keywords</label>
                                    <textarea rows="3" class="text" name="meta_keywords" placeholder="Enter Meta Keywords"><?= $data['meta_keywords'] ?></textarea>
                                </div>

                                <div class="">
                                    <label for="">Status</label>
                                    <input type="checkbox" <?= $data['status'] ? "checked" : "" ?> name="status">
                                </div>

                                <div class="">
                                    <label for="">Popular</label>
                                    <input type="checkbox" <?= $data['popular'] ? "checked" : "" ?> name="popular">
                                </div>

                                <div class="c">
                                    <button type="submit" class="btn_update_category" name="update_category_btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        <?

            } else {
                echo "Category not found";
            }
        } else {
            echo "Id missing from url";
        }

        ?>

    </div>
</div>

    
</body>
</html>
