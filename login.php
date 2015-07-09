<?php
    $b = true;

    if (isset($_GET['a'])) {
        $a = $_GET['a'];
        if ($a == 'logout') {
            unset($_COOKIE['uid']);
            setcookie("uid", "", time() - 3600);
            echo '<script>window.location.href = "login.php";</script>';
        }
    }

    if (isset($_COOKIE['uid']) && $_COOKIE['uid'] != '')
        echo '<script>window.location.href = "index.php";</script>';

    if (isset($_POST['u']) && isset($_POST['p'])) {
        $b = false;
        $u = $_POST['u'];
        $p = $_POST['p'];

        if ($u == 'quando' && $p == 'qwerty') {
            echo 'ok';
        }
    }
?>

<?php if($b) : ?>
<!DOCTYPE html>
<html class="login">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/snabbt.min.js"></script>
    <link href="css/login-style.css" media="screen" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="space hidden-xs"></div>
    <div class="container trans" id="main">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center">

                <div class="row" id="pn-title">
                    <h3 class="up panel-title">welcome to <strong class="coral">Intelligent Tutoring System</strong></h3>
                </div>

                <div class="row">
                    <div class="left col-sm-4 hidden-xs" id="logo"></div>
                    <div class="col-xs-1"></div>
                    <form action="index.php" method="post">
                    <div class="col-sm-7 col-xs-10">
                        <div class="row">
                            <div class="right input-group">
                                <div class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span> </div>
                                <input id="user" type="text" placeholder="username" title="i.e: quando" />
                            </div>

                            <div class="right input-group">
                                <div class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-lock"></span></div>
                                <input id="pass" type="password" placeholder="password" title="i.e: qwerty" />
                            </div>
                        </div>
                        <div class="down row">
                            <div class="pull-left checkbox col-xs-1">
                                <input id="remember" type="checkbox" style="height: 20px; margin-left: 0px">
                            </div><span class="col-xs-5">Remember me</span>

                            <div class="col-xs-5 pull-right" style="padding-right: 0;">
                                <button class="btn-login pull-right btn btn-success" type="button"><span class="glyphicon glyphicon-chevron-right"></span> <span class="bt-text">log me in</span></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).keypress(function(e) {
            if(e.which == 13) {
                $( ".btn-login" ).trigger( "click" );
            }
        });

        $('.btn-login').click(function() {
            var u = $("#user").val();
            var p = $("#pass").val();

            if(u=='') {
                $('input:text').focus();
                snabbt($('input:text'), 'attention', {
                    position: [50, 0, 0],
                    springConstant: 2.4,
                    springDeceleration: 0.9
                });
            } else if (p=='') {
                $('input:password').focus();
                snabbt($('input:password'), 'attention', {
                    position: [50, 0, 0],
                    springConstant: 2.4,
                    springDeceleration: 0.9
                });
            } else {
                $(this).removeClass('btn-success').addClass('btn-primary');
                $(this).children('.glyphicon').removeClass('glyphicon-chevron-right').addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
                $(this).children('.bt-text').html('verifying..');
                setTimeout(function() {
                }, 800);

                var dataString = 'u='+ u + '&p=' + p;

                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: dataString,
                    success: function(result){
                        if (/ok/.test(result)) {
                            var r = $('#remember').val();
                            if (r=='on')
                                $.cookie('uid',u, { expires : 7 });
                            else
                                $.cookie('uid',u);

                            snabbt($('.right'), {
                                fromPosition: [0, 0, 0],
                                position: [1000, 0, 0],
                                easing: 'easeIn',
                                duration: 700
                            });

                            snabbt($('.down'), {
                                fromPosition: [0, 0, 0],
                                position: [0, 1000, 0],
                                easing: 'easeIn',
                                duration: 700
                            });

                            snabbt($('.up'), {
                                fromPosition: [0, 0, 0],
                                position: [0, -1000, 0],
                                easing: 'easeIn',
                                duration: 700
                            });

                            snabbt($('.left'), {
                                fromPosition: [0, 0, 0],
                                position: [-1000, 0, 0],
                                easing: 'easeIn',
                                duration: 700
                            });

                            setTimeout(function() {
                                    window.location.href = 'index.php';
                                }, 800);

                        } else {
                            $('input:text, input:password').val('');
                            $('input:text').focus();
                            snabbt($('.btn-login'), 'attention', {
                                position: [50, 0, 0],
                                springConstant: 2.4,
                                springDeceleration: 0.9
                            });
                            $('.btn-login').addClass('btn-danger').removeClass('btn-primary');
                            $('.btn-login').children('.glyphicon').addClass('glyphicon-remove').removeClass('glyphicon-refresh').removeClass('glyphicon-refresh-animate');
                            $('.btn-login').children('.bt-text').html('incorrect!');

                            setTimeout(function() {
                                $('.btn-login').addClass('btn-success').removeClass('btn-danger');
                                $('.btn-login').children('.glyphicon').addClass('glyphicon-chevron-right').removeClass('glyphicon-remove');
                                $('.btn-login').children('.bt-text').html('let me in');
                            }, 2000);

                        }
                    },
                    error: function(xhr){
                        alert("An error occured: " + xhr.status + " " + xhr.statusText);
                    }
                });
            }
            return false;
        });
    </script>
</body>
</html>
<?php endif; ?>