<?
include ('./config/dbcon.php');

session_start();
//$user_id = $_SESSION['user_id'];

if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
// if (isset($_POST["users"])) {
//     $users = ($_POST['users']);
// }

?>

<div class="w3-bar  w3-card  navbar" id="myNavbar">
    <div class="nav" id="myTop">
        
        <a class="logo" href="/index.php">
            <img src="/images/logo.png" class="img-logo" alt="">
        </a>

        <div class="dropdown profile">
                <button class="dropbtn name"> <small>
                    <? if (isset($_POST['login_btn'])) 
                    {
                       echo $_SESSION['name'];
                        }else{ 
                            echo "Profile";
                            }?>
                        </small>
                    <i class="las la-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="/login.php">profile</a>
                    <a href="/logout.php">Logout</a>
                
                    
                </div>
            </div>
       



        <div class=" w3-right">
                
            
            
            <a href="/categories.php">Collections</a>
            <a href="/myOrders.php">Orders</a>
            <a href=""><span class="las la-search"></span></a>
            <a href="/heart.php"><span class="las la-heart"></span></a>
            <a href="/cart2.php"><span class="las la-shopping-cart"></span></a>

        </div>


        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="top()">&#9776;</a>
    </div>