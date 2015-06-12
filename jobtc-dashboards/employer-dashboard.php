<?php
/*
 * Employer Dashboard 
 * Updated 4/23/2015
 * */
?>

<div class="section myjobs">

    <div class="section_content">

        <!--Dashboard Tabs-->
        <ul class="nav dashboard-tabs">

            <li id="myjobs_tab_evaluation"><a data-toggle="tab" href="#employer-evaluation" class="active noscroll">Applicants</a></li>
            <li id="myjobs_tab_jobs"><a data-toggle="tab" href="#employer-jobs" class="inactive noscroll">Jobs</a></li>
            <li id="myjobs_tab_applicant_discussions"><a data-toggle="tab" href="#discussions" class="inactive noscroll">Discussions</a></li>
            <li id="myjobs_tab_employer_test"><a data-toggle="tab" href="#employer-test-tab" class="inactive noscroll">Tests</a></li>
            <li id="myjobs_tab_employer_statuses"><a data-toggle="tab" href="#employer-statuses" class="inactive noscroll">Statuses</a></li>
            <li id="myjobs_tab_employer_skills"><a data-toggle="tab" href="#employer-skills" class="inactive noscroll">Skills</a></li>
        </ul>

        <div class="tab-content">

            <div id="employer-statuses" class="tab-pane fade in dashboard-tab-pane">
                <ol class="resume-statuses">
                    <li><a href="http://vidhire.net/resume/group/2nd-highest-rated/">2nd Highest Rated</a></li>
                    <li><a href="http://vidhire.net/resume/group/check-for-red-flags/">Check For Red Flags</a></li>
                    <li><a href="http://vidhire.net/resume/group/check-reference/">Check Reference</a></li>
                    <li><a href="http://vidhire.net/resume/group/completed-evaluation/">Completed Evaluation</a></li>
                    <li><a href="http://vidhire.net/resume/group/evaluate/">Evaluate</a></li>
                    <li><a href="http://vidhire.net/resume/group/fast-tracked/">Fast Tracked</a></li>
                    <li><a href="http://vidhire.net/resume/group/highest-rated/">Highest Rated</a></li>
                    <li><a href="http://vidhire.net/resume/group/no-red-flags/">No Red Flags</a></li>
                    <li><a href="http://vidhire.net/resume/group/no-video/">No Video</a></li>
                    <li><a href="http://vidhire.net/resume/group/pick/">Pick</a></li>
                    <li><a href="http://vidhire.net/resume/group/references-checked/">References Checked</a></li>
                    <li><a href="http://vidhire.net/resume/group/standard-tracked/">Standard Tracked</a></li>
                    <li><a href="http://vidhire.net/resume/group/video-evaluated/">Video Evaluated</a></li>
                </ol>            
            </div>

            <div id="employer-skills" class="tab-pane fade in dashboard-tab-pane">

                <ol class="job-tags">
                    <li><a href="http://vidhire.net/resume/speciality/access/">access</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/c/">c++</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/c-c/">c++.C#</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/editor/">Editor</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/excel/">excel</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/flash/">flash</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/html/">HTML</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/illustrator/">Illustrator</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/java/">java</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/jquery/">JQuery</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/linux/">linux</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/oracle/">oracle</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/photoshop/">Photoshop</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/php/">PHP</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/programming/">Programming</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/public-speaking/">Public Speaking</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/red-hat/">red hat</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/researcher/">Researcher</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/sales-manager/">Sales Manager</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/sql/">SQL</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/team-management/">Team Management</a></li>
                    <li><a href="http://vidhire.net/resume/speciality/test/">Test</a></li>
                </ol>

            </div>


            <div id="employer-test-tab" class="tab-pane fade in dashboard-tab-pane">
                <div class="space"></div>
                <div class="row create-test-field">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span  class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input class="form-control" placeholder="Search" type="text" value=""/>
                        </div>
                    </div>
                    <div class="col-md-5">

                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary create-test">Create Test</a>
                    </div>
                </div>
                <div class="space"></div>
                <!--Test List-->
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">PHP Basic Questions</h3>
                            </div>
                            <div class="test-options">
                                <ul class="nav nav-pills">
                                    <li role="presentation"><a class="edit-test" href="#">Edit</a></li>
                                    <li role="presentation"><a class="preview-test" href="#">Preview</a></li>
                                    <li role="presentation"><a class="delete-test" href="#">Delete</a></li>
                                    <li role="presentation"><a class="duplicate-test" href="#">Duplicate</a></li>
                                    <li role="presentation"><a class="options" href="#">Options</a></li>
                                    <li role="presentation"><a class="add-question" href="#">Add Question</a></li>
                                    <li role="presentation"><a class="link-to-job" href="#">Link to Jobs</a></li>
                                    <li role="presentation"><a class="send-to-applicants" href="#">Send to Applicants</a></li>
                                    <li role="presentation"><a class="change-test-color" href="#">Color</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <ol class="question-list">
                                    <li>
                                        <label>What is PHP?</label>
                                        <div class="test-options">
                                            <ul class="nav nav-pills">
                                                <li role="presentation"><a href="#">Edit</a></li>
                                                <li role="presentation"><a href="#">Preview</a></li>
                                                <li role="presentation"><a href="#">Delete</a></li>
                                                <li role="presentation"><a href="#">Duplicate</a></li>
                                                <li role="presentation"><a href="#">Options</a></li>
                                            </ul>
                                        </div>

                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <ul class="pager">
                                <li><a href="#">Previous</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div id="employer-jobs" class="tab-pane fade in dashboard-tab-pane">

                <?php get_template_part('jobtc-jobs/loop','job')?>

            </div>

            <div id="discussions" class="tab-pane fade in dashboard-tab-pane">
                <?php get_template_part('jobtc-comments/comment'); ?>
            </div>

            <div id="employer-evaluation" class="tab-pane fade in active dashboard-tab-pane">
                <?php get_template_part('jobtc-resume/loop','resume');?>
            </div>

        </div>


    </div><!-- end section_content -->

</div><!-- end section -->



