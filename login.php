<!DOCTYPE html>
<html class="login">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <link href="css/login-style.css" media="screen" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="space hidden-xs"></div>
    <div class="container trans" id="main">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center">

                <div class="row" id="pn-title">
                    <h3 class="panel-title">welcome to <strong class="coral">Intelligent Tutoring System</strong></h3>
                </div>

                <div class="row">
                    <div class="col-sm-4 hidden-xs" id="logo"></div>
                    <div class="col-xs-1"></div>
                    <div class="col-sm-7 col-xs-10">
                        <div class="row">
                            <div class="input-group">
                                <div class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span> </div>
                                <input name="user" type="text" aria-describedby="basic-addon1" placeholder="username" pattern=".{5,}" required title="Minimum 6 characters" />
                            </div>

                            <div class="input-group">
                                <div class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-lock"></span></div>
                                <input name="pass" type="password" aria-describedby="basic-addon2" placeholder="password" pattern=".{6,}" required title="Minimum 6 characters" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="pull-left checkbox col-xs-1">
                                <input type="checkbox" style="height: 20px; margin-left: 0px">
                            </div><span class="col-xs-5">Remember me</span>

                            <div class="col-xs-5 pull-right" style="padding-right: 0;">
                                <button class="btn-login pull-right btn btn-success" type="submit"><span class="glyphicon glyphicon-chevron-right"></span> log me in</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>


</body>
</html>