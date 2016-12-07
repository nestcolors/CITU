<?php
if (!defined('ABSPATH')) exit;
class ABVCituWidgets
{
    /**
     * get category list without link
     *
     * @param $id
     * @return string
     */
    static function get_category_list($id){
        $html = '';
        foreach( get_the_category($id) as $category ){
            $html .=  $category->cat_name . '&';
        }
        $html = substr($html, 0, -1);
        return $html;
    }

    /**
     * show slider
     *
     * @param int $count
     */
    static function show_slider($count = 5, $post=false){
        $cat = array();
        $args = array();
        if($post){
            foreach(get_the_category( $post->ID ) as $item){
                $cat[] = $item->term_id;;
            }
            $args['category__in'] = $cat;
            $args['post__not_in'] = array($post->ID);
        }

        $args['post_type'] = 'post';
        $args['posts_per_page'] = $count;
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';

        $query = new WP_Query( $args );
        if ($query->found_posts){

            foreach($query->posts as $item){
                include('template-parts'.DIRECTORY_SEPARATOR.'citu-slider-item.php');
            }
        }
        wp_reset_postdata();
    }

    /**
     * get except by symbool count
     *
     * @param $id
     * @param $count
     * @return string
     */
    static function get_short_content($id, $count){
        $post = get_post($id);
        if (count($post->post_content)<= $count){
            $short = substr($post->post_content, 0, $count). '...';
            return $short;
        }
        return $post->post_content;
    }


    /**
     * show categories
     */
    static function show_category(){
        $args = array(
            'type'         => 'post',
            'child_of'     => 0,
            'parent'       => '',
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 1,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'taxonomy'     => 'category',
            'pad_counts'   => false,
        );
        $categories = get_categories( $args );
        if( $categories ){
            foreach( $categories as $cat ){
                include('template-parts'.DIRECTORY_SEPARATOR.'citu-categories.php');
            }
        }
    }

    /**
     * get posts
     *
     * @param int $offset
     * @param $query_string
     * @return bool
     */
    static function get_post($offset=5, $query_string){

        $query_arr = AbvFunctions::parse_query_string($query_string);

        $args = array();
        $args['post_type'] = 'post';
        $args['posts_per_page'] = 10;
        $args['offset'] = $offset;
        $args['lang'] = pll_current_language();

        foreach($query_arr as $key => $val){
            $args[$key] = $val;
        }

        $query = new WP_Query( $args );

        if ($query->found_posts){
            foreach($query->posts as $item){
                include('template-parts'.DIRECTORY_SEPARATOR.'citu-post-small.php');
            }
        }
        wp_reset_postdata();
        if ($query->post_count < 10 or $offset + $query->post_count == $query->found_posts ){
            return true;
        }
        return false;
    }

    /**
     * meta callback
     * @param $cituForm
     */
    function clients_meta_callback($cituForm){
        global $abv_citu;
        wp_nonce_field($abv_citu->themeDir, 'abv_nonceName');

        $clients_position_field = esc_html(
            get_post_meta($cituForm->ID, 'abv_clients_position_meta_value_key', true));

        include('template-parts'.DIRECTORY_SEPARATOR.'citu-clients-metabox.php');
    }

    /**
     * show filter indicator
     *
     * @return mixed
     */
    static function filter_indicator(){
        if(isset($_SERVER['REDIRECT_QUERY_STRING'])){
            $get = $_SERVER['REDIRECT_QUERY_STRING'];
        } else {
            $get = 'kj4hc23k4hkl3j4y2ui4h23lk4';
        }


        $arr_string = array('orderby=name&order=DESC','orderby=name&order=ASC','orderby=date&order=DESC','orderby=date&order=ASC');
        $arr_name = array(__('name A-Z','citu'),__('name Z-A','citu'),__('date new first','citu'),__('date old first','citu'));
        for($n=0; $n<=count($arr_string)-1; $n++){
            if ($get === $arr_string[$n]){
                return '<h3>'.__('sort by/show only','citu') .' <i>'.$arr_name[$n].'</i>'.
                '<a style="color:red" href="'.AbvFunctions::set_pll_link('/magazine') .'">  X</a>'.
                '</h3>';
            }
        }

        $args = array(
            'type'         => 'post',
            'child_of'     => 0,
            'parent'       => '',
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 1,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'taxonomy'     => 'category',
            'pad_counts'   => false,
        );
        $categories = get_categories( $args );
        foreach ($categories as $item){
            if(strpos($get, $item->slug)!==false){
                return '<h3>'.__('sort by/show only','citu') .' <i>'.$item->name.'</i>'.
                '<a style="color:red" href="'.AbvFunctions::set_pll_link('/magazine') .'">  X</a>'.
                '</h3><hr>';
            }
        }

    }
}
