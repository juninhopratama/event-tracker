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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Event Tracker: Input Event</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <style>

        </style>
    </head>
    <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #100032;">
            <a class="navbar-brand" href="#">Event Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
      
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="main.php">Main</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="myEvents.php">My Events</a>
                </li>
            </ul>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Welcome, <?php echo $_SESSION['login_user'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="myEvents.php?logout='1">Log Out</a>
                </div>
                </li>
                </ul>
              </div>
            </nav>
    <!-- ISI -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                <img src="https://obs.line-scdn.net/0m0190949972518a97ef6ee3d2f7a80755fc2cf5decc43/preview" alt="logohmsi" class="img-thumbnail" style="border:0px;">
                </div>
                <div class="col-11">
                    <h3>Himpunan Mahasiswa Sistem Informasi</h3>
                    <h6>Institut Teknologi Sepuluh Nopember Surabaya</h6>
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-2">
                </div>

                <div class="col-8">
                   
                <div class="formbox">
                <h4 style="text-align: center;"> Input Event Forms</h4>
                <p style="font-size: 14px;">Please fill in the form with the right information of your events. make sure to fill everything before submitting.<br></p>
                <form id="inputform" method="POST" action="action.php">
 
                    <div class="form-group row">  
                    <label for="name">Nama Event:</label>  
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" required>
                    </div>
    
                    <div class="form-group row">  
                    <label for="details">Deskripsi:</label>    
                    <textarea class="form-control" rows="5" name="details" placeholder="Masukkan Deskripsi" required></textarea>
                    </div>
     
                    <div class="form-group row">  
                    <label for="datetime_start">Tanggal & Jam Mulai:</label>  
                    <input type="datetime-local" class="form-control" name="datetime_start" required>
                    </div>
    
                    <div class="form-group row">  
                    <label for="datetime_end">Tanggal & Jam Selesai:</label> 
                    <input type="datetime-local" class="form-control" name="datetime_end" required>
                    </div>  
    
                    <div class="form-group row">  
                    <label for="place">Ruang Pelaksanaan:</label>  
                    <select class="form-control" name="place">
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
                        <button  type="submit" name="input"  class="btn btn-success text-center">Tambahkan Event</button>  
                        <a href="main.php"  class="btn btn-danger">Batal</a>  
                    </div>  
                    </div>  
     
                </form>    
            </div>
            </div>

            <div class="col-2">

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <nav class="navbar navbar-expand-sm bottom justify-content-center">
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