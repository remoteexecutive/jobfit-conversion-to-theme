<ol class="resumes">
    
    <?php 
    
    //Get function to populate the list
    dashboard_loop_resume();
    
    if ($count > 0) {
        
    foreach ($resumes as $resume) {
    
        $resume_id = $resume['resume_id'];
        $name = $resume['first_name']." ".$resume['last_name'];
        $resume_photo = $resume['resume_photo'];
        $location = $resume['location'];
    ?>
    
    <li class="resume">
        <div class="row">
            <div class="column-md-3 col-sm-3 col-xs-12 ">
                <div class="photo">
                    <a href="http://vidhire.net/resumes/4685544fae4564f5b/">
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
                    <strong><a target="_blank" href="#"><?php $name ?></a></strong>             

                    <div class="location">
                        <?php echo $location; ?>                           
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
            </div>
        </div>
        <div class="space"></div>
        <input name="resume_id" type="hidden" value="<?php echo $resume_id?>"/>
    </li>
    <?php 
        
        } //End Resume List Loop
    } else {
    ?>
    <li class="resume">No Applicants for any of your jobs yet</li>
    <?php } ?>
</ol>

