<?php
/**
 * shoresh Theme Catalog type posts
 * if createe archive-catalog.php (from archive.php) - all-posts will be displayed on archive-catalog.php
 * if createe single-catalog.php (from single.php) - a post will be displayed on single-catalog.php
 * @package shoresh
 */

/********************************************************************************/
/*********************** Register Custom Post Type - food ***********************/
function catalog_post_type() {
	$labels = array(
		//'name'                  => _x( 'Products', 'Post Type General Name', 'shoresh' ), // the title in admin edit page
		//'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'shoresh' ), // one item of the type
		'name'                  => __( 'Products', 'shoresh' ), // the title in admin edit page
		'singular_name'         => __( 'Product', 'shoresh' ), // one item of the type
		'menu_name'             => __( 'Catalog', 'shoresh' ), // the title in admin side bar (Posts __(פוסטים))
		'name_admin_bar'        => __( 'Catalog Product', 'shoresh' ),
		'archives'              => __( 'Product Archives', 'shoresh' ),
		'attributes'            => __( 'Product Attributes', 'shoresh' ),
		'parent_item_colon'     => __( 'Parent Product:', 'shoresh' ),
		'all_items'             => __( 'All Products', 'shoresh' ), // a sub-title in admin side bar (All Posts __(כל הפוסטים))
		'add_new_item'          => __( 'Add New ', 'shoresh' ),
		'add_new'               => __( 'Add New Product', 'shoresh' ), // a sub-title in admin side bar (Add New __(פוסט חדש))
		'new_item'              => __( 'New Product', 'shoresh' ),
		'edit_item'             => __( 'Edit Product', 'shoresh' ),
		'update_item'           => __( 'Update Product', 'shoresh' ),
		'view_item'             => __( 'View Product', 'shoresh' ),
		'view_items'            => __( 'View Products', 'shoresh' ),
		'search_items'          => __( 'Search Product', 'shoresh' ),
		'not_found'             => __( 'Not found', 'shoresh' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'shoresh' ),
		'use_featured_image'    => __( 'Use as featured image', 'shoresh' ),
		'insert_into_item'      => __( 'Insert into item', 'shoresh' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'shoresh' ),
		'items_list'            => __( 'Products list', 'shoresh' ),
		'items_list_navigation' => __( 'Products list navigation', 'shoresh' ),
		'filter_items_list'     => __( 'Filter items list', 'shoresh' ),
	);
	$args = array(
		'label'                 => __( 'Catalog', 'shoresh' ), // equivalent to 'Posts' / 'Pages'
		'description'           => __( 'A seperate section only for procucts', 'shoresh' ), // תיאור קצר על סוג התוכן, מה הוא עושה ומדוע אנחנו משתמשים בו.
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ), // מגדיר במה יתמוך סוג התוכן שיצרתם, לדוגמא כותרת, תקציר, תגובות, גירסאות וכו׳…
		'taxonomies'            => array( 'product_categories', 'product_tags' ),
		'hierarchical'          => false,
		'public'                => true,	// קובע האם ניתן יהיה לבצע שאילתא (query) לטקסונומיה.
		'show_ui'               => true,	// האם וורדפרס תציג את אזור הניהול של אותה טקסונומיה [ היכן שמנהלים את המונחים (terms) ] בלוח הבקרה.
		'query_var'				=> $post_type,
		'show_in_menu'          => true,
		'menu_position'         => 5,		// מיקום התפריט בלוח הבקרה של וורדפרס (ברירת המחדל היא מתחת לתפריט תגובות).
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,	// האם האלמנטים ניתנים לבחירה באזור התפריטים של וורדפרס
		'can_export'            => true,
		'has_archive'           => true,	// מאפשר להציג ארכיון (archive) לסוג תוכן זה.
		'exclude_from_search'   => false,	// יגדיר האם סוג התוכן יופיע בתוצאות החיפוש כשיתבצע חיפוש באתר.
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
        'menu_icon'				=> 'dashicons-store',
	);
	register_post_type( 'catalog', $args );

}
add_action( 'init', 'catalog_post_type', 0 );


/**
 * Register Taxonomy
 */
function catalog_taxonomy() {  
	$taxonomies = array(
		array(
			'slug'         => 'product_categories',
			'single_name'  => esc_html__( 'Product Category', shoresh ),
			'plural_name'  => esc_html__( 'Product Categories', shoresh ),
			'post_type'    => 'catalog',
			'rewrite'      => array( 'slug' => 'product_categories' ),
		),
		array(
			'slug'         => 'product_tags',
			'single_name'  => esc_html__( 'Product Tag', shoresh ),
			'plural_name'  => esc_html__( 'Product Tags', shoresh ),
			'post_type'    => 'catalog',
			'rewrite'      => array( 'slug' => 'product_tags' ),
		),
	);
	
	foreach( $taxonomies as $taxonomy ) {
		$labels = array(
			'name'					=> $taxonomy['plural_name'],
			'singular_name'			=> $taxonomy['single_name'],
			'search_items'			=> esc_html__( 'Search ', shoresh ) . $taxonomy['plural_name'],
			'all_items'				=> esc_html__( 'All ', shoresh ) . $taxonomy['plural_name'],
			'parent_item'			=> esc_html__( 'Parent ', shoresh ) . $taxonomy['single_name'],
			'parent_item_colon'		=> esc_html__( 'Parent ', shoresh ) . $taxonomy['single_name'] . ':',
			'edit_item'				=> esc_html__( 'Edit ', shoresh ) . $taxonomy['single_name'],
			'update_item'			=> esc_html__( 'Update ', shoresh ) . $taxonomy['single_name'],
			'add_new_item'			=> esc_html__( 'Add New ', shoresh ) . $taxonomy['single_name'], // כפתור כחול להוספה בתוך האדמין של קטגוריות מוצרים וגם הטקסט כותרת לזה מלמעלה
			'new_item_name'			=> esc_html__( 'New', shoresh ) . ' ' . $taxonomy['single_name'] . esc_html__( 'Name', shoresh ),
			'menu_name'				=> $taxonomy['plural_name']
		);

		$rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
		$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;

		// register_taxonomy($taxonomy, $object_type, $args)
		register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
			'hierarchical'	=> $hierarchical,
			'labels'		=> $labels,
			'show_ui'		=> true,
			'query_var'		=> true,
			'rewrite'		=> $rewrite,
			'show_admin_column'   => true,
		));
	}
}
add_action( 'init', 'catalog_taxonomy' );

/**
 * default taxonomy product category: 'shop'
 */
function default_product_term( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'product_categories' => array( esc_html__('shop', 'shoresh') ), 
		);
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'default_product_term', 100, 2 );



/**************************************************************************************************/
/**************************************************************************************************/


