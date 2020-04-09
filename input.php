<?php
session_start();

    $id = 0;
    $merk = "";
    $price = "";
    
    $db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');

    if(mysqli_connect_error()){
        echo "Failed to connect to database: " . mysqli_connect_error();
    }


    if (isset($_POST['input'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $details = mysqli_real_escape_string($db, $_POST['details']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $time_start = mysqli_real_escape_string($db, $_POST['time_start']);
        $time_end = mysqli_real_escape_string($db, $_POST['time_end']);
        $place = mysqli_real_escape_string($db, $_POST['place']);
      

        $query = "INSERT INTO events (name,details,date,time_start,time_end,place)
                  VALUES('$name', '$details', '$date', '$time_start', '$time_end', '$place')";
        mysqli_query($db, $query);
        header('location: main.php');
    }
?>
<!DOCTYPE html>  
<html>  
    <head>  
        <meta charset="utf-8">  
        <title>Penambahan Event</title>  
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
                        Welcome, User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">My Events</a>
                        <a class="dropdown-item" href="#">Log Out</a>
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
            
            <h2>Penambahan Event</h2><br/>

            <form id="inputform" method="post" action="">
 
                <div class="form-group row">  
                <label for="name">Nama Event:</label>  
                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" required>
                </div>

                <div class="form-group row">  
                <label for="details">Deskripsi:</label>    
                <textarea class="form-control" rows="5" name="details" placeholder="Masukkan Deskripsi" required></textarea>
                </div>

                <div class="form-group row">  
                <label for="date">Tanggal Pelaksanaan:</label>  
                <input type="date" class="form-control" name="date" required>  
                </div>
 
                <div class="form-group row">  
                <label for="time_start">Jam Mulai:</label>  
                <input type="time" class="form-control" name="time_start" required>
                </div>  

                <div class="form-group row">  
                <label for="time_end">Jam Selesai:</label> 
                <input type="time" class="form-control" name="time_end" required>
                </div>  

                <div class="form-group row">  
                <label for="ruang">Ruang Pelaksanaan:</label>  
                <select class="form-control" name="ruang">
                    <option value="1">1101</option>
                    <option value="2">1102</option>
                    <option value="3">2103</option>
                    <option value="4">2208</option>
                    <option value="5">2209</option>
                    <option value="6">3101</option>
                    <option value="7">3102</option>
                    <option value="8">4101</option>
                    <option value="9">4102</option>
                    <option value="10">4201</option>
                    <option value="11">4202</option>
                </select>
                </div>  
 
                <div class="text-center">  
                    <button  type="submit"  class="btn btn-success text-center">Tambahkan Event</button>  
                    <a href=""  class="btn btn-danger">Batal</a>  
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