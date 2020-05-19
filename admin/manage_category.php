<?php
require("includes/conn.php");
if (isset($_POST['submit'])){
  $fullname=$_POST['name_cat'];
  $image_name=$_FILES['image']['name'];
  $tmp_name=$_FILES['image']['tmp_name'];
  $path= 'uploads/';
  if(!is_dir($path.$fullname)){
    mkdir($path.$fullname);
    $pathfolder=$path.$fullname."/".$image_name;
  }else
  {
    $pathfolder=$path.$fullname."/".$image_name;
  }
  move_uploaded_file($tmp_name, $pathfolder);
  $query="INSERT INTO catagory(cat_name,cat_image) VALUES('$fullname','$pathfolder')";
  mysqli_query($conn,$query);  
  header("location:manage_category.php");
}

if (isset($_GET['d_id'])) {
  $id=$_GET['d_id'];
  $query="DELETE FROM catagory WHERE cat_id='$id'";
  mysqli_query($conn,$query);
  $query2 ="delete from products where cat_id ='$id'";
  mysqli_query($conn,$query2);

  header("location:manage_category.php");
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
                <h3 class="text-center title-2">Category</h3>
              </div>
              <hr>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group has-success">
                  <label for="cc-payment" class="control-label mb-1">Category Name</label>
                  <input id="cc-pament" name="name_cat" type="text" class="form-control" >
                </div>
                <div class="form-group has-success">
                  <label for="cc-payment" class="control-label mb-1">Image Name</label>
                  <input id="cc-pament" name="image" type="file" class="form-control" >
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
                <table class="table table-borderless table-data3">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php
                    $query = "select * from catagory";
                    $result = mysqli_query($conn,$query);

                    while($catagory = mysqli_fetch_assoc($result))
                    {

                     echo "<tr>";
                     echo "<td>{$catagory['cat_id']}</td>";
                     echo "<td>{$catagory['cat_name']}</td>";

                     ?>
                     <td><img style="width: 100px; height: 100px;" src="<?php echo $value['cat_image'] ?>"></td>
                    
                <?php
                  echo "<td><a href='edit_category.php?id={$catagory['cat_id']}' class ='btn btn-info' >Edit</a></td>";
                   ?>

                     <td>
                      <input type="button" class="btn btn-danger btn-xs" onClick="deleted(<?php echo $catagory['cat_id']?>)" name='Delete' value='Delete'>
                    </td>
                    <?php 
                    echo "</tr>";
                  }
                  ?>
                </table>
              </div>
              <!-- END DATA TABLE-->
            </div>
          </div>
        </div>
      </div>
      
      <?php include("includes/footer.php")?> 

      <script language="javascript">
        function deleted(dil) {
         if (confirm("Are you sure you want to delete")) {
          window.location.href='manage_category.php?d_id='+dil+'';
          return true;
        }
      }



    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



    <script>
      $(document).ready(function()
      {
        $('.editbtn').on('click',function()
        {



          $('#editmodal').modal('show');
          $tr=$(this).closest('tr');



          var data=$tr.children("td").map(function()
          {
            return $(this).text();
          }).get();



          console.log(data);



          $('#catid').val(data[0]);
          $('#catname').val(data[1]);



        });
      });
    </script>