<?php

require ('helper.php');
if(isset($_SESSION['create-done']))
{
    echo $_SESSION['create-done'];
    unset($_SESSION['create-done']);
}
// error variable.
$error = array();

$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)){
    $error[] = "You forgot to enter your first Name";
}

$lastName = validate_input_text($_POST['LastName']);
if (empty($lastName)){
    $error[] = "You forgot to enter your Last Name";
}

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}
$contact = validate_input_text($_POST['contact']);
if (empty($contact)){
    $error[] = "You forgot to enter your Phone";
}
$address = validate_input_text($_POST['address']);
if (empty($address)){
    $error[] = "You forgot to enter your Address";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)){
    $error[] = "You forgot to enter your Confirm Password";
}

$files = $_FILES['profileUpload'];
$profileImage = upload_profile('./assets/profile/', $files);

if(empty($error)) {
    if (isset($_POST['submit'])) {

    }
    // register a new user

    require('mysqli_connect.php');
    // start a new session
    session_start();
    $email=$_POST['email'];
    $sql = "SELECT * FROM `user` WHERE email='$email'";
    $result = mysqli_query($con, $sql);

    $count=mysqli_num_rows($result);

    if ($count==0) {
        // create session variable
        $userID = mysqli_insert_id($con);
        $password = md5($password);
        $registerDate = date("Y-m-d h:i:s");
        // make a query
        $query = "INSERT INTO `user` (userID, firstName, lastName, email,contact,address, password, profileImage, registerDate )";
        $query .= "VALUES('$userID', '$firstName', '$lastName','$email','$contact','$address ','$password', '$profileImage','$registerDate') ";

        // initialize a statement
        $q = mysqli_stmt_init($con);

        // prepare sql statement
        //mysqli_stmt_prepare($q, $query);

        // bind values
        //mysqli_stmt_bind_param($q, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImage);

        // execute statement
        //mysqli_stmt_execute($q);
        $q = mysqli_query($con, $query);

        // start a new session
        if ($q === TRUE) {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
            header('location: login.php');
            exit();
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Email Already Exists.')</script>";
    }

}
else{
    echo "<script>alert('Woops! You must filled all information .')</script>";
}
