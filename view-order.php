<?

include ('include/header.php');
include ('include/navbar.php');
include ("function/myfunc.php");
include ("function/userfunctions.php");
include ('auth.php');

if(isset($_GET['t']))
{
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);
    if(mysqli_num_rows($orderData)< 0)
    {?>
    <h4>Something went wrong</h4>

   <? 
   die();
}

}else{

}
?>
<div class="nav-my">


<h6 class="text-white">

    <a class="text-white" href="/index.php">
        Home /
    </a>
    <a class="text-white" href="/myOrders.php">
        My Orders /
    </a>


</h6>
<hr>
</div>
<div>
    <div>
    View Order
    </div>
    <div> 
        <div>
            <label for="">Name</label>
            <div><?=$data['name'];?></div>
        </div>
        <div>
            <label for="">Email</label>
            <div><?=$data['email'];?></div>
        </div>

        <div>
            <label for="">Tracking №․</label>
            <div><?=$data['tarcking_no'];?></div>

        </div>
        
        

 </div>
    
</div>

