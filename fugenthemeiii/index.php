<?php
/*
* This is our first theme
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
                            <hr>
                            <?php
                        }
                        ?>
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
                                <a href ="<?php the_permalink() ?>" class="fimg">
                                    <?php the_post_thumbnail('home-featured') ?>
                                </a>
                            </div>
                            <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8" align="center">
                                <h5 class="post"><?php the_excerpt() ?></h5>
                                <div class="row">
                                <div class="col-6" align="right">
                                    <a class="blue-btn-2" type="button" onclick="window.location.href = '<?php the_permalink() ?>'" style="color:white;">Read...</a>
                            </div>
                                    <?php if (get_comments_number() > 1 ){ ?>
                                <div class="col-6" align="left">
                                        <a class="blue-btn-2" type="button" onclick="window.location.href = '<?php comments_link() ?>'" style="color:white;"><?php echo get_comments_number() ?> Comments</a>
                            </div>
                                    <?php }
                                    else if(get_comments_number() <= 1){
                                    ?>
                                    <div class="col-6" align="left">
                                        <a class="blue-btn-2" type="button" onclick="window.location.href = '<?php comments_link() ?>'" style="color:white;"><?php echo get_comments_number() ?> Comment</a>
                            </div>
                                    <?php    
                                    }
                                    ?>
                                </div>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-lg-2"></div>
                            </div>
                        </div>
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