<?php
session_start();
$db = mysqli_connect('host', 'user', 'pass', 'dbname');

if(mysqli_connect_error()){
    echo "Failed to connect to database: " . mysqli_connect_error();
}

//to check if user already login or not
// $user_check = $_SESSION['login_user'];
   
//    $ses_sql = mysqli_query($db,"SELECT username FROM users WHERE username = '$user_check' ");
   
//    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
//    $login_session = $row['username'];
   
//    if(!isset($_SESSION['login_user'])){
//       header("location:loginpage.php");
//       die();
//    }

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
            header("location:loginsalah.php");
        }
    }
}

if (isset($_POST['input'])) {
    $name = $_POST['name'];
    $details = $_POST['details'];
    $datetime_start = $_POST['datetime_start'];
    $datetime_end = $_POST['datetime_end'];
    $place = $_POST['place'];
    $organizer = $_SESSION['login_user'];
  

    $query = "INSERT INTO events (name, place, details, datetime_start, datetime_end, organizer)
              VALUES('$name', '$place', '$details', '$datetime_start', '$datetime_end', '$organizer')";
    mysqli_query($db,$query);
    if(mysqli_connect_errno()){
        echo "Failed to connect to database: " . mysqli_connect_error();
    }else{
        header('location: main.php');
    }
}

if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM events WHERE id=$id");
        $_SESSION['message'] = "Events deleted!"; 
        header('location: myEvents.php');
}
