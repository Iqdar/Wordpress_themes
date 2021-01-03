<?php
/*
 * Will be used to display single archive
 */
get_header();
?>
<div id="course" class="offset container">
    <div class="col-md-12 narrow">
        <div class="row my-5">
            <div class="box container">
                <?php 
                $i = 0;
                if ( have_posts() ) : 
                    while ( have_posts() ) : the_post(); 
                        if($i>0){
                            ?>
                            <hr class="theme-separator">
                            <?php
                        }
                        ?>
                        <?php if(has_post_thumbnail()){?>
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-6 order-md-12 order-sm-1 order-xs-1">
                                <p>&nbsp;</p>
                                <a href ="<?php the_permalink() ?>" class="featured fimg">
                                    <?php the_post_thumbnail('home-featured') ?>
                                </a>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-6 order-md-1 order-sm-12 order-xs-12 post-box">
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
                                <h2 class="post-title"><b><?php the_title() ?></b></h2>
                                <p class="post-details">Posted on <?php echo get_the_date() ?> at <?php the_time() ?><br>
                                By <?php the_author() ?> <?php edit_post_link() ?>
                                </p>
                                <h5 class="post"><?php the_excerpt() ?></h5>
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
                            </div>
                        </div>
                        <?php }
                        else{?>
                        <p>&nbsp;</p>
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
                        <p class="post-details">Posted on <?php echo get_the_date() ?> at <?php the_time() ?><br>
                        By <?php the_author() ?> <?php edit_post_link() ?>
                        </p>
                        <h5 class="post"><?php the_excerpt() ?>
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
                    <?php }
                    $i = $i+1;
                endwhile; 
                endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<div>

<?php
    get_footer();
?>