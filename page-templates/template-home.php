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
<!-- data-ride="carousel" -->
        <div id="carousel-main" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-12 col-sm-7 col-md-8 col-lg-8">
                        <h2 class="slide-number">01</h2>
                        <span class="title">First slide label</span>
                        <p class="description">Lorem Ipsum is simply dummy text of the printing</p>
                    </div>
                    <div class="col-12 col-sm-5 col-md-4 col-lg-4 image">
                        <img class="slide-image" src="<?php echo bloginfo('template_url'); ?>/img/phone.png" class="d-block" alt="text">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-12 col-sm-7 col-md-8 col-lg-8">
                        <h2 class="slide-number">02</h2>
                        <span class="title">Second slide label</span>
                        <p class="description">Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                    <div class="col-12 col-sm-5 col-md-4 col-lg-4 image">
                        <img class="slide-image" src="<?php echo bloginfo('template_url'); ?>/img/phone.png" class="d-block w-25" alt="text">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
            <div class="row">
                    <div class="col-12 col-sm-7 col-md-8 col-lg-8">
                        <h2 class="slide-number">03</h2>
                        <span class="title">Third slide label</span>
                        <p class="description">When an unknown printer took a galley of type and scrambled</p>
                    </div>
                    <div class="col-12 col-sm-5 col-md-4 col-lg-4 image">
                        <img class="slide-image" src="<?php echo bloginfo('template_url'); ?>/img/phone.png" class="d-block w-25" alt="text">
                    </div>
                </div>
            </div>
            </div>
            <div class="carousel-controls">
                <a class="left carousel-control-prev " href="#carousel-main" role="button" data-slide="prev">
                    <img class="prev-img" src="<?php echo bloginfo('template_url'); ?>/img/arrow.png">
                </a>
                <a class="right carousel-control-next" href="#carousel-main" role="button" data-slide="next">
                    <img class="next-img" src="<?php echo bloginfo('template_url'); ?>/img/arrow.png">
                </a>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-main" class="active" data-slide-to="0" class=""><span class="indicator-number">01</span></li>
                <li data-target="#carousel-main" class="" data-slide-to="1"><span class="indicator-number">02</span></li>
                <li data-target="#carousel-main" class="" data-slide-to="2"><span class="indicator-number">03</span></li>
            </ol>
        </div>
        
    </section>

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

