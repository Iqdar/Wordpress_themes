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
</head>


<section class="jumbotron jambo">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php the_custom_logo() ?></a>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'container' => 'ul',
                        'menu_class'=> 'navbar-nav ml-auto'))
                ?>
          </nav>
    </div>
</section>
