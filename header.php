<?php if (is_user_logged_in()) { ?>
<nav class="navbar-jobtc">
    <div class="container-fluid">

        <?php
        $pages = array(
        'theme_location' => 'jobfit',
        'menu' => 'jobfit',
        'menu_class' => 'nav nav-pills navbar-left',
        'menu_id' => 'menu-top',
        'echo' => true,
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth' => 0,
        'walker' => new wp_bootstrap_navwalker()
        );

        wp_nav_menu($pages);
        ?>
        <div class="divider"></div>
        <?php if (current_user_can('can_submit_job') || current_user_can('manage_options')) { ?>

        <ul class="nav nav-pills navbar-right">
            <?php if (current_user_can('manage_options')) { ?>
            <li><a href="<?php echo admin_url(); ?>">Admin</a></li>
            <?php } ?>
            <li><a href="<?php echo home_url(); ?>">Dashboard</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
        </ul>    

        <?php } else { ?>

        <ul class="nav nav-pills navbar-right">
            <li><a href="<?php echo home_url(); ?>">Dashboard</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
        </ul>    

        <?php } ?>

    </div><!-- end inner -->
</div><!-- end inner -->

</nav>
<?php } ?>

<div id="header">
    <div class="inner">

        <div class="logo_wrap">

            <?php if ( get_theme_mod( 'jobfit_logo' ) ) { ?>
            <div id="logo">
                <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'jobfit_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
            </div>
            <?php } else { ?>
            <h1 id="logo">
                <a href="http://vidhire.net"><img class="logo" src="//vidhire.net/wp-content/uploads/2015/03/vidhire-logo4.png" alt="VidHire"></a>
            </h1>
            <?php } ?>
            <div class="clear"></div>

        </div><!-- end logo_wrap -->

    </div><!-- end inner -->

</div>