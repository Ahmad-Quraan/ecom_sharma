    <?php
    require("includes/conn.php");
    if (isset($_POST['submit'])){
        $name=$_POST['customer_name'];
        $email=$_POST['customer_email'];
        $password=$_POST['customer_password'];
        $mobile=$_POST['customer_mobile'];
        $address=$_POST['customer_address'];
       
    $query=" UPDATE customer SET 
        customer_name ='$name', 
        customer_email='$email',
        customer_password='$password',
        mobile='$mobile',
        address='$address'
                 
        WHERE customer_id={$_GET['id']}";

        mysqli_query($conn,$query);
        header('location:manage_customer.php');


    }
    $query="SELECT * FROM customer WHERE customer_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $customer=mysqli_fetch_assoc($result);
   

    ?>

    <?php include("includes/header.php")?> 
    <div class="main-content">
      <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                        <!-- <div class="card-header text-center">Admins</div> -->
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Customer</h3>
                                </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="cc-pament" name="customer_name" value="<?php echo $customer['customer_name']?>" type="text" class="form-control" >
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Email</label>
                                    <input id="cc-name" name="customer_email" value="<?php echo $customer['customer_email']?>" type="text" class="form-control cc-name valid" >
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                               <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">password</label>
                                    <input id="cc-number" name="customer_password" type="text"  value="<?php echo $customer['customer_password']?>" class="form-control cc-number identified visa">
                                </div>
                                 <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">mobile</label>
                                    <input id="cc-name" name="customer_mobile" type="text"  value="<?php echo $customer['mobile']?>" class="form-control cc-name valid" >
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">address</label>
                                    <input id="cc-name" name="customer_address" type="text"  value="<?php echo $customer['address']?>" class="form-control cc-name valid" >
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                               

                                <div>
                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info ">

                                        <span id="payment-button-amount">save</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
               
            </div>
    </div>
    <?php include("includes/footer.php")?> 
