<?
include_once ('../config/dbcon.php');

session_start();
//$user_id = $_SESSION['user_id'];



if (isset ($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="brand">
            <span>
                <img src="images/style/heart.gif" alt="ring-side-view" />
            </span>
            <h2>Ari-Ana</h2>
        </div>
        <div class="sidemenu">

            <div class="side-user">
                <div class="side-img">
                    <img src="<?=$_SESSION['profile_pic']?>" class="side-img">
                </div>
                <div class="user">
                    <small><?=$_SESSION['name']?></small>
                    
                    <p> Admin </p>
                </div>
            </div>
            <ul>
                <li>
                    <a href="admins.php">
                        <span class="las la-home"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-balance-scale"></span>
                        <span>Finance</span>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <span class="las la-ring"></span>
                        <span>Products</span>
                    </a>
                </li>

                <li>
                    <a href="add-product.php">
                        <span class="las la-plus"></span>
                        <span>Add Products</span>
                    </a>
                </li>

                <li>
                    <a href="category.php">
                        <span class="las la-check-circle"></span>
                        <span>Categories</span>
                        <li>
                    </a>
                </li>

                <li>
                    <a href="add-category.php">
                        <span class="las la-plus"></span>
                        <span>Add Categories</span>
                        <li>
                    </a>
                </li>

                <li>
                    <a href="admin-user.php">
                        <span class="las la-user"></span>
                        <span>Admins</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-phone"></span>
                        <span>Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-shopping-cart"></span>
                        <span>Ecommerce</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-envelope"></span>
                        <span>Mailbox</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="las la-lock"></span>
                        <span>Authentication</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-file-invoice-dollar"></span>
                        <span>Pricing</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-content">
        <header>
            <label for="menu-toggle" class="menu-toggler">
                <span class="las la-bars"></span>
            </label>
            <div class="search">
                <span class="las la-search"></span>
                <input type="search" placeholder="Enter keyword">
            </div>
            <div class="head-icons">
                <span class="las la-bell"></span>
                <span class="las la-bookmark"></span>
                <span class="las la-comment"></span>
            </div>
        </header>


        <main>
            <div class="cards">
                <div class="card">
                    <div class="card-icon follow">
                        <span class="las la-users"></span>
                    </div>
                    <div class="card-info">
                        <h2>
                            3.254
                        </h2>
                        <small>Total followers</small>
                    </div>
                    <div class="card-image">
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-icon likes">
                        <span class="las la-heart"></span>
                    </div>
                    <div class="card-info">
                        <h2>
                            15.254
                        </h2>
                        <small>Total likes</small>
                    </div>
                    <div class="card-image">
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-icon comment">
                        <span class="las la-comment"></span>
                    </div>
                    <div class="card-info">
                        <h2>
                            3.254
                        </h2>
                        <small>Total comments</small>
                    </div>
                    <div class="card-image">
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>
                        <div style="background-image: url('images/style/22.jpeg');"></div>

                    </div>
                </div>
            </div>

            <div class="chart-grid">
                <div class="chart-wrapper">
                    <div id="myfirstchart" style="height: 350px;"></div>

                </div>

                <div id="donut-example" style="height: 350px;"></div>

            </div>
        </main>
    </div>

    <label class="close-mobile-menu" for="menu-toggle"></label>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>