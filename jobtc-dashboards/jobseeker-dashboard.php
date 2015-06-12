<?php
/*
 * Job Seeker Dashboard 
 * Updated 4/26/2015
 * */
?>

<div class="section myjobs">

    <div class="section_content">

        <!--Dashboard Tabs-->
        <ul class="nav dashboard-tabs">

            <li><a data-toggle="tab" href="#jobseeker-resume" class="active noscroll">Resume</a></li>
            <li><a data-toggle="tab" href="#jobseeker-jobs" class="inactive noscroll">Jobs</a></li>
            <li><a data-toggle="tab" href="#jobseeker-prefs" class="inactive noscroll">Preferences</a></li>
            <li><a data-toggle="tab" href="#jobseeker-tests" class="inactive noscroll">Tests</a></li>
        </ul>

        <div class="tab-content">

            <div id="jobseeker-resume" class="tab-pane fade in active dashboard-tab-pane">
                <?php
                get_template_part('jobtc-resume/dashboard', 'resume');
                ?>
            </div>

            <div id="jobseeker-jobs" class="tab-pane fade in dashboard-tab-pane">
                <ol class="jobs">
                    <h3>Starred Jobs</h3>
                    <li class="job">

                        <div class="job-details-title">
                            <div class="title">
                                <strong>
                                    <a target="_blank" class="job-title-color" href="http://vidhire.net/jobs/program-development-leader/">Program Development – Test Job</a>
                                </strong>
                                <span class="jtype full-time">Full-Time</span>              
                            </div><!--title-->  

                        </div> <!--job-details-title-->

                        <div class="job-details">
                            <div>
                                <a href="" rel="nofollow"></a>
                                <div class="location">
                                    <strong></strong>
                                </div>        
                                <div>
                                    <a href="http://fasting.ws" rel="nofollow">Better Teck Inc.</a>
                                    <div class="location">
                                        <strong>Toronto, Ontario, Canada</strong>
                                    </div>        
                                    <div class="posted-by">Posted by: <a style="font-weight: normal;" href="http://vidhire.net/author/tom/">tom</a>
                                        on Dec 26,&nbsp;2014
                                    </div>                                        </div>               

                            </div><!--job-details-->

                            <div class="actions">
                                <a class="job-apply-link" href="#">Apply</a>
                                <input type="hidden" class="actions_job_id" value="246">
                            </div>
                        </div>

                        <div class="total_applicants_jobs"><strong>Total Applicants: <span>3</span></strong></div>                       

                    </li>

                    <li class="job">

                        <div class="job-details-title">
                            <div class="title">
                                <strong>
                                    <a target="_blank" class="job-title-color" href="http://vidhire.net/jobs/program-development-tester/">Program Development (Test Job)</a>
                                </strong>
                                <span class="jtype full-time">Full-Time</span>              
                            </div><!--title-->  

                        </div> <!--job-details-title-->

                        <div class="job-details">
                            <div>
                                <a href="" rel="nofollow"></a>
                                <div class="location">
                                    <strong></strong>
                                </div>        
                                <div>
                                    <a href="http://vidhire.net/author/tom/">tom</a>                                        </div>               

                            </div><!--job-details-->

                            <div class="actions">
                                <a class="job-apply-link" href="#">Apply</a>
                                <input type="hidden" class="actions_job_id" value="246">
                            </div>
                        </div>

                        <div class="total_applicants_jobs"><strong>Total Applicants: <span>2</span></strong></div>                       

                    </li>

                    <li class="job">

                        <div class="job-details-title">
                            <div class="title">
                                <strong>
                                    <a target="_blank" class="job-title-color" href="http://vidhire.net/jobs/software-developer/">Software Developer</a>
                                </strong>
                                <span class="jtype freelance">Freelance</span>              
                            </div><!--title-->  

                        </div> <!--job-details-title-->

                        <div class="job-details">
                            <div>
                                <a href="" rel="nofollow"></a>
                                <div class="location">
                                    <strong></strong>
                                </div>        
                                <div>
                                    <a href="http://singularityteam.com" rel="nofollow">Singularity</a>
                                    <div class="location">
                                        <strong>Baguio, Cordillera Administrative Region, Philippines</strong>
                                    </div>        
                                    <div class="posted-by">Posted by: <a style="font-weight: normal;" href="http://vidhire.net/author/tom/">tom</a>
                                        on Dec 16,&nbsp;2014
                                    </div>                                        </div>               

                            </div><!--job-details-->

                            <div class="actions">
                                <a class="job-apply-link" href="#">Apply</a>
                                <input type="hidden" class="actions_job_id" value="246">
                            </div>
                        </div>

                    </li>

                </ol>
                <h3>Recently Viewed Jobs</h3>
                <ol class="jobs">
                    <li class="job">

                        <div class="job-details-title">
                            <div class="title">
                                <strong><a class="job-title-color" href="http://vidhire.net/jobs/programmer-php-sql-wordpress/">Programmer PHP, SQL, WordPress</a></strong>&nbsp;&nbsp;<span class="jtype full-time">Full-Time</span>              </div>  

                        </div> 

                        <div class="job-details">
                            <div>
                                <a href="http://vidhire.net" rel="nofollow">Vidhire</a>
                                <div class="location">
                                    <strong>Baguio, Cordillera Administrative Region, Philippines</strong>
                                </div>        
                                <div class="posted-by">Posted by: <a style="font-weight: normal;" href="http://vidhire.net/author/tim/">Tom Coghill</a>
                                    on Apr 1,&nbsp;2015
                                </div>          
                            </div>
                            <div class="actions">
                                <a class="job-apply-link" href="#">Apply</a>
                                <input type="hidden" class="actions_job_id" value="246">
                            </div>
                        </div>
                    </li>
                    <li class="job job-alt">
                        <div class="job-details-title">
                            <div class="title">
                                <strong><a class="job-title-color" href="http://vidhire.net/jobs/program-development-leader/">Program Development – Test Job</a></strong>&nbsp;&nbsp;<span class="jtype full-time">Full-Time</span>              </div>  
                        </div> 
                        <div class="job-details">
                            <div>
                                <a href="http://fasting.ws" rel="nofollow">Better Teck Inc.</a>
                                <div class="location">
                                    <strong>Toronto, Ontario, Canada</strong>
                                </div>        
                                <div class="posted-by">Posted by: <a style="font-weight: normal;" href="http://vidhire.net/author/tom/">tom</a>
                                    on Dec 26,&nbsp;2014
                                </div>          
                            </div>
                            <div class="actions">
                                <a class="job-apply-link" href="#">Apply</a>
                                <input type="hidden" class="actions_job_id" value="246">
                            </div>
                        </div>
                    </li>
                    <li class="job">
                        <div class="job-details-title">
                            <div class="title">
                                <strong><a class="job-title-color" href="http://vidhire.net/jobs/program-development-tester/">Program Development (Test Job)</a></strong>&nbsp;&nbsp;<span class="jtype full-time">Full-Time</span>              </div>  
                        </div> 
                        <div class="job-details">
                            <div class="actions">
                                <a class="job-apply-link" href="#">Apply</a>
                                <input type="hidden" class="actions_job_id" value="246">
                            </div>
                        </div>
                    </li>
                </ol>
                <h3>Job Recommendations</h3>
                <ol class="jobs">
                    <li class="job">No jobs found.</li>
                </ol>
            </div>

            <div id="jobseeker-prefs" class="tab-pane fade in dashboard-tab-pane">

            </div>

            <div id="jobseeker-tests" class="tab-pane fade in dashboard-tab-pane">
                <div id="slickQuiz">
                    <h1 class="quizName">Test Quiz</h1>

                    <div class="quizArea">
                        <div class="quizHeader">
                            <!-- where the quiz main copy goes -->

                            <a class="button startQuiz" href="#">Get Started!</a>
                        </div>

                        <!-- where the quiz gets built -->
                    </div>

                    <div class="quizResults">
                        <h3 class="quizScore">You Scored: <span><!-- where the quiz score goes --></span></h3>

                        <h3 class="quizLevel"><strong>Ranking:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

                        <div class="quizResultsCopy">
                            <!-- where the quiz result copy goes -->
                        </div>
                    </div>
                </div>
                <div id="slickQuiz2">
                    <h1 class="quizName">Test Quiz</h1>

                    <div class="quizArea">
                        <div class="quizHeader">
                            <!-- where the quiz main copy goes -->

                            <a class="button startQuiz" href="#">Get Started!</a>
                        </div>

                        <!-- where the quiz gets built -->
                    </div>

                    <div class="quizResults">
                        <h3 class="quizScore">You Scored: <span><!-- where the quiz score goes --></span></h3>

                        <h3 class="quizLevel"><strong>Ranking:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

                        <div class="quizResultsCopy">
                            <!-- where the quiz result copy goes -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- end section_content -->

</div><!-- end section -->
