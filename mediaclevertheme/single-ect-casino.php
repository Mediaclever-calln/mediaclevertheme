<?php 
/*
Author: Media Clever
Author URI: http://mediaclever.se/
Template Name: Review page layout
Template Post Type: ect-casino
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
    
    
    <?php $value = get_post_meta( $post->ID, '_subheader_value_key', true ); 
    $thumbnail = get_the_post_thumbnail( $post->ID );
    $thetitle = get_the_title($post->ID);
    $col2first = get_post_meta($post->ID, 'ect-column2', true);
    $col2follow = get_post_meta($post->ID, 'ect-column2-follow', true);
    $afflink = get_bloginfo('url') .'/go/'. get_post_meta($post->ID, 'ect-outgoing-slug', true);
    $tclink = get_bloginfo('url') .'/tc/'. get_post_meta($postid, 'ect-outgoing-slug', true);
    $col3 = get_post_meta( $post->ID, 'ect-column3', true );
    ?>
    <div class="tableheadermobile">
        <?php
        echo '<div class="tablewrapper-review"><div class="ectcel-review"><table class="ecttable-review" class="ecttable"><tbody class="ecttbody"><tr><td class="ectimg">' . $thumbnail . '</td>';
		echo '<td class="ectcol1" id="col1ect"><span class="col1start">' . $thetitle. '</span></td>';
		echo '<td class="ectcol2" id="col2ecthaha"><span class="col2start" id="col1ect">' . $col2first  . '</span><br><span class="col2follow" id="col2follow-review">'.$col2follow.'<span></td>';
		echo '<td class="ectlink" id="linkect"><a rel="nofollow" target="_blank" href="'. $afflink  .'/ ">'.get_option('ect_settings_input_visitbutton').'</a></td></tr></tbody></table>';
		echo '<div class="ectinfobox" id="ectinfobox-review"><a class="tclink" rel="nofollow" target="_blank" href="'. $tclink.'/ ">'.get_option('ect_settings_input_tclink').'</a>  |  <span class="ectinfotext">' . $col3 . '</span></div></div></div>';
        
        ?>
    </div>
<div class="hero">
<div class="container">
    <?php if (have_posts()) : while(have_posts()) : the_post();?>

            <?php the_content();?>
    
    <?php endwhile; endif; ?>
</div>
</div>


<?php get_footer(); ?>