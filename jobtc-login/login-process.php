<?php

//Get Login Credentials

$username = $_POST['log'];
$password = $_POST['pwd'];
$redirect = get_template_directory_uri().'/index.php';

$creds = array();
$creds['user_login'] = $username;
$creds['user_password'] = $password;
$creds['remember'] = true;
$user = wp_signon($creds, false);
if (is_wp_error($user)) {
    echo $user->get_error_message();
}

wp_redirect($redirect);
exit;

