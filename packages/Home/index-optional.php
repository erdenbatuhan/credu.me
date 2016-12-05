<head>
    <title> Home | Credu.me </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="../../includes/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"  href="HomePage-optional.css">
    <script src="../../includes/js/jquery-3.1.1.min.js"></script>
    <script src="../../includes/Bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-default navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="./">credu.me</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Developers <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="https://github.com/barisceylan">Barış Ceylan</a></li>
                        <li><a href="https://github.com/erdenbatuhan">Batuhan Erden</a></li>
                        <li><a href="https://github.com/ekremcet">Ekrem Çetinkaya</a></li>
                        <li><a href="https://github.com/ErkAydogan">Sayım Erk Aydoğan</a></li>
                        <li><a href="https://github.com/obukte">Ömer Said Bükte</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" placeholder="Username">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <button type="submit" formaction="http://localhost/credu.me/packages/Profile/index2.php" class="btn btn-primary">Sign In</button>
            </form>
        </div>
    </div>
</nav>

<br><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-1">

        </div>
        <div class="col-xs-8">
            <br><br>
            <h1>Sign Up.</h1>
            <h1>Start Chatting with Your Classmates.</h1>
            <h1>Expand Your Network.</h1>
        </div>
        <div class="col-xs-2">
            <div class="jumbotron text-center">
                <form>
                    <div class="form-input">
                        <h3 style="color: white">JOIN US</h3>
                        <br>
                        <input type="text" class="form-control" placeholder="Username" />
                        <br>
                        <input type="password" class="form-control" placeholder="Password" />
                        <br>
                        <input type="text" class="form-control" placeholder="Mail" />
                        <br>
                        <input type="text" class="form-control" placeholder="Phone" />
                        <br>
                        <button type="submit" class="btn btn-default">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="footer">credu.me &copy; 2016</div>
</body>

