 <?php
 require("includes/conn.php");
 if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
        // $image=$_POST['image'];
    $pro_des=$_POST['pro_des'];
    $cat=$_POST['cat'];
    $image_name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $path= 'uploads/';
    move_uploaded_file($tmp_name, $path.$image_name);

    $query="INSERT INTO products(pro_name,pro_price,pro_image,pro_des,cat_id)
    values('$name','$price','$image_name','$pro_des','$cat')";

    mysqli_query($conn,$query);
    header('location:manage_product.php');


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
                            <h3 class="text-center title-2">Product</h3>
                        </div>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Porduct Name</label>
                                <input id="cc-name" name="name" type="text" class="form-control cc-name valid" value="">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">price</label>
                                <input id="cc-name" name="price" type="text" class="form-control cc-name valid" >
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Image</label>
                                <input id="cc-name" name="image" type="file" class="form-control cc-name valid" >
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Product Description</label>
                                <input id="cc-name" name="pro_des" type="text" class="form-control cc-name valid" >
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Category ID</label>

                                <select id="inputState" class="form-control" name="cat">
                                    <option value="">Choose....</option>
                                    <?php
                                    require("includes/conn.php");
                                    $query="SELECT * FROM catagory";
                                    $result=mysqli_query($conn,$query);
                                    while ($cat=mysqli_fetch_assoc($result))
                                    {
                                        echo "<option value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>


                            <div>
                                <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info ">

                                    <span id="payment-button-amount">Submit</span>
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
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Catagory Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query="SELECT * FROM products
                                    inner join catagory on catagory.cat_id=products.cat_id";
                                    $result = mysqli_query($conn,$query);
                                    while($products = mysqli_fetch_assoc($result)){

                                       echo "<tr>";
                                       echo "<td>{$products['pro_id']}</td>";
                                       echo "<td>{$products['pro_name']}</td>";
                                       echo "<td>{$products['pro_price']}</td>";
                                       echo "<td><img src='uploads/{$products['pro_image']}' width = 50 px; hight = 50 px;></td>";
                                       echo "<td>{$products['pro_des']}</td>";
                                       echo "<td>{$products['cat_name']}</td>";
                                       echo "<td><a href='edit_pro.php?id={$products['pro_id']}' class ='btn btn-info'>Edit</a></td>";
                                       echo "<td><a href='delete_pro.php?id={$products['pro_id']}' class ='btn btn-danger'>Delete</a></td>";
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
