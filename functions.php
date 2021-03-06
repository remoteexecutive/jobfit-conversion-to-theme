<?php
/*
 * For Site title 
 * */

function site_title($title) {
    if (empty($title) && ( is_home() || is_front_page() )) {
        return __(get_bloginfo('name')) . ' | ' . get_bloginfo('description');
    }
    return $title;
}

add_filter('wp_title', 'site_title');

/*
 * For Logo Uploader
 * */

function jobfit_logo($wp_customize) {
    $wp_customize->add_section('jobfit_logo_section', array(
        'title' => __('Logo', 'jobfit'),
        'priority' => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ));

    $wp_customize->add_setting('jobfit_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'jobfit_logo', array(
        'label' => __('Logo', 'jobfit'),
        'section' => 'jobfit_logo_section',
        'settings' => 'jobfit_logo',
    )));
}

add_action('customize_register', 'jobfit_logo');
/*
 * For Favicon Uploader
 * */

function jobfit_favicon($wp_customize) {
    $wp_customize->add_section('jobfit_favicon_section', array(
        'title' => __('Favicon', 'jobfit'),
        'priority' => 30,
        'description' => 'Upload a favicon',
    ));

    $wp_customize->add_setting('jobfit_favicon');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'jobfit_favicon', array(
        'label' => __('Favicon', 'jobfit'),
        'section' => 'jobfit_favicon_section',
        'settings' => 'jobfit_favicon',
    )));
}

add_action('customize_register', 'jobfit_favicon');

/*
  Register Custom Navigation Walker
 * * */
require_once('wp_bootstrap_navwalker.php');

/*
 * Default Menu for jobfit 
 * */
register_nav_menu('primary', __('Primary Menu', 'jobfit'));

/*
 * Redirect all logins to home url
 * */
add_filter('login_redirect', create_function('$url,$query,$user', 'return home_url();'), 10, 3);

function tml_new_user_registered($user_id) {
    wp_set_auth_cookie($user_id, false, is_ssl());
    $referer = remove_query_arg(array('action', 'instance'), wp_get_referer());
    wp_redirect($referer);
    exit;
}

add_action('tml_new_user_registered', 'tml_new_user_registered');

function tml_register_form() {
    wp_original_referer_field(true, 'previous');
}

add_action('register_form', 'tml_register_form');



/*
 * For Employer menu 
 * */

function create_primary_menu() {

    $menu_name = 'jobfit';

    // Check if the menu exists
    $menu_exists = wp_get_nav_menu_object($menu_name);

// If it doesn't exist, let's create it.
    if (!$menu_exists) {

        $menu_id = wp_create_nav_menu($menu_name);

        // Set up default menu items
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('About'),
            'menu-item-classes' => 'about',
            'menu-item-url' => home_url('/about/'),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Contact'),
            'menu-item-url' => home_url('/contact/'),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Pricing'),
            'menu-item-url' => home_url('/pricing/'),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Terms'),
            'menu-item-url' => home_url('/terms/'),
            'menu-item-status' => 'publish'));
    }
}

/*
 * Create primary menu Pages 
 * */

function create_primary_menu_pages() {

    $about = array(
        'post_title' => 'About',
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_author' => 1,
        'post_date' => current_time('mysql')
    );

    $contact = array(
        'post_title' => 'Contact',
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_author' => 1,
        'post_date' => current_time('mysql')
    );

    $pricing = array(
        'post_title' => 'Pricing',
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_author' => 1,
        'post_date' => current_time('mysql')
    );

    $terms = array(
        'post_title' => 'Terms',
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_author' => 1,
        'post_date' => current_time('mysql')
    );


    wp_insert_post($about);
    wp_insert_post($contact);
    wp_insert_post($pricing);
    wp_insert_post($terms);
}

/*
 * For Resume
 * */

function resume_post_type() {
    register_post_type('resume', array(
        'labels' => array(
            'name' => __('Resume'),
            'singular_name' => __('Resume')
        ),
        'public' => true,
        'has_archive' => true,
            )
    );
}

/*
 * For Jobs
 * */

function job_post_type() {
    register_post_type('job', array(
        'labels' => array(
            'name' => __('Job'),
            'singular_name' => __('Job')
        ),
        'public' => true,
        'has_archive' => true,
            )
    );
}

add_action('init', 'job_post_type');
add_action('init', 'resume_post_type');


/*
 * Create resume and job tables for the theme
 * */

function create_resume_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'resume';
    $sql = "CREATE TABLE $table_name (
resume_id bigint(20) NOT NULL AUTO_INCREMENT,
user_id bigint(20),
rate varchar(255),
currency varchar(255),
location varchar(255),
email varchar(255),
phone varchar(255),
mobile varchar(255),
skype varchar(255),
resume_photo varchar(255),
resume_doc varchar(255),
additional_doc varchar(255),
overall_average varchar(255),
transcripts varchar(255),
degree varchar(255),
institution varchar(255),
year_issued varchar(255),
skills varchar(255),
interview_video_link varchar(255),
UNIQUE KEY id (resume_id)
) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function create_resume_statuses_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'resume_statuses';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
  `resume_id` bigint(20) NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `fast_tracked` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Standard Tracked',
  `reference_checked` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Check Reference',
  `video_interview` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Video',
  `red_flagged` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Check For Red Flags',
  `completed_evaluation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Evaluate',
  `starred` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pick',
  `job_id` bigint(20) NOT NULL,
  `job_applied_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_owner` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='For Resume Statuses per Employer';";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function create_career_map_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'career_map';
    $sql = "CREATE TABLE $table_name (
career_map_id bigint(20) NOT NULL AUTO_INCREMENT,
user_id bigint(20),
employment varchar(255),
company varchar(255),
position varchar(255),
start_date varchar(255),
end_date varchar(255),
job_type varchar(255),
city varchar(255),
country varchar(255),
reason_for_leaving varchar(255),
salary_type varchar(255),
starting_salary varchar(255),
final_salary varchar(255),
reference_name varchar(255),
reference_email varchar(255),
reference_phone_number varchar(255),
reference_position varchar(255),
notes varchar(255),
UNIQUE KEY id (career_map_id)
) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function create_job_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'job';
    $sql = "CREATE TABLE $table_name (
job_id bigint(20) NOT NULL AUTO_INCREMENT,
user_id bigint(20),
company varchar(255),
website varchar(255),
logo varchar(255),
job_title text,
job_type text,
job_category varchar(255),
location varchar(255),
job_description longtext,
job_video_link varchar(255),
UNIQUE KEY id (job_id)
) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function create_job_map_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'job_map';
    $sql = "CREATE TABLE $table_name (
            job_id bigint(20), 
            resume_id bigint(20)
            );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function create_reference_responses_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'reference_responses';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
  `resume_id` bigint(20) NOT NULL,
  `reference_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `performance` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `attitude` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dependability` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `team_player` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `learning_speed` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `flexibility` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `creativity` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function create_final_evaluation_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'final_evaluation';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
  `employer_id` bigint(20) NOT NULL,
  `resume_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `skills_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `education_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `career_map_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `references_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `video_interview_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `tests_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `positive_adjustments_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `final_evaluation_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `skills_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career_map_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `references_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_interview_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tests_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `positive_adjustments_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skills_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career_map_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `references_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_interview_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tests_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `positive_adjustments_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function create_video_evaluation_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'video_evaluation';
    $sql = "CREATE TABLE IF NOT EXISTS `wp_video_evaluation` (
  `employer_id` bigint(20) NOT NULL,
  `resume_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `confidence_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `communication_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `fun_factor_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `connection_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `understanding_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `bonus_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `video_evaluation_score` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `confidence_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `communication_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fun_factor_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connection_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `understanding_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bonus_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confidence_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `communication_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fun_factor_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connection_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `understanding_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bonus_evaluator` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

/*
 * Delete function when theme is deactivated
 * */

function delete_resume_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'resume';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_resume_statuses_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'resume_statuses';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_career_map_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'career_map';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_reference_responses_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'reference_responses';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_final_evaluation_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'final_evaluation';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_video_evaluation_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'video_evaluation';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_job_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'job';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_job_map_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'job_map';
    $sql = "DROP TABLE $table_name;";
    $wpdb->query($sql);
}

function delete_primary_menu() {
    wp_delete_nav_menu('jobfit');
}

function delete_primary_menu_pages() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'posts';
    $sql = "DELETE FROM $table_name where post_title in ('About','Contact','Pricing','Terms')";
    //$prepared_statement = $wpdb->prepare($sql,$pages); 
    $wpdb->query($sql);
}

/**
 * Add all custom roles for this theme 
 * * */
function add_roles_on_theme_activation() {

    //Create tables needed for the theme
    create_resume_table();
    create_resume_statuses_table();
    create_career_map_table();
    create_reference_responses_table();
    create_final_evaluation_table();
    create_video_evaluation_table();
    create_job_table();
    create_job_map_table();


    //Create the Pages to be placed in the primary menu
    create_primary_menu_pages();
    //Create primary menu
    create_primary_menu();

    //Add theme roles
    add_role('jobseeker', 'Job Seeker', array('read' => true, 'can_submit_resume' => true, 'level_0' => true));
    add_role('employer', 'Employer', array('read' => true, 'can_submit_job' => true, 'level_0' => true));
    add_role('recruiter', 'Recruiter', array('read' => true, 'level_0' => true));



    //Remove default roles except for Administrator
    remove_role('subscriber');
    remove_role('contributor');
    remove_role('author');
    remove_role('editor');
}

add_action("after_switch_theme", "add_roles_on_theme_activation", 10, 2);

/*
 *  Set Default Role to Employer 
 * */

add_filter('pre_option_default_role', function() {
    return 'employer';
});

/*
 * Remove roles upon theme deactivation  
 * */

function remove_roles_on_theme_deactivation() {

    delete_resume_table();
    delete_resume_statuses_table();
    delete_career_map_table();
    delete_reference_responses_table();
    delete_final_evaluation_table();
    delete_video_evaluation_table();
    delete_job_table();
    delete_job_map_table();

    //Delete primary menu and its menu items
    delete_primary_menu();
    delete_primary_menu_pages();


    remove_role('jobseeker');
    remove_role('employer');
    remove_role('recruiter');

    add_role('subscriber', 'Subscriber', array('read' => true, 'level_0' => true));
    add_role('contributor', 'Contributor', array('read' => true, 'level_0' => true));
    add_role('author', 'Author', array('read' => true, 'level_0' => true));
    add_role('editor', 'Editor', array('read' => true, 'level_0' => true));
}

add_action("switch_theme", "remove_roles_on_theme_deactivation", 10, 2);


/*
 * Get Resumes for dashboard loop
 * */

function dashboard_loop_resume() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'resume';
    $sql = " SELECT * from $table_name ";
    $count = "SELECT count(*) from $table_name";
    //$prepared_statement = $wpdb->prepare($sql);
    $resumes = $wpdb->get_results($sql);

    $wpdb->flush();
}

/*
 * Get Jobs for dashboard loop 
 * */

function dashboard_loop_job() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'job';
    $sql = " SELECT * from $table_name ";
    $count = "SELECT count(*) from $table_name";
    //$prepared_statement = $wpdb->prepare($sql);
    $jobs = $wpdb->get_results($sql);

    $wpdb->flush();
}

/*
 * Get Comments for dashboard 
 * */

function dashboard_comments() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'comments';
    $sql = " SELECT * from $table_name ";
    $count = "SELECT count(*) from $table_name";
    //$prepared_statement = $wpdb->prepare($sql);
    $comments = $wpdb->get_results($sql);

    $wpdb->flush();
}

/*
 * Get comments for sidebar 
 * */

function sidebar_comments() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'comments';
    $sql = " SELECT * from $table_name ";
    $count = "SELECT count(*) from $table_name";
    //$prepared_statement = $wpdb->prepare($sql);
    $comments = $wpdb->get_results($sql);

    $wpdb->flush();
}

/*
 * Add All Custom Ajax functions to be called
 * */
add_action('wp_ajax_save_evaluation', 'save_evaluation');
add_action('wp_ajax_save_video_evaluation', 'save_video_evaluation');
add_action('wp_ajax_job_end', 'job_end');
add_action('wp_ajax_job_delete', 'job_delete');
add_action('wp_ajax_resume_delete', 'resume_delete');
add_action('wp_ajax_job_relisting', 'job_relisting');
add_action('wp_ajax_change_resume_statuses', 'change_resume_statuses');
add_action('wp_ajax_post_comment_ajax', 'post_comment_ajax');
add_action('wp_ajax_send_email_ajax', 'send_email_ajax');
add_action('wp_ajax_apply_for_job', 'apply_for_job');
add_action('wp_ajax_save_resume', 'save_resume');
add_action('wp_ajax_save_career_map', 'save_career_map');
add_action('wp_ajax_save_job', 'save_job');
add_action('wp_ajax_link_job_to_user', 'link_job_to_user');
add_action('wp_ajax_unlink_job_from_user', 'unlink_job_from_user');

function apply_for_job() {

    global $wpdb;

    if ($_POST) {
        $resume_id = $_POST['resume_id'];
        $resume = $_POST['resume_name'];
        $job = $_POST['job'];

        $data = array(
            'ID' => $resume_id,
            'post_title' => $resume
        );

        wp_set_object_terms($resume_id, array($job), 'resume_category');

        wp_update_post($data);

        $job_terms = wp_get_post_terms($resume_id, 'resume_category');

        $get_job_owner = $wpdb->get_row("SELECT distinct(post_author) as job_owner, ID as job_id FROM wp_posts WHERE post_name in ('" . $job_terms[0]->slug . "')");

        $job_owner = $get_job_owner->job_owner;

        $job_id = $get_job_owner->job_id;

        //Check Resume Statuses if Resume ID exists
        //If they do not, insert them

        if ($wpdb->update(
                        'wp_resume_statuses', array(
                    'employer_id' => $job_owner,
                    'job_applied_to' => $job_terms[0]->name,
                    'job_slug' => $job_terms[0]->slug,
                    'job_owner' => $job_owner,
                    'job_id' => $job_id
                        ), array(
                    //'employer_id' => $job_owner,
                    'resume_id' => $resume_id
                        //'job_id' => $job_id
                        ), array(
                    '%s'
                        ), array('%s')
                ) == false) {
            echo "Could not update wp_resume_statuses table";
        } else {
            echo "Updated wp_resume_statuses table";
        }
    }
}

function resume_delete() {

    global $wpdb;

    if ($_POST) {
        $resume_id = $_POST['resume_id'];

        $posts = $wpdb->prepare("DELETE FROM wp_posts WHERE ID = '$resume_id' and post_type = 'resume'");

        $statuses = $wpdb->prepare("DELETE FROM wp_resume_statuses WHERE resume_id = '$resume_id'");

        $video_evaluation = $wpdb->prepare("DELETE FROM wp_video_evaluation WHERE resume_id = '$resume_id'");

        $final_evaluation = $wpdb->prepare("DELETE FROM wp_final_evaluation WHERE resume_id = '$resume_id'");

        $reference_responses = $wpdb->prepare("DELETE FROM wp_references_responses WHERE resume_id = '$resume_id'");

        $wpdb->query($posts);
        $wpdb->query($statuses);
        $wpdb->query($video_evaluation);
        $wpdb->query($final_evaluation);
        $wpdb->query($reference_responses);
    }
}

/*
 * Function for Unlinking a job from user (Delete via AJAX)
 */
function unlink_job_from_user() {
    global $wpdb;
    $table_name = $wpdb->prefix .'job_map';
    
    if ($_POST) {
        
        $job_id = $_POST['job_id'];
        $resume_id = $_POST['resume_id'];
        
         $resume_count = $wpdb->get_var("SELECT COUNT(*) as count FROM $table_name WHERE resume_id in (" . $resume_id . ")");
        
         if ($resume_count > 0) {
           
            $wpdb->delete($table_name, array(
                'job_id' => $job_id,
                 'resume_id' => $resume_id
            ));
             
         } else {
             
              echo 'User is not linked to a Job.';
         }
        
    }
}

/*
 * Function for Linking a job to a user( Saved via AJAX) 
 * */
function link_job_to_user() {
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'job_map';
    
    if ($_POST) {
        
        $job_id = $_POST['job_id'];
        $resume_id = $_POST['resume_id'];
        
         $resume_count = $wpdb->get_var("SELECT COUNT(*) as count FROM $table_name WHERE resume_id in (" . $resume_id . ")");
        
         if ($resume_count > 0) {
           
             echo 'User is already linked to a Job.';
             
         } else {
             
             $wpdb->insert($table_name, array(
                'job_id' => $job_id,
                 'resume_id' => $resume_id
            ));
             
             echo 'Invite Sent';
         }
    }
}


/*
 * Function for saving a job(Saved via AJAX) 
 * */
function save_job() {

    global $wpdb;
    $table_name = $wpdb->prefix . 'job';

    if ($_POST) {

        $user_id = wp_get_current_user();
        $job_id = $_POST['job_id'];
        $company = $_POST['company'];
        $website = $_POST['website'];
        $job_title = $_POST['job_title'];
        $job_type = $_POST['job_type'];
        $job_category = $_POST['job_category'];
        $location = $_POST['location'];
        $job_description = $_POST['job_description'];
        $job_video_link = $_POST['job_video_link'];

        
         //For File Upload

        //For Job Logo
        $logo_upload = $_FILES['logo']['name'];
        $logo_upload_tmp = $_FILES['logo']['tmp_name'];
 
        $logo_upload_to = ABSPATH . 'wp-content/uploads/' . $logo_upload;

        $logo_move_result = move_uploaded_file($logo_upload_tmp, $logo_upload_to);
        
        if ($logo_upload != "" ) {
            $logo = 'http://' . $_SERVER['HTTP_HOST'] . '/jobtc-3/wp-content/uploads/' . $logo_upload;
        } else {
            $logo = "";
        }
        
        $job_count = $wpdb->get_var("SELECT COUNT(*) as count FROM $table_name WHERE job_id in (" . $job_id . ")");
        
        if ($job_count > 0) {
            
            if ($logo != "") {

                $wpdb->update($table_name, array(
                    'logo' => $logo
                        ), array('user_id' => $user_id->ID, 'job_id' => $job_id), array(
                    '%s', //logo
                        ), array('%d','%d')
                );
            }
            
            $wpdb->update($table_name, array(
                'company' => $company,
                'website' => $website,
                'job_title' => $job_title,
                'job_type' => $job_type,
                'job_category' => $job_category,
                'location' => $location,
                'job_description' => $job_description,
                'job_video_link' => $job_video_link
                    ), array('user_id' => $user_id->ID, 'job_id' => $job_id), array(
                '%s', //company
                '%s', //website
                '%s', //logo
                '%s', //job title
                '%s', //job type
                '%s', //job category
                '%s', //location
                '%s', //job description
                '%s', //job video link
                    ), array(
                '%d', //user id
                '%d' //job id
                    )
            );
        } else {

            $wpdb->insert($table_name, array(
                'user_id' => $user_id->ID,
                'company' => $company,
                'website' => $website,
                'logo' => $logo,
                'job_title' => $job_title,
                'job_type' => $job_type,
                'job_category' => $job_category,
                'location' => $location,
                'job_description' => $job_description,
                'job_video_link' => $job_video_link
            ));
        }
    }
    return true;
}

/*
 * Function for saving the resume( Saved via AJAX) 
 * */

function save_resume() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'resume';
    $career_map_table = $wpdb->prefix . 'career_map';


    if ($_POST) {

        $user_id = wp_get_current_user();
        $rate = $_POST['rate'];
        $currency = $_POST['currency'];
        $location = $_POST['location'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $skype = $_POST['skype'];
        $overall_average = $_POST['overall_average'];
        $transcripts = $_POST['transcripts'];
        $degree = $_POST['degree'];
        $institution = $_POST['institution'];
        $year_issued = $_POST['year_issued'];
        $skills = $_POST['skills'];
        $interview_video_link = $_POST['interview_video_link'];

        //For File Upload

        //For Resume Photo
        $resume_photo_upload = $_FILES['resume_photo']['name'];
        $resume_photo_tmp = $_FILES['resume_photo']['tmp_name'];

        //For Resume Doc
        $resume_doc_upload = $_FILES['resume_doc']['name'];
        $resume_doc_tmp = $_FILES['resume_doc']['tmp_name'];
        
        //For Additional Documents
        $additional_doc_upload = $_FILES['additional_doc']['name'];
        $additional_doc_tmp = $_FILES['additional_doc']['tmp_name'];
        
        $resume_photo_upload_to = ABSPATH . 'wp-content/uploads/' . $resume_photo_upload;
        $resume_doc_upload_to = ABSPATH . 'wp-content/uploads/' . $resume_doc_upload;
        $additional_doc_upload_to = ABSPATH. 'wp-content/uploads/' . $additional_doc_upload;

        $resume_photo_move_result = move_uploaded_file($resume_photo_tmp, $resume_photo_upload_to);
        $resume_doc_move_result = move_uploaded_file($resume_doc_tmp, $resume_doc_upload_to);
        $additional_doc_move_result = move_uploaded_file($additional_doc_tmp, $additional_doc_upload_to);
        
        if ($resume_photo_upload != "" ) {
            $resume_photo = 'http://' . $_SERVER['HTTP_HOST'] . '/jobtc-3/wp-content/uploads/' . $resume_photo_upload;
        } else {
            $resume_photo = "";
        }
        
        if ($resume_doc_upload != "") {
            $resume_doc = 'http://' . $_SERVER['HTTP_HOST'] . '/jobtc-3/wp-content/uploads/' . $resume_doc_upload;
        } else {
            $resume_doc = "";
        }
        
        if ($additional_doc_upload != "") {
            $additional_doc = 'http://'.$_SERVER['HTTP_HOST'] . '/jobtc-3/wp-content/uploads/' . $additional_doc_upload;
        } else {
            $additional_doc = "";
        }
        
        //Most Recent
        $career_map_employment_1 = $_POST['career_map_employment_1'];
        $career_map_company_1 = $_POST['career_map_company_1'];
        $career_map_position_1 = $_POST['career_map_position_1'];
        $career_map_start_date_1 = $_POST['career_map_start_date_1'];
        $career_map_end_date_1 = $_POST['career_map_end_date_1'];
        $career_map_job_type_1 = $_POST['career_map_job_type_1'];
        $career_map_city_1 = $_POST['career_map_city_1'];
        $career_map_country_1 = $_POST['career_map_country_1'];
        $career_map_reason_for_leaving_1 = $_POST['career_map_reason_for_leaving_1'];
        $career_map_salary_type_1 = $_POST['career_map_salary_type_1'];
        $career_map_starting_salary_1 = $_POST['career_map_starting_salary_1'];
        $career_map_final_salary_1 = $_POST['career_map_final_salary_1'];
        $career_map_reference_name_1 = $_POST['career_map_reference_name_1'];
        $career_map_reference_email_1 = $_POST['career_map_reference_email_1'];
        $career_map_reference_phone_number_1 = $_POST['career_map_reference_phone_number_1'];
        $career_map_reference_position_1 = $_POST['career_map_reference_position_1'];
        $career_map_reference_notes_1 = $_POST['career_map_reference_notes_1'];

        //2nd Last
        $career_map_employment_2 = $_POST['career_map_employment_2'];
        $career_map_company_2 = $_POST['career_map_company_2'];
        $career_map_position_2 = $_POST['career_map_position_2'];
        $career_map_start_date_2 = $_POST['career_map_start_date_2'];
        $career_map_end_date_2 = $_POST['career_map_end_date_2'];
        $career_map_job_type_2 = $_POST['career_map_job_type_2'];
        $career_map_city_2 = $_POST['career_map_city_2'];
        $career_map_country_2 = $_POST['career_map_country_2'];
        $career_map_reason_for_leaving_2 = $_POST['career_map_reason_for_leaving_2'];
        $career_map_salary_type_2 = $_POST['career_map_salary_type_2'];
        $career_map_starting_salary_2 = $_POST['career_map_starting_salary_2'];
        $career_map_final_salary_2 = $_POST['career_map_final_salary_2'];
        $career_map_reference_name_2 = $_POST['career_map_reference_name_2'];
        $career_map_reference_email_2 = $_POST['career_map_reference_email_2'];
        $career_map_reference_phone_number_2 = $_POST['career_map_reference_phone_number_2'];
        $career_map_reference_position_2 = $_POST['career_map_reference_position_2'];
        $career_map_reference_notes_2 = $_POST['career_map_reference_notes_2'];

        //3rd Last
        $career_map_employment_3 = $_POST['career_map_employment_3'];
        $career_map_company_3 = $_POST['career_map_company_3'];
        $career_map_position_3 = $_POST['career_map_position_3'];
        $career_map_start_date_3 = $_POST['career_map_start_date_3'];
        $career_map_end_date_3 = $_POST['career_map_end_date_3'];
        $career_map_job_type_3 = $_POST['career_map_job_type_3'];
        $career_map_city_3 = $_POST['career_map_city_3'];
        $career_map_country_3 = $_POST['career_map_country_3'];
        $career_map_reason_for_leaving_3 = $_POST['career_map_reason_for_leaving_3'];
        $career_map_salary_type_3 = $_POST['career_map_salary_type_3'];
        $career_map_starting_salary_3 = $_POST['career_map_starting_salary_3'];
        $career_map_final_salary_3 = $_POST['career_map_final_salary_3'];
        $career_map_reference_name_3 = $_POST['career_map_reference_name_3'];
        $career_map_reference_email_3 = $_POST['career_map_reference_email_3'];
        $career_map_reference_phone_number_3 = $_POST['career_map_reference_phone_number_3'];
        $career_map_reference_position_3 = $_POST['career_map_reference_position_3'];
        $career_map_reference_notes_3 = $_POST['career_map_reference_notes_3'];


        $user_count = $wpdb->get_var("SELECT COUNT(*) as count FROM $table_name WHERE user_id in (" . $user_id->ID . ")");
        $career_map_count = $wpdb->get_var("SELECT COUNT(*) as count FROM $career_map_table WHERE user_id in (" . $user_id->ID . ")");


        if ($user_count > 0) {


            if ($resume_photo != "") {

                $wpdb->update($table_name, array(
                    'resume_photo' => $resume_photo
                        ), array('user_id' => $user_id->ID), array(
                    '%s', //resume_doc
                        ), array('%d')
                );
            }
            
            if ($resume_doc != "") {

                $wpdb->update($table_name, array(
                    'resume_doc' => $resume_doc
                        ), array('user_id' => $user_id->ID), array(
                    '%s', //resume_doc
                        ), array('%d')
                );
            }
            
             if ($additional_doc != "") {

                $wpdb->update($table_name, array(
                    'additional_doc' => $additional_doc
                        ), array('user_id' => $user_id->ID), array(
                    '%s', //resume_doc
                        ), array('%d')
                );
            }
            
            $wpdb->update($table_name, array(
                'rate' => $rate,
                'currency' => $currency,
                'location' => $location,
                'email' => $email,
                'phone' => $phone,
                'mobile' => $mobile,
                'skype' => $skype,
                'overall_average' => $overall_average,
                'transcripts' => $transcripts,
                'degree' => $degree,
                'institution' => $institution,
                'year_issued' => $year_issued,
                'skills' => $skills,
                'interview_video_link' => $interview_video_link
                    ), array('user_id' => $user_id->ID), array(
                '%s', //rate
                '%s', //currency
                '%s', //location
                '%s', //email
                '%s', //phone
                '%s', //mobile
                '%s', //skype
                '%s', //overall_average
                '%s', //degree
                '%s', //institution
                '%s', //year_issued
                '%s', //skills
                '%s', //interview_video_link
                    ), array('%d')
            );
        } else {

            $wpdb->insert($table_name, array(
                'user_id' => $user_id->ID,
                'rate' => $rate,
                'currency' => $currency,
                'location' => $location,
                'email' => $email,
                'phone' => $phone,
                'mobile' => $mobile,
                'skype' => $skype,
                'resume_photo' => $resume_photo,
                'resume_doc' => $resume_doc,
                'additional_doc' => $additional_doc,
                'overall_average' => $overall_average,
                'degree' => $degree,
                'institution' => $institution,
                'year_issued' => $year_issued,
                'skills' => $skills,
                'interview_video_link' => $interview_video_link
            ));
        }

        if ($career_map_count > 0) {

            //Update Most Recent
            $wpdb->update($career_map_table, array(
                'company' => $career_map_company_1,
                'position' => $career_map_position_1,
                'start_date' => $career_map_start_date_1,
                'end_date' => $career_map_end_date_1,
                'job_type' => $career_map_job_type_1,
                'city' => $career_map_city_1,
                'country' => $career_map_country_1,
                'reason_for_leaving' => $career_map_reason_for_leaving_1,
                'salary_type' => $career_map_salary_type_1,
                'starting_salary' => $career_map_starting_salary_1,
                'final_salary' => $career_map_final_salary_1,
                'reference_name' => $career_map_reference_name_1,
                'reference_email' => $career_map_reference_email_1,
                'reference_phone_number' => $career_map_reference_phone_number_1,
                'reference_position' => $career_map_reference_position_1,
                'notes' => $career_map_reference_notes_1
                    ), array('user_id' => $user_id->ID, 'employment' => 'Most Recent'), array(
                '%s', //company
                '%s', //position
                '%s', //start_date
                '%s', //end_date
                '%s', //job type
                '%s', //city
                '%s', //country
                '%s', //reason for leaving
                '%s', //salary type
                '%s', //starting salary
                '%s', //final salary
                '%s', //reference name
                '%s', //reference email
                '%s', //reference phone number
                '%s', //reference position
                '%s', //reference notes
                    ), array('%d', '%s')
            );

            //Update 2nd Last
            $wpdb->update($career_map_table, array(
                'company' => $career_map_company_2,
                'position' => $career_map_position_2,
                'start_date' => $career_map_start_date_2,
                'end_date' => $career_map_end_date_2,
                'job_type' => $career_map_job_type_2,
                'city' => $career_map_city_2,
                'country' => $career_map_country_2,
                'reason_for_leaving' => $career_map_reason_for_leaving_2,
                'salary_type' => $career_map_salary_type_2,
                'starting_salary' => $career_map_starting_salary_2,
                'final_salary' => $career_map_final_salary_2,
                'reference_name' => $career_map_reference_name_2,
                'reference_email' => $career_map_reference_email_2,
                'reference_phone_number' => $career_map_reference_phone_number_2,
                'reference_position' => $career_map_reference_position_2,
                'notes' => $career_map_reference_notes_2
                    ), array('user_id' => $user_id->ID, 'employment' => '2nd Last'), array(
                '%s', //company
                '%s', //position
                '%s', //start_date
                '%s', //end_date
                '%s', //job type
                '%s', //city
                '%s', //country
                '%s', //reason for leaving
                '%s', //salary type
                '%s', //starting salary
                '%s', //final salary
                '%s', //reference name
                '%s', //reference email
                '%s', //reference phone number
                '%s', //reference position
                '%s', //reference notes
                    ), array('%d', '%s')
            );

            //Update 3rd Last
            $wpdb->update($career_map_table, array(
                'company' => $career_map_company_3,
                'position' => $career_map_position_3,
                'start_date' => $career_map_start_date_3,
                'end_date' => $career_map_end_date_3,
                'job_type' => $career_map_job_type_3,
                'city' => $career_map_city_3,
                'country' => $career_map_country_3,
                'reason_for_leaving' => $career_map_reason_for_leaving_3,
                'salary_type' => $career_map_salary_type_3,
                'starting_salary' => $career_map_starting_salary_3,
                'final_salary' => $career_map_final_salary_3,
                'reference_name' => $career_map_reference_name_3,
                'reference_email' => $career_map_reference_email_3,
                'reference_phone_number' => $career_map_reference_phone_number_3,
                'reference_position' => $career_map_reference_position_3,
                'notes' => $career_map_reference_notes_3
                    ), array('user_id' => $user_id->ID, 'employment' => '3rd Last'), array(
                '%s', //company
                '%s', //position
                '%s', //start_date
                '%s', //end_date
                '%s', //job type
                '%s', //city
                '%s', //country
                '%s', //reason for leaving
                '%s', //salary type
                '%s', //starting salary
                '%s', //final salary
                '%s', //reference name
                '%s', //reference email
                '%s', //reference phone number
                '%s', //reference position
                '%s', //reference notes
                    ), array('%d', '%s')
            );
        } else {

            //Save Most Recent
            $wpdb->insert($career_map_table, array(
                'user_id' => $user_id->ID,
                'employment' => 'Most Recent',
                'company' => $career_map_company_1,
                'position' => $career_map_position_1,
                'start_date' => $career_map_start_date_1,
                'end_date' => $career_map_end_date_1,
                'job_type' => $career_map_job_type_1,
                'city' => $career_map_city_1,
                'country' => $career_map_country_1,
                'reason_for_leaving' => $career_map_reason_for_leaving_1,
                'salary_type' => $career_map_salary_type_1,
                'starting_salary' => $career_map_starting_salary_1,
                'final_salary' => $career_map_final_salary_1,
                'reference_name' => $career_map_reference_name_1,
                'reference_email' => $career_map_reference_email_1,
                'reference_phone_number' => $career_map_reference_phone_number_1,
                'reference_position' => $career_map_reference_position_1,
                'notes' => $career_map_reference_notes_1
            ));


            //Save 2nd Last
            $wpdb->insert($career_map_table, array(
                'user_id' => $user_id->ID,
                'employment' => '2nd Last',
                'company' => $career_map_company_2,
                'position' => $career_map_position_2,
                'start_date' => $career_map_start_date_2,
                'end_date' => $career_map_end_date_2,
                'job_type' => $career_map_job_type_2,
                'city' => $career_map_city_2,
                'country' => $career_map_country_2,
                'reason_for_leaving' => $career_map_reason_for_leaving_2,
                'salary_type' => $career_map_salary_type_2,
                'starting_salary' => $career_map_starting_salary_2,
                'final_salary' => $career_map_final_salary_2,
                'reference_name' => $career_map_reference_name_2,
                'reference_email' => $career_map_reference_email_2,
                'reference_phone_number' => $career_map_reference_phone_number_2,
                'reference_position' => $career_map_reference_position_2,
                'notes' => $career_map_reference_notes_2
            ));

            //Save 3rd Last
            $wpdb->insert($career_map_table, array(
                'user_id' => $user_id->ID,
                'employment' => '3rd Last',
                'company' => $career_map_company_3,
                'position' => $career_map_position_3,
                'start_date' => $career_map_start_date_3,
                'end_date' => $career_map_end_date_3,
                'job_type' => $career_map_job_type_3,
                'city' => $career_map_city_3,
                'country' => $career_map_country_3,
                'reason_for_leaving' => $career_map_reason_for_leaving_3,
                'salary_type' => $career_map_salary_type_3,
                'starting_salary' => $career_map_starting_salary_3,
                'final_salary' => $career_map_final_salary_3,
                'reference_name' => $career_map_reference_name_3,
                'reference_email' => $career_map_reference_email_3,
                'reference_phone_number' => $career_map_reference_phone_number_3,
                'reference_position' => $career_map_reference_position_3,
                'notes' => $career_map_reference_notes_3
            ));
        }
    }

    return true;
}

function save_video_evaluation() {

    /*
      Ajax Save Evaluation
     */
    global $wpdb;

    if ($_POST) {
        $employer_id = wp_get_current_user();
        $resume_id = intval($_POST['resume_id']);


        $confidence_score = intval($_POST['confidence_score']);
        $communication_score = intval($_POST['communication_score']);
        $fun_factor_score = intval($_POST['fun_factor_score']);
        $connection_score = intval($_POST['connection_score']);
        $understanding_score = intval($_POST['understanding_score']);
        $bonus_score = intval($_POST['bonus_score']);
        $video_evaluation_score = $confidence_score + $communication_score + $fun_factor_score + $connection_score + $understanding_score + $bonus_score;

        $confidence_notes = $_POST['confidence_notes'];
        $communication_notes = $_POST['communication_notes'];
        $fun_factor_notes = $_POST['fun_factor_notes'];
        $connection_notes = $_POST['connection_notes'];
        $understanding_notes = $_POST['understanding_notes'];
        $bonus_notes = $_POST['bonus_notes'];

        $confidence_evaluator = $_POST['confidence_evaluator'];
        $communication_evaluator = $_POST['communication_evaluator'];
        $fun_factor_evaluator = $_POST['fun_factor_evaluator'];
        $connection_evaluator = $_POST['connection_evaluator'];
        $understanding_evaluator = $_POST['understanding_evaluator'];
        $bonus_evaluator = $_POST['bonus_evaluator'];


        $employer_id_count = $wpdb->get_row("SELECT count(employer_id) as count FROM wp_video_evaluation WHERE employer_id in ('" . $employer_id->ID . "') AND resume_id in ('" . $resume_id . "')");

        if ($employer_id_count->count == 0) {
            //For Resume Statuses
            $wpdb->insert('wp_video_evaluation', array(
                'resume_id' => $resume_id,
                'employer_id' => $employer_id->ID,
                'confidence_score' => $confidence_score,
                'communication_score' => $communication_score,
                'fun_factor_score' => $fun_factor_score,
                'connection_score' => $connection_score,
                'understanding_score' => $understanding_score,
                'bonus_score' => $bonus_score,
                'video_evaluation_score' => $video_evaluation_score,
                'confidence_notes' => $confidence_notes,
                'communication_notes' => $communication_notes,
                'fun_factor_notes' => $fun_factor_notes,
                'connection_notes' => $connection_notes,
                'understanding_notes' => $understanding_notes,
                'bonus_notes' => $bonus_notes,
                'confidence_evaluator' => $confidence_evaluator,
                'communication_evaluator' => $communication_evaluator,
                'fun_factor_evaluator' => $fun_factor_evaluator,
                'connection_evaluator' => $connection_evaluator,
                'understanding_evaluator' => $understanding_evaluator,
                'bonus_evaluator' => $bonus_evaluator
            ));
        } else {

            $wpdb->update(
                    'wp_video_evaluation', array(
                'resume_id' => $resume_id,
                'employer_id' => $employer_id->ID,
                'confidence_score' => $confidence_score,
                'communication_score' => $communication_score,
                'fun_factor_score' => $fun_factor_score,
                'connection_score' => $connection_score,
                'understanding_score' => $understanding_score,
                'bonus_score' => $bonus_score,
                'video_evaluation_score' => $video_evaluation_score,
                'confidence_notes' => $confidence_notes,
                'communication_notes' => $communication_notes,
                'fun_factor_notes' => $fun_factor_notes,
                'connection_notes' => $connection_notes,
                'understanding_notes' => $understanding_notes,
                'bonus_notes' => $bonus_notes,
                'confidence_evaluator' => $confidence_evaluator,
                'communication_evaluator' => $communication_evaluator,
                'fun_factor_evaluator' => $fun_factor_evaluator,
                'connection_evaluator' => $connection_evaluator,
                'understanding_evaluator' => $understanding_evaluator,
                'bonus_evaluator' => $bonus_evaluator
                    ), array(
                'employer_id' => $employer_id->ID,
                'resume_id' => $resume_id
            ));
        }
    }


    return true;
}

function save_evaluation() {

    /*
      Ajax Save Evaluation
     */
    global $wpdb, $post;

    if ($_POST) {
        $employer_id = wp_get_current_user();
        $resume_id = intval($_POST['resume_id']);

        update_post_meta($resume_id, 'internal_notes', $_POST['internal-notes-text-area']);

        $skills_score = intval($_POST['skills_score']);
        $education_score = intval($_POST['education_score']);
        $career_map_score = intval($_POST['career_map_score']);
        $references_score = intval($_POST['references_score']);
        $video_interview_score = intval($_POST['video_interview_score']);
        $tests_score = intval($_POST['tests_score']);
        $positive_adjustments_score = intval($_POST['positive_adjustments_score']);
        $final_evaluation_score = $skills_score + $education_score + $career_map_score + $references_score + $video_interview_score + $tests_score + $positive_adjustments_score;

        $skills_notes = $_POST['skills_notes'];
        $education_notes = $_POST['education_notes'];
        $career_map_notes = $_POST['career_map_notes'];
        $references_notes = $_POST['references_notes'];
        $video_interview_notes = $_POST['video_interview_notes'];
        $tests_notes = $_POST['tests_notes'];
        $positive_adjustments_notes = $_POST['positive_adjustments_notes'];

        $skills_evaluator = $_POST['skills_evaluator'];
        $education_evaluator = $_POST['education_evaluator'];
        $career_map_evaluator = $_POST['career_map_evaluator'];
        $references_evaluator = $_POST['references_evaluator'];
        $video_interview_evaluator = $_POST['video_interview_evaluator'];
        $tests_evaluator = $_POST['tests_evaluator'];
        $positive_adjustments_evaluator = $_POST['positive_adjustments_evaluator'];


        $employer_id_count = $wpdb->get_row("SELECT count(employer_id) as count FROM wp_final_evaluation WHERE employer_id in ('" . $employer_id->ID . "') AND resume_id in ('" . $resume_id . "')");

        if ($employer_id_count->count == 0) {
            //For Resume Statuses
            $wpdb->insert('wp_final_evaluation', array(
                'resume_id' => $resume_id,
                'employer_id' => $employer_id->ID,
                'skills_score' => $skills_score,
                'education_score' => $education_score,
                'career_map_score' => $career_map_score,
                'references_score' => $references_score,
                'video_interview_score' => $video_interview_score,
                'tests_score' => $tests_score,
                'positive_adjustments_score' => $positive_adjustments_score,
                'final_evaluation_score' => $final_evaluation_score,
                'skills_notes' => $skills_notes,
                'education_notes' => $education_notes,
                'career_map_notes' => $career_map_notes,
                'references_notes' => $references_notes,
                'video_interview_notes' => $video_interview_notes,
                'tests_notes' => $tests_notes,
                'positive_adjustments_notes' => $positive_adjustments_notes,
                'skills_evaluator' => $skills_evaluator,
                'education_evaluator' => $education_evaluator,
                'career_map_evaluator' => $career_map_evaluator,
                'references_evaluator' => $references_evaluator,
                'video_interview_evaluator' => $video_interview_evaluator,
                'tests_evaluator' => $tests_evaluator,
                'positive_adjustments_evaluator' => $positive_adjustments_evaluator
            ));
        } else {

            $wpdb->update(
                    'wp_final_evaluation', array(
                'skills_score' => $skills_score,
                'education_score' => $education_score,
                'career_map_score' => $career_map_score,
                'references_score' => $references_score,
                'video_interview_score' => $video_interview_score,
                'tests_score' => $tests_score,
                'positive_adjustments_score' => $positive_adjustments_score,
                'final_evaluation_score' => $final_evaluation_score,
                'skills_notes' => $skills_notes,
                'education_notes' => $education_notes,
                'career_map_notes' => $career_map_notes,
                'references_notes' => $references_notes,
                'video_interview_notes' => $video_interview_notes,
                'tests_notes' => $tests_notes,
                'positive_adjustments_notes' => $positive_adjustments_notes,
                'skills_evaluator' => $skills_evaluator,
                'education_evaluator' => $education_evaluator,
                'career_map_evaluator' => $career_map_evaluator,
                'references_evaluator' => $references_evaluator,
                'video_interview_evaluator' => $video_interview_evaluator,
                'tests_evaluator' => $tests_evaluator,
                'positive_adjustments_evaluator' => $positive_adjustments_evaluator
                    ), array(
                'employer_id' => $employer_id->ID,
                'resume_id' => $resume_id
            ));
        }
    }
    return true;
}

/**
 * Functions for Job End
 *  
 */
function job_end() {

    global $wpdb;

    if ($_POST) {

        $job_id = $_POST['job_id'];

        $sql = $wpdb->prepare("UPDATE wp_posts 
                           SET post_status = 'expired'
                           WHERE ID = '$job_id' and post_type = 'job_listing'");

        $wpdb->query($sql);
    }
}

/**
 * Functions for Job Delete  
 *  
 */
function job_delete() {

    global $wpdb;

    if ($_POST) {
        $job_id = $_POST['job_id'];

        $sql = $wpdb->prepare("DELETE FROM wp_posts WHERE ID = '$job_id' and post_type = 'job_listing'");

        $wpdb->query($sql);
    }
}

/**
 * Functions for Job Relisting
 *  
 */
function job_relisting() {

    global $wpdb;

    if ($_POST) {


        $job_id = $_POST['job_id'];

        $sql = $wpdb->prepare("UPDATE wp_posts 
                           SET post_status = 'publish'
                           WHERE ID = '$job_id' and post_type = 'job_listing'");

        $wpdb->query($sql);
    }
}

/*
 * Functions for Resume Statuses
 * */

function change_resume_statuses() {
    global $wpdb;

    if ($_POST) {
        $resume_id = $_POST['resume_id'];
        $status_text = $_POST['status_text'];
        $resume_status = $_POST['resume_status'];
        $employer_id = $_POST['employer_id'];

        switch ($resume_status) {

            case "fast-track":
                if ($status_text == "Standard Tracked") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET fast_tracked = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Fast Tracked", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="fast-track">Fast Tracked</a>
                    <?php
                } else {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET fast_tracked = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Standard Tracked", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/orange-check-mark.png" /><a href="#" class="fast-track">Standard Tracked</a>
                    <?php
                }

                break;

            case "reference-checked":

                if ($status_text == "Check Reference") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET reference_checked = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "References Checked", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="reference-checked">References Checked</a>
                    <?php
                } else {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET reference_checked = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Check Reference", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/orange-check-mark.png" /><a href="#" class="reference-checked">Check Reference</a>
                    <?php
                }

                break;

            case "highest-rated":

                if ($status_text == "Pick") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET starred = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "2nd Highest Rated", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="highest-rated">2nd Highest Rated</a>
                    <?php
                } else if ($status_text == "2nd Highest Rated") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET starred = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Highest Rated", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="highest-rated">Highest Rated</a>
                    <?php
                } else {
                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET starred = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Pick", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/orange-check-mark.png" /><a href="#" class="highest-rated">Pick</a>
                    <?php
                }

                break;

            case "video-interview-evaluated":

                if ($status_text == "No Video") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET video_interview = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Video Submitted", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/orange-check-mark.png" /><a href="#" class="video-interview-evaluated">Video Submitted</a>
                    <?php
                } else if ($status_text == "Video Submitted") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET video_interview = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Video Evaluated", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="video-interview-evaluated">Video Evaluated</a>
                    <?php
                } else {
                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET video_interview = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "No Video", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/red-flag-check.gif" /><a href="#" class="video-interview-evaluated">No Video</a>
                    <?php
                }

                break;

            case "no-red-flags":

                if ($status_text == "Check For Red Flags") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET red_flagged = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Red Flagged", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/red-flag-check.gif" /><a href="#" class="no-red-flags">Red Flagged</a>
                    <?php
                } else if ($status_text == "Red Flagged") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET red_flagged = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "No Red Flags", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="no-red-flags">No Red Flags</a>
                    <?php
                } else {
                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET red_flagged = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Check For Red Flags", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/orange-check-mark.png" /><a href="#" class="no-red-flags">Check For Red Flags</a>
                    <?php
                }


                break;

            case "completed-evaluation":

                if ($status_text == "Evaluate") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET completed_evaluation = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Completed Evaluation", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="completed-evaluation">Completed Evaluation</a>
                    <?php
                } else if ($status_text == "Completed Evaluation") {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET completed_evaluation = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Hired", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/green-check-mark.png" /><a href="#" class="completed-evaluation">Hired</a>
                    <?php
                } else {

                    $sql = $wpdb->prepare("UPDATE wp_resume_statuses 
		SET completed_evaluation = %s
		WHERE resume_id = %d 
		AND employer_id = %d", "Evaluate", $resume_id, $employer_id);

                    $wpdb->query($sql);
                    ?>
                    <img class="green-checked" height="16" width="16" src="<?php bloginfo('template_url') ?>/images/orange-check-mark.png" /><a href="#" class="completed-evaluation">Evaluate</a>
                    <?php
                }

                break;

            default:
        }
    }
}

/*
 * Function for comment posting(Resume and Job) using Ajax 
 */

function post_comment_ajax() {


    if ($_POST) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];
        $comment = get_comment($post_id);
        $time = current_time('mysql');
        $author_ip = get_comment_author_IP($post_id);
        $author_browser = $comment->comment_agent;

        $data = array(
            'comment_post_ID' => $post_id,
            'comment_author' => $name,
            'comment_author_email' => $email,
            'comment_author_url' => 'http://',
            'comment_content' => $content,
            'comment_type' => '',
            'comment_parent' => 0,
            'user_id' => $user_id,
            'comment_author_IP' => $author_ip,
            'comment_agent' => $author_browser,
            'comment_date' => $time,
            'comment_approved' => 1,
        );

        wp_insert_comment($data);
    }
}

function send_email_ajax() {

    if ($_POST) {
        $to = $_POST['to'];
        $subject = $_POST['subject'];
        $message = stripslashes($_POST['message']);
        $resume_id = $_POST['resume_id'];
        $reference_name = $_POST['reference_name'];
    }
    //wp_mail($to, $subject, $body);

    $headers = "From: ref@vidhire.net\r\n";
    //$headers .= "MIME-Version: 1.0\r\n";
    //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    /*
      $message .= '<form action="' . get_template_directory_uri() . '/process.php" method="post" target="_blank">';
      //$message .= '<label>Rating for this Past Employee</label><br />';
      $message .= '<table style="position: relative;left: 200px;">';
      $message .= '<tr>';
      $message .= '<td>Productivity</td>';
      $message .= '<td><select name="performance"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>';
      $message .= '</tr>';
      $message .= '<tr>';
      $message .= '<td>Attitude</td>';
      $message .= '<td><select name="attitude"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>';
      $message .= '</tr>';
      $message .= '<tr>';
      $message .= '<td>Dependability</td>';
      $message .= '<td><select name="depend"><option>1<option>2</option><option>3</option><option>4</option><option>5</option></select></td>';
      $message .= '</tr>';
      $message .= '<tr>';
      $message .= '<td>Team Player</td>';
      $message .= '<td><select name="team_player"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>';
      $message .= '</tr>';
      $message .= '<tr>';
      $message .= '<td>Learning Speed</td>';
      $message .= '<td><select name="learning_speed"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>';
      $message .= '</tr>';
      $message .= '<tr>';
      $message .= '<td>Flexibility</td>';
      $message .= '<td><select name="flexibility"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>';
      $message .= '</tr>';
      $message .= '<tr>';
      $message .= '<td>Creativity</td>';
      $message .= '<td><select name="creativity"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>';
      $message .= '</tr>';
      $message .= '</table>';
      $message .= '<input name="resume_id"  value="' . $resume_id . '" type="hidden" />';
      $message .= '<input name="reference_name" value="' . $reference_name . '" type="hidden" />';
      //$message .= '<br />';
      //$message .= '<label for="commentText">Leave a quick review:</label><br />';
      //$message .= '<textarea cols="75" name="commentText" rows="5"></textarea><br />';
      $message .= '<br />';
      $message .= '<input type="submit" value="Submit your review" /></form><br />';
      $message .= 'Note: Your assessment is confidential.  If you cannot see the pull down menu, please use this link.<br /> Vidhire.net is a free hiring system. <br />';
      $message .= '<br />Thank you.'; */
    wp_mail($to, $subject, $message, $headers);
}

add_filter('wp_mail_from', 'my_mail_from');

function my_mail_from($email) {
    return "ref@vidhire.net";
}

add_filter('wp_mail_from_name', 'my_mail_from_name');

function my_mail_from_name($name) {
    return "Vidhire Human Resources ref@vidhire.net";
}

/* For wp_get_attachment_link to open in a new tab 
 * instead of on the current window
 */

function modify_attachment_link($markup) {
    return preg_replace('/^<a([^>]+)>(.*)$/', '<a\\1 target="_blank">\\2', $markup);
}

add_filter('wp_get_attachment_link', 'modify_attachment_link', 10, 6);

function get_rating($rating) {
    /* For Getting Productivity Text Rating */
    switch ($rating) {
        case "1":
            $text_rating = "Poor";
            break;
        case "2":
            $text_rating = "Fair";
            break;
        case "3":
            $text_rating = "Good";
            break;
        case "4":
            $text_rating = "Very Good";
            break;
        case "5":
            $text_rating = "Guru";
            break;
    }

    return $text_rating;
}

/*
 * For Jobfit registration form  
 * */

function jobfit_registration_form($username, $password, $email, $first_name, $last_name) {

    get_template_part('jobtc-login/register', 'form');
}

/*
 * For Jobfit Registration Validation
 * */

function jobfit_registration_validation($username, $password, $email, $first_name, $last_name) {

    global $reg_errors;
    $reg_errors = new WP_Error;


    if (empty($username) || empty($password) || empty($email)) {
        $reg_errors->add('field', 'Required form field is missing');
    }
    if (username_exists($username)) {
        $reg_errors->add('user_name', 'Sorry, that username already exists!');
    }

    if (4 > strlen($username)) {
        $reg_errors->add('username_length', 'Username too short. At least 4 characters is required');
    }

    if (!validate_username($username)) {
        $reg_errors->add('username_invalid', 'Sorry, the username you entered is not valid');
    }

    if (3 > strlen($password)) {
        $reg_errors->add('password', 'Password length must be greater than 3');
    }

    if (!is_email($email)) {
        $reg_errors->add('email_invalid', 'Email is not valid');
    }

    if (email_exists($email)) {
        $reg_errors->add('email', 'Email Already in use');
    }

    if (is_wp_error($reg_errors)) {

        foreach ($reg_errors->get_error_messages() as $error) {

            echo '<div>';
            echo '<strong>Registration Failed</strong>:';
            echo $error . '<br/>';
            echo '</div>';
        }
    }
}

/*
 * Jobfit Complete Registration 
 * */

function jobfit_complete_registration() {
    global $reg_errors, $username, $password, $email, $first_name, $last_name;
    if (1 > count($reg_errors->get_error_messages())) {
        $userdata = array(
            'user_login' => $username,
            'user_email' => $email,
            'user_pass' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name
        );
        $user = wp_insert_user($userdata);
    }
}

/*
 * Jobfit Function for Registration
 * */

function complete_registration_function() {

    if (isset($_POST['submit'])) {
        jobfit_registration_validation(
                $_POST['username'], $_POST['password'], $_POST['email'], $_POST['first_name'], $_POST['last_name']
        );

        // sanitize user form input
        global $username, $password, $email, $first_name, $last_name;
        $username = sanitize_user($_POST['username']);
        $password = esc_attr($_POST['password']);
        $email = sanitize_email($_POST['email']);
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);

        // call @function complete_registration to create the user
        // only when no WP_error is found
        jobfit_complete_registration(
                $username, $password, $email, $first_name, $last_name
        );
    }

    jobfit_registration_form(
            $username, $password, $email, $first_name, $last_name
    );
}

/*
 * For Jobfit Login 
 * */

function jobfit_login_after_register($user_id) {
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_redirect(home_url());
    exit;
}

add_action('user_register', 'jobfit_login_after_register');

/*
 * For Google Maps API 
 * //TO DO
 **/

function geolocation_scripts() {
	global $job_details, $post, $posted; 

	$zoom = 1;
	
?>
	<script type="text/javascript">

		function initialize_map() {

			var hasLocation = false;
			var center = new google.maps.LatLng(0.0,0.0);
			
			var postLatitude =  '<?php if (isset($posted['jr_geo_latitude'])) echo $posted['jr_geo_latitude']; elseif (isset($job_details->ID)) echo get_post_meta($job_details->ID, '_jr_geo_latitude', true); elseif (isset($post->ID)) echo get_post_meta($post->ID, '_jr_geo_latitude', true); ?>';
			var postLongitude =  '<?php if (isset($posted['jr_geo_longitude'])) echo $posted['jr_geo_longitude']; elseif (isset($job_details->ID)) echo get_post_meta($job_details->ID, '_jr_geo_longitude', true); elseif (isset($post->ID)) echo get_post_meta($post->ID, '_jr_geo_longitude', true); ?>';

			if((postLatitude != '') && (postLongitude != '') ) {
				center = new google.maps.LatLng(postLatitude, postLongitude);
				hasLocation = true;
				jQuery("#geolocation-latitude").val(center.lat());
				jQuery("#geolocation-longitude").val(center.lng());
				reverseGeocode(center);
			}
				
		 	var myOptions = {
		      zoom: <?php echo $zoom; ?>,
		      center: center,
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    
		    var geocoder = new google.maps.Geocoder();
		       
		    var map = new google.maps.Map(document.getElementById('geolocation-map'), myOptions);
			var marker = '';
			
			if(!hasLocation) {
		    	map.setZoom(<?php echo $zoom; ?>);
		    } else {
		    	map.setZoom(9);
		    }
			
			google.maps.event.addListener(map, 'click', function(event) {
				reverseGeocode(event.latLng);
			});
			
			var currentAddress;
			var customAddress = false;
			
			jQuery("#geolocation-load").click(function(){
				if( jQuery("#geolocation-address").val() != 'undefined' ) {
					customAddress = true;
					currentAddress = jQuery("#geolocation-address").val();
					geocode(currentAddress);
					return false;
				} else {
					marker.setMap(null);
					marker = '';
					jQuery("#geolocation-latitude").val('');
					jQuery("#geolocation-longitude").val('');
					return false;
				}
			});
			
			jQuery("#geolocation-address").keyup(function(e) {
				if(e.keyCode == 13)
					jQuery("#geolocation-load").click();
			});

			function placeMarker(location) {
				if (marker=='') {
					marker = new google.maps.Marker({
						position: center, 
						map: map, 
						title:'Job Location'
					});
				}
				marker.setPosition(location);
				map.setCenter(location);
				if((location.lat() != '') && (location.lng() != '')) {
					jQuery("#geolocation-latitude").val(location.lat());
					jQuery("#geolocation-longitude").val(location.lng());
				}
			}
			
			function geocode(address) {
				var geocoder = new google.maps.Geocoder();
			    if (geocoder) {
					geocoder.geocode({"address": address}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							placeMarker(results[0].geometry.location);
							reverseGeocode(results[0].geometry.location);
							if(!hasLocation) {
						    	map.setZoom(9);
						    	hasLocation = true;
							}
							jQuery("#geodata").html(results[0].geometry.location.lat() + ', ' + results[0].geometry.location.lng());
						}
					});
				}
			}

			function reverseGeocode(location) {
				var geocoder = new google.maps.Geocoder();
			    if (geocoder) {
					geocoder.geocode({"latLng": location}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {

						var address, country, state, short_address, short_address_country;
						
						var city = [];

						for ( var i in results ) {

						    var address_components = results[i]['address_components'];

						    for ( var j in address_components ) {

						    	var types = address_components[j]['types'];
						    	var long_name = address_components[j]['long_name'];
						    	var short_name = address_components[j]['short_name']; 

						    	if ( jQuery.inArray('locality', types)>=0 && jQuery.inArray('political', types)>=0 ) {
									if (jQuery.inArray(long_name, city)<0) city.push(long_name);
						    	}
						    	else if ( jQuery.inArray('administrative_area_level_1', types)>=0 && jQuery.inArray('political', types)>=0 ) {
						    		state = long_name;
						    	}
						    	else if ( jQuery.inArray('country', types)>=0 && jQuery.inArray('political', types)>=0 ) {
						    		country = long_name;
						    	}
						    } 

						    if((city) && (state) && (country)) break;
						}

						// fix for countries with no valid state
						if (!state) 
							city = city[0];
						else
							city = city.join(", ");

						if((city) && (state) && (country))
							address = city + ', ' + state + ', ' + country;
						else if((city) && (state))
							address = city + ', ' + state;
						else if((state) && (country))
							address = state + ', ' + country;
						// fix for countries with no valid state
						else if((city) && (country)) {
							address = city + ', ' + country;
						}	
						//
						else if(country)
							address = country;
							
						if((city) && (state) && (country)) {
							short_address = city;
							short_address_country = state + ', ' + country;
						} else if((city) && (state)) {
							short_address = city;
							short_address_country = state;
						} else if((state) && (country)) {
							short_address = state;
							short_address_country = country;
						// fix for countries with no valid state
						} else if((city) && (country)) {
							short_address = city;
							short_address_country = country;
						//
						} else if(country) {
							short_address = country;
							short_address_country = '';
						}

						// Set address field
						jQuery("#geolocation-address").val(address);
						
						// Set hidden address fields
						jQuery("#geolocation-short-address").val(short_address);
						jQuery("#geolocation-short-address-country").val(short_address_country);
						jQuery("#geolocation-country").val(country);
						
						// Place Marker
						placeMarker(location);
						
						return true;
					} 
					
					});
				}
				return false;
			}
		}

		function loadScript() {
			var script = document.createElement("script");
			script.type = "text/javascript";
			script.src = "<?php echo _jr_get_js_geolocation_url('initialize_map'); ?>";
			document.body.appendChild(script);
		}

		jQuery(function(){
			// Prevent form submission on enter key
			jQuery("#submit_form").submit(function(e) {
				if (jQuery("input:focus").attr("id")=='geolocation-address') return false;
			});
			loadScript();
		});
		

	</script>
	<?php
}