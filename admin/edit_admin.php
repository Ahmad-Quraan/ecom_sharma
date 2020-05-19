
<?php
require("includes/conn.php");
if (isset($_POST['submit'])){
    $email=$_POST['admin_email'];
    $fullname=$_POST['admin_name'];
    $password=$_POST['password'];
   
    $query="UPDATE admin SET admin_name  ='$fullname',
    						admin_pass   ='$password',
    						admin_email  = '$email' 
    		WHERE admin_id={$_GET['id']}";

    mysqli_query($conn,$query);
    header('location:manage_admin.php');

}
$query= "select * from admin where admin_id ={$_GET['id']}";
$result=mysqli_query($conn,$query);
$admin= mysqli_fetch_assoc($result); 


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
                                <h3 class="text-center title-2">Edit Admin</h3>
                            </div>
                        <hr>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Admin_Name</label>
                                <input id="cc-pament" name="admin_name" 
                                value="<?php echo $admin['admin_name'] ;?>" 
                                type="text" class="form-control" >
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Admin_Email</label>
                                <input id="cc-name" name="admin_email" value="<?php echo $admin['admin_email'] ;   ?>"type="text" class="form-control cc-name valid" >
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Admin_password</label>
               <input id="cc-number" name="password" value="<?php echo $admin['admin_pass'] ?>" type="text" class="form-control cc-number identified visa">
                            </div>

                            <div>
                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info ">

                                    <span id="payment-button-amount">Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
          
        </div>
</div>
<?php include("includes/footer.php")?> 
