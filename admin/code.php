<?

include ('../config/dbcon.php');
include ('../function/myfunc.php');
include ('../function/userfunctions.php');

if (isset($_POST['add_category_btn'])) {//добавлять category
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';



    $image = $_FILES['image']['name'];
    $path = "images/categories";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if (
        $name != "" &&
        $slug != "" &&
        $description != ""
    ) {


        $cate_query = "INSERT INTO `categories`( `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`) 
    VALUES ( '$name','$slug', '$description', '$status', '$popular', '$image', '$meta_title', '$meta_description')";

        $cate_query_run = mysqli_query($conn, $cate_query);
        if ($cate_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
            echo "Category Added Successfully";
        } else {
            echo "Something Went Wrong";
        }
    } else {
        echo "All fields are mandatory";
    }





}


if (isset($_POST['update_category_btn'])) {//обновлять category
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $path = "images/categories";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        $update_filename = time(). '.' .$image_ext;

    } else {
        $update_filename = $old_image;
    }
    $update_query = "UPDATE `categories` SET `name`='$name',`slug`='$slug',`description`='$description',`status`='$status',`popular`='$popular',`image`='$update_filename',`meta_title`='$meta_title ',`meta_description`='$meta_description' WHERE id = '$category_id'";
    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$update_filename);
            if (file_exists("images/categories/" .$old_image)) {
                unlink("images/categories/" .$old_image);
            }
        }
        echo "Category updated successfully";
    } else {
        echo "Something went wrong";
    }
}


if (isset($_POST['delete_category_btn'])) {//удаление categry
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $category_query = "SELECT * FROM `categories` WHERE id = '$category_id' ";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);

    $image = $category_data['image'];
    $delete_query = "DELETE FROM `categories` WHERE id ='$category_id' ";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {

        if (file_exists("images/categories/" . $image)) {
            unlink("images/categories/" . $image);
        }

        //header('location: category.php');
    } else {

    }
}

if (isset($_POST['add_product_btn'])) {//добавлять product
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';


    $image = $_FILES['image']['name'];
    $path = "images/product";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if (
        $name != "" &&
        $slug != "" &&
        $description != ""
    ) {

        $product_query = "INSERT INTO `products`( `category_id`, `name`, `slug`, `small_description`, `description`, `price`, `selling_price`, `image`, `qty`, `status`, `trending`) VALUES ('$category_id','$name','$slug','$small_description','$description','$price','$selling_price', '$image','$qty' ,'$status','$trending')";
        $product_query_run = mysqli_query($conn, $product_query);
        if ($product_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
            echo "Product Added Successfully";
        } else {
            echo "Something Went Wrong";
        }
    } else {
        echo "All fields are mandatory";
    }
}


if (isset($_POST['update_product_btn'])) {//обновлять product
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    //var_dump($_POST);


    // $image = $_FILES['image']['name'];
    $path = "images/product";
    //$image_ext = pathinfo($image, PATHINFO_EXTENSION);
    //$filename = time().'.'.$image_ext;

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }
    $update_product_query = "UPDATE `products` SET `category_id`='$category_id',`name`='$name ',`slug`='$slug',
    `small_description`='$small_description',`description`='$description',
    `price`='$price',`selling_price`='$selling_price',`image`='$update_filename ',
    `qty`='$qty',`status`='$status',`trending`='$trending' WHERE id='$product_id' ";
    $update_product_query_run = mysqli_query($conn, $update_product_query);

    if ($update_product_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("images/product" . $old_image)) {
                unlink("images/product/" . $old_image);
            }
        }
        echo "Product  updated successfully";
    } else {
        echo "Something went wrong";
    }
}


if (isset($_POST['delete_product_btn'])) {//удаление products
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $product_query = "SELECT * FROM `products` WHERE id = '$product_id' ";
    $product_query_run = mysqli_query($conn, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];
    $delete_query = "DELETE FROM `products` WHERE id ='$product_id' ";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../images/product/" . $image)) {
            unlink("../images/product/" . $image);
        }

    } else {

    }
} else {
    //header('Location: ../index.php');
}
//catgory

if (isset($_POST['delete_item'])) {
    $id = $_POST['delete_item'];
    $query = "DELETE FROM `categories` WHERE `id` = '$id'";
    mysqli_query($conn, $query);
}


//product

if (isset($_POST['delete_items'])) {
    $id = $_POST['delete_items'];
    $query = "DELETE FROM `products` WHERE id ='$product_id' ";
    mysqli_query($conn, $query);
}
