<?php
require_once 'library/enqueue-scripts.php';

// ======= Register Advanced Custom Fields (ACF) =======
    function uthsc_get_acf($field_name, $post_id, $before, $after)
            {
                return get_field($field_name, $post_id) ? $before . get_field($field_name, $post_id) . $after : '';
            }
// =(end)= Register Advanced Custom Fields (ACF) ========


// ======= offices function =======
function cptui_register_my_cpts_offices() {

    /**
     * Post Type: Offices.
     */

    $labels = array(
        "name" => __( "Offices", "emerald-wp-child" ),
        "singular_name" => __( "Office", "emerald-wp-child" ),
        "all_items" => __( "Offices", "emerald-wp-child" ),
    );

    $args = array(
        "label" => __( "Offices", "emerald-wp-child" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => "offices",
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "offices", "with_front" => true ),
        "query_var" => true,
        "menu_icon" => "http://emerald-wp-care.multisite.uthsc.edu/wp-content/uploads/sites/25/2017/08/offices.png",
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "offices", $args );
}

add_action( 'init', 'cptui_register_my_cpts_offices' );

// =(end)= offices function =======

// ======= offices shortcode function =======
function offices_shortcode_function($atts)
{
    $offices_query = null;
    $output = '';
    $output .= '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-6 fmc-gallery-with-captions"> test html';
    $args = [
        'orderby'        => 'meta_value',               // Or post by custom field
        'meta_key'       => 'webpage_link', // By which custom field
        'order'          => 'ASC',                      // Ascending or Descending
        'post_type'      => 'offices',               // Just the post type
        'posts_per_page' => - 1                         // Show all available post
    ];

    // The Query
    $offices_query = new WP_Query($args);
    if ($offices_query->have_posts()) {
        while ($offices_query->have_posts()) : $offices_query->the_post();
            ob_start();
            get_template_part('content', get_post_type());
            $output .= ob_get_clean();
        endwhile;
        $output .= '</ul>';
    }

    return $output;
}

add_shortcode('offices', 'offices_shortcode_function');
// =(end)= offices shortcode function =======

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyDrTxR-KtWbAX4BmI6ph7mrjHRmURS0Yu8';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

?>
