<?php
/*
 * Will be used to call header
 */
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <?php wp_head() ?>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="practise.html"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/white-logo.png"></a>
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
        </nav>