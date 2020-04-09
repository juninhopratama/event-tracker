<?php

include "action.php";
if(!isset($_SESSION['login_user'])){
    header('location: index.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}

    $id = 0;
    $name = "";
    $details = "";
    $date = "";
    $time_start = "";
    $time_end = "";
    $place = "";
    
    $db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');

    if(mysqli_connect_errno()){
        echo "Failed to connect to database: " . mysqli_connect_errno();
    }

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($db, "SELECT * FROM events WHERE id='$id'");

    if ($id > 0 ) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $details = $n['details'];
        $date = $n['date'];
        $time_start = $n['time_start'];
        $time_end = $n['time_end'];
        $place = $n['place'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    $date = $_POST['date'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $place = $_POST['place'];

    mysqli_query($db, "UPDATE events SET `name`='$name', details='$details', `date`='$date', time_start='$time_start',
    time_end='$time_end', place='$place' WHERE id='$id'");
    $_SESSION['message'] = "Address updated!"; 
    header('location: myEvents.php');
}
?>
<!DOCTYPE html>  
<html>  
    <head>  
        <meta charset="utf-8">  
        <title>Edit Event</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 

        <style>

        .loginbox {
        background-color: #1b120f;
        padding:80px;
        width: max-content;
        height: fit-content;
        border-color: #e6dedd;
        border-width: 0.1cm;
        border-style: solid;
        border-radius: 30px;
        color: white;
        position: absolute;
        top: 50%;

        }
        </style> 

    </head>  
    <body>  
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#">Event Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome, <?php echo $_SESSION['login_user'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="myEvents.php">My Events</a>
                <a class="dropdown-item" href="edit.php?logout=1">Log Out</a>
                </div>
        </li>
        </ul>
        </div>
        </nav>

    <br />
    <br />
    <br />
    <br />

    <div class="row">
            <div class="col-4">
            </div>

            <div class="col-4">
                <div class="loginbox">  
             
            <h2 align=center>Perubahan Event</h2><br />  

            <form method="post" action="">  
            <input name="_method" type="hidden" value="PATCH">  

            <div class="form-group row">    
                <label for="name">Nama Event:</label>  
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">  
                    <input type="hidden" name="id"  value="<?php echo $id; ?>">
            </div>  


            <div class="form-group row">  
                <label for="details">Deskripsi:</label>  
                    <input type="text" class="form-control" name="details" value="<?php echo $details; ?>">   
            </div>   

            <div class="form-group row">  
                <label for="date">Tanggal Pelaksanaan:</label>  
                    <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">  
            </div>  

            <div class="form-group row">  
                <label for="time_start">Jam Mulai:</label>  
                    <input type="text" class="form-control" name="time_start" value="<?php echo $time_start; ?>">  
            </div>  

            <div class="form-group row">  
                <label for="time_end">Jam Selesai:</label>  
                    <input type="text" class="form-control" name="time_end" value="<?php echo $time_end; ?>">  
            </div>  

            <div class="form-group row">  
                <label for="place">Ruang Pelaksanaan:</label>  
                <select class="form-control" name="place" value="<?php echo $place; ?>">
                    <option value="1101">1101</option>
                    <option value="1102">1102</option>
                    <option value="2103">2103</option>
                    <option value="2208">2208</option>
                    <option value="2209">2209</option>
                    <option value="3101">3101</option>
                    <option value="3102">3102</option>
                    <option value="4101">4101</option>
                    <option value="4102">4102</option>
                    <option value="4201">4201</option>
                    <option value="4202">4202</option>
                </select>
            </div>  

            <div class="text-center">  
                    <button  type="submit"  class="btn btn-success" name="update">Update Event</button>  
                </div> 
            </div>  
            </form>  
        </div>  
        <nav class="navbar navbar-expand-sm fixed-bottom justify-content-center">
            <span class="navbar-text">
            Made with ❤️ by Bayu Inho Ucha Nada
            </span>
        </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>  
</html> 