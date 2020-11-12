<?php   
require('top.inc.php');


if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   if ($type=='delete') {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from album where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}
$sql="select * from album";
$res=mysqli_query($con,$sql);
 ?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Albums </h4>
                           <a href="manage_album.php"><h5 style="font-size: 0.9em;color:red;" class="box-title">+ Add Album </h5></a>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Category ID</th>
                                       <th>Album Name</th>
                                       <th>Image Url</th>
                                       <th>Album Description</th>
                                       <th>Release date</th>
                                       <th>Singer</th>
                                       <th>Meta Title</th>
                                       <th>Meta Keywords</th>
                                       <th>Meta Description</th>
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
                                       <td><?php echo $row['albumname'] ?></td>
                                       <td><?php echo $row['imgurl'] ?></td>
                                       <td><?php echo $row['albumdesc'] ?></td>
                                       <td><?php echo $row['releasedate'] ?></td>
                                       <td><?php echo $row['singer'] ?></td>
                                       <td><?php echo $row['meta_title'] ?></td>
                                       <td><?php echo $row['meta_keyword'] ?></td>
                                       <td><?php echo $row['meta_desc'] ?></td>
                                       
                                       <td>
                                          <?php
                                           echo "<a href='manage_album.php?type=edit&id=".$row['id']."'>Edit</a> &nbsp &nbsp";
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
