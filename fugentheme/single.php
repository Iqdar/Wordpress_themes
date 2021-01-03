<?php
/*
 * Will be used to display single post
 */
?>

<?php get_header() ?>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>
    <div class="container">
    
    <?php /**
         * Allow child themes and plugins to filter the display of the categories in the entry header.
         *
         * @since 1.0.0
         *
         * @param bool   Whether to show the categories in header, Default true.
         */
    $show_categories = apply_filters( 'twentytwenty_show_categories_in_entry_header', true );

    if ( true === $show_categories && has_category() ) {
        ?>

        <div class="entry-categories">
            <div class="entry-categories-inner">
            <h4 class="category"><?php the_category( ' ' ); ?></h4>
            </div><!-- .entry-categories-inner -->
        </div><!-- .entry-categories -->

        <?php
    } ?>
    </div>
        <?php if(has_post_thumbnail()){?>
        <div class="container">
            <div>
                <a class="featured">
                    <?php the_post_thumbnail('home-featured') ?>
                </a>
                <p>&nbsp;</p>
            </div>
            <div>
                <h2><?php the_title() ?></h2>
                <p>Posted on <?php the_date() ?> at <?php the_time() ?></p>
                <h5><?php the_content() ?></h5>
            </div>
        </div>
        <p>&nbsp;</p>
        <?php }
        else{?>
        <div class="container">
            <h2><?php the_title() ?></h2>
            <p>Posted on <?php the_date() ?> at <?php the_time() ?></p>
            <h5><?php the_content() ?>
            </h5>
        </div>
        <p>&nbsp;</p>
    <?php }
endwhile; 
endif;
if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    ?>
<div class = "container">
    <div class="comments-wrapper section-inner">

        <?php comments_template(); ?>

    </div><!-- .comments-wrapper -->
</div>
    <?php
}
?>

<?php get_footer() ?>