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

    static function show_slider($count = 5){
        $args = array();

        $args['post_type'] = 'post';
        $args['posts_per_page'] = $count;
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';

        $query = new WP_Query( $args );
        if ($query->found_posts){

            foreach($query->posts as $item){
                include('template-parts'.DIRECTORY_SEPARATOR.'citu-slider-item.php');
            }
        }
        wp_reset_postdata();
    }

    static function get_short_content($id, $count){
        $post = get_post($id);
        if (count($post->post_content)<= $count){
            $short = substr($post->post_content, 0, $count). '...';
            return $short;
        }
        return $post->post_content;
    }
}