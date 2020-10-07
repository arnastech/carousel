<?php
/**
 * Template Name: template-home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

    <section id="carousel-home">
        <!-- left sidebar to carousel -->
        <div class="left-sidebar">
            <div class="social">
                <img class="facebook" src="<?php echo bloginfo('template_url'); ?>/img/facebook.svg">
                <img class="instagram" src="<?php echo bloginfo('template_url'); ?>/img/instagram.svg">
            </div>
            <div class="app-sidebar">
                <img class="apple" src="<?php echo bloginfo('template_url'); ?>/img/apple.svg">
                <img class="android" src="<?php echo bloginfo('template_url'); ?>/img/android.svg">
                <span class="app-text">get the app </span>
            </div>
        </div>
        <?php 
            echo do_shortcode('[carousel]');
        ?>
    </section>

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

