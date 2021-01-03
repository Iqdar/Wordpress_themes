<?php
/*
 * Will be used to display single page
 */
get_header();
?>
<?php
    while (have_posts() ) : the_post(); 
        the_content();
    endwhile; 
?>
<?php
    get_footer();
?>