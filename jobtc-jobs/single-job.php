<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/jobtc-3/wp-blog-header.php');


//Get data from Job
global $wpdb;
//$user_id = wp_get_current_user();
$job_id = $_GET['job_id'];
$job_table = $wpdb->prefix . 'job';

$job_sql = " SELECT 
                DISTINCT (a.job_id),
                a.user_id,	
                a.company,
                a.website,
                a.logo,
                a.job_title,
                a.job_type,
                a.job_category,
                a.location,
                a.job_description,
                a.job_video_link
        from $job_table a WHERE job_id in (%d)";


$job_prepared_statement = $wpdb->prepare($job_sql, $job_id);
$job = $wpdb->get_results($job_prepared_statement);


foreach ($job as $job_data) {

    $job_id = $job_data->job_id;
    $user_id = $job_data->user_id;
    $company = $job_data->company;
    $website = $job_data->website;
    $logo = $job_data->logo;
    $location = $job_data->location;
    $job_title = $job_data->job_title;
    $job_type = $job_data->job_type;
    $job_category = $job_data->job_category;
    $job_description = $job_data->job_description;
    $job_video_link = $job_data->job_video_link;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title></title>

        <!--Favicon-->
        <link rel="icon" href="<?php echo esc_url(get_theme_mod('jobfit_favicon')); ?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('jobfit_favicon')); ?>" type="image/x-icon" />
        <!-- Bootstrap -->
        <link href="<?php echo get_template_directory_uri() . '/dist/css/bootstrap.css' ?>" rel="stylesheet">
        <!--Custom CSS-->
        <link href="<?php echo get_template_directory_uri() . '/dist/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri() . '/dist/css/bootstrap-dialog.css' ?>" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri() . '/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
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
        <div class="content-container">
            <input type="hidden" class="site-url" name="site-url" value="<?php echo get_template_directory_uri(); ?>"/>
            <input type="hidden" class="ajax-url" name="ajax-url" value="<?php echo admin_url('admin-ajax.php'); ?>">

            <div class="row">
                <div class="col-md-12">
                    <?php if (!is_user_logged_in()) { ?>
                        <input class="btn btn-primary apply-for-job" type="button" value="Apply" />
                    <?php } ?>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="logo">
                        <img width="150" height="150" src="<?php echo $logo; ?>"/>
                    </div>
                    <div class="job_title job-title-color">
                        <?php echo $job_title; ?>
                    </div>
                    <div class="company website">
                        <?php echo $company . '@' . $website; ?>
                    </div>
                    <div class="location">
                        <?php echo $location; ?>
                    </div>
                    <div class="job_description">
                        <?php echo $job_description; ?>
                    </div>
                    <div class="job_video_link">
                        <?php
                        if ($job_video_link == "") {
                            echo "No Video";
                        } else {
                            ?>
                            <iframe height="355" src="<?php echo $job_video_link; ?>"></iframe>
                        <?php } ?>
                    </div>
                </div>
            </div>
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
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/bootstrap-select.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/slickQuiz.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/slickQuiz-config.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/dist/js/custom.js' ?>"></script>
</body>
</html>