<?php
require "php/db_connection.php";
if(isset($_POST['edit'])){
    $pharmacy = $_POST['pharmacy_name'];
    $address1 = $_POST['address'];
    $email1 = $_POST['email'];
    $contact1 = $_POST['contact'];
    $email1 = $_POST['email'];
    $username1 = $_POST['username'];
     
    $sqlEdit = "UPDATE admin_credentials SET PHARMACY_NAME='$pharmacy', ADDRESS='$address1', EMAIL='$email1', CONTACT_NUMBER='$contact1', USERNAME='$username1';";
    $res = mysqli_query($con, $sqlEdit);
    if($res){
        header("location: ./my_profile.php?msg=success");
    }else{
        header("location: ./editProfile.php?msg=failed");
    }

}



if (isset($_POST['submit'])) {
    error_reporting(0);
    require "php/header.php";
    createHeader('user', 'Profile', 'Manage Admin Details');
    // header section end
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
}
?>

<form action="#" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Pharmacy Name</label>
        <input type="text" name="pharmacy_name" value="<?php echo $pharmacy_name; ?>" class="form-control" placeholder="Pharmacy Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="address">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Contact</label>
        <input type="text" name="contact" value="<?php echo $contact_number; ?>" class="form-control" placeholder="contact">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">username</label>
        <input type="text" name="username" value="<?php echo $username ?>" class="form-control" placeholder="user name">
    </div>
    <div class="form-group">
        <input type="submit" name="edit" class="btn btn-danger" value="Edit">
    </div>
</form>