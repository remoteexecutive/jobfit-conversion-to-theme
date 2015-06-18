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

<div class="main-content-container ">
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