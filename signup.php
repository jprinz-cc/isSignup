<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Internet Security Topic Signup</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Internet Security Topic Signup</a>
        </div>
        <!--<div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>--><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1 style="display: none;">Internet Security Topic Signup</h1>
        <?php

            $dbc = @mysqli_connect('localhost', '<DB USER>', '<PASSWORD>', '<DB NAME>');

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                if($dbc){

                    mysqli_set_charset($dbc, 'utf8');

                    $problem = FALSE;

                    $arrTopics = array("chap1_2"=>"Chapter 1 &amp; 2: Footprinting and Scanning", "chap3"=>"Chapter 3: Enumeration", "chap4"=>"Chapter 4: Hacking Windows" ,"chap5"=>"Chapter 5: Hacking Unix", "chap6"=>"Chapter 6: Cybercrime and APT", "chap7"=>"Chapter 7: Remote Connectivity and VOIP Hacking", "chap8"=>"Chapter 8: Wireless Hacking", "chap9"=>"Chapter 9: Hacking Hardware", "chap10"=>"Chapter 10: Web and Database Hacking", "chap11"=>"Chapter 11: Mobile Hacking");

                    if (!empty($_POST['student']) && !empty($_POST['topic'])){

                        $student = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['student'])));
                        $topic = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['topic'])));

                    } else {

                        print '<p style="color: red;">Please submit both your name and a topic.</p>';
                        $problem = TRUE;

                    }

                    if (!$problem){

                        $updateTopic = false;

                        $query = "SELECT student FROM inetsecure";

                        $result = mysqli_query($dbc, $query);

                        $num_rows = mysqli_num_rows($result);

                        if ($num_rows != 0){

                            while ($row = mysqli_fetch_array($result)){

                                if ($row['student'] == $student){

                                    $updateTopic = true;

                                }

                            }

                            if ($updateTopic){
                                $query = "UPDATE inetsecure SET student = '$student', topic = '$topic', date_entered = NOW() WHERE student = '$student'";
                            } else {
                                $query = "INSERT INTO inetsecure (student, topic, date_entered) VALUES ('$student', '$topic', NOW())";
                            }

                        } else {

                            $query = "INSERT INTO inetsecure (student, topic, date_entered) VALUES ('$student', '$topic', NOW())";

                        }

                        if (mysqli_query($dbc, $query)){

                            print "<p style='font-weight:bolder;color:green;font-size:large'>Thank you $student! Looking forward to your presentation on {$arrTopics[$topic]}!</h3>";

                        } else {

                            print '<p style="color:red;">Could not add the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';

                        }

                    }

                } else {

                    print '<p style="color: red;">Could not connect to MySQL:<br>' . mysqli_connect_error() . '</p>';

                }

                mysqli_close($dbc);

            }


            ?>

        <form action="signup.php" method="post">

            <p>
            <select name="student" class="form-control">
                <option value="">Select You</option>
                <option value="Brittany">Brittany</option>
                <option value="Keenan">Keenan</option>
                <option value="Kent">Kent</option>
                <option value="Scott">Scott</option>
                <option value="Teal">Teal</option>
            </select></p>
            <p>
            <select name="topic" class="form-control">
                <option value="">Select Your Topic</option>
                <option value="chap1_2">Chapter 1 &amp; 2: Footprinting and Scanning</option>
                <option value="chap3">Chapter 3: Enumeration</option>
                <option value="chap4">Chapter 4: Hacking Windows</option>
                <option value="chap5">Chapter 5: Hacking Unix</option>
                <option value="chap6">Chapter 6: Cybercrime and APT</option>
                <option value="chap7">Chapter 7: Remote Connectivity and VOIP Hacking</option>
                <option value="chap8">Chapter 8: Wireless Hacking</option>
                <option value="chap9">Chapter 9: Hacking Hardware</option>
                <option value="chap10">Chapter 10: Web and Database Hacking</option>
                <option value="chap11">Chapter 11: Mobile Hacking</option>
            </select></p>
            <button type="submit" class="btn-primary">Submit</button>
            <br>
            <br>
            <br>
            <?php

            $arrTopics = array("chap1_2"=>"Chapter 1 &amp; 2: Footprinting and Scanning", "chap3"=>"Chapter 3: Enumeration", "chap4"=>"Chapter 4: Hacking Windows" ,"chap5"=>"Chapter 5: Hacking Unix", "chap6"=>"Chapter 6: Cybercrime and APT", "chap7"=>"Chapter 7: Remote Connectivity and VOIP Hacking", "chap8"=>"Chapter 8: Wireless Hacking", "chap9"=>"Chapter 9: Hacking Hardware", "chap10"=>"Chapter 10: Web and Database Hacking", "chap11"=>"Chapter 11: Mobile Hacking");

            print '<table class="table table-bordered table-hover table-striped"><tr><th>Student</th><th>Topic Selected</th></tr>';
            $dbc = @mysqli_connect('localhost', '<DB USER>', '<PASSWORD>', '<DB NAME>');

            if($dbc){

                mysqli_set_charset($dbc, 'utf8');

                $result = mysqli_query($dbc, "SELECT student, topic FROM inetsecure;");

                $num_rows = mysqli_num_rows($result);

                if ($num_rows != 0){

                    while ($row = mysqli_fetch_array($result)){

                        print "<tr><td>{$row['student']}</td><td>{$arrTopics[$row['topic']]}</td></tr>";

                    }

                } else {

                    print '<tr><th colspan="2" class="txtCenter">No topics choosen yet...</th></tr>';

                }

                mysqli_close($dbc);

            } else {

                print '<span style="color: red;">Could not connect to MySQL:<br>' . mysqli_connect_error() . '</span>';
                print '<tr><th colspan="2" align="center"><span style="color: red;">Could not connect to MySQL:<br>' . mysqli_connect_error() . '</span></th></tr>';
            }

            print '</table>';

            ?>

        </form>
        <br>
        <p style="color: red;font-weight: bolder">UPDATE: You can change your selection by selecting your name and a new topic then submitting!</p>
        <p>If you have problems with the page or your selection, contact <a href="mailto:me@example.on.ca">me</a>!</p>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

