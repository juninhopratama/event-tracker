<?php
session_start();
$db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');

if(mysqli_connect_error()){
    echo "Failed to connect to database: " . mysqli_connect_error();
}

//to check if user already login or not
$user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT username FROM users WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:LoginPage.php");
      die();
   }

// for login
if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if($username!="" && $password!=""){
        $sql_query="SELECT ID FROM users WHERE username='$username' AND password='$password'";
        $result=mysqli_query($db,$sql_query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active=$row;

        $count=mysqli_num_rows($result);

        if($count==1){
          $_SESSION['login_user']=$username;
          header("location:main.php");
        }
        else{
            echo "Invalid username and password";
        }
    }
}


