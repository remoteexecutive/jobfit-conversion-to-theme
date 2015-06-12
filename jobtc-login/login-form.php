<form action="<?php echo wp_login_url(); ?>" method="post" class="account_form" id="login-form">

    <p>
        <label for="login_username">Username</label><br/>
        <input type="text" class="text required" name="log" tabindex="1" id="login_username" value="" />
    </p>

    <p>
        <label for="login_password">Password</label><br/>
        <input type="password" class="text required" name="pwd" tabindex="2" id="login_password" value="" />
    </p>

    <p>
        <input type="checkbox" name="rememberme" class="checkbox" tabindex="3" id="rememberme" value="forever" checked="checked"/>
        <label for="rememberme">Remember me</label>
    </p>

    <p>
        <input type="hidden" name="redirect_to" value="" />
        <input type="submit" class="submit" name="login" tabindex="4" value="Login &rarr;" />
        <a class="lostpass" href="" title="Password Lost and Found">Lost your password?</a>
    </p>
</form>