<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoresh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php shoresh_post_thumbnail(); ?>
	<header class="entry-header entry-header-catalog">
    <?php
    if ( is_singular() ) :
    the_title( '<h1 class="entry-title">', '</h1>' );
    else :
    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

    endif;

    if ( 'post' === get_post_type() ) :
    ?>
    <div class="entry-meta">
    <?php
    shoresh_posted_on();
    shoresh_posted_by();
    ?>
    </div><!-- .entry-meta -->
    <?php endif; ?>
      
    <?php 
   $meta = get_post_meta( get_the_ID(), 'price' ) ; 
    if( !empty($meta) ) {
    echo '<span class="catalog_price">'.$meta[0].'</span>';
    }
    ?>
</header><!-- .entry-header -->


<div class="entry-content">
    <!-- Show Excerpt on pages that arent single --> 
    <?php
    if ( !is_single() ){
    the_excerpt();
         
        printf( '<a class="rmore rmorec" href="%s">%s</a>',
                esc_url( get_permalink() ),
                __( 'Read more', 'shoresh' )
        );
    }
    ?>
    <!-- Show the full content --> 
    <?php
    if ( is_single() ){
    the_content( sprintf(
    wp_kses(
    /* translators: %s: Name of current post. Only visible to screen readers */
    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shoresh' ),
    array(
    'span' => array(
    'class' => array(),
    ),
    )
    ),
    get_the_title()
    ) );
    }
    wp_link_pages( array(
    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shoresh' ),
    'after'  => '</div>',
    ) );
    ?>
</div><!-- .entry-content -->

<footer class="entry-footer">
</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->


