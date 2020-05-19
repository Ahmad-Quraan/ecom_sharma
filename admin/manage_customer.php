    <?php
    require("includes/conn.php");
    if (isset($_POST['submit'])){
        $name=$_POST['customer_name'];
        $email=$_POST['customer_email'];
        $password=$_POST['customer_password'];
        $mobile=$_POST['customer_mobile'];
        $address=$_POST['customer_address'];
       
        $query="INSERT INTO customer(customer_name,customer_email,customer_password,mobile,address)
            values('$name','$email','$password','$mobile','$address')";

        mysqli_query($conn,$query);


    }

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
                                    <h3 class="text-center title-2">Customer</h3>
                                </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group has-success">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="cc-pament" name="customer_name" type="text" class="form-control" >
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Email</label>
                                    <input id="cc-name" name="customer_email" type="text" class="form-control cc-name valid" >
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                               <div class="form-group has-success">
                                    <label for="cc-number" class="control-label mb-1">password</label>
                                    <input id="cc-number" name="customer_password" type="password" class="form-control cc-number identified visa">
                                </div>
                                 <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">mobile</label>
                                    <input id="cc-name" name="customer_mobile" type="text" class="form-control cc-name valid" >
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">address</label>
                                    <input id="cc-name" name="customer_address" type="text" class="form-control cc-name valid" >
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                               

                                <div>
                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info ">

                                        <span id="payment-button-amount">Submet</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3 ">
                                <thead>
                                    <tr>
                                        <th>ID_customer</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>password</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>Edit</th>
                                        <th >Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
              <?php

                      $query = "select * from customer";
                     $result = mysqli_query($conn,$query);
                      while($customer = mysqli_fetch_assoc($result)){

                         echo "<tr>";
                         echo "<td>{$customer['customer_id']}</td>";
                         echo "<td>{$customer['customer_name']}</td>";
                         echo "<td>{$customer['customer_email']}</td>";
                         echo "<td>{$customer['customer_password']}</td>";
                         echo "<td>{$customer['mobile']}</td>";
                         echo "<td>{$customer['address']}</td>";
                         echo "<td><a href='edit_cust.php?id={$customer['customer_id']}' class ='btn btn-info'>Edit</a></td>";
                         echo "<td><a href='delete_cust.php?id={$customer['customer_id']}' class ='btn btn-danger'>Delete</a></td>";
                         echo "</tr>";
                                }
              ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
    </div>
    <?php include("includes/footer.php")?> 
