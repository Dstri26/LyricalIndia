
<?php 
    require('connection.inc.php');
    require('header.inc.php');
?>







<section class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-top: 0px;text-align: center;padding-top: 100px;padding-bottom: 100px;height: auto;background: url(&quot;assets/img/navbg.jpg&quot;) center / cover;">
        <div class="container">
            <h1 style="margin-bottom: 40px;">Featured Albums</h1>
            <div class="row flex-box flex-wrap-wrap">
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Nature" href="assets/img/hero-background-nature.jpg"><img class="img-fluid" src="assets/img/featured1.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Technology" href="assets/img/hero-background-technology.jpg"><img class="img-fluid" src="assets/img/featured2.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Travel" href="assets/img/hero-background-travel.jpg"><img class="img-fluid" src="assets/img/featured6.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Food" href="assets/img/hero-background-food.jpg"><img class="img-fluid" src="assets/img/featured5.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Music" href="assets/img/hero-background-music.jpg"><img class="img-fluid" src="assets/img/featured4.jpg"></a></div>
                <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a class="fancybox" rel="gallery1" title="Hero Image Photography" href="assets/img/hero-background-photography.jpg"><img class="img-fluid" src="assets/img/featured3.jpg"></a></div>
            </div>
        </div>
    </section>
    <section style="height: auto;margin-top: 100px;margin-bottom: 100px;">
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
    <section style="height: auto;padding-top: 100px;padding-bottom: 50px;background: rgba(226,182,195,0.3);">
        <div class="container">
            <div class="row" style="margin: 0px;">
            <div class="col-md-5" style="padding: 0px;">
                    <div class="row" style="text-align: center;margin: 0px;">
                        <div class="col">
                            <h1>Categories</h1>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                    <?php 
                            $categoryres=mysqli_query($con,"SELECT * FROM categories ;");
                            while ($categoryrow=mysqli_fetch_assoc($categoryres)) { 
                            ?>
                        <div class="col" style="text-align: center;"><a href="<?php echo './category.php?id='.$categoryrow['id']; ?>"><button class="button" type="button" data-hover="Let's Go!"><span><?php echo $categoryrow['categoryname']; ?></span></button></a></div>
                        
                        <?php 
                                }
                            ?>
                    </div>
            </div>
                <div class="col-md-7" style="text-align: center;">
                    <h1>Latest Releases</h1>
                    <div>
                        <div class="container">
                            <div class="cust_bloglistintro">
                                <p class="text-muted text-center">"Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. "</p>
                            </div>
                            <div class="row">
                            <?php 
                            $albumres=mysqli_query($con,"SELECT * FROM album ORDER BY releasedate ;");
                            while ($albumrow=mysqli_fetch_assoc($albumres)) { 
                            ?>
                                <div class="col-md-4 cust_blogteaser"><a href="<?php echo './album.php?id='.$albumrow['id'];?>"><img class="img-fluid" src="<?php echo $albumrow['imgurl'];?>"></a>
                                    <h3><?php echo $albumrow['albumname'];?></h3>
                                    <p class="text-secondary"><?php echo $albumrow['singer'];?></p><a class="h4" href="<?php echo './album.php?id='.$albumrow['id'];?>"><i class="fa fa-arrow-circle-right"></i></a></div>
                            <?php 
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









<?php 
    require('footer.inc.php');
?>