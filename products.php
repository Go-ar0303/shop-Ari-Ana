<?

include ("./include/header.php");
include ("./include/navbar.php");
include ("./function/myfunc.php");
include ("./function/userfunctions.php");

if (isset($_GET['category'])) {

    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);
    
    // $cid = $category['id'];

    if ($category) {
        $cid = $category['id'];
        ?>



        <div class="nav-my">


            <h6 class="text-white">

                <a class="text-white" href="/index.php">
                    Home /
                </a>
                <a class="text-white" href="/categories.php">
                    Collections /
                </a>
                <?= $category['name']; ?>

            </h6>
            <hr>
        </div>
        <div class="prod ">
            <h1 class="title-header">
                <?= $category['name']; ?>
            </h1>


            <div class="product_container">

                <?
                global $conn;
                  
                $query = "SELECT * FROM `products` WHERE category_id = '$cid' AND  status = '0'";
                $products = mysqli_query($conn, $query);
                if (mysqli_num_rows($products) > 0) {
                    foreach ($products as $item) {

                       // var_dump($item);
                        ?>
                        <ul class="cards-cat">
                            <li>
                                <form action="" method="post" enctype="multipart/form-data">
                                <a href="/product-view.php?product=<?= $item['slug']; ?>" class="card-cat">
                                    <img src="../admin/images/product/<?= $item['image']; ?>" alt="Product images" class="card__image">
                                    <div class="card__overlay">
                                        <div class="card__header">
                                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                                <path />
                                            </svg>

                                            <div class="card__header-text">
                                                <h3 class="card__title">
                                                    <?= $item['name']; ?>
                                                </h3>

                                            </div>
                                        </div>
                                        <p class="card__description">
                                            <?= $item['description']; ?>
                                        </p>
                                    </div>
                                </a>
                                </form>

                            </li>
                        </ul>

                    <?
                    }
                } else {
                    echo "No data available";
                }

                ?>
            </div>
        </div>


    <?
    } else {
        echo "Something went wrong";
    }
} else {
}

?>


<? include ("./include/footer.php") ?>