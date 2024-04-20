<?
session_start();
include('./config/dbcon.php');
require './function/userfunctions.php';

if(isset($_SESSION['user_id']))
{
    if(isset($_POST['placeOrderBtn']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $cardnumber = mysqli_real_escape_string($conn, $_POST['cardnumber']);
        $expmonth = mysqli_real_escape_string($conn, $_POST['expmonth']);
        $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);
    
        if($name = "" ||
            $email = "" ||
            $phone = "" ||
            $address = "" ||
            $cardnumber = "" ||
            $expmonth = "" ||
            $cvv = "" )
        {
            $message[] = "All fields are mandatory";
            header('location : checkout.php');
            exit(0);

        }
        $userId = $_SESSION['user_id'];
        //echo $userId;
        $query = "SELECT carts.id, carts.user_id, products.id AS pid, products.name, products.image, products.selling_price  FROM carts join products ON products.id = carts.prod_id WHERE  carts.user_id = '$userId'";
        $query_run = mysqli_query($conn, $query);


        //$cartItem =getCartItems();
        $totalPrice = 0;
        foreach ($cartitems as $citem) {
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
        
        }

        $tracking_no = "sharamcoder".rand(1111,9999).substr($phone,2);
        $insert_query = "INSERT INTO `orders`( `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `cardnumber`, `expmonth`, `cvv`, `total_price`, `payment_mode`, `payment_id`) VALUES ('$tracking_no','$userId','$name ',' $email','$phone','$address',' $cardnumber','$expmonth','$cvv','$totalPrice','$payment_mode','$payment_id')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if($insert_query_run)
        {
            $order_id = mysqli_insert_id($conn);
            foreach($query_run as $citem)
            {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];
                $insert_items_query = "INSERT INTO `orderItems`( `order_id`, `prod_id`, `qty`, `price`) VALUES ('$order_id','$prod_id','$prod_qty','$price')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);
            
                $product_query = "SELECT * FROM `products` WHERE id='$prod_id";
                $product_query_run = mysqli_query($conn, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE `products` SET qty = '$new_qty' WHERE ID = '$prod_id'";
                $updateQty_query_run = mysqli_query($conn, $updateQty_query);
            }
            $deleteCartQuery = "DELETE FROM `carts` WHERE user_id = '$userId' ";
            $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);
            $message[] = "Order placed successfully";
            header('location:/myOrders.php');
            die();
        }
}
}else{
    header('location: ./index.php');
}