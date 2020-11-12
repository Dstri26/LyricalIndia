<?php 
    require('connection.inc.php');
    $id=$_GET['id'];
    $res=mysqli_query($con,"select * from song where id='$id'");
    $row=mysqli_fetch_assoc($res);
    $albumid= $row['album_id'];
    require('header.inc.php');
    $res1=mysqli_query($con,"select * from album where id='$albumid'");
    $row1=mysqli_fetch_assoc($res1);

    $songlink= "./assets/music/".$row['category_id'].$row["album_id"].$row["id"].".mp3";
?>








<section style="border-color: rgb(255,255,255);color: rgb(255,255,255); ">
        <div class="jumbotron" style="text-align: center;background: url(<?php echo $row1['imgurl'];?>) top / cover no-repeat;height: 50vh;margin: 0px;padding: 0px;padding-top: 60px;">
        <div style="padding:0px;margin:0px;background-color:rgba(0,0,0,0.5);">
        <h1 style="font-size: 44px;"><?php echo $row['songname']; ?></h1>
        <h5><?php echo $row1['albumname']; ?></h5>
        <p style="font-size: 18px;"><br><?php echo str_replace("\r\n","<br>",$row1['albumdesc']);?><br><br></p>
        </div>
            </div>
</section>

<section style="padding-right: 5px;padding-left: 5px;">
        <ul class="list-group">
            <li class="list-group-item text-white" style="font-size: 15px;padding-top: 3px;padding-right: 3px;padding-bottom: 3px;padding-left: 3px;color: rgb(0,0,0);background: rgb(255,255,255);border-width: 3px;border-color: rgb(255,255,255);border-bottom-color: rgb(0,0,0);">
                <div class="row">
                    <div class="col" style="margin-right: 0px;padding-right: 169px;"><label style="font-family: Quicksand, sans-serif;font-size: 16px;width: 213px;margin-bottom: 0px;color: rgb(3,0,0);"><?php echo $row['songname']; ?></label><label style="font-family: Quicksand, sans-serif;font-size: 11px;width: 213px;margin-bottom: 0px;font-weight: 600;font-style: italic;color: rgb(0,0,0);"><?php echo $row1['singer'];?></label></div>
                    <div
                        class="col text-center"><label class="col-form-label" style="font-size: 12px;font-family: Quicksand, sans-serif;margin-top: 7px;color: rgb(0,0,0);"><?php echo $row['playtime']; ?></label></div>
                <div class="col text-center" style="width: 70px;"><label class="col-form-label" style="font-size: 12px;font-family: Quicksand, sans-serif;margin-top: 7px;color: rgb(0,0,0);">GHAZAL</label></div>
                <div class="col text-center" style="font-size: 12px;font-weight: 700;font-family: Quicksand, sans-serif;"><label class="col-form-label text-center" style="margin-top: 7px;color: rgb(0,0,0);">720</label></div>
                <div class="col" style="margin-right: 0px;padding-right: 237px;margin-top: 3px;color: rgb(0,0,0);"><audio controls="" style="width: 280px;height: 27px;filter: grayscale(0%);margin-top: 5px;color: rgb(0,0,0);"><source src="<?php echo $songlink; ?>" type="audio/mpeg">
</audio></div>
                <div class="col text-center" style="margin-right: 0px;padding-right: 0px;padding-left: 0px;"><i class="fas fa-download" style="margin-top: 12px;color: rgb(0,0,0);"></i></div>
                </div>
            </li>
        </ul>
    </section>
    <section style="height: auto;padding-top: 50px;padding-bottom: 50px;background: url(&quot;assets/img/pink-background-designs.jpg&quot;);">
        <div class="container" style="height: auto;">
            <div class="row">
                <div class="col">
                    <h1>LYRICS</h1>
                    <?php echo str_replace("\r\n","<br>",$row['lyrics']);?>
                    </div>
                <div class="col"><div class="pricing8 py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h3 class="mb-3">Pricing to make your Work Effective</h3>
        <h6 class="subtitle font-weight-normal">We offer 100% satisafaction and Money back Guarantee</h6>
      </div>
    </div>
    <!-- row  -->
    <div class="row mt-4">
      <!-- column  -->
      <div class="col-md-4 ml-auto pricing-box align-self-center">
        <div class="card mb-4">
          <div class="card-body p-4 text-center">
            <h5 class="font-weight-normal">Regular Plan</h5>
            <sup>$</sup><span class="text-dark display-5">39</span>
            <h6 class="font-weight-light font-14">YEARLY</h6>
            <p class="mt-4">The Master license allows you to customize, store and even host your website using your platform</p>
          </div>
          <a class="btn btn-info-gradiant p-3 btn-block border-0 text-white" href="#">CHOOSE PLAN </a>
        </div>
      </div>
      <!-- column  -->
      <!-- column  -->
      <div class="col-md-4 ml-auto pricing-box align-self-center">
        <div class="card mb-4">
          <div class="card-body p-4 text-center">
            <h5 class="font-weight-normal">Master Plan</h5>
            <sup>$</sup><span class="text-dark display-5">49</span>
            <h6 class="font-weight-light font-14">YEARLY</h6>
            <p class="mt-4">The Master license allows you to customize, store and even host your website using your platform</p>
          </div>
          <a class="btn btn-danger-gradiant p-3 btn-block border-0 text-white" href="#">CHOOSE PLAN </a>
        </div>
      </div>
      <!-- column  -->
      <!-- column  -->
      <div class="col-md-4 ml-auto pricing-box align-self-center">
        <div class="card mb-4">
          <div class="card-body p-4 text-center">
            <h5 class="font-weight-normal">Premium Plan</h5>
            <sup>$</sup><span class="text-dark display-5">69</span>
            <h6 class="font-weight-light font-14">YEARLY</h6>
            <p class="mt-4">The Master license allows you to customize, store and even host your website using your platform</p>
          </div>
          <a class="btn btn-info-gradiant p-3 btn-block border-0 text-white" href="#">CHOOSE PLAN </a>
        </div>
      </div>
      <!-- column  -->
    </div>
  </div>
</div></div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="box"><img src="assets/img/img-1.jpg" alt="Desmond">
                        <div class="box-heading">
                            <h4 class="title" style="color:#333333;">Desmond</h4><span class="post" style="color:#333333;">web designer</span></div>
                        <div class="boxContent">
                            <p class="description" style="color:#333333;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae libero orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed vestibulum.</p><a class="read" href="#">Read more<i class="fa fa-angle-right"></i></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="box"><img src="assets/img/img-2.jpg" alt="Lee-Ann">
                        <div class="box-heading">
                            <h4 class="title" style="color:#333333;">Lee-Ann</h4><span class="post" style="color:#333333;">Sales Manager</span></div>
                        <div class="boxContent">
                            <p class="description" style="color:#333333;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae libero orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed vestibulum.</p><a class="read" href="#">Read more<i class="fa fa-angle-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
 








<?php 
    require('footer.inc.php');
?>