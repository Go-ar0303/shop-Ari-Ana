<?
require "./config/dbcon.php";

//update query

if (isset($_POST['update_product_quantity'])) {
  $update_value = $_POST['update_quantity'];
  //echo $update_value;
  $update_id = $_POST['update_quantity_id'];
  //echo $update_id;
  $update_quantity_query = mysqli_query($conn, "UPDATE `carts` SET `prod-qty`='$update_value' WHERE id = $update_id");
  //echo "update successfuly";
  if ($update_quantity_query) {
    header('location:cart.php');
  }
}
if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  //echo $remove_id;
  mysqli_query($conn, "DELETE FROM `carts` WHERE id = $remove_id");

    header('location:cart.php');
  
}

if(isset($_GET['delete_all']))
{
  mysqli_query($conn, "DELETE FROM `cart`");

  header('location:cart.php');

}
?>


<?
include './include/header.php';
include './include/navbar.php';
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
    <?
   
    $items = getCartItems();

    if (mysqli_num_rows($items) > 0) {
        ?>
  <?
  $number = 100000;
  //echo $number;
  $format = number_format($number, 2);
  //echo $format;
  ?>
  <section class="shopping_cart">
    <h1 class="heading">мои покупки</h1>
    <table class="table2">
      <?
      $select_cart_products = mysqli_query($conn, "SELECT * FROM `carts`");
      $num = 1;
      $grand_total = 0;
      if (mysqli_num_rows($select_cart_products) > 0) {


        echo '
     <thead class=" thead-success thead-bordered border-light thead-sm table-hover">
     
       <th scope="col ">#</th>
       <th scope="col">наименование товара</th>
       <th scope="col">Изображение продукта</th>
       <th scope="col">Цена продукта</th>
       <th scope="col">Количество продукта</th>
       <th scope="col">Итоговая цена</th>
       <th scope="col">Action</th>
    
   </thead>
   <tbody>';
        while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
      ?>


          <tr>

            <td><? echo $num; ?></td>
            <td><? echo $fetch_cart_products['name']; ?></td>
            <td>
              <img src="../admin/images/<? $fetch_cart_products['image']; ?>" alt=""><?echo $fetch_cart_products['image']; ?>
            </td>
            <td><? echo $fetch_cart_products['price' ]; ?> ₽</td>
            <td>
              <form action="" method="post">
                <input type="hidden" value="<? echo $fetch_cart_products['id']; ?>" name="update_quantity_id">
                <div class="quantity_box">
                  <input type="number" min="1" value="<? echo $fetch_cart_products['quantity']; ?>" name="update_quantity">
                  <input type="submit" class="update_quantity" value="Update" name="update_product_quantity">
                </div>
              </form>
            </td>
            <td><? echo $subtotal = number_format($fetch_cart_products['price'] * $fetch_cart_products['quantity']); ?>₽</td>

            <td>
              <a href="cart.php?remove=<? echo $fetch_cart_products['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">
                <i class="fa fa-trash"> </i>Удалять
              </a>
            </td>



          </tr>

      <?
          $grand_total +=($fetch_cart_products['price'] * $fetch_cart_products['quantity']);
          $num++;
        }
    }
      } else {
        echo '<div class="empty_text">Корзина пуста</div>';
      }

      ?>



      </tbody>


    </table>

    <?
    if ($grand_total > 0)
  {
    ?>
    

    <div class="table_bottom">
      <a href="shop_product.php" class="bottom_btn">продолжать покупку</a>
      <h3 class="bottom_btn">общий итог:<span><?echo $grand_total;?></span></h3>
      <a href="" class="bottom_btn">товар для оформления заказа</a>

    </div>
    
    <a href="cart.php?delete_all" class="del_all_btn" name="delete_all">
      <i class=" fas fa-trash"></i> Удалить всё
    </a>

    <?
    }else{
      echo '';

    }

    ?>

  </section>
</div>