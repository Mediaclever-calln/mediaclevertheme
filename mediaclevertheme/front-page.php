<?php
/*
Author: Media Clever
Author URI: http://mediaclever.se/
*/
?>
<?php get_header(); ?>


<div class="hero">
    <div class="container">
            <?php if (have_posts()) : while(have_posts()) : the_post();?>

                    <?php the_content();?>
            
            <?php endwhile; endif; ?>
        </div>
</div>


<?php get_footer(); ?>
