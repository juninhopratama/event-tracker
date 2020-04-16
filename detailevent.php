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
  
  
  </head>

<body>
<!-- AWAL  -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Event Tracker</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Event Tracker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
        </button>
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="input.php">Input Event</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="myEvents.php">My Event</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="main.php">Home</a>
    </li>
    
  </ul>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
    <li>
    <a class="nav-item text-white" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welcome, <?php echo $_SESSION['login_user'];
          ?>
        </a>
</li>
</nav>
<br>
     



    <div class="row text-center pt-5">

    <div class="col-sm-1 pt-5"></div>

  
    <div class="col-sm-10">
<h5> <b> Detail Event</b></h5>

<div class="h-divider"></div> 

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Lokasi</th>
          <th>Penyelenggara</th> 
          <th>Deskripsi</th> 
          <th>Tanggal & Jam Mulai</th>
          <th>Tanggal & Jam Selesai</th>
        </tr>
      </thead>
      <tbody>

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
                        echo
                          "<tr>
                          <td>" . $row["id"] . "</td>
                          <td>" . $row["name"] . "</td>
                          <td>" . $row["place"] . "</td>
                          <td>" . $row["organizer"] . "</td>
                          <td>" . $row["details"] . "</td>
                          <td>" . $row["hari"] .", " . $row["tanggal"] . " " . $row["bulan"] . " " . $row["tahun"] . " " . $row["jam"] . ":" . $row["menit"] . "</td>
                          <td>" . $row["hari_end"] .", " . $row["tanggal_end"] . " " . $row["bulan_end"] . " " . $row["tahun_end"] . " " . $row["jam_end"] . ":" . $row["menit_end"] . "</td>
                          </tr>";
                      }
                    }
                }
                    ?>
      </tbody>
    </table>
  

  <div class="col-sm-1"></div>

  </div>
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