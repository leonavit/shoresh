<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shoresh
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">    
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'shoresh' ); ?></a>   
<header id="masthead" class="site-header">
    <div id="gridwrapp">
    <!-- short nav -->
    <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'container_class' => 'new_menu_class' ) ); ?>
    <!--site branding-->
    <div class="site-branding">
    <?php
    the_custom_logo();
    if ( is_front_page() && is_home() ) :
    ?>
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php
    else :
    ?>
    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php
    endif;
    $shoresh_description = get_bloginfo( 'description', 'display' );
    if ( $shoresh_description || is_customize_preview() ) :
    ?>
    <p class="site-description"><?php echo $shoresh_description; /* WPCS: xss ok. */ ?></p>
    <?php endif; ?>
    </div><!-- .site-branding -->
    <!-- search form -->
    <section id="social_search">
        <ul>
        <li><i class="icon  ion-logo-facebook"></i> </li>
        <li><i class="icon  ion-logo-pinterest"></i> </li>
        <li><i class="icon  ion-logo-whatsapp"></i> </li>
        </ul>
        <form action="/" method="get">
        <input type="text" placeholder=" <?php esc_html_e('Search...', 'shoresh' ); ?>" name="s" id="search" value="<?php the_search_query(); ?>" />
        <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
        </form>
    </section>
    </div>
      <nav id="site-navigation" class="main-navigation">
       <?php
       wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
       ) );
       ?>
      </nav><!-- #site-navigation -->
</header><!-- #masthead -->

<?php 
    if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
    ?>
    <div id="content" class="site-content">
    <?php 
    if (!wp_is_mobile() && !is_front_page() && is_page() ) {
    shoresh_post_thumbnail();
    } else {
    //none of the page about us, contact or management is in view
    }
?>

<?php 
    if( !wp_is_mobile() && is_front_page()  ) {
    echo "<img src=" . get_theme_mod('first_slide','') .">";
}

    elseif(wp_is_mobile() && is_front_page( )) {
    echo "<img src=" . get_theme_mod('second_slide','') .">";
    }
?>
	<?php 
    if (is_archive()) {
    // Get the current category ID, e.g. if we're on a category archive page
    $category = get_category( get_query_var( 'cat' ) );
    $cat_id = $category->cat_ID;
    // Get the image ID for the category
    $image_id = get_term_meta ( $cat_id, 'category-image-id', true );
    // Echo the image
    echo wp_get_attachment_image ( $image_id, 'large' );
  }
?>
 

