<?php if (!defined('ABSPATH')) exit; ?>
<table>
    <tr>
        <td>
            <?php echo __("Shortcode","abv-gallery") ?>
        </td>
        <td>
            <span style="font-weight: bold"><?php echo $abv_gallery->abv_shortcode_word($galleryForm->ID); ?></span>
        </td>
    </tr>
    <tr>
        <td><label for="abv_gallery_description_field"><?php echo __("Post","abv-gallery") ?></td>
        <td style="width: 100%;"><input type="text" id="abv_gallery_description_field" name="abv_gallery_description_field"
                                        value="<?php echo $gallery_description_field; ?>" style="width: 100%;" >
        </td>
    </tr>
    <tr>
        <td><label for="abv_gallery_position_field"><?php echo __("Position","abv-gallery") ?></td>
        <td style="width: 100%;"><input type="text" id="abv_gallery_position_field" name="abv_gallery_position_field"
                                        value="<?php echo $gallery_position_field; ?>" style="width: 100%;" >
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo __("Images gallery (can be assorted)","abv-gallery") ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="wrap_img_box" style="width: 100%;">
                <?php ABVGalleryWidgets::load_gallery($gallery_images_field); ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <button type="submit" class="upload_image_button button"><?php echo __("Download image","abv-gallery") ?></button>
        </td>
    </tr>
</table>