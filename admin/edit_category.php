<?php
require("includes/conn.php");
 if(isset($_POST['updatecat'])){
    $id        =$_GET['id'];
    $fullname  =$_POST['name_cat'];
    $image=$_POST['imagecat'];
    $error=$_FILES['image']['error'];
    if (!$error) {
        $image_name=$_FILES['image']['name'];
        $tmp_name  =$_FILES['image']['tmp_name'];
        $path      = 'uploads/';
        if(!is_dir($path.$fullname)){
            mkdir($path.$fullname);
            $pathfolder=$path.$fullname."/".$image_name;
        }else
        {
            $pathfolder=$path.$fullname."/".$image_name;
        } 
    }
    else

    {
        $pathfolder=$image;
    }
    
    move_uploaded_file($tmp_name, $pathfolder);
    $query    ="UPDATE catagory SET cat_name ='$cat_name',
                                    cat_image='$pathfolder' 
                                    WHERE cat_id='$id'";
    mysqli_query($conn,$query);
    header("location:manage_category.php");

}
$query="SELECT * FROM catagory WHERE cat_id={$_GET['id']}";
$result=mysqli_query($conn,$query);
$category=mysqli_fetch_assoc($result);
?>
<?php include("includes/header.php")?> 
 <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">Category</h3>
              </div>
              <hr>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Category Name</label>
                  <input id="cc-pament" name="name_cat" value="<?php echo $category['cat_name'] ?>" type="text" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Image Name</label>
                  <input id="cc-pament" name="image" type="file" class="form-control" >
                  <input id="cc-pament" value="<?php echo $category['cat_image'] ?>" name="imagecat" type="text" class="form-control" >
                </div>
                <div>
                  <button id="payment-button" name="updatecat" type="submit" class="btn btn-lg btn-info ">

                    <span id="payment-button-amount">Submit</span>
                  </button>
                </div>
              </form>
            </div>
<?php include("includes/footer.php")?> 
