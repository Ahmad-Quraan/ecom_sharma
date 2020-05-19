<?php
include("admin/includes/conn.php");
$quere = "SELECT * FROM products WHERE pro_id ={$_GET['id']}";
$result = mysqli_query($conn,$quere);
$products = mysqli_fetch_assoc($result);
?>
<?php 
  include("includes/header.php");

?>

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                                  <?php
            foreach ($result as $key => $value) {
  ?>
                        <img
                          src="admin/uploads/<?php echo $value['pro_image'] ?>"
                          alt=""
                        />

                      </div>
                      <div class="media-body">
                        <p><?php echo $value['pro_name'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5><?php echo $value['pro_price'] ?></h5>
                  </td>
                  <td>
                    
                  </td>
                 
                </tr>
                
               
               
                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="main_btn" href="checkout.php?id=<?php echo $value['pro_id'] ?>">Proceed to checkout</a>
                    </div>
                                <?php
            }
             ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->
<?php 
  include("includes/footer.php");

?>