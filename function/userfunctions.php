<?php


function getAllActive($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE status = '0' ";
    return $query_run = mysqli_query($conn, $query);
}
function getSlugActive($table, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status = '0' LIMIT 1 ";
    return $query_run = mysqli_query($conn, $query);
}


function getIdActive($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id' AND status = '0' ";// AND status = '0'
    return $query_run = mysqli_query($conn, $query);
}

function getProdByCategory($category_id)
{
    global $conn;
    $query = "SELECT * FROM `products` WHERE category_id='$category_id'  "; //AND status = '0'
    return $query_run = mysqli_query($conn, $query);
}



function getCartItems()
{
    global $conn;
    $userId = $_SESSION['user_id'];
    //echo $userId;
    $query = "SELECT carts.id, carts.user_id, products.id AS pid, products.name, products.image, products.selling_price  FROM carts join products ON products.id = carts.prod_id WHERE  carts.user_id = '$userId'";
    return $query_run = mysqli_query($conn, $query);

}

function getOrders()
{
    global $conn;
    $userId = $_SESSION['user_id'];
    $query= "SELECT * FROM `orders` WHERE user_id = '$userId' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);
}

function checkTrackingNoValid($trackingNo)
{
    global $conn;
    $userId = $_SESSION['user_id'];
    $query= "SELECT * FROM `orders` WHERE tracking_no = '$trackingNo' AND user_id = '$userId' ";
    return  mysqli_query($conn, $query);
}
?>