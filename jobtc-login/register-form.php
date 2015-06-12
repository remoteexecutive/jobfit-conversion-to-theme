<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="account_form" name="registerform" id="register-form">
    <div class="account_form_fields">

        <p>
            <label for="user_login">Username</label><br/>
            <input type="text" class="text" tabindex="8" name="username" id="user_login" value="<?php isset($_POST['username']) ? $username : null ?>" />
        </p>

        <p>
            <label for="first_name">First Name</label><br/>
            <input type="text" class="text" tabindex="9" name="first_name" id="first_name" value="<?php isset($_POST['first_name']) ? $first_name : null ?>" />
        </p>
        
        <p>
            <label for="last_name">Last Name</label><br/>
            <input type="text" class="text" tabindex="10" name="last_name" id="last_name" value="<?php isset($_POST['last_name']) ? $last_name : null ?>" />
        </p>

        <p>
            <label for="user_email">Email</label><br/>
            <input type="text" class="text" tabindex="11" name="email" id="user_email" value="<?php isset($_POST['email']) ? $email : null ?>" />
        </p>

        <p>
            <label for="your_password">Enter a password</label><br/>
            <input type="password" class="text" tabindex="12" name="password" id="pass1" value="<?php isset($_POST['password']) ? $password : null ?>" />
        </p>

        <p>
            <label for="your_password_2">Enter password again</label><br/>
            <input type="password" class="text" tabindex="13" name="confirm_password" id="pass2" value="<?php isset($_POST['password']) ? $password : null ?>" />
        </p>
        
        <p>
            <input type="submit" class="submit" tabindex="14" name="submit" value="Register &rarr;" />
        </p>
    </div>
</form>
