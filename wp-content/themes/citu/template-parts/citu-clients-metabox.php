<?php if (!defined('ABSPATH')) exit; ?>
<table>
    <tr>
        <td style="width: 30%;"><label for="abv_clients_position_field"><?php echo __("Position","citu") ?></td>
        <td style="width: 70%;">
            <input type="text" id="abv_clients_position_field" name="abv_clients_position_field"
                   value="<?php echo $clients_position_field; ?>" style="width: 100%;" >
        </td>
    </tr>
</table>