<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// prise en charge du logo du site
function custom_logo() {
	add_theme_support('custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	));	
}
add_action('after_setup_theme','custom_logo');

function orion_register_assets() {
    
    // Déclarer style.css à la racine du thème
    wp_enqueue_style( 
        'orion-wp-style',
        get_stylesheet_uri(), 
        array(), 
        '1.0'
    );
  	
       // Déclarer le JS
	wp_enqueue_script( 
        'orion-js', 
        get_template_directory_uri() . '/assets/scripts/main.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );


   	 // Déclarer un autre fichier CSS
		wp_enqueue_style( 
			'orion-main-style', 
			get_template_directory_uri() . '/assets/styles/main.css',
			array(), 
			'1.0'
		);

	  // Seulement sur la page d'accueil
		if( is_front_page() ) {
					
			// Déclarer un autre fichier CSS
			wp_enqueue_style( 
				'orion-front-page-style', 
				get_template_directory_uri() . '/assets/styles/front-page.css', 
				array(), 
				'1.0'
    		);
    	}

	
}
add_action( 'wp_enqueue_scripts', 'orion_register_assets' );



// Menus

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );

// custom background

/* add_theme_support( 'custom-background' );
$args = array(
	'default-image' => '/assets/images/wall.png',
);
add_theme_support( 'custom-background', $args );
 */


 
// custom section bg
add_action( 'customize_register' , 'my_theme_options' );
function my_theme_options( $wp_customize ) {
    $wp_customize->add_section('mytheme_section_bg_img', array(
            'title'       => __( 'Arrière plan par section', 'orion' ),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Select a background image', 'orion'), 
        ) 
    );  

    $wp_customize->add_setting('section_bg_img');

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'section_bg_img', array(
            'label'    => __( 'Background image', 'orion' ), 
            'section'  => 'mytheme_section_bg_img',
            'settings' => 'section_bg_img',
            'priority' => 10,
        ) 
    ));
}





// Déclarer un custom post types
function orion_register_post_types() {
	// La déclaration de nos Custom Post Types et Taxonomies ira ici


        // CPT contact
        $labels = array(
            'name' => 'Footer',
            'all_items' => 'Tous les items',  // affiché dans le sous menu
            'singular_name' => 'Item',
            'add_new_item' => 'Ajouter un item',
            'edit_item' => 'Modifier un item',
            'menu_name' => 'Footer'
        );
    
        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor','thumbnail' ),
            'menu_position' => 5, 
            'menu_icon'   => 'dashicons-admin-customizer',
        );

        register_post_type( 'footer', $args );


    }
add_action( 'init', 'orion_register_post_types' );