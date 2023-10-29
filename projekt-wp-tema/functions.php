<?php function add_custom_styles() {
    wp_enqueue_style('main-stylesheet', get_template_directory_uri() . '/main.css');
}

add_action('wp_enqueue_scripts', 'add_custom_styles'); 

function create_custom_post_type() {
    register_post_type('puff',
        array(
            'labels' => array(
                'name' => __('Puffar'),
                'singular_name' => __('Puff')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'puff'),
        )
    );
}
add_action('init', 'create_custom_post_type');

// Lägg till stöd för anpassade menyer
function register_my_menus() {
    register_nav_menus(
        array(
            'main-nav' => __('Huvudmeny'),
        )
    );
}
add_action('init', 'register_my_menus');

function theme_setup() {
    // Lägg till stöd för utvalda bilder (thumbnails)
    add_theme_support('post-thumbnails');
    
    // Registrera en anpassad meny
    register_nav_menus(array(
        'main-nav' => 'Huvudmeny',
    ));
}
add_action('after_setup_theme', 'theme_setup');

// widgets
function register_custom_widget_area() {
    register_sidebar(array(
        'name' => 'Anpassat Widget-Område',
        'id' => 'custom-widget-area',
        'description' => 'Detta är vårt anpassade widget-område.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'register_custom_widget_area');

//template
function custom_page_template($template) {
    if (is_page('boenden')) { 
        $template = get_template_directory() . '/page-boenden.php'; 
    }
    return $template;
}
add_filter('page_template', 'custom_page_template');

// Skapa en anpassad inläggstyp för Aktiviteter
function create_activity_post_type() {
    register_post_type('aktiviteter',
        array(
            'labels' => array(
                'name' => __('Aktiviteter'),
                'singular_name' => __('Aktivitet')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'aktiviteter'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_activity_post_type');

// Skapa en anpassad inläggstyp för prislistan
function create_price_list_post_type() {
    register_post_type('price_list',
        array(
            'labels' => array(
                'name' => __('Prislista'),
                'singular_name' => __('Prislista')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'price_list'),
        )
    );
}
add_action('init', 'create_price_list_post_type');

function custom_featured_image_size() {
    add_image_size('custom-thumbnail-size', 200, 200, true);
}
add_action('after_setup_theme', 'custom_featured_image_size');

function big_featured_image_size() {
    add_image_size('big-thumbnail-size', 400, 200, true);
}
add_action('after_setup_theme', 'big_featured_image_size');

function custom_employee_post_type() {
    $labels = array(
        'name' => 'Medarbetare',
        'singular_name' => 'Medarbetare',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessman', 
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('employee', $args);
}

add_action('init', 'custom_employee_post_type');

function custom_sidebar_widgets() {
    register_sidebar(array(
        'name'          => 'Sidebar Widget Area',
        'id'            => 'sidebar-widget',
        'description'   => 'This is the sidebar widget area.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'custom_sidebar_widgets');

?>


