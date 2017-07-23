<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Third Way Investment Partners - Lead the way</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?=bloginfo('template_directory')?>/images/favicon.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/bootstrap.min.css">
    
    <!-- Reset CSS -->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/common.css">
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/normalize.css">
    
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    
    <!--font awesome-->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/font-awesome.min.css">
    
    <!--animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/nice-select.css">
    
    <!-- slick-slider CSS -->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/slick.slider.css">
    
    <!-- menuZord CSS -->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/menuzord.css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/style.css">
    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?=bloginfo('template_directory')?>/css/responsive.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Start Main Menu -->
    <nav id="top-nav" class="oneNav transition navbar custom-navbar navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 large-device">
            <!-- NAVBAR HEADER -->
            <div class="navbar-header menu transition">
              <!-- lOGO TEXT HERE -->
              <a href="<?=bloginfo()?>" class="navbar-brand logo logo-landing"><img src="<?=bloginfo('template_directory')?>/images/thirdway-logo.svg" /></a> 
              <a href="<?=bloginfo()?>" class="navbar-brand logo logo-fixed"><img src="<?=bloginfo('template_directory')?>/images/thirdway-logo.svg" /></a><span>&nbsp;&nbsp;&nbsp; | LEAD THE WAY.</span>
            </div>
          </div>
          <div class="col-lg-8">
            <div id="menuzord" class="menuzord pull-right">

              <div class="small-device navbar-header menu transition" id="menu">
                <!-- lOGO TEXT HERE -->
                <a href="#" class="navbar-brand logo"><img src="<?=bloginfo('template_directory')?>/images/thirdway-footer-logo.svg" /></a>
              </div>
            <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
          
          
              <?php if ( has_nav_menu( 'primary' ) ) : ?>
             
                <?php
                  wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'menuzord-menu menuzord-indented scrollable" style="max-height: 400px; display: block;',
                   ) );
                ?>
           
              <?php endif; ?>

            <?php endif; ?>
   
            </div>
          </div>
          <!--/col-md-8-->
        </div>
        <!--/row-->
      </div>
    </nav>
    <!-- End Main Menu -->
