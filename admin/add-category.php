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
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>




<div class="container">
<? include ('sidebar.php'); ?>

    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Enter category name">
                </div>

                <div class="">
                    <label for="">Slug</label>
                    <input type="text" name="slug" placeholder="Enter Slug">
                </div>

                <div class="">
                    <label for="">Description</label>
                    <textarea rows="3" class="text" name="description" placeholder="Enter Description"></textarea>
                </div>

                <div class="">
                    <label for="">Upload Image</label>
                    <input type="file" class="img" name="image">
                </div>

                <div class="">
                    <label for="">Meta Title</label>
                    <input type="text" class="" name="meta_title" placeholder="Enter meta title">
                </div>

                <div class="">
                    <label for="">Meta Description</label>
                    <textarea rows="3" class="text" name="meta_description"
                        placeholder="Enter Meta Description"></textarea>
                </div>

                <div class="check">
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular">
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn_add_category" name="add_category_btn">Save</button>
                </div>
        </div>
        </form>
    </div>
</div>
</body>

</html>