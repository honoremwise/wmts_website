<?php
include('header.php');?>
<?php
//linking whith the db connection file
  include('dbcon.php');
  $statusmsg="";
    if(isset($_POST['adduser']))
  {
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $title=$_POST['title'];
  // creating a default encrypted password
  $password=md5(substr($_POST['firstname'], 0,2).substr($_POST['lastname'], -2).substr($_POST['telephone'], -2));
  echo date("Y-m-d");
  //Adding data in users' table
  $insert="insert into users (firstname,lastname,tel,email,status,password) values('$firstname','$lastname','$telephone','$email','pending','$password')";
  $dbinsertuser=mysqli_query($con,$insert);
  if(!$dbinsertuser)
  {
$statusmsg = mysqli_error($con);
  }
  else{
  $statusmsg="user inserted";
  }
}
//adding Category
if(isset($_POST['addcategory'])){
  $category=$_POST['category'];
  $dates=date('Y-m-d');
  $addcategory=mysqli_query($con,"insert into categories (category,date_creation) values ('$category','$dates') ")or die(mysqli_error($con));
  $statusmsg="save category clicked";
}
if(isset($_POST['btnarticle'])){
  $articleid=$_POST['articleid'];
  $msg=$_POST['msg'];
  $title=$_POST['title'];
  $articleid=$_POST['articleid'];
  $date=date('Y-m-d');
  $savearticle=mysqli_query($con,"insert into articles (title,contents,publication_date,category_id,status,user_id)
  values ('$title','$msg','$date',$articleid,'waiting',1)") or die(mysqli_error($con));
}
?>
<div class="content">
<div class="animated fadeIn">
<div class="row">
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-body">
<div class="stat-widget-five">
<div class="stat-content">
<span class="count">
  <?php $getpublished=mysqli_num_rows(mysqli_query($con,"select * from articles where status='published'"));
  echo $getpublished; ?>

</span></div>
<div class="stat-heading"><center>Published Articles</center></div>
</div>
</div>
</div>
</div>
  <div class="col-lg-4 col-md-6">
  <div class="card">
<div class="card-body">
<div class="stat-widget-five">
<div class="stat-content">
<span class="count">
<?php $getpendings=mysqli_num_rows(mysqli_query($con,"select * from articles where status='waiting'"));
echo $getpendings; ?>
</span></div>
<div class="stat-heading"><center>Pending Articles</center></div>
</div></div></div></div><div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-body">
<div class="stat-widget-five">
<div class="stat-content">
<span class="count">
  <?php $getpublished=mysqli_num_rows(mysqli_query($con,"select * from articles where status='hidden'"));
  echo $getpublished; ?>

</span></div>
<div class="stat-heading"><center>Blocked Articles</center></div>
</div></div></div></div></div>
                <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="card">

                                          <div class="card-body">
                                            <div class="custom-tab">
                                              <!-- tab menus -->
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Articles</a>
                                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Categories</a>
                                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Photoes</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                        <p>

    <div class="col-md-12">
      <div class="page-header float-right">
          <div class="page-title">
              <ol class="breadcrumb text-right">
                  <li><a href="#"><i class="fa fa-plus btn btn-primary" data-toggle="modal" data-target="#largeModal"></i></a></li>
              </ol>
          </div>
      </div>
      <?php
      if(isset($_GET['publish'])){
      $id=$_GET['publish'];
    $publish=mysqli_query($con,"update articles set status='published' where article_id=$id")or die(mysqli_query($con));
    if($publish){

      echo"<script>
      setInterval(() => {
      window.location='index.php'
    }, 500);
      </script>";
      }
    }
    if(isset($_GET['hide'])){
    $id=$_GET['hide'];
  $hide=mysqli_query($con,"update articles set status='hidden' where article_id=$id")or die(mysqli_query($con));
  if($hide){

    echo"<script>
    setInterval(() => {
    window.location='index.php'
  }, 500);
    </script>";
    }
  }
      ?>
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead><tr><th>Title</th><th>Contents</th><th>date</th> <th>Status</th><th>option</th></tr>
                    </thead>
                    <tbody>
<?php $getarticles=mysqli_query($con,"select * from articles order by article_id asc ")or die(mysqli_error($con));
while($articles=mysqli_fetch_array($getarticles)){
  echo "<tr><td>".$articles['title']."</td><td>".$articles['contents']."</td><td>
  ".$articles['publication_date']."</td><td>".$articles['status']."</td><td><a href='index.php?publish=".$articles['article_id']."'>Publish</a>|<a href='index.php?hide=".$articles['article_id']."'>hide</a></td></tr>";

}
?>
</tbody>
</table></div>
        </p>
      </div>
    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
    <p>
      <!-- Adding a new article category  -->
      <?php echo $statusmsg; ?>
            <form method="post" action="#">
          <div class="form-group">
            <div class="col-lg-8 col-md-8">
              <input type="text" class="form-control" name="category" placeholder="Category name">
          </div>
          <div class="col-lg-4 col-md-4">
          <button type="submit" class="btn btn-primary" name="addcategory"><i class="fa fa-save btn"></i></button>
          </div></div>
      </form>
      </p>
    </p>
                                                    </div>
    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
    <p> <form action="adds.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Add photo caption" name="caption" required>
        </div>
        <div class="form-group">
          <select name="photo_article" class="form-control">
        <center>  <option value=0>--Choose articles related to this photo--- </option></center>;
          <?php
$getarticles=mysqli_query($con,"select * from articles")or die($con);
$countarticles=mysqli_num_rows($getarticles);
if($countarticles>0){
  while($art=mysqli_fetch_array($getarticles)){
    echo "<option value=".$art['article_id'].">".$art['title']."</option>";
  }
}
else{
echo "<option value=0>no articles </option>";
}
          ?>
        </select>
        </div>
        <div class="form-group">
          <input type="file" class="form-control" name="file-input">
        </div>
      <button type="submit" class="btn btn-primary" name="upload">Save photo</button>

  </form>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div> <!-- /.row -->
<div class="card-body">
</div>
</div>
</div><!-- /# column -->
</div>
<div class="clearfix">
</div>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-body">
<p>
<form method="post" action="#">
<div class="form-group">
<input type="text" class="form-control" placeholder="Article Title" name="title">
</div>
<div class="form-group">

<?php $getcategories=mysqli_query($con,"select * from categories")or die(mysqli_error($con))?>
<select class="form-control" name="articleid">
  <!-- <option>----select article category</option> -->
<?php while ($row=mysqli_fetch_array($getcategories)) {
  $categories=$row['category'];
  $catid=$row['category_id'];
  echo "<option value=".$catid.">".$categories."</option>";
}?>
</select>
</div>
<div class="form-group">
<textarea class="form-control" placeholder="Article Title" cols="25" rows="15" name="msg"></textarea>
</div>
<button type="submit" class="btn btn-primary" name="btnarticle">Save</button>
</div>
</form>
</div>
</div>
                        </div>
                    </div>
                <!-- /#add-category -->
                </div>
                <!-- .animated -->
            </div>
            <!-- /.content -->
            <?php include('footer.php')?>
