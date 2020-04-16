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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail Event</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  
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

<!--ISINYA--> 
<div class="container-fluid" style="margin-top: 80px;">
    <div class="row">
        <div class="col-1">
            <img src="https://obs.line-scdn.net/0m0190949972518a97ef6ee3d2f7a80755fc2cf5decc43/preview" alt="logohmsi" class="img-thumbnail" style="border:0px;">
        </div>
        <div class="col-11">
            <h2>Himpunan Mahasiswa Sistem Informasi</h2>
            <h6>Institut Teknologi Sepuluh Nopember Surabaya</h6>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col-1">
        </div>

      <div class="col-10">
       <?php 
       $db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');
       if(isset($_GET['view'])){
           $id = $_GET['view'];
           $sql = "SELECT id, DATE_FORMAT(datetime_start, '%W') as hari, DATE_FORMAT(datetime_start, '%e') as tanggal, DATE_FORMAT(datetime_start, '%M') as bulan, DATE_FORMAT(datetime_start, '%Y') as tahun, DATE_FORMAT(datetime_start, '%H') as jam, DATE_FORMAT(datetime_start, '%i') as menit,
           DATE_FORMAT(datetime_end, '%W') as hari_end, DATE_FORMAT(datetime_end, '%e') as tanggal_end, DATE_FORMAT(datetime_end, '%M') as bulan_end, DATE_FORMAT(datetime_end, '%Y') as tahun_end, DATE_FORMAT(datetime_end, '%H') as jam_end, DATE_FORMAT(datetime_end, '%i') as menit_end,
                               name, place, organizer, details
                               FROM rbpltest.events
                              WHERE id=$id
                    ";
           $result = $db->query($sql);
      if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        $id =$row["id"];
                        $name =$row["name"];
                        $place =$row["place"];
                        $organizer=$row["organizer"];
                        $details=$row["details"];
                        $hari=$row['hari'];
                        $tanggal=$row['tanggal'];
                        $bulan=$row['bulan'];
                        $tahun=$row['tahun'];
                        $jam=$row['jam'];
                        $menit=$row['menit'];
                        $hari_end=$row['hari_end'];
                        $tanggal_end=$row['tanggal_end'];
                        $bulan_end=$row['bulan_end'];
                        $tahun_end=$row['tahun_end'];
                        $jam_end=$row['jam_end'];
                        $menit_end=$row['menit_end'];
                      }
                    }
                }
                    ?>
        <div class="card" style="background-color: #FFC940;">
                  <p class="card-header" style="text-align:center; background-color #F48400;"><?php echo $organizer?> <i>presents</i></p>
                  <div class="card-body bg-light"  style="text-align:left;">
                    <h3 class="card-title"  style="text-align:center;"><?php echo $name?> <br></h3>
                    
                    <p class="card-text"  style="text-align:left;">
                    <div class="row">
                      <div class="col-1">
                        <b> Place </b>
                      </div>
                      <div class="col-11">
                      : <?php echo $place?>
                      </div>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-1">
                        <b> Start </b>
                      </div>
                      <div class="col-11">
                      : <?php echo $hari . ", " . $tanggal . " " . $bulan . " " . $tahun ?>
                      <br> <?php echo $jam . ":" . $menit . " " ?>
                      </div>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-1">
                        <b> End </b>
                      </div>
                      <div class="col-11">
                      : <?php echo $hari_end . ", " . $tanggal_end . " " . $bulan_end . " " . $tahun_end ?>
                      <br> <?php echo $jam_end . ":" . $menit_end . " " ?>
                      </div>
                    </div>
                    
                    <br>
                    
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light">
                    <?php echo $details?>
                    </li>
                    </ul>

                  </div>
                  
                  <div class="card-body bg-light"; style="text-align:center;">
                    <a href="main.php" class="btn btn-warning">Back</a>
              </div>
        </div>
        <div class="col-1">   
        </div>
    </div>
</div>
              </div>

<!--FOOTER-->
  <nav class="navbar navbar-expand-sm bottom justify-content-center">
    <span class="navbar-text">
    Made with ❤️ by Bayu Inho Ucha Nada
    </span>
  </nav>

<!-- AKHIR  -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>