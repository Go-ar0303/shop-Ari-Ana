<?

include("./include/header.php");
include("./include/navbar.php");
include("./function/myfunc.php");
include("./function/userfunctions.php");


?>


<div  class=" nav-my ">
    <h6 class="text-white">

        <a class="text-white" href="/index.php">
            Home /
        </a>
        <a class="text-white" href="/cart.php">
            Cart /
        </a>


    </h6>

</div>
<hr>



<div class="prod">
    <h1 class="title-header">Our Collections</h1>
    
    <div class="product_container ">

        <?
        $categories = getAllActive("categories");
        // $query = "SELECT * FROM `categories` WHERE id='$id' AND status = '0' ";
        // $categories = mysqli_query($conn, $query);

        if (mysqli_num_rows($categories) > 0) {
            foreach ($categories as $item) {

        ?>

                <ul class="cards-cat">
                    <li>
                    <form action=""  method="post" enctype="multipart/form-data">
                        <a href="products.php/?category=<?=$item['slug'];?>" class="card-cat">
                            <img src="../admin/images/categories/<?= $item['image']; ?>"  class="card__image">
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





<? include("include/footer.php") ?>