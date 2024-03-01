<?php 

  $name = $username = $email = $password = $confirm_password = "";
  $name_err = $username_err = $email_err = $password_err = $confirm_password_err = "";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name";
    }else{
        $name = trim($_POST["name"]);
    }


    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username";
    }else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["email"]))){
        $uemail_err = "Please enter email";
    }else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter password";
    }else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please enter confirm password";
    }else{
        $confirm_password = trim($_POST["confirm_password"]);
    }


    if(empty($name_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

        echo "Name: $name<br>";
        echo "Username: $username<br>";
        echo "Email: $email<br>";
        Echo "Password: $password<br>";
    }

  }


?>