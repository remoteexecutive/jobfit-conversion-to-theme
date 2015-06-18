<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/jobtc-3/wp-blog-header.php');

//Get data from Job Table
global $wpdb;
$user_id = wp_get_current_user();
$resume_id = $_GET['resume_id'];
$job_table = $wpdb->prefix . 'job';

$job_sql = " SELECT 
                a.job_id,
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
        from $job_table a WHERE user_id in (%d)";


$job_prepared_statement = $wpdb->prepare($job_sql, $user_id->ID, $job_id);
$job = $wpdb->get_results($job_prepared_statement);
?>
<form action="" method="post" id="submit_form" class="submit_form main_form job-map-form" novalidate="novalidate">

    <label>Select Job</label>
    <input type="hidden" name="resume_id" value="<?php echo $resume_id; ?>">
    <select class="job" name="job">
        <?php
        foreach ($job as $job_data) {

            $job_id = $job_data->job_id;
            $job_title = $job_data->job_title;
            ?>
            <option value="<?php echo $job_id; ?>">
                <?php echo $job_title; ?>
            </option>
        <?php } ?>
    </select>
</form>