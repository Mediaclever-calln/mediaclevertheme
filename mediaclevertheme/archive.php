<?php
/*
Author: Media Clever
Author URI: http://mediaclever.se/
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
    <body>

    <div class="page-wrapper">
        <div class="mainmenucont">
	<div class="menu-container">

    <div class="logoText">
        <?php if ( has_custom_logo() ) {
            the_custom_logo();
        }else{
            ?><h2 class="headerText"><a href="<?php echo esc_url( home_url('/')); ?>"> <?php bloginfo( 'name' ); ?></a></h2><?php
        } 
        
        ?>
    </div>
    <div class="nav-collaps">
    
       
        <?php wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu' => 'main-menu',
                'container' => 'ul',
                'menu_class' => 'navigation',
            )
        )?>


    </div>
     <div class="topnav" id="myTopnav">
        <div class="dropdown">
        <button class="dropbtn"><span class="dashicons dashicons-menu-alt3"></span>
      <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <?php wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu' => 'main-menu',
                'container' => 'ul',
                'menu_class' => 'dropdown-content',
            )
        )?>
            </div>
        </div> 
        </div>
    </div>
    </div>
    
    <?php $our_title = get_the_title( get_option('page_for_posts', true) ); ?>
    <div class="subheader">
        <div class="insidesub">
        
        <p class="overheader"><?php echo $our_title; ?></p>
            
            </div>
    </div>
    
<div class="hero">
    <div class="container">
    <?php if (have_posts()) : while(have_posts()) : the_post();?>
        <div class="blog-post">
            <div class="archive-date">
                <?php echo get_the_date('j').'<br>'.get_the_date('M'); ?>
            </div>
            <div class="blogcontent">
            <a class="archive-alink" href="<?php echo esc_url( get_permalink() )?>"><?php the_title();?></a>
            <div class="excerpttext">
            <?php $excerpt = get_the_excerpt() ?>
            <?php echo $excerpt; ?>
            </div>
            </div>
        </div>
    
    <?php endwhile; endif; ?>
    <div class="linksarchive">
    <?php
        global $wp_query;
        
        $big = 999999999; // need an unlikely integer
        $translated = __( '', 'ecttheme' ); // Supply translatable string
        
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
                'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
        ) );
?>
</div>
</div>
</div>


<?php get_footer(); ?>