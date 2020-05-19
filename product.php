
<?php
include("admin/includes/conn.php");
$quere = "SELECT * FROM products WHERE cat_id ={$_GET['id']}";
$result = mysqli_query($conn,$quere);
$products = mysqli_fetch_assoc($result);
?>
<?php 
include("includes/header.php");
?>
<section>
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
    </div>      
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class=" popular-products-slides owl-carousel ">
          <?php 
            foreach ($result as $key => $value) {
            ?>
            <!-- Single Product -->
            <div class="product">
              <!-- Product Image -->
              <a href=single-product.php?id=<?php echo $value['pro_id'] ?>>
              <div >
                <img src="admin/uploads/<?php echo $value['pro_image'] ?>" style="height: 200px" class="img-fluid" alt="">
               
                 
               </a>
              </div>
              </a>
              <!-- Product Description -->
               <div class="text py-3 px-3">
                <b><?php echo $value['pro_name'] ?></b><br>
                <p class="product-price">$ <?php echo $value['pro_price']?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
 
                <!-- Hover Content -->
                
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
include("includes/footer.php");
?>
<script type="text/javascript">
$(document).ready(function(){
    $('.popular-products-slides').owlCarousel({
      
      margin: 30,
      loop: true,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      smartSpeed: 2000,
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        },
        992: {
          items: 4
        }
      }
    });

  });
</script>