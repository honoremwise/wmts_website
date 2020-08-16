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
$getarticles=mysqli_query($con,"select * from articles join photos using (article_id) where articles.article_id=$id")or die(mysqli_error($con));
$record=mysqli_fetch_array($getarticles);
$title=$record['title'];
$contents=$record['contents'];
$photo=$record['photo'];
}
if(isset($_GET['read'])){
  echo "this is an anouncment";
  $code=$_GET['read'];
  $announcement=mysqli_query($con,"select * from articles join photos using (article_id) where article_id=$code ")or die(mysqli_error($con));
  while($get=mysqli_fetch_array($announcement)){

    echo $get['title'];
    echo "<a href='article_details.php?read=".$get['article_id']."'>|Read</a>&nbsp;&nbsp;";

  }

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

                          <?php  echo'<img src="backend/_/'.$photo.'" alt="'.$photo.'">';?>

                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h2><a href="#"><?php echo  $title;?></a></h2>

                          <p><?php echo  $contents; ?></p>

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
  <?php include('footer.php');?>
