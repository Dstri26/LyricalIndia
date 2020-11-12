<?php   
require('top.inc.php');
$category_id='';
$album_id='';
$songname='';
$playtime='';
$lyrics='';
$songlink='';
$meta_title='';
$meta_desc='';
$meta_keyword='';




$msg='';

if (isset($_GET['id']) && $_GET['id']!='') {
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from song where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $category_id=$row['category_id'];
    $album_id=$row['album_id'];
    $songname=$row['songname'];
    $playtime=$row['playtime'];
    $lyrics=$row['lyrics'];
    $songlink=$row['songlink'];
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_keyword=$row['meta_keyword'];

  }else{
    header('location:song.php');
    die();
  }
  }

if (isset($_POST['submit'])) {
  $category_id=get_safe_value($con,$_POST['category_id']); 
  $album_id=get_safe_value($con,$_POST['album_id']);
  $songname=get_safe_value($con,$_POST['songname']);
  $playtime=get_safe_value($con,$_POST['playtime']);
  $lyrics=get_safe_value($con,$_POST['lyrics']);
  $songlink=get_safe_value($con,$_POST['songlink']);
  $meta_title=get_safe_value($con,$_POST['meta_title']); 
  $meta_desc=get_safe_value($con,$_POST['meta_desc']); 
  $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);


  $res=mysqli_query($con,"select * from song where songname='$songname'");
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
    $sql=mysqli_query($con,"update song set category_id='$category_id', album_id='$album_id', songname='$songname', playtime='$playtime', lyrics='$lyrics', songlink='$songlink', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword'");
  }else{
    $sql=mysqli_query($con,"insert into song values('$id','$category_id','$album_id','$songname','$playtime','$lyrics','$songlink','$meta_title','$meta_desc','$meta_keyword')");
  }
  header('location:song.php');
  die();
  }

  
}

 ?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Manage Songs</strong></div>
                        <form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">
                            
                            <label for="id" class=" form-control-label">Id</label>
                            <input type="number" id="id" name="id" value="<?php echo $id ; ?>" placeholder="Enter Category ID" class="form-control">

                            <label for="category_id" class=" form-control-label">Category Id</label>
                            <input type="number" id="category_id" name="category_id" value="<?php echo $category_id ; ?>" placeholder="Enter Category ID" class="form-control">

                            <label for="album_id" class=" form-control-label">Album Id</label>
                            <input type="number" id="album_id" name="album_id" value="<?php echo $album_id ; ?>" placeholder="Enter Album ID" class="form-control">

                            <label for="songname" class=" form-control-label">Song Name</label>
                            <input type="text" id="songname" value="<?php echo $songname; ?>" name="songname" placeholder="Enter Album Name" class="form-control" required>

                            <label for="playtime" class=" form-control-label">Play Time</label>
                            <input type="text" id="playtime" value="<?php echo $playtime; ?>" name="playtime" placeholder="Enter Image Link" class="form-control" required>

                            <label for="lyrics" class=" form-control-label">Lyrics</label>
                            <textarea rows="30" cols="50" type="text field" id="lyrics" name="lyrics" placeholder="Enter The Lyrics" class="form-control"><?php echo $lyrics ; ?></textarea>

                            <label for="songlink" class=" form-control-label">Song Link</label>
                            <input type="text" id="songlink" value="<?php echo $songlink; ?>" name="songlink" placeholder="Enter Song Link" class="form-control" required>

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
