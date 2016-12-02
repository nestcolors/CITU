<?php
if (!defined('ABSPATH')) exit;

class AbvFunctions
{
    /**
     * get id by post name bu slug
     *
     * @param $page_slug
     * @param $page_type
     * @return null|string
     */
    static function get_id_by_slug($page_slug, $page_type = 'page')
    {
        global $wpdb;
        $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$page_slug' and post_type = '$page_type' and post_status = 'publish'");
        wp_reset_query();
        if ($id) {
            return $id;
        } else {
            return null;
        }
    }

    /**
     * return content from post by slug
     *
     * @param $page_slug
     * @param $page_type
     * @return bool|mixed
     */
    static function get_content_by_slug($page_slug, $page_type = 'page')
    {
        $id = self::get_id_by_slug($page_slug, $page_type);
        if (!$id) return false;
        $post_rnd = get_post($id);
        $the_content_filtered = apply_filters('the_content', $post_rnd->post_content);
        return str_replace(']]>', ']]&gt;', $the_content_filtered);
    }

    /**
     * get content of post by id
     *
     * @param $id
     * @return bool|mixed
     */
    static function get_content_by_id($id){
        $post_rnd = get_post($id);
        if (!$post_rnd) return false;
        $the_content_filtered = apply_filters('the_content', $post_rnd->post_content);
        return str_replace(']]>', ']]&gt;', $the_content_filtered);
    }

    /**
     * get text from post by slug
     *
     * @param $page_slug
     * @param $page_type
     * @return bool|string
     */
    static function get_text_by_slug($page_slug, $page_type = 'page')
    {
        $id = self::get_id_by_slug($page_slug, $page_type);
        if (!$id) return false;
        $post_rnd = get_post($id);
        return $post_rnd->post_content;
    }

    /**
     * get title from post by slug
     *
     * @param $page_slug
     * @param $page_type
     * @return bool|string
     */
    static function get_title_by_slug($page_slug, $page_type = 'page')
    {
        $id = self::get_id_by_slug($page_slug, $page_type);
        if (!$id) return false;
        $post_rnd = get_post($id);
        return $post_rnd->post_title;
    }

    static function last_true_in_array($arr){
        $no = false;
        foreach ($arr as $key=>$val){
            if ($val) $no = $key;
        }
        return $no;
    }

    static function compare_and_join_arr($list_from_save, $post_type){
        $post_types = self::get_id_and_title_from_post_type_in_arr($post_type);
        foreach ($list_from_save as $key_list=>$val_list){
            if (!array_key_exists($key_list,$post_types)){
                unset($list_from_save[$key_list]);
            }
        }
        foreach($post_types as $key_post=>$val_post){
            if(!array_key_exists($key_post,$list_from_save)){
                $list_from_save[$key_post] = 0;
            }
        }

        return $list_from_save;

    }

    static function get_id_and_title_from_post_type_in_arr($post_type){
        $arr = array();
        $args = array(
            'post_type'  => $post_type,
            'orderby' => 'title',
            'order' => 'ASC',
            'nopaging'=>true,
            'post_status'=>'publish',
        );
        $query = new WP_Query( $args );
        while ( $query->have_posts() ) {
            $query->the_post();
            $arr[get_the_ID()] = get_the_title();
        }
        wp_reset_query();
        return $arr;
    }

    /**
     * достает из тега img путь к картинке
     *
     * @param $img
     * @return mixed
     */
    static function get_src_from_img($img){
        if($img){
            preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $img, $result);}
            if (isset($result) and !empty($result)) {
                return array_pop($result);
            }
    }

    /**
     * одтает архив слагов по массиву с айди
     *
     * @param $string
     * @return array
     */
    static function get_slugs_of_posts_by_ides_array($string){
        $arr = array();
        if($string){
            foreach ($string as $item){
                $arr[] = get_post($item)->post_name;
            }
            if(!empty($arr)) return $arr;
        }
    }

    /**
     * отдает уникальние значения пост_мета сортированніе в обратном порядке
     *
     * @param $meta_key
     * @return array|null|object
     */
    static function get_year_portfolio($meta_key){
        global $wpdb;
        $pr = $wpdb->get_blog_prefix();
        $db =$wpdb->get_results("select meta_value
                                from {$pr}postmeta
                                where meta_key = '{$meta_key}'
                                group by meta_value
                                ORDER BY meta_value DESC", 'ARRAY_A');
        wp_reset_query();
        return $db;
    }

    /**
     * добавляет протокол http если остуствует
     *
     * @param $link
     * @return string
     */
    static function add_http($link){
        if (!$link) return $link;
        if (strripos($link,'http://')===false){
            $link = 'http://'.$link;
        }
        return $link;
    }

    /**
     * add protocol to link
     *
     * @param $link
     * @param $protocol
     * @return string
     */
    static function add_protocol_to_link($link,$protocol){
        switch ($protocol){
            case "http" :{
                $link = self::add_http($link);
                break;
            }
            case false :{
                $link = self::add_http($link);
                break;
            }
            case null :{
                $link = self::add_http($link);
                break;
            }
            case "" :{
                $link = self::add_http($link);
                break;
            }
            case "phone":{
                $link = 'callto:'.$link;
                break;
            }
            case "email":{
                $link = 'mailto:'.$link;
                break;
            }
            case "skype":{
                $link = 'skype:'.$link;
                break;
            }
        }

        return $link;
    }

    /**
     * insert br in position
     *
     * @param $str
     * @param $pos
     * @return string
     */
    static function insert_br($str, $pos){
        $first = substr($str,0,$pos);
        $last = substr($str,$pos,-1);
        return $first.'</br>'.$last;
    }

    static function set_pll_link($link){
        if (function_exists('pll_get_post')) {
            $lang = pll_current_language('slug');
            $default = pll_default_language('slug');
            if($lang !== $default ){
                $link = '/'.$lang.$link.'-'.$lang;
            }
            return $link;
        }
    }

    static function parse_query_string($str){
        $res = [];
        $arr = explode('&', $str);
        foreach($arr as $item){
            $res[explode('=',$item)[0]] = explode('=',$item)[1];
        }
        return $res;
    }
}

