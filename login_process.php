<?php


error_reporting(0);
$error = array();

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";

        $result = mysqli_query($con, $sql);


        $count=mysqli_num_rows($result);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userID'] = $row['userID'];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }

}else{
    echo "<script>alert('Please Fill out email and password to login!')</script>";
}
