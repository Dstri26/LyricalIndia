<?php   
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
if ($type=='delete') {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from contact_us where id='$id'";
      mysqli_query($con,$delete_sql);
   }
 }
$sql="select * from contact_us";
$res=mysqli_query($con,$sql);
 ?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Contact Us Feedback</h4> </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th >ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Request</th>
                                       <th>Added On</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while ($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       <td class="serial"><?php echo $i; ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['name'] ?></td>
                                       <td><?php echo $row['email'] ?></td>
                                       <td><?php echo $row['mobile'] ?></td>
                                       <td><?php echo $row['request'] ?></td>
                                       <td><?php echo $row['added_on'] ?></td>
                                       <td><?php echo "<a style='color:red;' href='?type=delete&id=".$row['id']."'>Delete</a>"; ?></td>

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