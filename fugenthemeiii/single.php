<?php
/*
 * Will be used to display single post
 */
?>

<?php get_header() ?>
<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>
            <div class="container">
                <div align="center"><p>&nbsp;</p>
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
                    <h1 class="post-title"><b><?php the_title() ?></b></h1>
                    <p class="post-details"><i class="fa fa-calendar" style="padding-right:5px; color:#00d258;" aria-hidden="true"></i><?php echo get_the_date() ?> at <?php the_time() ?><br>
                    <i class="fa fa-anchor" style="padding-right:5px; color:#00d258;" aria-hidden="true"></i> <?php the_author() ?> <?php edit_post_link() ?>
                    </p>
                    <a class="featured">
                        <?php the_post_thumbnail('home-featured') ?>
                    </a>
                </div>
                <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8" align="center">
                    <h5 class="post"><?php the_content() ?></h5>
                    <p>&nbsp;</p>
                </div>
                <div class="col-lg-2"></div>
                </div>
            </div>
            <?php 
            }
    endwhile; 
endif;

if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    ?>
<div class="row comment-frame">
<div class="col-lg-2  col-1"></div>
<div class="col-lg-8 col-11">
    <div class="comments-wrapper section-inner container">

        <?php comments_template(); ?>

    </div><!-- .comments-wrapper -->
        </div>
    <div class="col-lg-2"></div>
    </div>
</div>

    <?php
}
?>


<?php get_footer() ?>