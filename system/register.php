<?php

include '../@/db.php';

?>

<!doctype HTML>
<html lang="en">
<head>
    <title>Wedash - Bootstrap 5 Admin Template</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Dashboard Template Description">
    <meta name="keywords" content="Dashboard Template">
    <meta name="author" content="Techne infosys">

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/feather.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="assets/fonts/material.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="#" id="rtl-style-link">
    <link rel="stylesheet" href="assets/css/style-dark.css" id="main-style-link">
</head>
<body class="theme-1">
<!-- { Pre-loader } start -->

<!-- { Pre-loader } End -->


<div class="auth-wrapper authentication-signin bg-primary ">
    <div class="auth-content">
        <div class="row align-items-center justify-content-center text-start">
            <div class="col-xl-4 col-lg-8 col-md-10">
                <div class="card mb-0">
                    <div class="card-body">

                        <?php

                        if (isset($_POST['registerBtn'])){
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $rpassword = $_POST['rpassword'];

                            $checkUsername = $bdd->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username");
                            $checkUsername->execute(array(':username' => $username));
                            $countUser = $checkUsername->fetchColumn(0);

                            if (empty($username) || empty($password) || empty($rpassword)|| empty($email)){
                                echo '<p class="alert alert-danger">Please fill all in field.</p>';
                            }else{
                                if (!ctype_alnum($username) || strlen($username) < 4 || strlen($username) > 15){
                                    echo '<p class="alert alert-danger">Username must be 4-15 length and alnum</p>';
                                }else{
                                    if (!($countUser == 0)){
                                        echo '<p class="alert alert-danger">Username is taken</p>';
                                    }else{
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                            echo '<p class="alert alert-danger">Invalide email.</p>';
                                        }else{
                                            if ($password != $rpassword){
                                                echo '<p class="alert alert-danger">Passwords do not match.</p>';
                                            }else{
                                                $insert = $bdd->prepare("INSERT INTO `users` VALUES(null, :username, :password, :email, 0)");
                                                $insert->execute(array(':username' => $username, ':password' => SHA1($password), ':email' => $email));
                                                echo '<p class="alert alert-success">Register successfully redirecting to login page...</p><meta http-equiv="refresh" content="2;url=login">';
                                            }
                                        }
                                    }
                                }
                            }


                        }

                        ?>


                        <div class="border p-4 rounded">
                            <div class="text-center">
                                <h3>Sign in</h3>
                                <p class="mb-0">Use these awesome forms to login or create new account in your project for free.</p>
                                <p>You have already account ? <a href="login">Signin here</a></p>
                            </div>
                            <div class="row mt-4 justify-content-center">
                                <div class="col-lg-10">
                                    <form method="post">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="username">Enter Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="email">Enter Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="password">Enter Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="rpassword">Enter Repeat Password</label>
                                            <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Repeat Password">
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="d-grid">
                                                <button type="submit" name="registerBtn" class="btn btn-primary btn-block mt-3">
                                                    Sign Up
                                                </button>
                                            </div>
                                            <p class="mb-0 text-center">
                                                Already have an account?
                                                <a href="login" class="f-w-400">Signin</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="app-footer">
    <div class="footer-wrapper">
        <div class="py-1">
            <span class="text-muted">© 2024, AegisTeam.</span>
        </div>
    </div>
</footer>

<!-- Required Js -->
<script src="assets/js/plugins/jquery.min.js"></script>
<script src="assets/js/plugins/popper.min.js"></script>
<script src="assets/js/plugins/simplebar.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script src="assets/js/main.js"></script>
<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<script>
    feather.replace();
    $(document).ready(function() {
        var thtoggle = $("#pct-toggler");
        if (thtoggle.length) {
            thtoggle.on("click", function() {
                var themeRoller = $(".theme-roller");
                if (!themeRoller.hasClass("active")) {
                    themeRoller.addClass("active");
                } else {
                    themeRoller.removeClass("active");
                }
            });
        }

        var themescolors = $(".themes-preference > a");
        themescolors.on("click", function(event) {
            var targetElement = $(event.target);
            if (targetElement.is("span")) {
                targetElement = targetElement.parent();
            }
            var temp = targetElement.attr("data-value");
            $("body").removeClass(function(index, className) {
                return (className.match(new RegExp("\\btheme-\\S+", "g")) || []).join(" ");
            });
            $("body").addClass(temp);
            localStorage.setItem("themePreference", temp); // Save theme preference color to localStorage
        });

        var custthemebg = $("#cust-rtllayout");
        custthemebg.on("click", function() {
            if (custthemebg.prop("checked")) {
                $("html").attr("dir", "rtl");
                $("html").attr("lang", "ar");
                $("#rtl-style-link").attr("href", "assets/css/style-rtl.css");
                localStorage.setItem("rtlLayout", true);
            } else {
                $("html").removeAttr("dir");
                $("html").removeAttr("lang");
                $("#rtl-style-link").removeAttr("href");
                localStorage.setItem("rtlLayout", false);
            }
        });

        var custdarklayout = $("#cust-darklayout");
        custdarklayout.on("click", function() {
            if (custdarklayout.prop("checked")) {
                $(".brand-link > .b-brand > .logo-lg").attr("src", "assets/images/logo.svg");
                $("#main-style-link").attr("href", "assets/css/style-dark.css");
                localStorage.setItem("darkLayout", true);
            } else {
                $(".brand-link > .b-brand > .logo-lg").attr("src", "assets/images/logo-dark.svg");
                $("#main-style-link").attr("href", "assets/css/style.css");
                localStorage.setItem("darkLayout", false);
            }
        });

        function removeClassByPrefix(node, prefix) {
            $(node).removeClass(function(index, className) {
                return (className.match(new RegExp("\\b" + prefix + "\\S+", "g")) || []).join(" ");
            });
        }

        // Load settings from localStorage
        var storedDarkLayout = localStorage.getItem("darkLayout");
        if (storedDarkLayout === "true") {
            custdarklayout.prop("checked", true);
            $(".brand-link > .b-brand > .logo-lg").attr("src", "assets/images/logo.svg");
            $("#main-style-link").attr("href", "assets/css/style-dark.css");
        }

        var storedThemePreference = localStorage.getItem("themePreference");
        if (storedThemePreference) {
            $("body").removeClass(function(index, className) {
                return (className.match(new RegExp("\\btheme-\\S+", "g")) || []).join(" ");
            });
            $("body").addClass(storedThemePreference);
        }

        // Apply RTL layout on page load
        $(window).on('load', function() {
            var storedRtlLayout = localStorage.getItem("rtlLayout");
            if (storedRtlLayout === "true") {
                custthemebg.prop("checked", true);
                $("html").attr("dir", "rtl");
                $("html").attr("lang", "ar");
                $("#rtl-style-link").attr("href", "assets/css/style-rtl.css");
            }
        });
    });

</script>

<svg id="SvgjsSvg1207" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1208"></defs><polyline id="SvgjsPolyline1209" points="0,0"></polyline><path id="SvgjsPath1210" d="M0 0 "></path></svg>
</body>
</html>
