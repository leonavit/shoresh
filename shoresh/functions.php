<?php
/**
 * shoresh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shoresh
 */

if ( ! function_exists( 'shoresh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shoresh_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shoresh, use a find and replace
		 * to change 'shoresh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shoresh', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shoresh' ),
			'menu-2' => esc_html__( 'Secondary', 'shoresh' ),
            
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shoresh_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'shoresh_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shoresh_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shoresh_content_width', 640 );
}
add_action( 'after_setup_theme', 'shoresh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shoresh_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shoresh' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shoresh' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    
    
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'shoresh' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shoresh' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
}

add_action( 'widgets_init', 'shoresh_widgets_init' );

/**/



/**
 * Enqueue scripts and styles.
 */
function shoresh_styles() {
wp_enqueue_style( 'shoresh-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'shoresh_styles' );
/***********************************/
function shoresh_scripts() {
//wp_enqueue_script( 'shoresh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
wp_enqueue_script( 'shoresh-custjs', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );
wp_enqueue_script( 'shoresh-sliknav', get_template_directory_uri() . '/slick/jquery.slicknav.js', array(), '20151215', true );    
wp_enqueue_script( 'shoresh-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shoresh_scripts' );
/***********************************/

function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Monda|Russo+One&display=swap', false );}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/**/

/**/
//* Enqueue Ionicons
add_action( 'wp_enqueue_scripts', 'shoresh_enqueue_ionicons' );
function shoresh_enqueue_ionicons() {
  wp_enqueue_style( 'ionicons', 'https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css', array(), CHILD_THEME_VERSION );
}
/**/
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

//-------------> Catalog additions
require get_template_directory() . '/inc/catalog.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

        function widget($args, $instance) {

                if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number )
                $number = 5;
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent posts.
             */
            $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );

            if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            <ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li style="list-style: none;">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large','style=max-width:100%;height:auto;' ); ?></a>
                    <a href="<?php the_permalink(); ?>"><span id="recent_txt_block"><h3><?php get_the_title() ? the_title() : the_ID();  ?></h3></span> </a>
                 <?php if ( $show_date ) : ?>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                <?php endif; ?>
                </li>
            <?php endwhile; ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

            endif;
        }
}
//recent posts widget
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

//Extra design styles to the customizer
//General Colors Section
function tcx_register_theme_customizer( $wp_customize ) {
    
    $wp_customize->add_setting(
        'tcx_link_color',
        array(
            'default'     => '#19305c'
        )
 
    );
    
    $wp_customize->add_setting(
        'tcx_link_color_menu',
        array(
            'default'     => '#ffffff'
        )
 
    );
    
    $wp_customize->add_setting(
        'tcx_link_color_menu_hover',
        array(
            'default'     => '#00b9eb'
        )
 
    );
    
    $wp_customize->add_setting(
        'tcx_menu_background',
        array(
            'default'     => '#000000',
            'transport'   => 'postMessage'
        )
 
    );
    
    $wp_customize->add_setting(
        'tcx_footer_background',
        array(
            'default'     => '#171f2d'
        )
 
    );
    
    $wp_customize->add_setting(
    'tcx_header_background',
    array(
        'default'     => '#ffffff'
    )

    );
    
    $wp_customize->add_setting(
    'tcx_goto_background',
    array(
        'default'     => '#171f2d'
    )

    );
    
    $wp_customize->add_setting(
    'tcx_gotohover_background',
    array(
        'default'     => '#49c7ed'
    )

    );
    
    //End array
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Link Color','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_link_color'
            )
 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color_menu',
            array(
                'label'      => __( 'Link Color Menu','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_link_color_menu'
            )
 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color_menu_hover',
            array(
                'label'      => __( 'Link Color Menu Hover','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_link_color_menu_hover'
            )
 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_background',
            array(
                'label'      => __( 'Menu Background','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_menu_background'
               
            )
 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background',
            array(
                'label'      => __( 'Footer Background','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_footer_background',
                'transport' => 'refresh'
            )
 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_background',
            array(
                'label'      => __( 'Header Background','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_header_background',
                'transport' => 'refresh'
            )
 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'goto_background',
            array(
                'label'      => __( 'Go to top','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_goto_background',
                'transport' => 'refresh'
            )
 
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'gotohover_background',
            array(
                'label'      => __( 'Go to top Hover','shoresh', 'tcx' ),
                'section'    => 'colors',
                'settings'   => 'tcx_gotohover_background',
                'transport' => 'refresh'
            )
 
        )
    );

}

add_action( 'customize_register', 'themename_customize_register' );

////

function themename_customize_register($wp_customize) {  
    ///Add New Slider Section To Customizr
    $wp_customize->add_section( 'slides', array(
        'title'          => __('Main Image On Home','shoresh'),
        'priority'       => 25,
    ) );
    
    $wp_customize->add_setting( 'first_slide', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'first_slide', array(
        'label'   => 'Pc Image',
        'section' => 'slides',
        'settings'   => 'first_slide',

    ) ) );

    $wp_customize->add_setting( 'second_slide', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'second_slide', array(
        'label'   => 'Mobile Image',
        'section' => 'slides',
        'settings'   => 'second_slide',
    ) ) );
    
    ///
    
    ///Add New Footer Section To Customizr
    $wp_customize->add_section( 'footer_copy', array(
        'title'          => __('Footer copy','shoresh'),
        'priority'       => 200,
    ) );
    ///
    
    //FOOTER TXT field
    $wp_customize->add_setting( 'shoresh_footer_text', array(
      'capability' => 'edit_theme_options',
      'default' => 'Copyright © 2019',
      'sanitize_callback' => 'sanitize_text_field',
        'settings'   => 'footer',
    ) );

    $wp_customize->add_control( 'shoresh_footer_text', array(
      'type' => 'text',
      'section' => 'footer_copy', 
      'label' => __( 'Custom Text' ),
      'description' => __( 'This is a custom text box.' ),
       
    ) );
    ///End FOOTER TXT

}
add_action( 'customize_register', 'tcx_register_theme_customizer' );

///



function tcx_customizer_css() {
    ?>
    <style type="text/css">
         a { color: <?php echo get_theme_mod( 'tcx_link_color','#171f2d' ); ?>; }
        .site-branding { background-color: <?php echo get_theme_mod( 'tcx_header_background','#ffffff' ); ?>; }
        .gototop {background-color: <?php echo get_theme_mod( 'tcx_goto_background','#171f2d' ); ?>; }
        .gototop:hover{ background-color: <?php echo get_theme_mod( 'tcx_gotohover_background','#49c7ed' ); ?>; }
        .main-navigation a { color: <?php echo get_theme_mod( 'tcx_link_color_menu','#ffffff' ); ?>; }
        .main-navigation li a:hover, .main-navigation li.current-menu-item a, .main-navigation ul ul .current-menu-item a { color: <?php echo get_theme_mod( 'tcx_link_color_menu_hover','#00b9eb' ); ?>; }
        .main-navigation { background-color: <?php echo get_theme_mod( 'tcx_menu_background','#000' ); ?>; }
        .fullwrapp { background-color: <?php echo get_theme_mod( 'tcx_footer_background','#171f2d' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'tcx_customizer_css' );
//End - General a link on site

//Breadcrumbs

/*
 * WordPress Breadcrumbs
 * author: Dimox
 * version: 2019.03.03
 * license: MIT
*/
function dimox_breadcrumbs() {
	/* === OPTIONS === */
	$text['home']     = __('Home','shoresh'); // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page
	$text['page']     = 'Page %s'; // text 'Page N'
	$text['cpage']    = 'Comment Page %s'; // text 'Comment Page N'
	$wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"> <div class="mautowrapp"> '; // the opening wrapper tag
	$wrap_after     = '</div> </div><!-- .breadcrumbs -->'; // the closing wrapper tag
	$sep            = '<span class="breadcrumbs__separator"> › </span>'; // separator between crumbs
	$before         = '<span class="breadcrumbs__current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_current   = 1; // 1 - show current page title, 0 - don't show
	$show_last_sep  = 1; // 1 - show last separator, when current page title is not displayed, 0 - don't show
	/* === END OF OPTIONS === */
	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );
	if ( is_home() || is_front_page() ) {
		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;
	} else {
		$position = 0;
		echo $wrap_before;
		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}
		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}
		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}
		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;
		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $sep . $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) echo $sep . $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				}
			}
		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;
		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}
		echo $wrap_after;
	}
} // end of dimox_breadcrumbs()
//End Breadcrumbs

//View Counts on single posts
 function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.="<span>👁</span>";
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// End view counts







 
 



