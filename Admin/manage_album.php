<?php   
require('top.inc.php');
$category_id='';
$albumname='';
$imgurl='';
$albumdesc='';
$releasedate='';
$singer='';
$meta_title='';
$meta_keyword='';
$meta_desc='';



$msg='';

if (isset($_GET['id']) && $_GET['id']!='') {
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from album where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $category_id=$row['category_id'];
    $albumname=$row['albumname'];
    $imgurl=$row['imgurl'];
    $albumdesc=$row['albumdesc'];
    $releasedate=$row['releasedate'];
    $singer=$row['singer'];
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_keyword=$row['meta_keyword'];

  }else{
    header('location:album.php');
    die();
  }
  }

if (isset($_POST['submit'])) {
  $category_id=get_safe_value($con,$_POST['category_id']); 
  $albumname=get_safe_value($con,$_POST['albumname']); 
  $imgurl=get_safe_value($con,$_POST['imgurl']); 
  $albumdesc=get_safe_value($con,$_POST['albumdesc']); 
  $releasedate=get_safe_value($con,$_POST['releasedate']); 
  $singer=get_safe_value($con,$_POST['singer']); 
  $meta_title=get_safe_value($con,$_POST['meta_title']); 
  $meta_desc=get_safe_value($con,$_POST['meta_desc']); 
  $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);


  $res=mysqli_query($con,"select * from album where albumname='$albumname'");
  $check=mysqli_num_rows($res);
  if ($check>0) {
    if (isset($_GET['id']) && $_GET['id']!=''){
      $getData=mysqli_fetch_assoc($res);
      if ($id==$getData['id']) {
      }else{
        $msg="Category already exists";
      }
    }else{
      $msg="Category already exists";
    }
  }
  if ($msg=='') {
     if (isset($_GET['id']) && $_GET['id']!='') {
    $sql=mysqli_query($con,"update album set category_id='$category_id',albumname='$albumname',imgurl='$imgurl',albumdesc='$albumdesc',releasedate='$releasedate',singer='$singer',meta_title='$meta_title',meta_keyword='$meta_keyword',meta_desc='$meta_desc' where id='$id'");
  }else{
    $sql=mysqli_query($con,"insert into album values('$id','$category_id','$albumname','$imgurl','$albumdesc','$releasedate','$singer,'$meta_title','$meta_keyword','$meta_desc')");
  }
  header('location:album.php');
  die();
  }

  
}

 ?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Manage Albums</strong></div>
                        <form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">
                            

                            <label for="category_id" class=" form-control-label">Category Id</label>
                            <input type="number" id="category_id" name="category_id" value="<?php echo $category_id ; ?>" placeholder="Enter Category ID" class="form-control">

                            <label for="albumname" class=" form-control-label">Album Name</label>
                            <input type="text" id="albumname" value="<?php echo $albumname; ?>" name="albumname" placeholder="Enter Album Name" class="form-control" required>

                            <label for="imgurl" class=" form-control-label">Image Link</label>
                            <input type="text" id="imgurl" value="<?php echo $imgurl; ?>" name="imgurl" placeholder="Enter Image Link" class="form-control" required>

                            <label for="albumdesc" class=" form-control-label">Description</label>
                            <input type="text" id="albumdesc" name="albumdesc" value="<?php echo $albumdesc ; ?>" placeholder="Enter Short Description" class="form-control">

                            <label for="releasedate" class=" form-control-label">Release Date</label>
                            <input type="date" id="releasedate" value="<?php echo $releasedate; ?>" name="releasedate" placeholder="Enter Description" class="form-control" required>

                            <label for="singer" class=" form-control-label">Singer Name</label>
                            <input type="text" id="singer" value="<?php echo $singer; ?>" name="singer" placeholder="Enter Description" class="form-control" required>

                            <label for="meta_title" class=" form-control-label">Meta Title</label>
                            <input type="text" id="meta_title" value="<?php echo $meta_title; ?>" name="meta_title" placeholder="Enter Meta Title" class="form-control" required>

                            <label for="meta_desc" class=" form-control-label">Meta Description</label>
                            <input type="text" id="meta_desc" value="<?php echo $meta_desc; ?>" name="meta_desc" placeholder="Enter Meta Description" class="form-control" required>

                            <label for="meta_keyword" class=" form-control-label">Meta Keywords</label>
                            <input type="text" id="meta_keyword" value="<?php echo $meta_keyword; ?>" name="meta_keyword" placeholder="Enter Meta Keywords" class="form-control" required>
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
