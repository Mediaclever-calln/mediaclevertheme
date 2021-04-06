<?php
/*
Author: Media Clever
Author URI: http://mediaclever.se/
*/
?>
<?php
$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );
$has_sidebar_4 = is_active_sidebar( 'sidebar-4' );

if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3 || $has_sidebar_4) { ?>

    <div class="footer-container">

        <?php if ( $has_sidebar_1 ) { ?>

            <div class="col">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>

        <?php } ?>

        <?php if ( $has_sidebar_2 ) { ?>

            <div class="col">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>

        <?php } ?>

        <?php if ( $has_sidebar_3 ) { ?>

            <div class="col">
                <?php dynamic_sidebar( 'sidebar-3' ); ?>
            </div>

        <?php } ?>

        <?php if ( $has_sidebar_4 ) { ?>

            <div class="col">
                <?php dynamic_sidebar( 'sidebar-4' ); ?>
            </div>

<?php }} ?>
</div>