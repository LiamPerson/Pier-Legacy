<?php
include "core/_startApp.php";
//s(get_included_files());
?>
<head>
    <title>Pier</title>
    <link rel="stylesheet" href="dist/bootstrap-4.0.0-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="dist/css/custom.css" type="text/css">
    <link href="dist/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
</head>
<body>

<!--Main Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="http://pier/">Pier</a>
    <form class="w-100 p-0 m-0" action="#" id="searchSiteForm" method="get">
        <div class="input-group">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <ul class="navbar-nav px-3 d-none d-lg-block">
        <li class="nav-item text-nowrap">
            <a href="http://pier/admin" class="nav-link">Admin</a>
        </li>
    </ul>
</nav>

<!--Main Content-->
<article class="container-fluid">
    <div class="row">
        <!--Sidebar-->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item active"><a href="videos" class="nav-link"><i class="fas fa-video"></i> Videos</a></li>
                    <li class="nav-item"><a href="movies" class="nav-link"><i class="fas fa-film"></i> Movies</a></li>
                </ul>
            </div>
        </nav>

        <div class="col">
            <main class="container-fluid" id="displayMain">
                <?php include ($incFile); ?>
            </main>
        </div>
    </div>
</article>
</body>

<script src="dist/js/jquery-3.4.1.min.js"></script>
<script src="dist/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
<script src="dist/bootstrap-4.0.0-dist/js/popper.min.js"></script>


