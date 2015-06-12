<?php 



if (current_user_can('can_submit_job') || current_user_can('manage_options')) {
    
    get_template_part('jobtc-sidebars/employer','sidebar');
    
} else {
    
    get_template_part('jobtc-sidebars/jobseeker','sidebar');
}
