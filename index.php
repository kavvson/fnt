<?PHP
error_reporting(0);

//var_dump($res);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fortnite Database - Server Status</title>
    <meta name="description"
          content="Live fortnite server status">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <meta name="robots" content="index,follow">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>


    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-51926782-1', 'auto');
        ga('send', 'pageview');

    </script>
    <link rel="stylesheet" href="css/main_custom.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" data-cfasync="true"
            crossorigin="anonymous"></script>


    <head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="    background-color: rgba(0,0, 0, 0.64);" role="navigation">
    <div class="container" style="color:#000!important;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="display: inline-flex;" href="#">Fortnite -
                Database</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container container-table">
    <div class="row vertical-center-row">
        <div class="container">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-4665888071678125"
                 data-ad-slot="8672207879"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <br><br><br>
            <!-- Page Features -->
            <div class="row text-center">
                <div class="col-md-12 col-sm-12 hero-feature">
                    <div class="thumbnail">
                        <div class="caption">
                            <h1><span id="game_name">FORTNITE</span> is <span id="game_status">{loading}</span><span id="extra"></span><br><i><span id="status_message"></span></i>
                                </a></h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 hero-feature">
                    <div class="thumbnail">
                        <div class="caption">
                            <h1>API is <span id="api_status"></span></i>
                                </a></h1>
                        </div>
                    </div>
                </div>

                <br><br><br>

            </div>
            <!-- /.row -->
            <center><i style="color:white" =>Status updates every 10 seconds, much more content and tools to come PC IGN Kavvson
                soon</i></center>

        </div>
    </div>
</div>

<script>

    var isActive = true;
    $(document).ready(function () {
        $.ajax({
            url: "ping.php",
            type: "get",
            success: function (result) {
                //SUCCESS LOGIC
                $("#game_status").html(result[0].status.toUpperCase());
                if (result[0].status.toUpperCase() === "DOWN") {
                    $("#game_status").css("color", "red");
                    $("#status_message").html("Message : " + result[0].message);
                } else {

                    $("#game_status").css("color", "green");
                }
                if (result[0].api) {
                    $("#api_status").html("Online");
                    $("#api_status").css("color", "green");
                } else {
                    $("#api_status").html("Offline");
                    $("#api_status").css("color", "red");
                }

                if (result[0].status.toUpperCase() === "UP") {
                    $("#extra").html(" Go play :)");
                } else {
                    $("#game_name").html(result[0].serviceInstanceId.toUpperCase());
                }


                pollServer();
            },
            error: function () {
                //ERROR HANDLING
                pollServer();
            }
        });

    });

    $().ready(function () {
        //EITHER USE A GLOBAL VAR OR PLACE VAR IN HIDDEN FIELD
        //IF FOR WHATEVER REASON YOU WANT TO STOP POLLING
        pollServer();
    });

    var erstr = "";

    function pollServer(bypass) {
        if (isActive || bypass) {
            window.setTimeout(function () {
                $.ajax({
                    url: "ping.php",
                    type: "get",
                    success: function (result) {
                        //SUCCESS LOGIC
                        $("#game_status").html(result[0].status.toUpperCase());
                        if (result[0].status.toUpperCase() === "DOWN") {
                            $("#game_status").css("color", "red");
                            $("#status_message").html("Message : " + result[0].message);
                        } else {

                            $("#game_status").css("color", "green");
                        }
                        if (result[0].api) {
                            $("#api_status").html("Online");
                            $("#api_status").css("color", "green");
                        } else {
                            $("#api_status").html("Offline");
                            $("#api_status").css("color", "red");
                        }

                        if (result[0].status.toUpperCase() === "UP") {
                            $("#extra").html(" Go play :)");
                        } else {
                            $("#game_name").html(result[0].serviceInstanceId.toUpperCase());
                        }


                        pollServer();
                    },
                    error: function () {
                        //ERROR HANDLING
                        pollServer();
                    }
                });
            }, 5000);
        }
    }


</script>

