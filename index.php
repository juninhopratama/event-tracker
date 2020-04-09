<!doctype html>
<html lang="en">
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
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
           <a class="nav-link" href="#">Log In</a>
        </li>
      </ul>
    </div>
    </nav>

    <br />
    <br />
    <br />
    <br />

    <form action="index.php" method="get">
    <label>Select based on month and year:</label>
    <select name="month">
        <option>- Month -</option>
        <option value="all">All</option>
        <option value="01">January</option>
        <option value="02">Febuary</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
        </select>
        <select name="year">
        <option>- Year -</option>
        <option value="all">All</option>
        <option value="2023">2023</option>
        <option value="2019">2022</option>
        <option value="2018">2021</option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option>
        </select>
    <input type="submit">
    </form>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
        <div class="container">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Event</th>
                        <th>Place</th>
                        <th>Organizer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    $db = mysqli_connect('35.192.174.154', 'root', 'inhoroot', 'rbpltest');
                    if(isset($_GET['month'])){
                      $month = $_GET['month'];
                      $year = $_GET['year'];
                      if($month=="all" && $year!="all"){
                        $sql = "SELECT * FROM events
                              WHERE year(date) = '$year'";
                      }elseif($year=="all" && $month!="all"){
                        $sql = "SELECT * FROM events
                              WHERE month(date) = '$month'";
                      }elseif($month=="all" && $year=="all"){
                        $sql = "SELECT * FROM events";
                      }else
                      $sql = "SELECT * FROM events
                              WHERE month(date) = '$month' AND year(date) = '$year'";
                    }else{
                    $sql = "SELECT * FROM events";
                    }
                    $result = $db->query($sql);
                    
                    if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        echo
                          "<tr>
                          <td>" . $row["date"] . "</td>
                          <td>" . $row["name"] . "</td>
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