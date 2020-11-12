<?php 
    require('connection.inc.php');
    $id=$_GET['id'];
    $albumres=mysqli_query($con,"select * from album where id='$id'");
    $row=mysqli_fetch_assoc($albumres);
    
    $songres=mysqli_query($con,"select * from song where album_id='$id'");
    require('header.inc.php');

?>





<section style="border-color: rgb(255,255,255);color: rgb(255,255,255); ">
        <div class="jumbotron" style="text-align: center;background: url(<?php echo $row['imgurl'];?>) top / cover no-repeat;height: 50vh;margin: 0px;padding: 0px;padding-top: 60px;">
        <div style="padding:0px;margin:0px;background-color:rgba(0,0,0,0.5);">
        <h1 style="font-size: 44px;"><?php echo $row['albumname'];?></h1>
        <p style="font-size: 18px;"><br><?php echo $row['albumdesc'];?></p>
        </div>
            </div>
    </section>
    <section style="background: url(&quot;assets/img/navbg.jpg&quot;) no-repeat; background-size:cover;"><div class="bootstrap_cards2">
<div class="container py-5" style="background:url(./assets/img/images.jpg) no-repeat; background-size:cover;padding:0px 100px;">
    <!-- For Demo Purpose-->
    <header class="text-center mb-5">
        <h1 class="display-4 font-weight-bold">Songs List</h1>
    </header>

    
    <!-- First Row [Prosucts]-->
    <h2 class="font-weight-bold mb-2">From the core of the Heart</h2>
    <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
    
    <div class="row pb-5 mb-4">

    <?php 
        while ($songrow=mysqli_fetch_assoc($songres)) { ?>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <!-- Card-->
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"><img src="./assets/img/maxresdefault.jpg" alt="" class="img-fluid d-block mx-auto mb-3">
                    <h5> <a href="<?php echo './lyrics.php?id='.$songrow['id'];  ?>" class="text-dark"> <?php echo $songrow['songname'];  ?></a></h5>
                    <p class="small text-muted font-italic">Singer: <?php echo $row['singer'];  ?></p>
                    <ul class="list-inline small">
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-success"></i></li>
                    </ul>
                </div>
            </div>
        

        <?php 
        }
        ?>
        </div>
    </div>
 </section>










<?php 
    require('footer.inc.php');
?>