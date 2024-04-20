<?
include('./config/dbcon.php');
include ('include/header.php');
include ('include/navbar.php');
include ('function/userfunctions.php');include 'conn.php';



if (isset($_POST['add_to_cart'])) {

    $products_name =  $_POST['product_name'];
    $products_price = $_POST['product_price'];
    $products_image = $_POST['product_image'];
    $product_quantity = 1;



    $select_cart = mysqli_query($conn, "SELECT * FROM `carts` WHERE prod_id = '$products_name'");
    
    if (mysqli_num_rows($select_cart) > 0) {
        $display_message[] = "Товар уже добавлен";
    } else {


        // //insert cart data in cart table
        $insert_products = mysqli_query($conn, "INSERT INTO `carts`( `user_id`, `prod_id`, `prod_qty`) VALUES ('$products_name',' $products_price ',' $products_image','$product_quantity' )");

        $display_message[] = "Товар добавлен";
    }
}


?>



<?
include 'header.php'; ?>




<?

if (isset($display_message)) {
    foreach ($display_message as  $display_message) {
?>

        <div class="display_message">
            <span><? echo $display_message; ?></span>

            <section class="products">

                <i class="fas fa-times" onclick="this.parentElement.style.display = `none`"></i>
                <h1 class="heading">Lets Shop</h1>

        </div>



<?
    }
}




?>
<h1 class="title_home">ЮВЕЛИРНЫЙ ИНТЕРНЕТ-МАГАЗИН Ari-Ana</h1>
<div class="cont">



    <div class="row row-cols row-cols-md-3 g-5 product_container">
        <?

        $select_products = mysqli_query($conn, "SELECT * FROM `products`");
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                //echo $fetch_product['name'];




        ?>


                <form action="" method="post" enctype="multipart/form-data">

                    <div class="card edit_form" style="width: 18rem;">
                        <img src="image/<? echo $fetch_product['image']; ?>" class="card-img" alt="...">
                        <div class="card-body text-center ">
                            <h5 class="card-title"><? echo $fetch_product['name']; ?></h5>
                            <p class="price text-danger">цена<? echo $fetch_product['price']; ?></p>
                            <input type="hidden" name="product_name" value="<? echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<? echo $fetch_product['price']; ?>">
                            <input type="hidden" name="product_image" class="img" value="<? echo $fetch_product['image']; ?>">
                            <input href="" id="1" name="add_to_cart" value="add_to_cart" class="btn btn-primary buy sumbit_btn cart_btn" type="submit">
                        </div>
                    </div>
                </form>







        <?

            }
        } else {
            echo "div class='empty_text'> Нет доступных продуктов</div>";
        }


        ?>

    </div>


    </section>
</div>


<?
include 'footer.php';
?>