<?
//session_start();

include ('include/header.php');
include ('include/navbar.php');
include ("function/myfunc.php");
include ("function/userfunctions.php");
include ('auth.php');

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
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tracking No</th>
                <th>Price</th>
                <th>Date</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>

        <? 
        $orders = getOrders();
        if(mysqli_num_rows($orders) > 0)
        {
            foreach($orders as $item) { ?>
            <tr>
                <td><?$item['id'];?></td>
                <td><?$item['tracking_no'];?></td>
                <td><?$item['total_price'];?></td>
                <td><?$item['ceated_at'];?></td>
                <td>
                    <a href="view-order.php?t=<?=$item['tracking_no'];?>">View detials</a>
                </td>
            </tr>

           <? }

        }else{?>
            <tr>
            <td colspan="5">No orders yet</td>
         
        </tr>


<?

            echo "No data available";
        }

        ?>
        </tbody>
    </table>
</div>






<? include ('./include/footer.php'); ?>