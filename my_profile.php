<?php
$msg = ""; 
if(isset($_REQUEST['msg'])){
  $msg = $_REQUEST['msg'];
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Profile</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="shortcut icon" href="" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/sidenav.css">
  <link rel="stylesheet" href="css/home.css">
  <script src="js/my_profile.js"></script>
  <script src="js/validateForm.js"></script>
  <script src="js/restrict.js"></script>
</head>

<body>
  <!-- including side navigations -->
  <?php include("sections/sidenav.html"); ?>
  <div class="container-fluid">
    <div class="container">
      <!-- header section -->
      <?php
      error_reporting(0);
      require "php/header.php";
      createHeader('user', 'Profile', 'Manage Admin Details');
      // header section end
      require "php/db_connection.php";
      if ($con) {
        $query = "SELECT * FROM admin_credentials";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $pharmacy_name = $row['PHARMACY_NAME'];
          $address = $row['ADDRESS'];
          $email = $row['EMAIL'];
          $contact_number = $row['CONTACT_NUMBER'];
          $username = $row['USERNAME'];
          $query = "SELECT * FROM admin_credentials";
        }
      }
      ?>
  <br>
  <?php  
  if($msg == 'success'){
    echo "<span class='lead text-success'>Successfully edted the value</span>";
  }
  if($msg == 'failed'){
    echo "<span class='lead text-danger'>Failed to edit the values</span>";
  }
  
  ?><br>

      <form action="./editProfile.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Pharmacy Name</label>
          <input disabled type="text" name="pharmacy_name" value="<?php echo $pharmacy_name; ?>" class="form-control" placeholder="Pharmacy Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input disabled type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="address">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input disabled type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Contact</label>
          <input disabled type="text" name="contact" value="<?php echo $contact_number; ?>" class="form-control" placeholder="contact">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">username</label>
          <input disabled type="text" name="username" value="<?php echo $username ?>" class="form-control" placeholder="user name">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger" value="Edit">
        </div>
      </form>

      <hr style="border-top: 2px solid #ff5252;">
    </div>
  </div>
</body>

</html>