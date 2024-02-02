<?php

include '../@/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $projectId = $_POST['id'];

    if (!filter_var($projectId, FILTER_VALIDATE_INT)){
        die("Invalid ID");
    }

    $sql = $bdd->prepare("DELETE FROM works WHERE id = ?");
    $result = $sql->execute([$projectId]);

    if ($result){
        $_SESSION['success_delete'] = "<p class='alert alert-success'>Project delete has been success.</p>";
        header("Location: worklist");
        exit();
    }else{
        echo "Error pending the suppressing of project !";
    }
}else{
    echo "Method not authorized";
}

?>

<!doctype HTML>
<html lang="en">
<head>
    <title>AegisTeam - Admin Dashboard [Project LIST]</title>
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

<header class="site-header">
    <div class="header-wrapper">
        <div class="me-auto flex-grow-1 d-flex align-items-center">
            <ul class="list-unstyled header-menu-nav">
                <li class="hdr-itm mob-hamburger">
                    <a href="#!" class="app-head-link" id="mobile-collapse">
                        <div class="hamburger hamburger-arrowturn">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="d-none d-md-none d-lg-block header-search ms-3">
                <form action="#">
                    <div class="input-group ">
                        <input class="form-control rounded-3" type="search" value="" id="searchInput" placeholder="Search">
                        <div class="search-btn">
                            <button class="btn p-0 rounded-0 rounded-end" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <nav class="ms-auto">
            <ul class="header-menu-nav list-unstyled">
                <li class="hdr-itm dropdown user-dropdown ">
                    <a class="app-head-link dropdown-toggle no-caret me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="avtar"><img src="assets/images/user/avatar-2.jpg" alt=""></span>
                    </a>
                    <div class="dropdown-menu header-dropdown">
                        <ul class="p-0">
                            <hr class="dropdown-divider">
                            <li class="dropdown-item ">
                                <a href="logout" class="drp-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav></div>
</header>
<!-- { Header } end -->
<!-- { navigation menu } start -->
<aside class="app-sidebar app-light-sidebar">
    <div class="app-navbar-wrapper">
        <div class="brand-link brand-logo">
            <a href="/" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="assets/images/logo.svg" alt="" class="logo logo-lg">
            </a>
        </div>
        <div class="navbar-content active nav-provoke" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -10px 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 10px 0px;">

                                <ul class="app-navbar" style="display: block;">

                                    <li class="nav-item nav-hasmenu active">
                                        <a class="nav-link" href="/system"><span class="nav-icon"><i class="ti ti-layout-2"></i></span><span class="nav-text">Dashboard</span></a>

                                    </li>
                                    <li class="nav-item nav-caption">
                                        <label>PAGES</label>
                                    </li>
                                    <li class="nav-item nav-hasmenu">
                                        <a href="#!" class="nav-link">
                                            <span class="nav-icon"><i class="ti ti-layout-2"></i></span>
                                            <span class="nav-text">Works</span>
                                            <span class="nav-arrow nav-provoke">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></span></a>
                                        <ul class="nav-submenu" style="display: none;">
                                            <li class="nav-item">
                                                <a class="nav-link" href="addwork">Add Work</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="worklist">Worklist</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 998px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar" style="height: 887px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </div>
    </div>
</aside>

<div class="page-content-wrapper">
    <div class="content-container">
        <div class="page-content">
            <div class="content-header">
                <h1>Product Lists</h1>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Works</li>
                    <li class="breadcrumb-item">Project Lists</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card table-card">
                                <div class="card-header card-header d-flex align-items-center justify-content-between">
                                    <h4 class="flex-grow-1">All projects</h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="pc-dt-simple">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th class="text-end">Description</th>
                                                <th class="text-end">Link</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php

                                            try {
                                                $sql = "SELECT * FROM works";
                                                $result = $bdd->query($sql);

                                                if ($result->rowCount() > 0) {
                                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<tr>";
                                                        echo "<td>
                    <div class='d-flex align-items-center'>
                        <div class='form-check'>
                            <input type='checkbox' class='form-check-input'>
                        </div>
                        <img src='" . htmlspecialchars($row["thumbnail"]) . "' class='width-50 rounded me-3' alt='thumbnail'>
                        <p class='mb-0'>" . htmlspecialchars($row["title"]) . "</p>
                    </div>
                  </td>";
                                                        echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
                                                        echo "<td class='text-end'>" . htmlspecialchars($row["description"]) . "</td>";
                                                        echo "<td class='text-end'><a href='" . htmlspecialchars($row["link"]) . "'>". htmlspecialchars($row["link"]) ."</a></td>";
                                                        echo "<td class='text-end'>
                    <a class='btn btn-icon btn-sm' href='view_project?id=" . $row['id'] . "' data-bs-toggle='tooltip' title='View'><i class='ti ti-eye'></i></a>
                    <a class='btn btn-icon btn-sm' href='edit_project?id=" . $row['id'] . "' data-bs-toggle='tooltip' title='Edit' ><i class='ti ti-pencil'></i></a>
                    <button onclick='deleteProject(" . $row['id'] . ")' class='btn btn-icon btn-sm' data-bs-toggle='tooltip' title='Delete'><i class='ti ti-archive'></i></button>
                  </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5'>Aucun projet trouvé</td></tr>";
                                                }
                                            } catch (PDOException $e) {
                                                die("Erreur de base de données: " . $e->getMessage());
                                            }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
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



<script>
    function deleteProject(id){
        if (confirm('Êtes vous sur de vouloir supprimer ce projet?')){
            window.location.href = 'delete_project?id=' + id;
        }
    }
</script>


<svg id="SvgjsSvg1207" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1208"></defs><polyline id="SvgjsPolyline1209" points="0,0"></polyline><path id="SvgjsPath1210" d="M0 0 "></path></svg>
</body>
</html>
