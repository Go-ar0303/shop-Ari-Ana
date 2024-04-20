<?
session_start();

include ('./include/header.php');
include ('./include/navbar.php');
include ("./function/myfunc.php");
include ("./function/userfunctions.php");
include ('./auth.php');

?>



<div class=" nav-my ">


    <h6 class="">

        <a class="text-white" href="./index.php">
            Home /
        </a>
        <a class="text-white" href="./cart.php">
            Cart /
        </a>


    </h6>
    <hr>
</div>
<div id="mycart">

    <table class="table2">
        <thead>
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>

            </tr>
        </thead>
        <?
        $items = getCartItems();

        if (mysqli_num_rows($items) > 0) 
        { ?>
            <tbody>

                <div id="cartbody">

                    <?

                    foreach ($items as $citem) { ?>
                        <tr>
                            <td><img src="../admin/images/product/<?=$citem['image']; ?>" alt="" id="ct-img"></td>
                            <td>
                                <h2><?=$citem['name']; ?></h2>
                            </td>
                            <td>
                                <h2>RUB <?= $citem['selling_price']; ?></h2>
                            </td>

                            <td>

                                <input type="hidden" class="prodId" id="prodId" value="<?= $citem['prod_id']; ?>">
                                <div class="buy-pd">
                                    <button class=" dment-btn updateQty minus" id="dment-btn2">-</button>
                                    <input type="text" class=" qty-input text-center" id="qty-input2" value="1" disabled>
                                    <button class="iment-btn updateQty plus" id="iment-btn2">+</button>
                                </div>



                            </td>
                            <td> <button class="deleteItem" id="deleteItem" value="<?= $citem['cid']; ?>">
                                    <i class="las la-trash"></i>
                                    Remove
                                </button>
                            </td>
                        </tr>
                </div>

            </tbody>
            
    
            <?
                    }
        } else { ?>
            <h4>Your cart is empty</h4>
    

            <?
        }
        ?>
      
        <div>
        <h4>Ваша корзина пуста</h4>
    </div>
    
       

    </table>
    <div>
            <a href="/checkout.php">перейдите к оформлению заказа</a>
    </div>




  

</div>





<? include ('./include/footer.php'); ?>