<?php
/*
 * Will be used to call header
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head() ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php bloginfo('url') ?>">
                <?php the_custom_logo() ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'container' => 'ul',
                        'menu_class'=> 'navbar-nav ml-auto'))
                ?>
            </div>
        </div>
    <div class="cta-fixed">
        <a class="nav-link" href="<?php echo get_permalink(get_theme_mod('lwp-footer-callout-link')) ?>">
            <button class="btn btn-lg navbar-button">
                <?php echo wpautop(get_theme_mod('lwp-footer-callout-headline')) ?>
            </button>
        </a>
    </div>
    </nav>
