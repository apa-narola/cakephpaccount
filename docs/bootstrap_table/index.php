<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/bootstrap/css/dashboard.css.css" rel="stylesheet">

</head>

<body role="document">

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Theme example</h1>

        <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point
            to create something more unique by building on or modifying it.</p>
    </div>

    <div class="page-header">
        <h1>Tables</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th width="10%">Amount</th>
                    <th width="10%">Short Note</th>
                    <th>Remark</th>
                    <th width="10%">Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1,00,00,000</td>
                    <td>Otto</td>
                    <td>This is long remark. This is very long remark, This is really really long remark. it can not be more than this.</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>1,00,00,000</td>
                    <td>Otto</td>
                    <td>This is long remark. This is very long remark, This is really really long remark. it can not be more than this.</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>1,00,00,000</td>
                    <td>Otto</td>
                    <td>This is long remark. This is very long remark, This is really really long remark. it can not be more than this.</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th width="10%">Amount</th>
                    <th width="10%">Short Note</th>
                    <th>Remark</th>
                    <th width="10%">Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-right">1,00,00,00,000</td>
                    <td>Otto</td>
                    <td>This is long remark. This is very long remark, This is really really long remark. it can not be more than this.</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td class="text-right">1,00,00,000</td>
                    <td>Otto</td>
                    <td>This is long remark. This is very long remark, This is really really long remark. it can not be more than this.</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td class="text-right">1,00,00,000</td>
                    <td>Otto</td>
                    <td>This is long remark. This is very long remark, This is really really long remark. it can not be more than this.</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
