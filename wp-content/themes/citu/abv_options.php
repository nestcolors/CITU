<?php

add_action('admin_menu', 'abv_admin_menu');
add_action('admin_init', 'abv_admin_settings');

function abv_admin_menu(){
    add_options_page(__('Theme Options','citu'), __('Theme Options','citu'), 'manage_options', __FILE__, 'abv_option_page');
}

///////////////////////////налаштування інпутів//////////////////////////////////////

function abv_admin_settings(){


    register_setting('abv_group', 'abv_options_theme');

    add_settings_section('abv_section_id', __('Theme Options','citu'), '', __FILE__);

    /////////////////////////////////

    add_settings_field('abv_setting_phone_id',  __('Phone','citu'), 'abv_theme_phone_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_phone_id'));

    add_settings_field('abv_setting_workweekDays_id', __('Working days a week.','citu'), 'abv_theme_workweekDays_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_workweekDays_id'));

    add_settings_field('abv_setting_email_id',  __('Е-mail','citu'), 'abv_theme_email_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_email_id'));

    add_settings_field('abv_setting_soc_f_id',  __('Facebook','citu'), 'abv_theme_soc_f_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_soc_f_id'));

    add_settings_field('abv_setting_soc_vk_id',  __('Linkedin','citu'), 'abv_theme_soc_vk_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_soc_vk_id'));

    add_settings_field('abv_setting_soc_inst_id',  __('Instagram','citu'), 'abv_theme_soc_inst_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_soc_inst_id'));

    add_settings_field('abv_setting_address_id',  __('Address','citu'), 'abv_theme_address_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_address_id'));



    ///////////////////////////////

/*    add_settings_field('abv_setting_slogan_id', 'Слоган сайту', 'abv_theme_slogan_cb',
        __FILE__, 'abv_section_id', array('label_for' => 'abv_setting_slogan_id'));

    add_settings_field('abv_setting_subtitle_id', 'Підзаголовок сайту в промо', 'abv_theme_subtitle_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_subtitle_id'));

    add_settings_field('abv_setting_soc_vk_id', 'Twitter', 'abv_theme_soc_vk_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_soc_vk_id'));

    add_settings_field('abv_setting_workweekDays_id', 'Робота. Робочі дні тиждня.', 'abv_theme_workweekDays_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_workweekDays_id'));

    add_settings_field('abv_setting_workweekTimes_id', 'Час. Робочі дні тиждня.', 'abv_theme_workweekTimes_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_workweekTimes_id'));

    add_settings_field('abv_setting_weekendDays_id', 'Робота. Вихідні дні тиждня.', 'abv_theme_weekendDays_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_weekendDays_id'));

    add_settings_field('abv_setting_weekendTimes_id', 'Час. Вихідні дні тиждня.', 'abv_theme_weekendTimes_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_weekendTimes_id'));

    add_settings_field('abv_setting_textAction_id', 'Текст про акції', 'abv_theme_textAction_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_textAction_id'));

    add_settings_field('abv_setting_textAbout_id', 'Текст про нас', 'abv_theme_textAbout_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_textAbout_id'));

    add_settings_field('abv_setting_img_id', 'Фото повара', 'abv_theme_img_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_img_id'));

    add_settings_field('abv_setting_cook_id', 'Текст повара', 'abv_theme_cook_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_cook_id'));

    add_settings_field('abv_setting_robot_id', 'Текст для робота', 'abv_theme_robot_cb', __FILE__,
        'abv_section_id', array('label_for' => 'abv_setting_robot_id'));*/
}

//////////////////////вивод інрпутів/////////////////////////////

function abv_theme_cook_cb()
{
    $options = get_option('abv_options_theme');
    ?>

    <textarea name="abv_options_theme[cook]" id="abv_setting_cook_id"
              class="regular-text" cols="40" rows="4"><?php echo esc_attr($options['cook']); ?></textarea>
    <?php
}

function abv_theme_img_cb()
{
    $options = get_option('abv_options_theme');
    $value = $options['img'];
    $default = ABV_THEME_URL . '/images/no_photo.png';
    if( $value ) {
        // получаем данніе о картинке
        $image_attributes = wp_get_attachment_image_src( $value, array(150, 150) );
        $src = $image_attributes[0];
    } else {
        // иначе отдаем пустішку
        $src = $default;
    }
    echo '
	<div>
		<img data-src="' . $default . '" src="' . $src . '" width="150px"  />
		<div>
			<input type="hidden" name="abv_options_theme[img]" id="abv_setting_img_id" value="' . $value . '" />
			<button type="submit" class="upload_image_button button">Завантажити</button>
			<button type="submit" class="remove_image_button button">&times;</button>
		</div>
	</div>
	';
}

function abv_theme_soc_inst_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['soc_inst']) $options['soc_inst'] = maybe_serialize('soc_inst');
    ?>

    <input type="text" name="abv_options_theme[soc_inst]" id="abv_setting_soc_inst_id"
           value="<?php echo esc_attr($options['soc_inst']); ?>" class="regular-text">

    <?php
}

function abv_theme_soc_vk_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['soc_vk']) $options['soc_vk'] = maybe_serialize('soc_vk');
    ?>

    <input type="text" name="abv_options_theme[soc_vk]" id="abv_setting_soc_vk_id"
           value="<?php echo esc_attr($options['soc_vk']); ?>" class="regular-text">

    <?php
}

function abv_theme_soc_f_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['soc_f']) $options['soc_f'] = maybe_serialize('soc_f');
    ?>

    <input type="text" name="abv_options_theme[soc_f]" id="abv_setting_soc_f_id"
           value="<?php echo esc_attr($options['soc_f']); ?>" class="regular-text">

    <?php
}

function abv_theme_slogan_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['slogan']) $options['slogan'] = maybe_serialize('slogan');
    ?>

    <input type="text" name="abv_options_theme[slogan]" id="abv_setting_rand_id"
           value="<?php echo esc_attr($options['slogan']); ?>" class="regular-text">

    <?php
}

function abv_theme_subtitle_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['subtitle']) $options['subtitle'] = maybe_serialize('subtitle');
    ?>

    <input type="text" name="abv_options_theme[subtitle]" id="abv_setting_subtitle_id"
           value="<?php echo esc_attr($options['subtitle']); ?>" class="regular-text">

    <?php
}

function abv_theme_address_cb()
{
    $options = get_option('abv_options_theme');
    if(!$options['address']) $options['address'] = maybe_serialize('address');
    ?>

    <input type="text" name="abv_options_theme[address]" id="abv_setting_address_id"
           value="<?php echo esc_attr($options['address']); ?>" class="regular-text">

    <?php
}

function abv_theme_email_cb()
{
    $options = get_option('abv_options_theme');
    if(!$options['email']) $options['email'] = maybe_serialize('email');
    ?>

    <input type="text" name="abv_options_theme[email]" id="abv_setting_email_id"
           value="<?php echo esc_attr($options['email']); ?>" class="regular-text" pattern="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$">

    <?php
}

function abv_theme_phone_cb()
{
    $options = get_option('abv_options_theme');
    if(!$options['phone']) $options['phone'] = maybe_serialize('phone');
    ?>

    <input type="text" name="abv_options_theme[phone]" id="abv_setting_phone_id"
           value="<?php echo esc_attr($options['phone']); ?>" class="regular-text" >

    <?php
}

function abv_theme_textAction_cb()
{
    $options = get_option('abv_options_theme');
    ?>

    <textarea name="abv_options_theme[textAction]" id="abv_setting_textAction_id"
           class="regular-text" cols="40" rows="4"><?php echo esc_attr($options['textAction']); ?></textarea>
    <?php
}

function abv_theme_textAbout_cb()
{
    $options = get_option('abv_options_theme');
    ?>

    <textarea name="abv_options_theme[textAbout]" id="abv_setting_textAbout_id"
              class="regular-text" cols="40" rows="4"><?php echo esc_attr($options['textAbout']); ?></textarea>
    <?php
}

function abv_theme_robot_cb()
{
    $options = get_option('abv_options_theme');
    ?>

    <textarea name="abv_options_theme[robot]" id="abv_setting_robot_id"
              class="regular-text" cols="40" rows="6"><?php echo esc_attr($options['robot']); ?></textarea>
    <?php
}

function abv_theme_workweekDays_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['workweekDays']) $options['workweekDays'] = maybe_serialize('workweekDays');
    ?>

    <input type="text" name="abv_options_theme[workweekDays]" id="abv_setting_workweekDays_id"
           value="<?php echo esc_attr($options['workweekDays']); ?>" class="regular-text">

    <?php
}

function abv_theme_weekendDays_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['weekendDays']) $options['weekendDays'] = maybe_serialize('weekendDays');
    ?>

    <input type="text" name="abv_options_theme[weekendDays]" id="abv_setting_weekendDays_id"
           value="<?php echo esc_attr($options['weekendDays']); ?>" class="regular-text">

    <?php
}

function abv_theme_workweekTimes_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['workweekTimes']) $options['workweekTimes'] = maybe_serialize('workweekTimes');
    ?>

    <input type="text" name="abv_options_theme[workweekTimes]" id="abv_setting_workweekTimes_id"
           value="<?php echo esc_attr($options['workweekTimes']); ?>" class="regular-text">

    <?php
}

function abv_theme_weekendTimes_cb()
{
    $options = get_option('abv_options_theme');
    if (!$options['weekendTimes']) $options['weekendTimes'] = maybe_serialize('weekendTimes');
    ?>

    <input type="text" name="abv_options_theme[weekendTimes]" id="abv_setting_weekendTimes_id"
           value="<?php echo esc_attr($options['weekendTimes']); ?>" class="regular-text">

    <?php
}


//////////////////////обробка////////////////////////////////////////

function abv_option_page()
{
    ?>

    <div class="wrap">
        <form action="options.php" method="post">
            <?php settings_fields('abv_group'); ?>
            <?php do_settings_sections(__FILE__); ?>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php
}

function abv_theme_options_sanitize($options)
{
    $clean_options = array();
    foreach ($options as $k => $v) {
        $clean_options[$k] = strip_tags($v);
    }
    return $clean_options;
}