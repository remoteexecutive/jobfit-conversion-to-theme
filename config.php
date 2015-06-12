<?php

/* 
 * For PHP include statements
 */

//Directories
define('DIR_BASE',dirname( __FILE__ ) . '/');
define('DIR_HEADER',DIR_BASE.'/jobtc-headers');
define('DIR_FOOTER',DIR_BASE.'/jobtc-footers');
define('DIR_MENUS',DIR_BASE.'/jobtc-menus');
define('DIR_SIDEBAR',DIR_BASE.'/jobtc-sidebars');
define('DIR_RESUME',DIR_BASE.'/jobtc-resume');
define('DIR_EMPLOYER_DASHBOARD',DIR_BASE.'/jobtc-dashboards');
define('DIR_JOBSEEKER_DASHBOARD',DIR_BASE.'/jobtc-dashboards');

//Views
define('VIEW_MENU',   DIR_MENUS . '/default-menu.php');
define('VIEW_HEADER',   DIR_HEADER . '/header.php');
define('VIEW_JOB_HEADER',   DIR_HEADER . '/job-header.php');
define('VIEW_SINGLE_RESUME', DIR_RESUME.'/dashboard-single-resume.php');

define('VIEW_EMPLOYER_DASHBOARD',DIR_EMPLOYER_DASHBOARD.'/employer-dashboard.php');
define('VIEW_JOBSEEKER_DASHBOARD',DIR_JOBSEEKER_DASHBOARD.'/jobseeker-dashboard.php');

define('VIEW_EMPLOYER_SIDEBAR',   DIR_SIDEBAR . '/employer-sidebar.php');
define('VIEW_SIDEBAR', DIR_SIDEBAR.'/sidebar.php');
define('VIEW_FOOTER',   DIR_FOOTER . '/footer.php');

