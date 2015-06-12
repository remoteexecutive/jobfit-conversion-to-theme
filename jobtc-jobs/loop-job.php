<ol class="jobs">

    <?php
    //Get function to populate the list
    dashboard_loop_job();

    if ($count > 0) {

        foreach ($jobs as $job) {
            ?>

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
                        <a class="job-edit-link" href="http://vidhire.net/edit-job/?job_edit=246">Edit</a>                                        <a class="end" href="http://vidhire.net/?job_end=246">End</a>                                        <input type="hidden" class="actions_job_id" value="246">
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
                        <a class="job-edit-link" href="http://vidhire.net/edit-job/?job_edit=244">Edit</a>                                        <a class="end" href="http://vidhire.net/?job_end=244">End</a>                                        <input type="hidden" class="actions_job_id" value="244">
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
                        <a class="job-edit-link" href="http://vidhire.net/edit-job/?job_edit=64">Edit</a>                                        <a class="end" href="http://vidhire.net/?job_end=64">End</a>                                        <input type="hidden" class="actions_job_id" value="64">
                    </div>
                </div>

            </li>
        <?php
    } //End Resume List Loop
} else {
    ?>
        <li class="job">You have not created any jobs yet.</li>
    <?php } ?>
</ol>