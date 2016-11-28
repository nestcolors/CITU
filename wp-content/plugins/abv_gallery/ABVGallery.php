<?php
if (!defined('ABSPATH')) exit;
class ABVGallery
{
    public $plugin_dir;
    public $plugin_url;
    
    function __construct(){
        $this->plugin_dir = dirname( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        // опции
        //$this->settings();
        add_action('admin_init', [$this, 'settings']);
        // add language
        add_action('after_setup_theme', array($this, 'addLanguage'));
        // подключаем стили
        add_action('wp_enqueue_scripts', [$this, 'abv_load_style_script']);
        // инит темы
        add_action('init', [$this, 'abv_create_gallery']);
        // создаем метабокс
        add_action('add_meta_boxes', [$this, 'abv_gallery_add_meta_boxes']);
        // сохранение поста
        add_action( 'save_post', [$this, 'abv_gallery_save_post_data'] );
        //подключение стилей в админке
        add_action( 'admin_enqueue_scripts', [$this, 'abv_include_image_js'] );
        // поключим шоты
        add_shortcode('abv_gallery', [(new ABVGalleryWidgets()), 'abv_gallery_shortcode']);
        // изменяем список постов
        add_filter('manage_posts_columns', [$this, 'posts_columns_id'], 5);
        add_action('manage_posts_custom_column', [$this, 'posts_custom_id_columns'], 5, 2);

    }

    /**
     * add transcription to plugin
     */
    function addLanguage()
    {
        load_plugin_textdomain('abv-gallery', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    //подключение стилей в админке
    function abv_include_image_js() {

        if ( ! did_action( 'wp_enqueue_media' ) ) {
            wp_enqueue_media();
        }

        wp_enqueue_script( 'gallery_jquery-ui', $this->plugin_url . 'js/jquery-ui.min.js', array('jquery'), null, false );
        wp_enqueue_script( 'abv_gallery_image_admin', $this->plugin_url . 'js/abv_image_admin.js', array('jquery'), null, false );
        wp_enqueue_style('gallery_jquery-ui.min', $this->plugin_url . 'css/jquery-ui.min.css');
        wp_enqueue_style('abv_gallery_admin', $this->plugin_url . 'css/admin.css');
    }

// подключаем стили
    function abv_load_style_script(){
        wp_register_script('abv_gallery_jquery', $this->plugin_url . "js/jquery-1.11.1.min.js",false,false);
        wp_enqueue_script('abv_gallery_jquery');

        if (get_option('abv_gallery_owl_stetting')){
            wp_register_script('gallery_owl-carousel-min', $this->plugin_url . "js/owl.carousel.min.js",false,false,true);
            wp_enqueue_script('gallery_owl-carousel-min');
            wp_enqueue_style('gallery_owl.carousel', $this->plugin_url.'css/owl.carousel.min.css');
        }

        if (get_option('abv_gallery_slick_stetting')){
            wp_register_script('gallery_slick-carousel-min', $this->plugin_url . "js/slick.min.js",false,false,true);
            wp_enqueue_script('gallery_slick-carousel-min');
            wp_enqueue_style('gallery_slick.carousel', $this->plugin_url.'css/slick.css');
        }

        wp_register_script('abv_gallery_common', $this->plugin_url . "js/common.js",false,false,true);
        wp_enqueue_script('abv_gallery_common');


        wp_enqueue_style('abv_gallery_styles', $this->plugin_url . 'css/styles.css');
    }

// создаем пост тайп
    function abv_create_gallery() {
        register_post_type('gallery',
            array(
                'labels' => array(
                    'name' => __('Gallery','abv-gallery'),
                    'singular_name' => __('Gallery','abv-gallery'),
                    'add_new' => __('Add gallery','abv-gallery'),
                    'add_new_item' => __('Add new gallery','abv-gallery'),
                    'edit' => __('Edit','abv-gallery'),
                    'edit_item' => __('Edit gallery','abv-gallery'),
                    'new_item' => __('New Gallery','abv-gallery'),
                    'view' => __('View','abv-gallery'),
                    'view_item' => __('View gallery','abv-gallery'),
                    'search_items' => __('Search gallery','abv-gallery'),
                    'not_found' => __('Gallery not found','abv-gallery'),
                    'not_found_in_trash' => __('Gallery not found in trash','abv-gallery'),
                    'parent' => __('Parent Gallery','abv-gallery')
                ),
                'public' => true,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'menu_position' => 16,
                'supports' => array('title','editor','thumbnail'),
                'taxonomies' => array(''),
                'menu_icon' => 'dashicons-admin-users',
                'has_archive' => true
            )
        );
    }

// создаем метабокс админки
    function abv_gallery_add_meta_boxes(){
        add_meta_box( 'abv_gallery_id', 'Gallery', [(new ABVGalleryWidgets()), 'abv_gallery_meta_callback'], 'gallery' );
    }



// сохрянем gallery
    function abv_gallery_save_post_data($post_id) {
        if (get_post_type($post_id) == "gallery"){
            if (!isset($_POST['abv_nonceName']))
                return $post_id;
            // проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
            if (!wp_verify_nonce($_POST['abv_nonceName'], $this->plugin_dir))
                return $post_id;

            // проверяем, если это автосохранение ничего не делаем с данными нашей формы.
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $post_id;

            // проверяем разрешено ли пользователю указывать эти данные
            if ('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }

            update_post_meta($post_id, 'abv_gallery_description_meta_value_key', '');
            update_post_meta($post_id, 'abv_gallery_images_meta_value_key', '');

            if(isset($_POST['abv_img'])){
                $images= '';
                foreach($_POST['abv_img'] as $item){
                    $images .= $item.',';
                }
                $images = substr($images, 0, -1);
                update_post_meta($post_id, 'abv_gallery_images_meta_value_key', $images);
            }

            if(isset($_POST['abv_gallery_description_field'])){
                $description = sanitize_text_field( $_POST['abv_gallery_description_field'] );
                update_post_meta($post_id, 'abv_gallery_description_meta_value_key', $description);
            }
            if(isset($_POST['abv_gallery_position_field'])){
                $position = sanitize_text_field( $_POST['abv_gallery_position_field'] );
                update_post_meta($post_id, 'abv_gallery_position_meta_value_key', $position);
            }
        }

    }

// изменяем заголовок списка галерей
    function posts_columns_id($defaults){
        if(!isset($_GET['post_type'])) return $defaults;
        if($_GET['post_type'] == 'gallery'){
            unset($defaults['date']);
            $defaults['abv_post_id'] = __('ID');
            $defaults['abv_gallery_shortcode'] = __('Шорткод');
            return $defaults;
        }
        return $defaults;
    }

// выводим значения списка галерей
    function posts_custom_id_columns($column_name, $id){
        if($column_name === 'abv_post_id'){
            echo $id;
        }
        if($column_name === 'abv_gallery_shortcode'){
            echo $this->abv_shortcode_word($id);
        }
    }
// генерирует шорткодстринг
    function abv_shortcode_word($id){
        $str =  '[abv_gallery id="'.$id.'"]';
        return $str;
    }

    function settings(){
        register_setting('general', 'abv_gallery_owl_stetting');
        register_setting('general', 'abv_gallery_slick_stetting');
        add_settings_field('abv_gallery_owl_stetting', __('Connect owl slider','abv-gallery'), array($this,'save_option_owl_cb'), 'general');
        add_settings_field('abv_gallery_slick_stetting', __('Connect slick slider','abv-gallery'), array($this,'save_option_slick_cb'), 'general');
    }
    function save_option_owl_cb(){
        ?>
        <input type="checkbox" name="abv_gallery_owl_stetting" id="abv_gallery_owl_stetting"
               value="1" <?php checked( '1', get_option( 'abv_gallery_owl_stetting' ) ); ?>>
        <?php
    }
    function save_option_slick_cb(){
        ?>
        <input type="checkbox" name="abv_gallery_slick_stetting" id="abv_gallery_slick_stetting"
               value="1" <?php checked( '1', get_option( 'abv_gallery_slick_stetting' ) ); ?>>
        <?php
    }
}