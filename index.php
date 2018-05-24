<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Defence Forces Equine Alarm</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Defence Forces Equine Alarm</a>
</nav>
<div class="container">

  <h1>
  </h1>

  <div class="row">

    <div class="col-sm-4">

      <div class="card">
        <div class="card-header">
          <h4>
            Horse Info
          </h4>
        </div>
        <div class="card-body">
          <p><strong>Horse ID: </strong> DF0001</p>
          <p><strong>Horse Name: </strong> Jesse</p>
          <p><strong>Horse Owner: </strong> Defence Forces Ireland</p>
        </div>
      </div>

    </div>
    <div class="col-sm-8">

      <div class="card">
        <div class="card-header">
          <h4>
            Horse Status
          </h4>
        </div>
        <div class="card-body">
<?php
include_once "dbconfig.php";
$state = 4;

/**
 * GET  data fro temperature over time graph
 */
//the SQL query to be executed
$query = "SELECT `state` FROM `data` ORDER BY `createdAt` DESC LIMIT 1";
//storing the result of the executed query
$result = $link->query($query);
//check if there is any data returned by the SQL Query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $state = $row['state'];
    }
}
//Closing the connection to DB
$link->close();

if ($state == 0) {
    echo "<div class=\"alert alert-success\" role=\"alert\">
        <strong>Healthy</strong>
            <p>Horse is exhibiting healthy behaviour.</p>
          </div>";
} elseif ($state == 1) {
    echo "<div class=\"alert alert-warning\" role=\"alert\">
            <strong>Warning</strong>
            <p>Horse is exhibiting suspicious behaviour.</p>
            </div>";
} else {
    echo "<div class=\"alert alert-danger\" role=\"alert\">
            <strong>Danger</strong>
            <p>Horse is in distress.</p>
          </div>";
}

?>




          </div>
        </div>
      </div>

    <div class="col-sm-12">

      <div class="card">
        <div class="card-header">
          <h4>
            Horse Temperature
          </h4>
        </div>
        <div class="card-body">
          <div id="temperature_chart-container">Temperature will render here</div>
        </div>
      </div>


    </div>

    <div class="col-sm-12">

      <div class="card">
        <div class="card-header">
          <h4>
            Horse Sweat
          </h4>
        </div>
        <div class="card-body">
          <div id="sweat_chart-container">Sweat will render here</div>
        </div>
      </div>

    </div>

      <div class="col-sm-12">

          <div class="card">
              <div class="card-header">
                  <h4>
                      Horse Movement
                  </h4>
              </div>
              <div class="card-body">
                  <div id="movement_chart-container">Sweat will render here</div>
              </div>
          </div>

      </div>

  </div>
</div>
</div>

<script src="js/jquery-3.3.1.js"></script>
<script src="js/fusioncharts.js"></script>
<script src="js/fusioncharts.charts.js"></script>
<script src="js/themes/fusioncharts.theme.zune.js"></script>
<script src="js/app.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>