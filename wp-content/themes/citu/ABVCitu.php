<?php
if (!defined('ABSPATH')) exit;
class ABVCitu
{
    public $themeDir;
    public $themeUrl;
    public $first = false;

    function __construct(){
        $this->themeDir = dirname(__FILE__);
        $this->themeUrl = get_stylesheet_directory_uri();

        // подключаем стили
        add_action('wp_enqueue_scripts', [$this, 'abv_load_style_script']);

        // дозагрузка
        add_action('wp_ajax_abv_ajax', [$this, 'abv_action_ajax_callback']);
        add_action('wp_ajax_nopriv_abv_ajax', [$this, 'abv_action_ajax_callback']);
    }

    function abv_action_ajax_callback(){
        // сколько уже получино
        $query_string =  $_POST['query_string'];
        $post_offset = intval( $_POST['count_post'] );
        $nonce = $_POST['nonce'];

        if ( !wp_verify_nonce($nonce, 'abv_ajax_nonce' )) wp_die ( 'Stop!');

        $status = ABVCituWidgets::get_post( $post_offset, $query_string);

        if($status < get_option('posts_per_page')) {
            echo "_aexe5oel_end_of_content_aexe5oel_";
        }
        wp_die();
    }

    // подключаем стили
    function abv_load_style_script(){
        global $query_string;
        if($query_string !== 'error=404'){
            wp_localize_script('citu-wp-main', 'abv_ajax',
                array(
                    'url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('abv_ajax_nonce'),
                    //'post_count' => get_option('posts_per_page'),
                    'query_string' => $query_string,
                )
            );
        }
    }
}