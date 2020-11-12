<?php   
require('top.inc.php');


if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   if ($type=='status') {
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if ($operation=='active') {
         $status='1';
      }else{
         $status='0';
      }
      $update_status_sql="update categories set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
   }
   if ($type=='delete') {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from categories where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}
$sql="select * from categories order by id";
$res=mysqli_query($con,$sql);
 ?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <a href="manage_categories.php"><h5 style="font-size: 0.9em;color:red;" class="box-title">+ Add Categories </h5></a>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Categories</th>
                                       <th>Status</th> 
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while ($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       <td class="serial"><?php echo $i; ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['categoryname'] ?></td>
                                       <td>
                                          <?php
                                           echo "<a href='manage_categories.php?type=edit&id=".$row['id']."'>Edit</a> &nbsp &nbsp";
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
