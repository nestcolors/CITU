<?php
if (!defined('ABSPATH')) exit;
class ABVCitu
{
    public $themeDir;
    public $themeUrl;

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
        $post_offset = intval( $_POST['post_count'] );
        $nonce = $_POST['nonce'];

        if ( !wp_verify_nonce($nonce, 'abv_ajax_nonce' )) wp_die ( 'Stop!');

        $status = ABVCituWidgets::get_post(false, $post_offset);

        if($status < get_option('posts_per_page')) {
            echo "_aexe5oel_end_of_content_aexe5oel_";
        }
        wp_die();
    }

    // подключаем стили
    function abv_load_style_script(){
        wp_localize_script('globarch-main', 'abv_ajax',
            array(
                'url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('abv_ajax_nonce'),
                'post_count' => get_option('posts_per_page'),
            )
        );
    }
}