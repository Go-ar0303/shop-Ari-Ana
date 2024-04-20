<?
include 'conn.php';

if(isset($_GET['delete']))
{
    $delete_id=$_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or
     die("Query failied");
    if($delete_query){
   
        echo "Товар удален";
        header('location:product_view.php');
     }else{
        echo "Товар не удален";
        header('location:product_view.php');
     }
}