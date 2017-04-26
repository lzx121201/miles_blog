<?php
session_start();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == TRUE) {
    $U = $_SESSION['username'];
    $UID = $_SESSION['UserID'];
    $L = $_SESSION['loggedIn'];
} else {
    $L = FALSE;
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Navbar</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min_1.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .menu:hover{
                background-color: rgba(255, 209, 26,1.0);
            }
        </style>
    </head>

    <body>

        <!-- Navigation -->
        <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
                <li class="sidebar-brand">
                    <?php
                    if ($L == FALSE) {
                        echo '<a href="#top" onclick=$("#menu-close").click();>Welcome!</a>';
                    } else {
                        echo '<a href="#top" onclick=$("#menu-close").click();>' . $U . '</a>';
                    }
                    ?>
                </li>
                <li class="menu">
                    <a href="#top" onclick=$("#menu-close").click();>Home</a>
                </li>
                <li class="menu">
                    <?php
                    if ($L == TRUE) {
                        echo '<a href="addNewPost.php #service" onclick=$("#menu-close").click();>Create New Post</a>';
                    }
                    ?>
                </li>
                <?php
                if ($L == FALSE) {
                    ?>
                    <li class="menu">
                        <a href="index.php #service" onclick=$("#menu-close").click();>Login</a>
                    </li>
                    <li class="menu">
                        <a href="index.php #portfolio" onclick=$("#menu-close").click();>Register</a>
                    </li>
                <?php } ?>
                <li class="menu">
                    <a href="index.php #team" onclick=$("#menu-close").click();>About Us</a>
                </li>
                <?php
                if ($L == TRUE) {
                    echo ' <li class="menu"><a href="includes/logout.php" onclick=$("#menu-close").click();>Log Out</a></li>';
                }
                ?>
            </ul>
        </nav>
    <body>
        <?php
        // put your code here
        ?>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script>
                        // Closes the sidebar menu
                        $("#menu-close").click(function (e) {
                            e.preventDefault();
                            $("#sidebar-wrapper").toggleClass("active");
                        });
                        // Opens the sidebar menu
                        $("#menu-toggle").click(function (e) {
                            e.preventDefault();
                            $("#sidebar-wrapper").toggleClass("active");
                        });
                        // Scrolls to the selected menu item on the page
                        $(function () {
                            $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function () {
                                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                                    var target = $(this.hash);
                                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                                    if (target.length) {
                                        $('html,body').animate({
                                            scrollTop: target.offset().top
                                        }, 1000);
                                        return false;
                                    }
                                }
                            });
                        });
                        //#to-top button appears after scrolling
                        var fixed = false;
                        $(document).scroll(function () {
                            if ($(this).scrollTop() > 250) {
                                if (!fixed) {
                                    fixed = true;
                                    // $('#to-top').css({position:'fixed', display:'block'});
                                    $('#to-top').show("slow", function () {
                                        $('#to-top').css({
                                            position: 'fixed',
                                            display: 'block'
                                        });
                                    });
                                }
                            } else {
                                if (fixed) {
                                    fixed = false;
                                    $('#to-top').hide("slow", function () {
                                        $('#to-top').css({
                                            display: 'none'
                                        });
                                    });
                                }
                            }
                        });
                        // Disable Google Maps scrolling
                        // See http://stackoverflow.com/a/25904582/1607849
                        // Disable scroll zooming and bind back the click event
                        var onMapMouseleaveHandler = function (event) {
                            var that = $(this);
                            that.on('click', onMapClickHandler);
                            that.off('mouseleave', onMapMouseleaveHandler);
                            that.find('iframe').css("pointer-events", "none");
                        }
                        var onMapClickHandler = function (event) {
                            var that = $(this);
                            // Disable the click handler until the user leaves the map area
                            that.off('click', onMapClickHandler);
                            // Enable scrolling zoom
                            that.find('iframe').css("pointer-events", "auto");
                            // Handle the mouse leave event
                            that.on('mouseleave', onMapMouseleaveHandler);
                        }
                        // Enable map zooming with mouse scroll when the user clicks the map
                        $('.map').on('click', onMapClickHandler);
        </script>
    </body>
</html>
