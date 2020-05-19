
<?php
require("includes/conn.php");
if (isset($_POST['submit'])){
  $email=$_POST['admin_email'];
  $fullname=$_POST['Admin_Name'];
  $password=$_POST['password'];
  
  $query="INSERT INTO admin(Admin_Name,admin_pass,admin_email)
  values('$fullname','$password','$email')";

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
                <h3 class="text-center title-2">Add Admin</h3>
              </div>
              <hr>
              <form action="" method="post">
                <div class="form-group has-success">
                  <label for="cc-payment" class="control-label mb-1">Admin Name</label>
                  <input id="cc-pament" name="Admin_Name" type="text" class="form-control" >
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">Admin Email</label>
                  <input id="cc-name" name="admin_email" type="text" class="form-control cc-name valid" >
                  <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group">
                  <label for="cc-number" class="control-label mb-1">Admin password</label>
                  <input id="cc-number" name="password" type="password" class="form-control cc-number identified visa">
                </div>

                <div>
                 <button id="payment-button" type="submit" name="submit"  class="btn btn-lg btn-info ">

                  <span id="payment-button-amount">submit</span>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="row m-t-30">
          <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
              <table class="table table-borderless table-data3">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Password</th> 
                    <th>Edit</th>
                    <th >Delete</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <?php
                  $query = "select * from admin";
                  $result = mysqli_query($conn,$query);
                  while($admin = mysqli_fetch_assoc($result)){

                   echo "<tr>";
                   echo "<td>{$admin['admin_id']}</td>";
                   echo "<td>{$admin['admin_name']}</td>";
                   echo "<td>{$admin['admin_email']}</td>";
                   echo "<td>{$admin['admin_pass']}</td>";
                   
                   echo "<td><a href='edit_admin.php?id={$admin['admin_id']}' class ='btn btn-info' >Edit</a></td>";
                   echo "<td><a href='delete_admin.php?id={$admin['admin_id']}' class ='btn btn-danger' >Delete</a></td>";
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
 </div>
</div>
</div>

<?php include("includes/footer.php")?> 
