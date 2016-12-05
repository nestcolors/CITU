<?php
if (!defined('ABSPATH')) exit;
class ABVCitu
{
    public $themeDir;
    public $themeUrl;


    /**
     * construct method
     */
    function __construct(){
        $this->themeDir = dirname(__FILE__);
        $this->themeUrl = get_stylesheet_directory_uri();

        add_action('wp_enqueue_scripts', [$this, 'load_style_script']);
        add_action('wp_ajax_abv_ajax', [$this, 'abv_action_ajax_callback']);
        add_action('wp_ajax_nopriv_abv_ajax', [$this, 'abv_action_ajax_callback']);
        add_action('add_meta_boxes', [$this, 'portfolio_add_meta_boxes']);
        add_action( 'save_post', [$this, 'portfolio_save_post_data'] );
        add_action('init', [$this, 'post_type']);
    }

    /**
     *  ajax callback
     */
    function abv_action_ajax_callback(){
        $query_string =  $_POST['query_string'];
        $post_offset = intval( $_POST['count_post'] );
        $nonce = $_POST['nonce'];

        if ( !wp_verify_nonce($nonce, 'abv_ajax_nonce' )) wp_die ( 'Stop!');

        $status = ABVCituWidgets::get_post( $post_offset, $query_string);

        if($status) {
            echo "_aexe5oel_end_of_content_aexe5oel_";
        }
        wp_die();
    }

    /**
     * load style and script
     */
    function load_style_script(){
        global $query_string;
        if($query_string !== 'error=404'){
            wp_localize_script('citu-wp-main', 'abv_ajax',
                array(
                    'url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('abv_ajax_nonce'),
                    'query_string' => $query_string,
                )
            );
        }
    }

    /**
     * create post types
     */
    function post_type(){
        register_post_type('clients',
            array(
                'label' => __('Clients', "citu"),
                'public' => true,
                'show_ui' => true,
                'show_in_nav_menus' => false,
                'menu_position' => 6,

                'menu_icon' => 'dashicons-book-alt',
                'rewrite' => array(
                    'slug' => 'service',
                    'with_front' => FALSE,
                ),
                'supports' => array(
                    'title',
                    'thumbnail',
                    'editor',
                )
            )
        );
    }

    /**
     * create metabox in admin page
     */
    function portfolio_add_meta_boxes(){
        add_meta_box( 'abv_clients_id', __('Clients', "citu"), [(new ABVCituWidgets()), 'clients_meta_callback'], 'clients' );
    }

    /**
     * save post type
     *
     * @param $post_id
     * @return mixed
     */
    function portfolio_save_post_data($post_id) {
        $post_type = get_post_type($post_id);
        if ( $post_type == "clients" ){
            if (!isset($_POST['abv_nonceName']))
                return $post_id;
            // nonce check our page because save_post can be invoked from another place.
            if (!wp_verify_nonce($_POST['abv_nonceName'], $this->themeDir))
                return $post_id;

            // We check to see if auto-save is not doing anything with the data in our forms.
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $post_id;

            // check whether the user is allowed to specify the data
            if ('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }

            if (get_post_type($post_id) == "clients"){
                if(isset($_POST['abv_clients_position_field'])){
                    $services_position = sanitize_text_field( $_POST['abv_clients_position_field'] );
                    update_post_meta($post_id, 'abv_clients_position_meta_value_key', $services_position);
                } else {
                    update_post_meta($post_id, 'abv_clients_position_meta_value_key', '');
                }
            }

        }

    }

}