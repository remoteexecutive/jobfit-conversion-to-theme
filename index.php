<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo wp_title(''); ?></title>

        <!--Favicon-->
        <link rel="icon" href="<?php echo esc_url( get_theme_mod( 'jobfit_favicon' ) ); ?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'jobfit_favicon' ) ); ?>" type="image/x-icon" />
        <!-- Bootstrap -->
        <link href="<?php echo get_template_directory_uri() . '/dist/css/bootstrap.css' ?>" rel="stylesheet">
        <!--Custom CSS-->
        <link href="<?php echo get_template_directory_uri() . '/dist/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri() . '/dist/css/bootstrap-dialog.css' ?>" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri() . '/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri() . '/dist/css/slickQuiz.css' ?>" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri() . '/dist/css/style.css' ?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
                 <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
             <![endif]-->
        <div class=header-container>
            <div class="row">
                <?php
                get_header();
                ?>
                <input type="hidden" class="site-url" name="site-url" value="<?php echo get_template_directory_uri();?>"/>
                <input type="hidden" class="ajax-url" name="ajax-url" value="<?php echo admin_url('admin-ajax.php'); ?>">
            </div>
        </div>
        <div class="content-container">
            <?php if (is_user_logged_in()) { ?>
                <div class="row">
                    <div class="main-content-container col-md-8 col-xs-12">
                        <?php
                        if (current_user_can('can_submit_job') || current_user_can('manage_options')) {
                            get_template_part('jobtc-dashboards/employer', 'dashboard');
                        } else {
                            get_template_part('jobtc-dashboards/jobseeker', 'dashboard');
                        }
                        ?>
                    </div>
                    <div class="sidebar-content-container col-md-4 hidden-xs hidden-sm">
                        <?php
                        //include (VIEW_SIDEBAR);
                        get_template_part('jobtc-sidebars/sidebar');
                        ?>
                    </div>
                </div>
            <?php
            } else {

                get_template_part('jobtc-login/login');
            }
            ?>
        </div>
        <footer>
            <p>Copyright &copy; 2015 JobFit</p>
        </footer>
    </div> <!-- /container -->  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.0/less.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri() . '/dist/js/bootstrap.min.js' ?>"></script>
    <!--Custom Javascript-->
    <script src="<?php echo get_template_directory_uri() . '/dist/js/bootstrap-dialog.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/slickQuiz.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/slickQuiz-config.js' ?>"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/bootstrap-select.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/custom.js' ?>"></script>
</body>
</html>