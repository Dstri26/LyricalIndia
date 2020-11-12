<?php   
require('top.inc.php');


if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   if ($type=='delete') {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from song where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}
$sql="select * from song";
$res=mysqli_query($con,$sql);
 ?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Songs </h4>
                           <a href="manage_song.php"><h5 style="font-size: 0.9em;color:red;" class="box-title">+ Add Album </h5></a>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Category ID</th>
                                       <th>Album ID</th>
                                       <th>Song Name</th>
                                       <th>Playtime</th>
                                       <th>Lyrics</th>
                                       <th>Song Link</th>
                                       <th>Meta Title</th>
                                       <th>Meta Description</th>
                                       <th>Meta Keywords</th>
                                    </tr>
                                  </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while ($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       <td class="serial"><?php echo $i; ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['category_id'] ?></td>
                                       <td><?php echo $row['album_id'] ?></td>
                                       <td><?php echo $row['songname'] ?></td>
                                       <td><?php echo $row['playtime'] ?></td>
                                       <td><?php echo $row['lyrics'] ?></td>
                                       <td><?php echo $row['songlink'] ?></td>
                                       <td><?php echo $row['meta_title'] ?></td>
                                       <td><?php echo $row['meta_keyword'] ?></td>
                                       <td><?php echo $row['meta_desc'] ?></td>
                                       
                                       <td>
                                          <?php
                                           echo "<a href='manage_song.php?type=edit&id=".$row['id']."'>Edit</a> &nbsp &nbsp";
                                           echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>";
                                           
                                          ?>
                                             
                                          </td>

                                    </tr>
                                    <?php 
                                    $i=$i+1;
                                  } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
        <?php   require('footer.inc.php'); ?>
