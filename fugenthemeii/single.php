<?php
/*
 * Will be used to display single post
 */
?>

<?php get_header() ?>
<p>&nbsp;</p>
<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>
        <?php if(has_post_thumbnail()){?>
        <div class="container">
            <div>
                <a class="featured">
                    <?php the_post_thumbnail('home-featured') ?>
                </a>
                <p>&nbsp;</p>
            </div>
            <div>
                <?php 
                /* Allow child themes and plugins to filter the display of the categories in the entry header.
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
                <h2><b><?php the_title() ?></b></h2>
                <p class="post-details">Posted on <?php the_date() ?> at <?php the_time() ?><br>
                By <?php the_author() ?> <?php edit_post_link() ?>
                </p>
                <h5><?php the_content() ?></h5>
            </div>
        </div>
        <p>&nbsp;</p>
        <?php }
        else{?>
        <div class="container">
        <?php 
            /* Allow child themes and plugins to filter the display of the categories in the entry header.
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
            <h2 class="post-title"><b><?php the_title() ?></b></h2>
            <p class="post-details">Posted on <?php the_date() ?> at <?php the_time() ?></p>
            <h5 class="post"><?php the_content() ?>
            </h5>
        </div>
        <p>&nbsp;</p>
    <?php }
endwhile; 
endif;
if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    ?>

    <div class="comments-wrapper section-inner container">

        <?php comments_template(); ?>

    </div><!-- .comments-wrapper -->

    <?php
}
?>


<?php get_footer() ?>