<?php
include("sess.php");
include('sidebar.php');
include('head.php');

if (empty($_SESSION['username'])) {
  header('location: login.php');
  exit();
}

if (isset($_POST["btn_web"])) {
  $target_dir = "uploadImage/Logo/";

  // Function to handle image upload and return the image filename
  function handleImageUpload($inputName, $targetDir, $oldImage = null) {
    if (!isset($_FILES[$inputName]) || empty($_FILES[$inputName]["tmp_name"])) {
      // No new image uploaded, use the existing image filename
      return $oldImage;
    }

    $newImage = basename($_FILES[$inputName]["name"]);
    $targetFile = $targetDir . $newImage;
    if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
      // Delete the old image file if it exists
      if (!empty($oldImage)) {
        @unlink($targetDir . $oldImage);
      }
      return $newImage;
    } else {
      echo "Sorry, there was an error uploading your file.";
      exit();
    }
  }

  // Extract form data
  extract($_POST);

  // Handle image uploads
  $website_logo = handleImageUpload("website_image", $target_dir, $old_website_image);
  $login_logo = handleImageUpload("login_image", $target_dir, $old_login_image);
  $background_login_image = handleImageUpload("back_login_image", $target_dir, $old_back_login_image);

  // Update the database
  $q1 = "UPDATE `manage_website` SET `logo`='$website_logo', `login_logo`='$login_logo', `background_login_image`='$background_login_image'";

  if ($conn->query($q1) === TRUE) {
    $_SESSION['success'] = 'Record Successfully Updated';
    header('location: manage_website.php');
    exit();
  } else {
    $_SESSION['error'] = 'Something Went Wrong';
  }
}

// Fetch existing website details from the database
$que = "SELECT * FROM manage_website";
$query = $conn->query($que);
$row = mysqli_fetch_assoc($query);
$title = $row['title'];
$short_title = $row['short_title'];
$website_logo = $row['logo'];
$login_logo = $row['login_logo'];


?>



<!-- Page wrapper  -->
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Website Management</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Website Management</li>
      </ol>
    </div>
  </div>
  <!-- End Bread crumb -->
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Start Page Content -->

    <!-- /# row -->
    <div class="row">
      <div class="col-lg-8" style="margin-left: 10%;">
        <div class="card">
          <div class="card-title"></div>
          <div class="card-body">
            <div class="input-states">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $title; ?>" name="title" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label">Short Title</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $short_title; ?>" name="short_title" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label">Website Logo</label>
                    <div class="col-sm-9">
                      <image class="profile-img" src="uploadImage/Logo/<?= $website_logo ?>" style="height:35%;width:25%;">
                      <input type="hidden" value="<?= $website_logo ?>" name="old_website_image">
                      <input type="file" class="form-control" name="website_image">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label">Login Page Logo</label>
                    <div class="col-sm-9">
                      <image class="profile-img" src="uploadImage/Logo/<?= $login_logo ?>" style="height:35%;width:35%;">
                      <input type="hidden" value="<?= $login_logo ?>" name="old_login_image">
                      <input type="file" class="form-control" name="login_image">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label">Background Image For Login Page</label>
                    <div class="col-sm-9">
                      <image class="profile-img" src="uploadImage/Logo/<?= $background_login_image ?>" style="height:35%;width:35%;">
                      <input type="hidden" value="<?= $background_login_image ?>" name="old_back_login_image">
                      <input type="file" class="form-control" name="back_login_image">
                    </div>
                  </div>
                </div>

                <button type="submit" name="btn_web" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /# row -->

    <!-- End PAge Content -->
    <?php include('footer.php'); ?>

    <link rel="stylesheet" href="popup_style.css">
    <?php if (!empty($_SESSION['success'])) {  ?>
      <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Success
          </h3>
          <p><?php echo $_SESSION['success']; ?></p>
          <p>
            <button class="button button--success" data-for="js_success-popup">Close</button>
          </p>
        </div>
      </div>
      <?php unset($_SESSION["success"]);
    } ?>
    <?php if (!empty($_SESSION['error'])) {  ?>
      <div class="popup popup--icon -error js_error-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Error
          </h3>
          <p><?php echo $_SESSION['error']; ?></p>
          <p>
            <button class="button button--error" data-for="js_error-popup">Close</button>
          </p>
        </div>
      </div>
      <?php unset($_SESSION["error"]);
    } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
        el.addEventListener('click', function() {
          var popupEl = document.querySelector('.' + el.dataset.for);
          popupEl.classList.toggle('popup--visible');
        });
      };

      Array.from(document.querySelectorAll('button[data-for]')).
      forEach(addButtonTrigger);
    </script>

    <script type="text/javascript">
      function refresh_cls() {
        setTimeout(function() { // wait for 5 secs(2)
          location.reload(); // then reload the page.(3)
        }, 1000);
      }
    </script>
  <?php  ?>
