<?php
session_start();

include "../DatabaseConnection.php";
include "../User.php";
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
} else {
    $databaseConnection = new DatabaseConnection();
    $user = new User($databaseConnection, $_SESSION['loggedUserId']);

    $user->fetchFriends();
    $user->fetchCoursesTaken();
    ?>
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
                        <?php
                        $user->printUserInfo();
                        ?>
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
                        <h4>Courses Taken [<?php echo count($user->getCoursesTaken()) ?>]</h4>
                        <div id="scrollbox">
                            <div class="list-group">
                                <?php
                                /** ----- PRINTING COURSES TAKEN ----- */
                                for ($i = 0; $i < count($user->getCoursesTaken()); $i++) {
                                    if ($i == count($user->getCoursesTaken()) - 1) { ?>
                                        <a href="#" id="last_a"
                                           class="list-group-item list-group-item"><?php echo $user->getCoursesTaken()[$i] ?></a>
                                    <?php } else { ?>
                                        <a href="#"
                                           class="list-group-item list-group-item"><?php echo $user->getCoursesTaken()[$i] ?></a>
                                    <?php }
                                } ?>
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
                        <h4>Friends [<?php echo count($user->getFriends()) ?>]</h4>
                        <div id="scrollbox">
                            <div class="list-group">
                                <?php
                                /** ----- PRINTING FRIENDS ----- */
                                for ($i = 0; $i < count($user->getFriends()); $i++) {
                                    if ($i == count($user->getFriends()) - 1) { ?>
                                        <a href="#" id="last_a"
                                           class="list-group-item list-group-item"><?php echo $user->getFriends()[$i]->getFullName() ?></a>
                                    <?php } else { ?>
                                        <a href="#"
                                           class="list-group-item list-group-item"><?php echo $user->getFriends()[$i]->getFullName() ?></a>
                                    <?php }
                                } ?>
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
    $("#logout").click(function () {
        window.location.href = "../Home/ActionPage.php?isLogin=0";

        return false;
    });
</script>
</html>