<?php
include("dbcon.php");
$target="";
$caption="";
$photo_article="";
if (isset($_POST["upload"])) {
  $caption=$_POST["caption"];
  $photo_article=$_POST['photo_article'];

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);

    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            "message" => "Upload valiid images. Only PNG and JPEG are allowed."
        );
        echo $response["type"];
        echo $response["message"];
          echo "<a href='index.php'>Back</a>";
      //  echo $result;
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 10000000)) {
        $response = array(
            "type" => "error",
            "message" => "Image size exceeds 5MB"
        );
        echo $response["type"];
        echo $response["message"];
          echo "<a href='index.php'>Back</a>";
    }    // Validate image file dimension
    else if ($width > "300" || $height > "200") {
        $response = array(
            "type" => "error",
            "message" => "Image dimension should be within 300X200"
        );
        echo $response["type"];
        echo $response["message"];
        echo "<a href='index.php'>Back</a>";

    } else {
        $target = "images/" . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            $response = array(
                "type" => "success",
                "message" => "Image uploaded successfully."
            );
      $insertimagepath=mysqli_query($con,"insert into photos (article_id,caption,photo) values ($photo_article,'$caption','$target')")or die(mysqli_error($con));
echo "photo uploaded";
      echo"<script>
      setInterval(() => {
      window.location='index.php'
    }, 300);
      </script>";

        } else {
            $response = array(
                "type" => "error",
                "message" => "Problem in uploading image files."
            );
            echo $response["type"];
            echo $response["message"];
              echo "<a href='index.php'>Back</a>";
        }
    }
}

    if(!empty($response)) {
      echo $response["type"];
      echo $response["message"];
          }
  ?>
  <html>
  <title>WMTS|Rwanda</title>
  <body>
  </body>
  </html>
