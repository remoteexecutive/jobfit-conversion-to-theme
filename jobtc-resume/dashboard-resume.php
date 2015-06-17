<?php
//Get the current user info
global $current_user;
get_currentuserinfo();

$name = $current_user->user_firstname . " " . $current_user->user_lastname;

//Get data from wp Resume
global $wpdb;
$user_id = wp_get_current_user();
$table_name = $wpdb->prefix . 'resume';


$sql = " SELECT 
                resume_id,
                user_id,	
                rate,	
                currency,	
                location,	
                email,	
                phone,	
                mobile,	
                skype,	
                resume_photo,	
                resume_doc,	
                additional_doc,	
                overall_average,
                transcripts,
                degree,	
                institution,	
                year_issued,	
                skills,	
                interview_video_link 
        from $table_name WHERE user_id in (%d)";
$prepared_statement = $wpdb->prepare($sql, $user_id->ID);
$resume = $wpdb->get_results($prepared_statement);



foreach ($resume as $resume_data) {

    $resume_id = $resume_data->resume_id;
    $user_id = $resume_data->user_id;
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
}
?>

<div class="row">
    <div class="resume-container col-md-12">
        <div class="section_header">                        
            <h1 class="title resume-title"><?php echo $name; ?></h1>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="application-job">
                        <div>
                            <div class="resume-pic-container">
                                <div class="space"></div>
                                <?php
                                if ($resume_photo == "") {
                                    
                                } else {
                                    ?>
                                    <img width="150" height="150" src="<?php echo $resume_photo; ?>" alt="Resume Photo">
<?php } ?>

                            </div>
                            <div class="space"></div>
                            <ul>
                                <li>
                                    Minimum Hourly Rate: <strong><?php echo $rate . " " . $currency; ?></strong> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-information">
                        <div>
                            <div class="space"></div>
                            <ul>
                                <li> 
                                    <i class="fa fa-envelope"></i>
                                    &nbsp;
                                    <strong>
                                        <a href="mailto:test@emial.com?subject=Your Resume on VidHire"><?php echo $email; ?></a>
                                    </strong>
                                </li>
                                <li ><i class="fa fa-phone"></i>&nbsp;<strong><?php echo $phone; ?></strong></li>
                                <li ><i class="fa fa-mobile"></i>&nbsp;<strong><?php echo $mobile; ?></strong></li>
                                <li ><i class="fa fa-skype"></i>&nbsp;<a href="skype:<?php echo $skype; ?>"><?php echo $skype; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="resume-statuses">
                        <div>
                            <ul class="list-group toggle-processing-status" style="font-size: 12px;">
                                <li class="list-group-item fast-track"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png"><a href="?fast-track=insufficient&amp;resume_id=57" class="fast-track">Fast Tracked</a></li>
                                <li class="list-group-item reference-checked"><a href="?reference-checked=false&amp;resume_id=57" class="reference-checked"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">References Checked</a></li>
                                <li class="list-group-item highest-rated"><a href="?star-resume=unrated&amp;resume_id=57" class="highest-rated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Highest Rated</a></li>						          
                                <li class="list-group-item video-interview-evaluated"><a href="?video-interview-evaluated=false&amp;resume_id=57" class="video-interview-evaluated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Video Evaluated</a></li>
                                <li class="list-group-item no-red-flags"><a href="?no-red-flags=checking&amp;resume_id=57" class="no-red-flags"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">No Red Flags</a></li>
                                <li class="list-group-item completed-evaluation"><a href="?completed-evaluation=false&amp;resume_id=57" class="completed-evaluation"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Completed Evaluation</a></li>
                            </ul><!--toggle-processing-status-->
                        </div>
                    </div>
                </div>
            </div> <!--First Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="attached_documents">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ead-document">
                                    <?php
                                    if ($resume_doc == "") {
                                        
                                    } else {
                                        echo do_shortcode('[embeddoc url="' . $resume_doc . '" viewer="microsoft"]');
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Third Row-->
            <div class="space"></div>
            <div class="row">
                <div class="col-md-7">
                    <div class="degree-section">
                        <div class="degree-section-text-section">
                            <div class="su-box-title"><i class="fa fa-graduation-cap"></i>&nbsp;Certificate, Diploma or Degree</div>
                            <div class="su-box-content">
                                <div class="space"></div>
                                <ul>
                                    <li><?php echo $degree . "," . $institution . "," . $year_issued; ?></li>
                                </ul>
                                <ul>
                                    <li>
                                        <label>Last year's overall average: </label>
                                        <?php echo $overall_average; ?>
                                    </li>
                                    <li>
                                        <?php if ($transcripts == "Yes") { ?>
                                            <label>Transcripts:</label>Yes
                                        <?php } else { ?>
                                            <label>Transcripts:</label>No
                                <?php } ?>
                                    </li>
                                </ul>
                                <?php
                                if ($additional_doc == "") {
                                    
                                } else {
                                    ?>
                                    <a href="<?php echo $additional_doc; ?>" target="_blank">
                                        <img width="150" height="150" src="<?php echo $additional_doc; ?>" class="attachment-thumbnail" alt="CERTIFICATE_FOR_EMPLOYMENT_Test.jpg">
                                    </a>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="skills-container">
                        <div class="skills-text">
                            <div class="su-box-title"><i class="fa fa-wrench"></i>&nbsp;Skills</div>
                            <div class="su-box-content">
<?php echo $skills; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--Second Row-->
            <div class="space"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="experience">
                        <div class="su-box-title"><i class="fa fa-sitemap"></i>&nbsp;Career Map</div>
                        <div class="su-box-content su-clearfix">
                            <div class="space"></div>
                            <div class="row">
                                <div class="col-md-3 hidden-xs">
                                    <ul class="list-group">
                                        <li class="list-group-item">&nbsp;</li>
                                        <li class="list-group-item">Position/Title</li>
                                        <li class="list-group-item">Start Date</li>
                                        <li class="list-group-item">End Date</li>
                                        <li class="list-group-item">Job Type</li>
                                        <li class="list-group-item">Company</li>
                                        <li class="list-group-item">City</li>
                                        <li class="list-group-item">Country</li>
                                        <li class="list-group-item">Reason for Leaving</li>
                                        <li class="list-group-item">Starting Salary</li>
                                        <li class="list-group-item">Final Salary</li>
                                        <li class="list-group-item">Salary Type</li>
                                        <li class="list-group-item">Reference Name</li>
                                        <li class="list-group-item">Position/Title</li>
                                        <li class="list-group-item">Reference Email</li>
                                        <li class="list-group-item">Reference Phone</li>
                                        <li class="list-group-item">Notes</li>
                                    </ul>
                                </div>

                                <div class="col-md-3">
                                    <?php
                                    $user_id = wp_get_current_user();
                                    $career_map_table = $wpdb->prefix . 'career_map';
                                    $career_map_sql = " SELECT 
                a.career_map_id,
                a.user_id,	
                a.employment,	
                a.company,	
                a.position,	
                a.start_date,	
                a.end_date,	
                a.job_type,	
                a.city,	
                a.country,	
                a.reason_for_leaving,	
                a.salary_type,	
                a.starting_salary,
                a.final_salary,
                a.reference_name,	
                a.reference_email,	
                a.reference_phone_number,	
                a.reference_position,	
                a.notes
        from $career_map_table a WHERE user_id in (%d)";


                                    $career_map_prepared_statement = $wpdb->prepare($career_map_sql, $user_id->ID);
                                    $career_map = $wpdb->get_results($career_map_prepared_statement);

                                    foreach ($career_map as $career_map_data) {

                                        $career_map_employment = $career_map_data->employment;

                                        if ($career_map_employment == "Most Recent") {

                                            $career_map_company_1 = $career_map_data->company;
                                            $career_map_position_1 = $career_map_data->position;
                                            $career_map_start_date_1 = $career_map_data->start_date;
                                            $career_map_end_date_1 = $career_map_data->end_date;
                                            $career_map_job_type_1 = $career_map_data->job_type;
                                            $career_map_city_1 = $career_map_data->city;
                                            $career_map_country_1 = $career_map_data->country;
                                            $career_map_reason_for_leaving_1 = $career_map_data->reason_for_leaving;
                                            $career_map_salary_type_1 = $career_map_data->salary_type;
                                            $career_map_starting_salary_1 = $career_map_data->starting_salary;
                                            $career_map_final_salary_1 = $career_map_data->final_salary;
                                            $career_map_reference_name_1 = $career_map_data->reference_name;
                                            $career_map_reference_email_1 = $career_map_data->reference_email;
                                            $career_map_reference_phone_number_1 = $career_map_data->reference_phone_number;
                                            $career_map_reference_position_1 = $career_map_data->reference_position;
                                            $career_map_reference_notes_1 = $career_map_data->notes;
                                        }

                                        if ($career_map_employment == "2nd Last") {

                                            $career_map_company_2 = $career_map_data->company;
                                            $career_map_position_2 = $career_map_data->position;
                                            $career_map_start_date_2 = $career_map_data->start_date;
                                            $career_map_end_date_2 = $career_map_data->end_date;
                                            $career_map_job_type_2 = $career_map_data->job_type;
                                            $career_map_city_2 = $career_map_data->city;
                                            $career_map_country_2 = $career_map_data->country;
                                            $career_map_reason_for_leaving_2 = $career_map_data->reason_for_leaving;
                                            $career_map_salary_type_2 = $career_map_data->salary_type;
                                            $career_map_starting_salary_2 = $career_map_data->starting_salary;
                                            $career_map_final_salary_2 = $career_map_data->final_salary;
                                            $career_map_reference_name_2 = $career_map_data->reference_name;
                                            $career_map_reference_email_2 = $career_map_data->reference_email;
                                            $career_map_reference_phone_number_2 = $career_map_data->reference_phone_number;
                                            $career_map_reference_position_2 = $career_map_data->reference_position;
                                            $career_map_reference_notes_2 = $career_map_data->notes;
                                        }

                                        if ($career_map_employment == "3rd Last") {

                                            $career_map_company_3 = $career_map_data->company;
                                            $career_map_position_3 = $career_map_data->position;
                                            $career_map_start_date_3 = $career_map_data->start_date;
                                            $career_map_end_date_3 = $career_map_data->end_date;
                                            $career_map_job_type_3 = $career_map_data->job_type;
                                            $career_map_city_3 = $career_map_data->city;
                                            $career_map_country_3 = $career_map_data->country;
                                            $career_map_reason_for_leaving_3 = $career_map_data->reason_for_leaving;
                                            $career_map_salary_type_3 = $career_map_data->salary_type;
                                            $career_map_starting_salary_3 = $career_map_data->starting_salary;
                                            $career_map_final_salary_3 = $career_map_data->final_salary;
                                            $career_map_reference_name_3 = $career_map_data->reference_name;
                                            $career_map_reference_email_3 = $career_map_data->reference_email;
                                            $career_map_reference_phone_number_3 = $career_map_data->reference_phone_number;
                                            $career_map_reference_position_3 = $career_map_data->reference_position;
                                            $career_map_reference_notes_3 = $career_map_data->notes;
                                        }
                                    }
                                    ?>


                                    <ul class="list-group">
                                        <li class="list-group-item">Most Recent Job</li>
                                        <li class="list-group-item"><?php echo $career_map_position_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_start_date_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_end_date_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_job_type_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_company_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_city_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_country_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reason_for_leaving_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_starting_salary_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_final_salary_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_salary_type_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_name_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_position_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_email_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_phone_number_1; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_notes_1; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <ul class="list-group">
                                        <li class="list-group-item">2nd Last</li>
                                        <li class="list-group-item"><?php echo $career_map_position_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_start_date_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_end_date_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_job_type_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_company_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_city_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_country_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reason_for_leaving_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_starting_salary_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_final_salary_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_salary_type_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_name_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_position_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_email_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_phone_number_2; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_notes_2; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <ul class="list-group">
                                        <li class="list-group-item">3rd Last</li>
                                        <li class="list-group-item"><?php echo $career_map_position_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_start_date_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_end_date_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_job_type_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_company_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_city_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_country_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reason_for_leaving_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_starting_salary_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_final_salary_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_salary_type_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_name_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_position_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_email_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_phone_number_3; ?></li>
                                        <li class="list-group-item"><?php echo $career_map_reference_notes_3; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Fourth Row-->
            <div class="space"></div>
<?php if (current_user_can('manage_options') || current_user_can('can_submit_job')) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="experience-chart">
                            <div class="su-box-title"><i class="fa fa-edit"></i>&nbsp;Employment Period Evaluation</div>
                            <div class="su-box-content">
                                <div class="space"></div>
                                <label>Most Recent Employment</label>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                                <label>Second Last Employment</label>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                                <label>Third Last Employment</label>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="wage-history-evaluation">            
                            <div class="su-box-title" ><i class="fa fa-usd"></i>&nbsp;Wage History Evaluation</div>
                            <div class="su-box-content">
                                <div class="space"></div>
                                <label>Most Recent Employment</label>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                                <label>Second Last Employment</label>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                                <label>Third Last Employment</label>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Fifth Row-->
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="reference-request-responses">

                            <div class="su-box-title"><i class="fa fa-tachometer container-icon"></i>&nbsp;Reference Request Responses</div>
                            <div class="su-box-content">
                                <div class="space"></div>
                                <h2>Productivity</h2>
                                <div class="sue-progress-bar sue-progress-bar-style-thin" style="background-color:#f0dbc9;border-color:#d8c5b5" data-percent="80"><span style="width: 80%; color: rgb(0, 0, 0); background-color: rgb(130, 0, 99);"><span><strong>Steven Jones</strong>  (Very Good)</span></span></div>
                                <div class="sue-progress-bar sue-progress-bar-style-thin" style="background-color:#f0dbc9;border-color:#d8c5b5" data-percent="60"><span style="width: 60%; color: rgb(0, 0, 0); background-color: rgb(4, 0, 130);"><span><strong>John Horvath</strong>  (Good)</span></span></div>
                                <div class="sue-progress-bar sue-progress-bar-style-thin" style="background-color:#f0dbc9;border-color:#d8c5b5" data-percent="40"><span style="width: 40%; color: rgb(0, 0, 0); background-color: rgb(102, 191, 4);"><span><strong>Nancy Drew</strong>  (Fair)</span></span></div>


                                <h3 style="text-align: center;"><span style="color: #919182;">Average</span></h3>
                                <div class="sue-progress-pie sue-progress-pie-align-center" style="width:80px;height:80px" data-percent="60" data-size="80" data-pie_width="40" data-pie_color="#f0dbc9" data-fill_color="#E68A8A">
                                    <canvas width="80" height="80" style="width: 80px; height: 80px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Sixth Row-->
<?php } ?>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="interview-video-container">
                        <div class="video-interview-header"><i class="fa fa-file-video-o"></i>&nbsp;Video Interview</div>
                        <div class="su-box-content su-clearfix">
                            <?php if ($interview_video_link == "") {
                                echo "No Video Interview";
                            } else { ?>
                                <iframe height="355" src="<?php echo $interview_video_link; ?>"></iframe>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div><!--Seventh Row-->
            <div class="space"></div>
<?php if (current_user_can('manage_options') || current_user_can('can_submit_job')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-evaluation-container">
                            <div class="su-box-title"><i class="fa fa-laptop container-icon"></i>&nbsp;Video Evaluation</div>

                            <div class="su-box-content su-clearfix">
                                <div class="space"></div>
                                <div class="row">
                                    <div class="col-md-offset-2">
                                        <div class="video-evaluation-form-container">
                                            <form class="video-evaluation-form">
                                                <table class="video-evaluation">
                                                    <thead>
                                                        <tr><th>&nbsp;</th>
                                                            <th>Evaluation Notes</th>
                                                            <th>Evaluator</th>
                                                            <th>Score</th>
                                                        </tr></thead>      
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Confidence</strong></td>
                                                            <td>
                                                                <textarea name="confidence_notes">Test</textarea>
                                                            </td>
                                                            <td><input type="text" name="confidence_evaluator" value="Test "></td>
                                                            <td>
                                                                <select name="confidence_score">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option selected="selected">3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Communication</strong></td>
                                                            <td>
                                                                <textarea name="communication_notes">Test</textarea>
                                                            </td>
                                                            <td><input type="text" name="communication_evaluator" value="Test"></td>
                                                            <td>
                                                                <select name="communication_score">
                                                                    <option selected="selected">1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Enthusiasm</strong></td>
                                                            <td>
                                                                <textarea name="fun_factor_notes">Test</textarea>
                                                            </td>
                                                            <td><input type="text" name="fun_factor_evaluator" value="Test"></td>
                                                            <td>
                                                                <select name="fun_factor_score">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option selected="selected">3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Connection</strong></td>
                                                            <td>
                                                                <textarea name="connection_notes">Test</textarea></td>
                                                            <td><input type="text" name="connection_evaluator" value="Test"></td>
                                                            <td>
                                                                <select name="connection_score">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option selected="selected">3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Understanding</strong></td>
                                                            <td><textarea name="understanding_notes">Test</textarea></td>
                                                            <td><input type="text" name="understanding_evaluator" value="Test"></td>
                                                            <td>
                                                                <select name="understanding_score">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option selected="selected">4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Optional Boost</strong></td>
                                                            <td><textarea name="bonus_notes">Test</textarea></td>
                                                            <td><input type="text" name="bonus_evaluator" value="Test"></td>
                                                            <td>
                                                                <select name="bonus_score">
                                                                    <option>1</option>
                                                                    <option selected="selected">2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td><strong style="float:right;font-weight:bolder;font-size:20px;color:#a9a9a9;">Total</strong></td>
                                                            <td><input id="video_evaluation_score" name="video_evaluation_score" type="text" value="16"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>
                                                                <div class="evaluation-action-buttons">                      
                                                                    <input type="button" id="save_video_score" name="save_video_score" class="save_video_score" value="Save And Calculate">
                                                                    <br>
                                                                    <br>
                                                                    <a target="_blank" class="evaluation-instructions" href="http://vidhire.net/?p=329">Evaluation Instructions</a>
                                                                    <input name="resume_id" type="hidden" value="57">	  
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>  
                                                </table>
                                            </form>         
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <label>Confidence</label>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                        <label>Communication</label>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                        <label>Enthusiasm</label>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Eighth Row-->

                <div class="space"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="final-evaluation-form">
                            <div class="su-box-title"><i class="fa fa-bar-chart-o container-icon"></i>&nbsp;Final Evaluation</div>

                            <div class="su-box-content su-clearfix">
                                <div class="space"></div>
                                <div class="row">
                                    <div class="col-md-offset-2">
                                        <form class="final-evaluation-form">       
                                            <table class="final-evaluation">
                                                <thead>
                                                    <tr><th>&nbsp;</th>
                                                        <th>Evaluation Notes</th>
                                                        <th>Evaluator</th>
                                                        <th>Score</th>
                                                    </tr></thead>      
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Skills</strong></td>
                                                        <td>
                                                            <textarea name="skills_notes">1 is skills sufficient for the job, 2 3 and 4 is more than is needed. 5 is diverse skills with high proficiency.</textarea>
                                                        </td>
                                                        <td><input type="text" name="skills_evaluator" value="Tom Coghill"></td>
                                                        <td>
                                                            <select name="skills_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option selected="selected">4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Education</strong></td>
                                                        <td>
                                                            <textarea name="education_notes"> Top performers have high marks,                                                                                            		              		              		              		              		              		</textarea>
                                                        </td>
                                                        <td><input type="text" name="education_evaluator" value="Tom Coghill"></td>
                                                        <td>
                                                            <select name="education_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option selected="selected">5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Career Map</strong></td>
                                                        <td>
                                                            <textarea name="career_map_notes">This is the way that I am fixing                                                                                                                                                                                                                               </textarea>
                                                        </td>
                                                        <td><input type="text" name="career_map_evaluator" value="Jex B."></td>
                                                        <td>
                                                            <select name="career_map_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option selected="selected">4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>References</strong></td>
                                                        <td>
                                                            <textarea name="references_notes">This is the way to post a letter.         	              	              	              	              	              	              		                                                                                                                         </textarea>				 </td>
                                                        <td><input type="text" name="references_evaluator" value="Nam"></td>
                                                        <td>
                                                            <select name="references_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option selected="selected">5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Video Interview</strong></td>
                                                        <td><textarea name="video_interview_notes">Confidence, clear effective communication, good impression, warm personality.                                                                                                                          </textarea></td>
                                                        <td><input type="text" name="video_interview_evaluator" value="Tom C         "></td>
                                                        <td>
                                                            <select name="video_interview_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option selected="selected">3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Tests</strong></td>
                                                        <td><textarea name="tests_notes">These may be program skill tests, or typing, memory or anything required for determining job competancy.                                                                                               </textarea></td>
                                                        <td><input type="text" name="tests_evaluator" value="Henry D."></td>
                                                        <td>
                                                            <select name="tests_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option selected="selected">3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>	

                                                    <tr>
                                                        <td><strong>Optional Boost</strong></td>
                                                        <td><textarea name="positive_adjustments_notes">I gave the boost because he has the highest PHP experience.</textarea></td>
                                                        <td><input type="text" name="positive_adjustments_evaluator" value="Paige"></td>
                                                        <td>
                                                            <select name="positive_adjustments_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option selected="selected">4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Admin Notes</strong></td>
                                                        <td><textarea name="internal-notes-text-area" class="internal-notes-text-area">He has all the skills and his experience matches the job. The video interview showed clear communication, quick thinking and confidence. &nbsp;He was fast tracked as he showed upward mobility within 3 companies.                                                </textarea></td>
                                                        <td><strong style="float:right;font-weight:bolder;font-size:20px;color:#1F5802;">Total</strong></td>
                                                        <td><input id="final_evaluation_score" name="final_evaluation_score" type="text" value="28"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="evaluation-action-buttons">                      
                                                                <input type="button" id="save_score" name="save_score" class="save_score" value="Save And Calculate">
                                                                <br>
                                                                <br>
                                                                <a target="_blank" class="evaluation-instructions" href="http://vidhire.net/?p=329">Evaluation Instructions</a>
                                                                <input name="resume_id" type="hidden" value="57">	  
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>  
                                            </table>    
                                        </form>         
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="final-evaluation-form">


                                            <label>Skills</label>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>Education</label>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>Career Map</label>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Ninth Row-->
<?php } ?>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <div class="su-box-title"><i class="fa fa-location-arrow"></i>&nbsp;Location: Oshawa Ontario, Canada</div>
                        <div class="su-box-content su-clearfix">                                    
                            <div id="geolocation_box">
                                <p>
                                    <input type="hidden" class="hidden" name="jr_address" id="geolocation-address" value="<?php echo $location; ?>">
                                    <input type="hidden" class="text" name="jr_geo_latitude" id="geolocation-latitude" value="">
                                    <input type="hidden" class="text" name="jr_geo_longitude" id="geolocation-longitude" value="">
                                </p>

                                <div id="map_wrap" style="width:100%;height:250px;"><div id="geolocation-map" style="width: 100%; height: 250px; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 601px 116px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: 70px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: 70px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: 70px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: 70px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -25px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -25px; top: 70px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 231px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 231px; top: 70px;"><canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -281px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -281px; top: 70px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 487px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 487px; top: 70px;"></div></div></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden; width: 646px; height: 250px;"><img src="http://maps.googleapis.com/maps/api/js/StaticMapService.GetMapImage?1m2&amp;1i17945&amp;2i23738&amp;2e1&amp;3u8&amp;4m2&amp;1u646&amp;2u250&amp;5m5&amp;1e0&amp;5sen&amp;6sus&amp;10b1&amp;12b1&amp;token=97428" style="width: 646px; height: 250px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i69!3i92!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i69!3i93!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i71!3i93!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i71!3i92!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i72!3i92!2m3!1e0!2sm!3i298157716!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i70!3i92!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i70!3i93!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i72!3i93!2m3!1e0!2sm!3i298157716!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 601px 116px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="http://maps.google.com/maps?ll=43.871475,-79.649718&amp;z=8&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 62px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google_white2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 161px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2015 Google</span></div></div></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 173px; top: 35px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2015 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2015 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; position: absolute; -webkit-user-select: none; right: 92px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a href="http://www.google.com/intl/en_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@43.8714749,-79.649718,8z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint" draggable="false" controlwidth="32" controlheight="84" style="margin: 5px; -webkit-user-select: none; position: absolute; left: 0px; top: 0px;"><div controlwidth="32" controlheight="40" style="cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default; position: absolute; left: 0px; top: 0px;"><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -9px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is disabled" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -107px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is on top of the Map" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -58px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -205px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" controlwidth="0" controlheight="0" style="opacity: 0.6; display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 22px; height: 22px; overflow: hidden; position: absolute; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -38px; top: -360px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" controlwidth="20" controlheight="39" style="position: absolute; left: 6px; top: 45px;"><div style="width: 20px; height: 39px; overflow: hidden; position: absolute;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -39px; top: -401px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div title="Zoom in" style="position: absolute; left: 0px; top: 2px; width: 20px; height: 17px; cursor: pointer;"></div><div title="Zoom out" style="position: absolute; left: 0px; top: 19px; width: 20px; height: 17px; cursor: pointer;"></div></div></div><div class="gmnoprint" style="margin: 5px; z-index: 0; position: absolute; cursor: pointer; right: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 1px 6px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; border: 1px solid rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 22px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Map</div><div style="z-index: -1; padding-top: 2px; -webkit-background-clip: padding-box; border-width: 0px 1px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); border-left-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 18px; text-align: left; display: none; background-color: white; background-clip: padding-box;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 1px 6px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgba(0, 0, 0, 0.14902); border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 38px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Satellite</div><div style="z-index: -1; padding-top: 2px; -webkit-background-clip: padding-box; border-width: 0px 1px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); border-left-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 17px; text-align: left; display: none; background-color: white; background-clip: padding-box;"><div draggable="false" title="Zoom in to show 45 degree view" style="color: rgb(184, 184, 184); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; display: none; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(241, 241, 241); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">45°</label></div><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Tenth Row-->
            <div class="space"></div>
            <div class="posted-by-container">Posted by: <strong>testemployee</strong> on October 28, 2014</div>
            <div class="space"></div>
            <input class="btn btn-primary edit-resume" type="button" value="Edit Resume" />
        </div>
    </div>
</div>
