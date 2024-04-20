<?

session_start();
include ('../config/dbcon.php');
require 'userfunctions.php';

if (isset($_SESSION['user_id'])) {

    if (isset($_POST['placeOrderBtn'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $cardnumber = mysqli_real_escape_string($conn, $_POST['cardnumber']);
        $expmonth = mysqli_real_escape_string($conn, $_POST['expmonth']);
        $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);;
        $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);
        if (
            $name == "" &
            $email == "" &
            $phone == "" &
            $address == "" &
            $cardnumber == "" &
            $expmonth == "" &
            $cvv == ""
        ) {
            $message[] = 'все поля являются обязательными';
            header('location: ../checkout.php');
            exit(0);
        }

        $userId = $_SESSION['name']['user_id'];
        $query = "SELECT carts.id, carts.user_id, products.id AS pid, products.name, products.image, products.selling_price  FROM carts join products ON products.id = carts.prod_id WHERE  carts.user_id = '$userId'";
        return $query_run = mysqli_query($conn, $query);
    

        $totalPrice = 0;
        foreach ($cartItems as $citems) 
        {
            $totalPrice += $citems['selling_price'] * $citems['prod_qty'];
        }
        $tracking_no = "sharmacoder" . rand(1111, 9999) . substr($phone, 8);
        $insert_query = "INSERT INTO `orders`( `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `cardnumber`, `expmonth`, `cvv`, `total_price`, `payment_mode`, `payment_id`) VALUES ('$tracking_no, '$userId', '$name', '$email, '$phone', '$address', '$cardnumber', '$expmonth',' $cvv ', '$totalPrice', '$payment_mode', '$payment_id')";
        $insert_query_run = mysqli_query($conn, $insert_query);
        if($insert_query_run)
        {
            $order_id = mysqli_insert_id($conn);
            foreach ($cartItems as $citems)
            {
             $prod_id =   $citems['prod_id'];
             $prod_qty =   $citems['prod_qty'];
             $price =   $citems['selling_price'];
            $insert_items_query = "INSERT INTO `orderItems`( `order_id`, `prod_id`, `qty`, `price`) VALUES ('$order_id','$prod_id','$prod_qty','$price')";
            $insert_items_query_run = mysqli_query($conn, $insert_items_query);
            }

            $deleteCartQuery = "DELETE FROM `carts` WHERE user_id = '$user_id'";
            $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);
            $message[] ="
            заказ успешно размещен";
            header('location: ../myOrders.php');
            die();
        }

    }
} else {
    header('location: ../index.php');
}




?>