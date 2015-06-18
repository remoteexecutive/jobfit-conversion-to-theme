<ol class="resumes">

    <?php
    //Get data from wp Resume
    global $wpdb;
    $resume_table = $wpdb->prefix . 'resume';
    $job_table = $wpdb->prefix . 'job';
    $job_map_table = $wpdb->prefix . 'job_map';

    $resume_sql = " SELECT 
                DISTINCT( a.resume_id),
                a.user_id,	
                a.rate,	
                a.currency,	
                a.location,	
                a.email,	
                a.phone,	
                a.mobile,	
                a.skype,	
                a.resume_photo,	
                a.resume_doc,	
                a.additional_doc,	
                a.overall_average,
                a.transcripts,
                a.degree,	
                a.institution,	
                a.year_issued,	
                a.skills,	
                a.interview_video_link
        from $resume_table a";


    $resume_prepared_statement = $wpdb->prepare($resume_sql);
    $resume = $wpdb->get_results($resume_prepared_statement);


    if (count($resume) > 0) {

        foreach ($resume as $resume_data) {

            $resume_id = $resume_data->resume_id;
            $user_id = $resume_data->user_id;

            $first_name = get_user_meta($user_id, 'first_name', true);
            $last_name = get_user_meta($user_id, 'last_name', true);
            $name = $first_name . " " . $last_name;
            $rate = $resume_data->rate;
            $currency = $resume_data->currency;
            $location = $resume_data->location;
            $email = $resume_data->email;
            $phone = $resume_data->phone;
            $mobile = $resume_data->mobile;
            $skype = $resume_data->skype;
            $resume_photo = $resume_data->resume_photo;
            $resume_doc = $resume_data->resume_doc;
            $additional_doc = $resume_data->additional_doc;
            $overall_average = $resume_data->overall_average;
            $transcripts = $resume_data->transcripts;
            $degree = $resume_data->degree;
            $institution = $resume_data->institution;
            $year_issued = $resume_data->year_issued;
            $skills = $resume_data->skills;
            $interview_video_link = $resume_data->interview_video_link;
            ?>

            <li class="resume">
                <input type="hidden" name="resume_id" value="<?php echo $resume_id; ?>">
                <div class="row">
                    <div class="column-md-3 col-sm-3 col-xs-12 ">
                        <div class="photo">
                            <a href="#">
                                <?php if ($resume_photo == "") { ?>

                                    <img width="97" height="95" src="#" class="attachment-thumbnail wp-post-image" alt="man 3">
                                <?php } else { ?>
                                    <img width="97" height="95" src="<?php echo $resume_photo; ?>" class="attachment-thumbnail wp-post-image" alt="man 3">
                                <?php } ?>
                            </a>
                        </div>    
                    </div>
                    <div class="column-md-9 hidden-xs">
                        <div class="container">
                            <strong><a target="_blank" href="#"><?php echo $name ?></a></strong>             

                            <div class="location">
                                <?php echo $location; ?>                           
                            </div>

                            <?php
                            $job_map_sql = "SELECT DISTINCT(job_id) FROM $job_map_table WHERE resume_id in (%d)";
                            $job_sql = "SELECT DISTINCT(job_title) FROM $job_table WHERE job_id in (%d)";

                            $job_map_prepared_statement = $wpdb->prepare($job_map_sql, $resume_id);
                            $job_id = $wpdb->get_var($job_map_prepared_statement);
                            $job_prepared_statement = $wpdb->prepare($job_sql, $job_id);
                            $job_title = $wpdb->get_var($job_prepared_statement);

                            if (count($job_title) > 0) {
                                ?>
                                <div class="applying-for">  
                                    Applying for: 
                                    <a target="_blank" class="job_applying_for_link" href="#"><?php echo $job_title; ?></a>
                                    <input type="hidden" name="resume_job_id" value="<?php echo $job_id; ?>">
                                    <br>
                                    <span class="resume_date">Submitted: 28 Oct,&nbsp;
                                        <span class="resume_year">2014</span>
                                    </span>
                                </div>
                            <?php } else { ?>

                                <input type="button" class="btn btn-primary invite-to-job" value="Invite to Job" />
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row hidden-sm hidden-md hidden-lg">
                    <div class="column-xs-12">
                        <div class="space"></div>
                        <div class="container">
                            <strong><a target="_blank" href="#"><?php $name ?></a></strong>             

                            <div class="location">
                                Oshawa, Ontario, Canada                                
                            </div>

                            <div class="applying-for">  
                                Applying for: 
                                <a target="_blank" class="job_applying_for_link" href="/jobs/program-development-tester">Program Development Tester</a>
                                <br>
                                <span class="resume_date">Submitted: 28 Oct,&nbsp;
                                    <span class="resume_year">2014</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <?php if (count($job_title) > 0) { ?>
                            <div class="row hidden-sm hidden-xs">
                                <div class="col-md-4">
                                    <ul class="list-inline toggle-processing-status">
                                        <li><a href="?fast-track=insufficient&amp;resume_id=57" class="fast-track"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Fast Tracked</a></li>
                                        <li><a  href="?reference-checked=false&amp;resume_id=57" class="reference-checked"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">References Checked</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-inline toggle-processing-status">
                                        <li><a href="?video-interview-evaluated=false&amp;resume_id=57" class="video-interview-evaluated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Video Evaluated</a></li>
                                        <li><a href="?no-red-flags=checking&amp;resume_id=57" class="no-red-flags"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">No Red Flags</a></li>
                                    </ul><!--toggle-processing-status-->
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-inline toggle-processing-status">
                                        <li><a href="?star-resume=unrated&amp;resume_id=57" class="highest-rated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Highest Rated</a></li>
                                        <li><a href="?completed-evaluation=false&amp;resume_id=57" class="completed-evaluation"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Completed Evaluation</a></li>
                                    </ul><!--toggle-processing-status-->
                                </div>
                            </div>
                            <div class="row hidden-md hidden-lg">
                                <div class="col-xs-12">
                                    <ul class="list-inline toggle-processing-status">
                                        <li><a href="#" class="fast-track"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Fast Tracked</a></li>
                                        <li><a  href="#" class="reference-checked"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">References Checked</a></li>
                                        <li><a href="#" class="video-interview-evaluated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Video Evaluated</a></li>
                                        <li><a href="#" class="no-red-flags"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">No Red Flags</a></li>
                                        <li><a href="#" class="highest-rated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Highest Rated</a></li>
                                        <li><a href="#" class="completed-evaluation"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Completed Evaluation</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space"></div>
                            <input type="button" class="btn btn-primary unlink-job-from-user" value="Unlink From Job" />
                        <?php } ?>
                    </div>
                </div>
                <div class="space"></div>
            </li>
            <?php
        } //end loop
    } else {
        ?>
        <li class="resume">No resumes available.</li>
        <?php } ?>
</ol>

