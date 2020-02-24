<?php
/**
 * Template Name: Home Page
 * @package WordPress
 * @since 20/01/2019
 */
__( 'Home Page', 'shoresh' );

get_header();
?>
 
<div id="primary" class="content-area no-sidebar">
    <section id="guenberg_content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </section>
    <main id="main" class="site-main">
        <?php
        // Query random posts
        $the_query = new WP_Query( array(
            'post_type'      => 'post',
            'orderby'        => 'rand',
            'posts_per_page' => 6,
        ) ); ?>

        <?php
        // If we have posts lets show them
        if ( $the_query->have_posts() ) : ?>
        <?php
        // Loop through the posts

        while ( $the_query->have_posts() ) : $the_query->the_post();  ?>  
        <article> 
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  <?php shoresh_post_thumbnail(); ?></a> 
            <?php the_category();?> 
            <h2><?php the_title(); ?></h2>
            <div class="entry-meta">
                <?php
                shoresh_posted_on();
                shoresh_posted_by();
                ?>
            </div><!-- .entry-meta -->
            <?php
                the_excerpt();
                printf( '<a class="rmore" href="%s">%s</a>',
                esc_url( get_permalink() ),
                __( 'Read Full Article', 'shoresh' )
                );
            ?>
        </article>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        
        <!--Recent Catlog Products-->
        <?php
            $new_loop = new WP_Query( array(
            'post_type' => 'catalog',
            'orderby'        => 'rand',
            'posts_per_page' => 3 // put number of posts that you'd like to display
            ) );
        ?>

        <?php if ( $new_loop->have_posts() ) : ?>
        <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
        <article> 
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  <?php shoresh_post_thumbnail(); ?></a> 
            <header class="entry-header entry-header-catalog">
                 <h3> <?php the_title(); ?></h3>
                <?php 
               $meta = get_post_meta( get_the_ID(), 'price' ) ; 
                if( !empty($meta) ) {
                echo '<span class="catalog_price">'.$meta[0].'</span>';
                }
                ?>
            </header>
        </article>
        <?php endwhile;?>
        <?php else: ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
       <!--End Recent Catalog Products-->

    </main><!-- #main -->
    
</div><!-- #primary -->

<?php
get_footer();
