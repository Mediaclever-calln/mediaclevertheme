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

    <?php $value = get_post_meta( $post->ID, '_subheader_value_key', true ); ?>
    <div class="subheader">
        <div class="insidesub">

        <div class="overheader"><?php the_title(); ?><br><p class="underheader"><?php echo $value ?></p></div>

        <div class="subheader-image">
                <?php echo get_the_post_thumbnail( $post->ID ); ?>
            </div>

            </div>
    </div>
