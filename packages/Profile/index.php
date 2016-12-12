<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Profile | credu.me </title>

    <!-- ========== META Part ========== !-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="description" content="index">
    <meta name="author" content="beobe">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ========== CSS Part ========== !-->
    <link href="../../includes/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../includes/Font-Awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../includes/css/Profile.css" rel="stylesheet">
    <link href="../../includes/css/Navbar.css" rel="stylesheet">

    <!-- ========== Javascript Part ========== !-->
    <script src="../../includes/Bootstrap/js/bootstrap.js"></script>
    <script src="../../includes/js/jquery-3.1.1.min.js"></script>
</head>
<?php if (isset($_SESSION['loggedUserId']) == null) {
    echo '<script type="text/javascript">',
    'window.location.href = "../Home/";',
    '</script>';
} else { ?>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../Home/"><h3>cred<span>u.me</span></h3></a>
            </div>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="John Smith">
                </div>
                <button type="submit" class="btn btn-success"><span class="fa fa-search"></span> Search</button>
            </form>
            <form class="navbar-form navbar-right" role="search">
                <a type="submit" class="btn btn-success" href="../Home/"><span class="fa fa-home"></span> Home</a>
                <button id="logout" type="submit" class="btn btn-success"><span class="fa fa-sign-out"></span> Log Out
                </button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-md-4">
                <!-- EMPTY -->
            </div>
            <div class="col-xs-8 col-md-4">
                <div class="jumbotron">
                    <div class="jumbotron child">
                        <h3>Batuhan Erden</h3>
                        <hr>
                        <h5><i class="fa fa-home"></i> Ozyegin University </h5>
                        <h5><i class="fa fa-envelope"></i> zuckerberg@ozu.edu.tr </h5>
                        <h5><i class="fa fa-phone"></i> 05369876542 </h5>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-md-4">
                <!-- EMPTY -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-md-1">
                <!-- EMPTY -->
            </div>
            <div class="col-xs-8 col-md-4">
                <div class="jumbotron">
                    <div class="jumbotron child">
                        <h4>Courses Taken</h4>
                        <div id="scrollbox">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item">CS320</a>
                                <a href="#" class="list-group-item list-group-item">CS321</a>
                                <a href="#" class="list-group-item list-group-item">ENG320</a>
                                <a href="#" class="list-group-item list-group-item">MATH212</a>
                                <a href="#" class="list-group-item list-group-item">SPA101</a>
                                <a href="#" class="list-group-item list-group-item">CS320</a>
                                <a href="lms.ozyegin.edu.tr" class="list-group-item list-group-item">CS321</a>
                                <a href="#" class="list-group-item list-group-item">ENG320</a>
                                <a href="#" class="list-group-item list-group-item">MATH212</a>
                                <a href="#" class="list-group-item list-group-item">SPA101</a>
                                <a href="#" class="list-group-item list-group-item">CS320</a>
                                <a href="lms.ozyegin.edu.tr" class="list-group-item list-group-item">CS321</a>
                                <a href="#" class="list-group-item list-group-item">ENG320</a>
                                <a href="#" class="list-group-item list-group-item">MATH212</a>
                                <a href="#" id="last_a" class="list-group-item list-group-item">SPA101</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-1">
                <!-- EMPTY -->
            </div>
            <div class="col-xs-2 col-md-1">
                <!-- EMPTY -->
            </div>
            <div class="col-xs-8 col-md-4">
                <div class="jumbotron">
                    <div class="jumbotron child">
                        <h4>Friends</h4>
                        <div id="scrollbox">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="lms.ozyegin.edu.tr" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="lms.ozyegin.edu.tr" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" class="list-group-item list-group-item">Steve Jobs</a>
                                <a href="#" id="last_a" class="list-group-item list-group-item">Last Steve Jobs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-md-1">
                <!-- EMPTY -->
            </div>
        </div>
    </div>
    </body>
<?php } ?>
<script>
    // Logs out
    $("#logout").click(function () {
        $.post("../Home/ActivateLogout.php");

        for (var i = 0; i < 5; i++)
            location.reload(true);

        return false;
    });
</script>
</html>