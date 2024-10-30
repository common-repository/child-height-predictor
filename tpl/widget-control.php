<p style="text-align:right;">
    <?php $options = get_option('childheight_plugin');?>
    <label for="childheight_plugin-width">
	<?php _e('Width:', 'childheight_plugin') ?>
	<input style="width: 200px;" id="childheight_plugin-width" name="childheight_plugin-width" type="text" value="<?php echo $width ?>" />
    </label>
</p>
<p style="text-align:right;">
    <label for="childheight_plugin-height">
	<?php _e('Height:', 'childheight_plugin') ?>
	<input style="width: 200px;" id="childheight_plugin-height" name="childheight_plugin-height" type="text" value="<?php echo $height ?>" />
    </label>
</p>
<p style="text-align:right;">
    <label for="childheight_plugin-allowlink">

	<label>Allow link back to www.ostheimer.at&nbsp;&nbsp;<input name="childheight_plugin-link" type="checkbox"

                                                                   value="yes" <?php echo $options['allowlink1'] == 'yes' ? "checked" : "" ?>/></label>
    </label>
</p>
<input type="hidden" id="childheight_plugin-submit" name="childheight_plugin-submit" value="1" />
