<?php include('header.php');
include('dbcon.php');
?>
  <!-- End search box -->
 <!-- Page breadcrumb -->
 <!-- End breadcrumb -->
 <?php
 $title="";
 $contents="";$photo="";
if(isset($_GET['viewmore'])){

$id=$_GET['viewmore'];
$getarticles=mysqli_query($con,"select * from articles join photos using (article_id)")or die(mysqli_error($con));
$record=mysqli_fetch_array($getarticles);
$title=$record['title'];
$contents=$record['contents'];
$photo=$record['photo'];
}
 ?>
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a href="#">
                          <?php  echo'<img src="backend/_/'.$photo.'" alt="">';?></a>

                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h2><a href="#"><center>Organization structure</center></a></h2>

                          <img src="test.jpg"width="100%">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start related course item -->

                <!-- end start related course item -->
              </div>
                   </div>
         </div>
       </div>
     </div>
   </div>
 </section>

  <!-- Start footer -->
  <?php include('footer.php'); ?>
