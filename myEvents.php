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

    <title>Event Tracker: My Events</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
    
  </head>
  
  <body>
   <!--NAVBAR-->    
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
                <a class="nav-link" href="input.php">Input Events</a>
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

  <!-- ISINYA -->  
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

            
            <br />

      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
        
          <div class="container">
          
          <h4>Hello, <u><?php echo $_SESSION['login_user'];?></u> !</h4>
            <p style="font-size:18px;"> This is your list of events:</p>
            <table class="table table-hover" style="background-color: #FFC940;">
                <thead class="thead-dark">
                    <tr>
                        <th style="background-color: #F48400;">Date & Time Start</th>
                        <th style="background-color: #F48400;">Date & Time End</th>
                        <th style="background-color: #F48400;">Event</th>
                        <th style="background-color: #F48400;">Place</th>
                        <th style="background-color: #F48400;"></th>
                        <th style="background-color: #F48400;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $username = $_SESSION['login_user'];
                    $db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');
                    $sql = "SELECT id, DATE_FORMAT(datetime_start, '%W') as hari, DATE_FORMAT(datetime_start, '%e') as tanggal, DATE_FORMAT(datetime_start, '%M') as bulan, DATE_FORMAT(datetime_start, '%Y') as tahun, DATE_FORMAT(datetime_start, '%H') as jam, DATE_FORMAT(datetime_start, '%i') as menit,
                    DATE_FORMAT(datetime_end, '%W') as hari_end, DATE_FORMAT(datetime_end, '%e') as tanggal_end, DATE_FORMAT(datetime_end, '%M') as bulan_end, DATE_FORMAT(datetime_end, '%Y') as tahun_end, DATE_FORMAT(datetime_end, '%H') as jam_end, DATE_FORMAT(datetime_end, '%i') as menit_end,
                                        name, place, organizer, details
                                        FROM rbpltest.events
                                        WHERE organizer = '$username'
                                       ";
                    $result = $db->query($sql);

                    if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        echo
                          "<tr>
                          <td>" . $row["hari"] .", " . $row["tanggal"] . " " . $row["bulan"] . " " . $row["tahun"] . " " . $row["jam"] . ":" . $row["menit"] . "</td>
                          <td>" . $row["hari_end"] .", " . $row["tanggal_end"] . " " . $row["bulan_end"] . " " . $row["tahun_end"] . " " . $row["jam_end"] . ":" . $row["menit_end"] . "</td>
                          <td>" . $row["name"] . "</td>
                          <td>" . $row["place"] . "</td>
                          <td><a href='edit.php?edit=".$row["id"]."' style='color:green'>Edit</a></td>
                          <td><a href='action.php?del=".$row["id"]."' style='color:red'>Delete</a></td>
                          </tr>";
                      }
                    }
                  
                    ?>
                </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-1">
        </div>
    </div> 

  </div>

    <!--FOOTER-->
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