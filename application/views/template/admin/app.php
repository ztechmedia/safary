<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Admin Panel</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- <link rel="icon" href="favicon.ico" type="image/x-icon" /> -->
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?= asset('template/css/theme-default.css') ?>"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar page-sidebar-fixed scroll">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a>CMI</a>
                        <a class="x-navigation-control"></a>
                    </li>

                    <?php include 'navigasi.php' ?>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <div class="content"></div>

            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <script type="text/javascript" src="<?= asset('template/js/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= asset('template/js/jquery/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?= asset('template/js/bootstrap/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?= asset("template/js/mcustomscrollbar/jquery.mCustomScrollbar.min.js") ?>"></script>
        <script type="text/javascript" src="<?= asset('template/js/plugins.js') ?>"></script>
        <script type="text/javascript" src="<?= asset('template/js/actions.js') ?>"></script>
        <script type="text/javascript" src="<?= asset('js/ajaxRequest.js') ?>"></script>
        <script type="text/javascript" src="<?= asset('js/loader.js') ?>"></script>
        <script type="text/javascript" src="<?= asset('js/actions/errorHandler.js') ?>"></script>
        <script type="text/javascript" src="<?= asset('js/actions/form.js') ?>"></script>
    </body>

    <script>
        setSidebarOnLoad();
        let currentUrl = localStorage.getItem("currentUrl");
        setCurrentNav(currentUrl);
    </script>

    <style>
        .side-menu {
            cursor: pointer;
        }

        .x-navigation > li:last-child > a {
            border-radius: 0px 0px 0px 0px !important;
        }

        
    </style>
</html>
