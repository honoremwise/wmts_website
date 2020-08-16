<?php include('header.php'); ?>
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
  $statusmsg="<center><b>User inserted</cencter></b>";
  echo"<script>
  setInterval(() => {
  window.location='users.php'
  }, 3000);
  </script>";
  }
}

//getting all Users
$getusers=mysqli_query($con,"select * from users") or die (mysqli_error($con));





?>
<div class="content">
<div class="animated fadeIn">
<div class="row">
<div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-body">
<div class="stat-widget-five">
<div class="stat-content">
<span class="count">349</span></div>
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
<span class="count">349</span></div>
<div class="stat-heading"><center>Pending Articles</center></div>
</div></div></div></div><div class="col-lg-4 col-md-6">
<div class="card">
<div class="card-body">
<div class="stat-widget-five">
<div class="stat-content">
<span class="count">349</span></div>
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
  <?php echo $statusmsg; ?>
<nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Users</a>
<a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Roles</a>
<!-- <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Semiary Basic info</a> -->
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
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead><tr><th>names</th><th>category</th><th>date</th> <th>Status</th><th>option</th></tr>
</thead>
<tbody>
<!-- getting user's records -->
<?php
while($users=mysqli_fetch_array($getusers))
{
echo '<tr><td>'.$users['firstname'].'<br>'.$users['lastname'].'</td><td>'.$users['tel'].'</td>
<td>'.$users['email'].'</td><td>'.$users['status'].'</td><td>'.$users['user_id'].'</td>';
}
 ?>
  </tbody>
</table>
</div>
</p>
</div>
<div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
<p>
<!-- Adding a new user   -->
<form>
<div class="form-group">
<div class="col-lg-8 col-md-8">
<input type="email" class="form-control" placeholder="Category name">
</div>
<div class="col-lg-4 col-md-4">
<button type="submit" class="btn btn-primary"><i class="fa fa-save btn"></i></button>
</div></div>
  </form>
  </p>
  <!-- end of the form -->
  <!-- getting all Categories -->



  <!-- end records -->



</p>
                                                </div>
<div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
<p> <form>
    <div class="form-group">
      <input type="email" class="form-control" placeholder="Add photo caption" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="file" class="form-control">
    </div>
  <button type="submit" class="btn btn-primary">Confirm</button>
    <!-- <center>
    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
  </center>
</form> -->
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
<input type="text"  name="firstname" class="form-control" placeholder="firstname">
</div>
<div class="form-group">
<input type="text"  name="lastname" class="form-control" placeholder="lastname">
</div>
<div class="form-group">
<input type="telephone"  name="telephone" class="form-control" placeholder="telephone">
</div>
<div class="form-group">
<input type="email"  name="email" class="form-control" placeholder="email">
</div>
<div class="form-group">
<input type="text"  name="title" class="form-control" placeholder="user title">
</div>
<button type="submit" class="btn btn-primary" name="adduser">Save</button>
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
