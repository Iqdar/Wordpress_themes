<?php
/*
* This is our first theme
*/
get_header();
?>

<?php
get_template_part('template-parts/home','featured')
?>

<div id="course" class="offset">
    <div class="col-md-12 narrow">
        <div class="row my-5">
            <div class="box">
                <?php 
                if ( have_posts() ) : 
                    while ( have_posts() ) : the_post(); ?>
                        <p>&nbsp;</p>
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
                        <?php if(has_post_thumbnail()){?>
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-6 order-md-12 order-sm-1 order-xs-1">
                                <a href ="<?php the_permalink() ?>" class="featured">
                                    <?php the_post_thumbnail('home-featured') ?>
                                </a>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6 order-md-1 order-sm-12 order-xs-12">
                                <h2><?php the_title() ?></h2>
                                <p>Posted on <?php the_date() ?> at <?php the_time() ?></p>
                                <h5><?php the_excerpt() ?></h5>
                                <div class="row">
                                    <button type="button" onclick="window.location.href = '<?php the_permalink() ?>'" class="postButton">Read...</button>
                                    <?php if (get_comments_number() > 1 ){ ?>
                                        <button type="button" onclick="window.location.href = '<?php comments_link() ?>'" class="postButton"><?php echo get_comments_number() ?> Comments</button>
                                    <?php }
                                    else if(get_comments_number() <= 1){
                                    ?>
                                        <button type="button" onclick="window.location.href = '<?php comments_link() ?>'" class="postButton"><?php echo get_comments_number() ?> Comment</button>
                                    <?php    
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php }
                        else{?>
                        <h2><?php the_title() ?></h2>
                        <p>Posted on <?php the_date() ?> at <?php the_time() ?></p>
                        <h5><?php the_excerpt() ?>
                        </h5>
                        <div class="row">
                            <button type="button" onclick="window.location.href = '<?php the_permalink() ?>'" class="postButton">Read...</button>
                            <?php if (get_comments_number() > 1 ){ ?>
                                <button type="button" onclick="window.location.href = '<?php comments_link() ?>'" class="postButton"><?php echo get_comments_number() ?> Comments</button>
                            <?php }
                            else if(get_comments_number() <= 1){
                            ?>
                                <button type="button" onclick="window.location.href = '<?php comments_link() ?>'" class="postButton"><?php echo get_comments_number() ?> Comment</button>
                            <?php    
                            }
                            ?>
                        </div>
                        <p>&nbsp;</p>
                        <hr>
                    <?php }
                endwhile; 
                endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<div>
<?php
get_template_part('template-parts/dynamic-gallery');
?>
</div>
<div>
<?php
get_template_part('template-parts/swiper');
?>
</div>
<?php
get_footer();
?>