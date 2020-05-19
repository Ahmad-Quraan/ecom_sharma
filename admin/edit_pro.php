
<?php
require("includes/conn.php");
if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_POST['image_pro'];
    $des=$_POST['pro_des'];
    $cat=$_POST['cat'];
    $error=$_FILES['image']['error'];
    if (!$error) {
        $image_name=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path= 'uploads/';
        move_uploaded_file($tmp_name, $path.$image_name);
    }
    else
    {
       $image_name=$image; 
    }
    $query=" UPDATE products SET pro_name ='$name', 
    pro_price='$price',
    pro_image='$image_name',
    pro_des='$des',
    cat_id='$cat'

    WHERE pro_id={$_GET['id']}";

    mysqli_query($conn,$query);
    header('location:manage_product.php');


}

$query= "SELECT * FROM products
inner join catagory on catagory.cat_id=products.cat_id
and 
pro_id={$_GET['id']}";
$result=mysqli_query($conn,$query);
$products=mysqli_fetch_assoc($result);

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
                            <h3 class="text-center title-2">Edit Product</h3>
                        </div>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Product_Name</label>
                                <input id="cc-pament" name="name" type="text" value="<?php echo $products['pro_name']?>"  class="form-control" >
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">price</label>
                                <input id="cc-name" name="price" value="<?php echo $products['pro_price']?>"  type="text" class="form-control cc-name valid" >
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Image</label>
                                <input id="cc-name" name="image" type="file"  class="form-control cc-name valid" >
                                <input id="cc-name" name="image_pro" type="hidden" value="<?php echo $products['pro_image']?>" class="form-control cc-name valid" >
                                <img src="uploads/<?php echo $products['pro_image']?>" style="width: 100px; height: 100px;">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Product Description</label>
                                <input id="cc-name" name="pro_des" type="text" value="<?php echo $products['pro_des']?>" class="form-control cc-name valid" >
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Category ID</label>
                                <select id="inputState" class="form-control" name="cat">
                                    <option value="<?php echo $products['cat_id'] ?>"><?php echo $products['cat_name'] ?></option>
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

                                    <span id="payment-button-amount">Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <?php include("includes/footer.php")?> 
