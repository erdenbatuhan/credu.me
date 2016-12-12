<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Edit Profile | credu.me </title>

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

    <!-- ========== Javascript Part ========== !-->
    <script src="../../includes/Bootstrap/js/bootstrap.js"></script>
    <script src="../../includes/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <h3 class="navbar-brand" href="../Home/">Credu.me</h3>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Creators <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="https://github.com/barisceylan">Barış Ceylan</a></li>
                        <li><a href="https://github.com/erdenbatuhan">Batuhan Erden</a></li>
                        <li><a href="https://github.com/ekremcet">Ekrem Çetinkaya</a></li>
                        <li><a href="https://github.com/ErkAydogan">Sayım Erk Aydoğan</a></li>
                        <li><a href="https://github.com/obukte">Ömer Said Bükte</a></li>
                    </ul>
                </li>
                <li class="navbar-form navbar-right">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-log-out"></span> Log Out
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="editbox">
    <form>
        <div class="form-input">
            <h3>EDIT PROFILE</h3>
            <br>
            <input type="text" class="form-control" placeholder="Name"/>
            <br>
            <input type="text" class="form-control" placeholder="Email"/>
            <br>
            <input type="text" class="form-control" placeholder="Phone Number"/>
            <br>
            <button formaction="/credu.me/packages/Profile/index3.php" type="submit" class="btn btn-default">Edit
            </button>
    </form>
</div>
</body>
</html>