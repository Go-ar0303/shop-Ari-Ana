<?
session_start();

include('./include/header.php');
include('./include/navbar.php');
include("./function/myfunc.php");
include("./function/userfunctions.php");
include('auth.php');

?>



<div class="nav-my">


    <h6 class="text-white">

        <a class="text-white" href="/index.php">
            Home /
        </a>
        <a class="text-white" href="/checkout.php">
            Checkout /
        </a>


    </h6>
    <hr>
</div>


<h2 class="title-header"> Checkout Form</h2>

<div class="row-ck">
    <div class="col-75">
        <div class="container-check contain">
            <form action="" method="post">
                <p> * поля являются обязательными</p>

                <div class="row">
                    <div class="col-50">
                        <h3>Адрес для выставления счета</h3>
                        *<label for="fname"><i class="fa fa-user"></i> Name</label>
                        <input type="text" id="name" name="name" placeholder="Name">
                        *<label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="Email">
                        *<label for="phone"><i class="fa fa-phone"></i> Phone</label>
                        <input type="text" id="phone" name="phone" placeholder="Phone">
                        *<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="Address">



                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>

                        *<label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                        *<label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="11/29">

                        *<label for="cvv">CVV</label>
                        <input type="password" id="cvv" name="cvv" placeholder="352" >

                    </div>

                </div>
                <div class="contain prod">
                    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span></h4>
                        <div class="body2">

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
                                <tbody>


                                    <? $items = getCartItems();
                                    $totalPrice = 0;
                                    foreach ($items as $citem) { ?>
                                        <tr>
                                            <td>
                                                <img src="..admin/images/product/<?= $citem['image']; ?>" alt="">

                                            </td>
                                            <td>
                                                <h5>
                                                    <?=$citem['name']; ?>
                                                </h5>
                                            </td>
                                            <td>
                                                <h5>RUB
                                                    <?=$citem['selling_price']; ?>
                                                </h5>
                                            </td>
                                            <td>
                                                <h5>
                                                    <?=$citem['prod_qty']; ?>
                                                </h5>
                                            </td>
                                        </tr>

                                </tbody>
                            </table>

                        <?
                                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                    }

                        ?>
                        <hr>
                        <h5>total Price: <span class="price">
                                <?= $totalPrice; ?>
                            </span>
                        </h5>
                        <div>
                            <input type="hidden" name="payment_mode" id="" value="cod">

                            <label>
                                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as
                                billing
                            </label>
                            <button type="submit" name="placeOrderBtn" value="Continue to checkout" class="btn-order btn"></button>

                        </div>

                    </div>
                </div>


            </form>
        </div>
    </div>








    <? include('include/footer.php'); ?>