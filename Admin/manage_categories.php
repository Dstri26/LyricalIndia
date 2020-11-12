<?php   
require('top.inc.php');
$id='';
$categories='';
$msg='';

if (isset($_GET['id']) && $_GET['id']!='') {
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from categories where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $categories=$row['categoryname'];

  }else{
    header('location:categories.php');
    die();
  }
  }

if (isset($_POST['submit'])) {
  $categories=get_safe_value($con,$_POST['categories']);
  $currentdate=date('Y-m-d H:i:s');

  $res=mysqli_query($con,"select * from categories where categoryname='$categories'");
  $check=mysqli_num_rows($res);
  $id=get_safe_value($con,$_POST['id']);
  if ($check>0) {
    if (isset($_GET['id']) && $_GET['id']!=''){
      $getData=mysqli_fetch_assoc($res);
      if ($id==$getData['id']) {
        # code...
      }else{
        $msg="Category already exists";
      }
    }else{
      $msg="Category already exists";
    }
  }
  if ($msg=='') {
      if (isset($_GET['id']) && $_GET['id']!='') {
      $sql=mysqli_query($con,"update categories set categoryname='$categories', lastupdated='$currentdate' where id='$id'");
    }else{
      $sql=mysqli_query($con,"insert into categories values('$id','$categories','date('Y-m-d H:i:s')')");
    }
    header('location:categories.php');
    die();
  }

  }

  


 ?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Manage Categories</strong></div>
                        <form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">

                            <label for="id" class=" form-control-label">ID</label>
                            <input type="number" id="id" name="id" value="<?php echo $id ; ?>" placeholder="Enter Category ID" class="form-control">

                            <label for="categories" class=" form-control-label">Categories</label>
                            <input type="text" id="categories" value="<?php echo $categories; ?>" name="categories" placeholder="Enter Category Name" class="form-control" required>
                          </div>

                            <input type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                            <div style="color:red;"><?php echo $msg; ?></div>
                        </div>
                     
                    </form>
                  </div>
               </div>
            </div>
         </div>

<?php   require('footer.inc.php'); ?>
