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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/r-2.2.3/sp-1.0.1/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/r-2.2.3/sp-1.0.1/datatables.min.js"></script>


    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript" class="init">
	
  $(document).ready(function() {
    $('#example').DataTable();
  } );
  
    </script>

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
      <a class="nav-link" href="main.php?logout='1'">Logout</a>
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
     


    <br />
    <br />
    <br />
    <br />
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
        <div class="container">
        <h5 class="text-center">Events List</h5>
        <table id="example" class="table table-striped table-bordered mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>Date & Time Start</th>
                        <th>Date & Time End</th>
                        <th>Event</th>
                        <th>Place</th>
                        <th>Organizer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');
                    $sql = "SELECT id, DATE_FORMAT(datetime_start, '%W') as hari, DATE_FORMAT(datetime_start, '%e') as tanggal, DATE_FORMAT(datetime_start, '%M') as bulan, DATE_FORMAT(datetime_start, '%Y') as tahun, DATE_FORMAT(datetime_start, '%H') as jam, DATE_FORMAT(datetime_start, '%i') as menit,
                    DATE_FORMAT(datetime_end, '%W') as hari_end, DATE_FORMAT(datetime_end, '%e') as tanggal_end, DATE_FORMAT(datetime_end, '%M') as bulan_end, DATE_FORMAT(datetime_end, '%Y') as tahun_end, DATE_FORMAT(datetime_end, '%H') as jam_end, DATE_FORMAT(datetime_end, '%i') as menit_end,
                                        name, place, organizer, details
                                        FROM rbpltest.events
                                       ";
                    $result = $db->query($sql);
                    
                    if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        echo
                          "<tr>
                          <td>" . $row["hari"] .", " . $row["tanggal"] . " " . $row["bulan"] . " " . $row["tahun"] . " " . $row["jam"] . ":" . $row["menit"] . "</td>
                          <td>" . $row["hari_end"] .", " . $row["tanggal_end"] . " " . $row["bulan_end"] . " " . $row["tahun_end"] . " " . $row["jam_end"] . ":" . $row["menit_end"] . "</td>
                          <td><a href='detailevent.php?view=".$row["id"]."'>" . $row["name"] . "</a></td>
                          <td>" . $row["place"] . "</td>
                          <td>" . $row["organizer"] . "</td>
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
    <br />
        <nav class="navbar navbar-expand-sm bottom justify-content-center">
        <span class="navbar-text">
          Made with ❤️ by Bayu Inho Ucha Nada
        </span>
        </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js>"></script> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>