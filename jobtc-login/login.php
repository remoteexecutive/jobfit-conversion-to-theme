<div class="login-container row">
    <div class="col-md-6">
        <label class="login-form-header">Login</label>

        <?php get_template_part('jobtc-login/login', 'form'); ?>
    </div>
    <div class="col-md-6">
        <label class="login-form-header">Register</label>

        <?php
        complete_registration_function();
        ?>

    </div>
</div><!-- end section_header -->