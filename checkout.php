<?php
include("admin/includes/conn.php");
$quere = "SELECT * FROM products WHERE pro_id ={$_GET['id']}";
$result = mysqli_query($conn,$quere);
$products = mysqli_fetch_assoc($result);
?>
<?php 
  include("includes/header.php");

?>
<?php
require("includes/conn.php");
if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $num=$_POST['num'];
    $location=$_POST['location'];
   
    $query="INSERT INTO users(user_name,numbers,location)
        values('$name','$num','$location')";

    mysqli_query($conn,$query);
    header("location:thanks.php");
}

?>


<!--================Checkout Area =================-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <!-- <div class="card-header text-center">Admins</div> -->
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">User Informations</h3>
              </div>
              <hr>
              <form action="" method="post">
                <div class="form-group has-success col-12 col-md-9">
                  <label for="cc-payment" class="control-label mb-1">User Name</label>
                  <input id="cc-pament" name="name" type="text" class="form-control" >
                </div>
                <div class="form-group has-success col-12 col-md-9">
                  <label for="cc-name" class="control-label mb-1">User Phone number</label>
                  <input id="cc-name" name="num" type="number" class="form-control cc-name valid" >
                  <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group has-success col-12 col-md-9">
                  <label for="cc-number" class="control-label mb-1">User Location</label>
                  <input id="cc-number" name="location" type="" class="form-control cc-number identified visa">
                </div>

                <div>
                         <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info ">
                   <span id="payment-button-amount">submit</span>
             
                </button>
               
              </div>
            </form>
          </div>
        </div>
     </div>
   </div>
 </div>
</div>
</div>
<!--================End Checkout Area =================-->
<?php 
  include("includes/footer.php");

?>