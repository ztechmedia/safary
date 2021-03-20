<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?= $title ?></title>            
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
        
        <div class="login-container ">
        
            <div class="login-box animated fadeInDown">
                <div class="login-body">
                    <?php $this->load->view($view) ?>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2021 CMI Test
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
    <script type="text/javascript" src="<?= asset('template/js/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('js/ajaxRequest.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('js/actions/auth.js') ?>"></script>
</html>






