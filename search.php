<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Search Engine - Corcoran Institute For Aspiring World Dictators</title>
  <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  
  <style>
    .row {
      margin: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="page-header">
      <h1>Corcoran Institute For Aspiring World Dictators</h1>
    </div>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-12">
                <h1>Semester Selection</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-2-offset">
            <form action="search.php" method="post">
            <select name="id">
                <option value="1">Summer 2017</option>
                <option value="2">Fall 2017</option>
                <option value="3">Spring 2018</option>
            </select></div>
            <div class="col-md-3">
                <select name="subj">
                <option value="CPSC">Computer Science</option>
                <option value="POLS">Political Science</option>
                <option value="THEAT">Theater</option>
                <option value="PHIL">Philosophy</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12"><p><input type="submit" id="submit" class="btn btn-primary btn-lg"></input></p><br /></div></form>
        </div>
    </div>
    
    <?php
          $semesterID=$_POST["id"];
          $username = 'kalebcorcoran23';
          $password = '';
          //$pdo = new PDO('mysql:host=localhost;dbname=tech_support', $username, $password);
          $con = mysqli_connect('localhost', $username, $password, 'csu_reg');
          // $result = $con->
          $query = "SELECT Class.name, Class.desc, Class.crn, sect.sect, sect.location, Professor.name, Professor.officeHours, Professor.officeLocation FROM sect LEFT JOIN Professor ON sect.professor_id=user_id RIGHT JOIN Class on sect.crn=Class.crn WHERE semesterID = ?";
          if ($stmt = $con->prepare($query)) {
          $stmt = $con->prepare($query);
          $stmt->bind_param('s', $semesterID);
          $stmt->execute();
          $stmt->bind_result($cname,$desc,$crn,$sect,$clocation,$name,$hours,$location);
          echo("<div class='table-responsive'>
            <table class='table'>
            <tr><th>Name</th><th>Description</th><th>CRN</th><th>Section ID</th><th>Meeting Location</th><th>Professor</th><th>Office Hours</th><th>Office Location</th></tr>");
          while ($stmt->fetch())
              {
                  echo("<tr><td>" . $cname . "</td><td>" . $desc . "</td><td>" . $crn . "</td><td>" . $sect . "</td><td>" . $clocation . "</td><td>" . $name . "</td><td>" . $hours . "</td><td>" . $location . "</td></tr>");
             }
          echo("</table></div>");
          $stmt->close();
          }
          else {
              printf("Error message: %s\n", $mysqli->error);
          }
       

      ?>

      <hr>

      <footer>
        <p>&copy; 2017 Corcoran Institute, Inc.</p>
      </footer>


      <!-- Bootstrap core JavaScript
    ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
      </script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </div>
</body>

</html>