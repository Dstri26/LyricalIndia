<?php 
    require('connection.inc.php');
    $id=$_GET['id'];
    require('header.inc.php');
?>






<section class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-top: 0px;text-align: center;padding-top: 100px;padding-bottom: 100px;height: auto;background: url(&quot;assets/img/navbg.jpg&quot;) center / cover;">
        <div class="container">
            <h1 style="margin-bottom: 40px;">Featured Albums</h1>
            <div class="row flex-box flex-wrap-wrap">
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Nature" href="hero-background-nature.jpg"><img class="img-fluid" src="assets/img/featured1.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Technology" href="hero-background-technology.jpg"><img class="img-fluid" src="assets/img/featured2.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Travel" href="hero-background-travel.jpg"><img class="img-fluid" src="assets/img/featured6.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Food" href="hero-background-food.jpg"><img class="img-fluid" src="assets/img/featured5.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Music" href="hero-background-music.jpg"><img class="img-fluid" src="assets/img/featured4.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Photography" href="hero-background-photography.jpg"><img class="img-fluid" src="assets/img/featured3.jpg"></a></div>
            </div>
        </div>
    </section>
    <section style="padding-top: 100px;padding-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/img-1.jpg" alt="Desmond">
                        <div class="box-heading">
                            <h4 class="title" style="color:#333333;">Desmond</h4><span class="post" style="color:#333333;">web designer</span></div>
                        <div class="boxContent">
                            <p class="description" style="color:#333333;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae libero orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed vestibulum.</p><a class="read" href="#">Read more<i class="fa fa-angle-right"></i></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/img-2.jpg" alt="Lee-Ann">
                        <div class="box-heading">
                            <h4 class="title" style="color:#333333;">Lee-Ann</h4><span class="post" style="color:#333333;">Sales Manager</span></div>
                        <div class="boxContent">
                            <p class="description" style="color:#333333;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae libero orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed vestibulum.</p><a class="read" href="#">Read more<i class="fa fa-angle-right"></i></a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box"><img src="assets/img/img-3.jpg" alt="John-John">
                        <div class="box-heading">
                            <h4 class="title" style="color:#333333;">John-John</h4><span class="post" style="color:#333333;">web developer</span></div>
                        <div class="boxContent">
                            <p class="description" style="color:#333333;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae libero orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed vestibulum.</p><a class="read" href="#">Read more<i class="fa fa-angle-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="height: auto;background: rgba(221,174,184,0.6);padding: 0px;padding-top: 50px;padding-bottom: 50px;">
        <h1 style="text-align: center;">Albums</h1>
        <div class="container" style="height: auto;">
            <div class="row">
                <div class="col">
                    <div class="card" style="background: rgb(235,206,212);border-width: 0px;">
                        <div class="card-body">
<ul class="list-group" id="accordion-1" role="tablist">


<?php 
    $x=1;
    foreach (range('A', 'Z') as $letter) {
        $condn=$letter.'%';
        $albumres=mysqli_query($con,"SELECT * FROM album WHERE category_id=$id AND albumname LIKE '$condn';");
        if (mysqli_num_rows($albumres)>0) {
            while ($albumrow=mysqli_fetch_assoc($albumres)) { 
        
?>

 <li class="list-group-item" role="tab" style="background: rgb(221,174,184);border-width: 3px;margin-bottom: 10px;">
    <h5 class="mb-0"><i class="fa fa-long-arrow-right"></i><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 <?php echo '#item-'.$x; ?>" href="<?php echo '#item-'.$x; ?>" role="button" style="margin-left: 10px;color: rgb(0,0,0);"><?php echo $letter; ?></a></h5>
    <div id="<?php echo 'item-'.$x; ?>" class="collapse" data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 <?php echo "#item-".$x; ?>">
    
    <div class="row pb-5 mb-4" style="margin-top:20px;">
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4"><img src="<?php echo $albumrow['imgurl']; ?>" alt="" class="img-fluid d-block mx-auto mb-3">
                    <h5> <a href="<?php echo './album.php?id='.$albumrow['id']; ?>" class="text-dark"><?php echo $albumrow['albumname']; ?></a></h5>
                    <p class="small text-muted font-italic">Singer: <?php echo $albumrow['singer']; ?></p>
                    
                </div>
            </div>
        </div>

<?php 
        }
    }
            $x++;
            $letter++;
        }
?>


</ul>
</div>
 </div>
</div>
</div>
</div>
    </section>










<?php 
    require('footer.inc.php');
?>