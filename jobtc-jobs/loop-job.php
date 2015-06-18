<ol class="jobs">
    <?php
    //Get data from Job
    global $wpdb;
    $user_id = wp_get_current_user();
    $job_table = $wpdb->prefix . 'job';
    $job_map_table = $wpdb->prefix . 'job_map';

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
        from $job_table a WHERE user_id in (%d)";


    $job_prepared_statement = $wpdb->prepare($job_sql, $user_id->ID);
    $job = $wpdb->get_results($job_prepared_statement);


    if (count($job) > 0) {

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
            ?>

            <li class="job">
                <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                <div class="photo">
                    <a href="#">
                        <?php if ($logo == "") { ?>
                            <img width="97" height="95" src="#" class="attachment-thumbnail wp-post-image" alt="Company Logo">
                        <?php } else { ?>
                            <img width="97" height="95" src="<?php echo $logo; ?>" class="attachment-thumbnail wp-post-image" alt="Company Logo">
                        <?php } ?>
                    </a>
                </div>    
                <div class="job-details-title">
                    <div class="title">
                        <strong>
                            <a target="_blank" class="job-title-color" href="<?php echo get_template_directory_uri().'/jobtc-jobs/single-job.php?job_id='.$job_id ?>"><?php echo $job_title; ?></a>
                        </strong>
                        <span class="jtype full-time"><?php echo $job_type; ?></span>              
                    </div><!--title-->  

                </div> <!--job-details-title-->

                <div class="job-details">
                    <div>
                        <a href="" rel="nofollow"></a>
                        <div class="location">
                            <strong></strong>
                        </div>        
                        <div>
                            <a href="<?php echo 'http://'.$website; ?>" rel="nofollow"><?php echo $company; ?></a>
                            <div class="location">
                                <strong><?php echo $location; ?></strong>
                            </div>        
                            <div class="posted-by">Posted by: <a style="font-weight: normal;" href="http://vidhire.net/author/tom/">tom</a>
                                on Dec 26,&nbsp;2014
                            </div>                                        </div>               

                    </div><!--job-details-->

                    <div class="actions">
                        <a class="job-view-link" href="#">View</a>
                        <a class="job-edit-link" href="#">Edit</a>                                        
                        <a class="end" href="#">End</a>                                        
                        <input type="hidden" class="actions_job_id" value="246">
                    </div>
                </div>

                <div class="total_applicants_jobs"><strong>Total Applicants: <span>3</span></strong></div>                       

            </li>

            <?php
        } //End Job List Loop
    } else {
        ?>
        <li class="job">You have not created any jobs yet.</li>
        <?php } ?>
</ol>