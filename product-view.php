<?
include('./config/dbcon.php');
include ('include/header.php');
include ('include/navbar.php');
include ('function/userfunctions.php');

//echo $_GET['product'];?>

<div class="nav-my">
    <h6 class="text-white">

        <a class="text-white" href="index.php">
            Home /
        </a>
        <a class="text-white" href="categories.php">
            Collections /
        </a>
        <!-- <?= $product['name']; ?> -->

    </h6>
</div>
<?
if (isset($_GET['product'])) 
{
    //global $conn;
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    //$product_data = getIdActive("products", $product_slug);
    var_dump($product_slug);
    $id = $_GET['product'];
    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$id'");
    //var_dump($select_products);
    while($product=mysqli_fetch_assoc($select_products)){
        $product = mysqli_fetch_array($product_data);
   
?>


<?
    // if($product)
    // {
    //     $pid =  $product['id'];
    //    // $pid = "";
    //     $query = "SELECT * FROM `products` WHERE id = '$pid' ";
        // $select_products = mysqli_query($conn, $query);//
    if (mysqli_num_rows($select_products) > 0)
    {
        $products = getAllActive("products");
       

        if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
                
                
                
                
            ?>



<div class="prod-view prod " id="prod-view">
    <h1 class="title-header">products</h1>
    <form action="" method="get" enctype="multipart/form-data">
   
        <div class="wrapper product_data">
        <div class="products-img" name="prod_img">
            <img src="../admin/images/product/<?= $product['image']; ?>" name="prod_img" class="cart-img" alt="Product Image">

        </div>
        <div class="products-info">
            <div class="products-text">
                <h1 name="prod_name"><?= $product['name']; ?></h1>
                <hr>
                <h4 class="trend" name="product_trend"><? if ($product['trending']) {
                        echo "популярный ";
                    } ?>
                </h4>
                <h2><?= $product['small_description']; ?></h2>
            </div>

            <div class="products-price-btn">
                <h4 class="price-del" name="product_price">
                    <del>RUB  <?= $product['price']; ?></del>
                </h4>
                <h4> RUB  <?= $product['selling_price']; ?>
                </h4>
            </div>
        
            <div class="butt">
                <div class="col">
                    <div class="quat">
                        <button class="minus " id="dment-btn">-</button>
                        <input type="text" class="qty-input" id="qty-input" value="1" disabled>
                        <button class="plus iment-btn" id="iment-btn">+</button>
                    </div>

                </div>
            </div>
            <div class="buy-pd">
                <button class="foot2  addToCartBtn" id="addToCartBtn" value="<?= $product['id'] ;?>">
                <i class="las la-shopping-cart" ></i>
                    Add TO Cart
                </button>
                 <button class="foot2  addToWishlistBtn" id="addToWishlistBtn">
                    <i class="las la-heart"></i>Add to Wishlist</button>

            </div>
            </form>
                    
        </div>
    </div>
</div>





        <?
            }
        }
    }else{

    }
}



} else {
    echo "div class='empty_text'> Нет доступных продуктов</div>";
}





include("./include/footer.php") ?>


