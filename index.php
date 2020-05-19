
<?php
include("admin/includes/conn.php");
$quere = "SELECT * FROM products ";
$result = mysqli_query($conn,$quere);
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
                <p class="product-price">$ <?php echo $value['pro_price']?>&nbsp;</p>
 
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

<!--================ New Product Area =================-->
<section class="new_product_area section_gap_top section_gap_bottom_custom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="main_title">
          <h2><span>products</span></h2>
        </div>


        <div class="row-fluid">
         <div class="col-lg-12">
          <div class="col-lg-12 mt-5 mt-sm-0">
            <div class="row">
              <?php
              foreach ($result as $key => $value) {
                ?>
                <div class="col-lg-6 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img class="img-fluid " style="height: 300px; width: 300px;" src="admin/uploads/<?php echo $value['pro_image'] ?>"  />
                      <div class="p_icon"> 

                        <a href="single-product.php?id=<?php echo $value['pro_id'] ?>">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4><?php echo $value['pro_name'] ?></h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4"><?php echo $value['pro_price'] ?></span>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!--================ End New Product Area =================-->


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