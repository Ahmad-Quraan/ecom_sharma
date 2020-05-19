<?php
include("admin/includes/conn.php");
$quere = "SELECT * FROM  catagory ";
$result = mysqli_query($conn,$quere);
?>


<?php 
include("includes/header.php");
?>

<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row-fluid">
      <div class="">
        <div class="product_top_bar">
          <div class="left_dorp">
          </div>
        </div>

        <div class="latest_product_inner">
          <div class="row">
           <?php
           foreach ($result as $key => $value) {
            ?>
            <div class="col-lg-4 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img
                  style="height:200px;"
                  width="100%"
                  class="card-img"
                  src="admin/<?php echo $value['cat_image'] ?>"
                  alt=""
                  />

                  <div class="p_icon">
                    <a href="product.php?id=<?php echo $value['cat_id'] ?>">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                
                    <h4><?php echo $value['cat_name'] ?></h4>
                  
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
</section>
<!--================End Category Product Area =================-->

<!--================ start footer Area  =================-->
<?php 
include("includes/footer.php");

?>