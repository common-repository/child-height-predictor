<?php include(dirname(__FILE__) . '/script.php'); ?>
<div class="childheight_shortcode" style="width: <?php echo $width?>; min-height: <?php echo $height?>;">
    <h3 class="childheight-title">
<?php $options = get_option('childheight_plugin'); ?>
	<?php _e('Childheight Calculator', 'childheight_plugin'); ?>
    </h3>
    <div class="childheight-units">
	<span>
	    <?php _e('Units:', 'childheight_plugin')?>
	</span>
	<label for="<?php echo $postTitle?>metric">
	    <input type="radio" name="<?php echo $postTitle?>units" value="metric" id="<?php echo $postTitle?>metric" <?php echo ($units=='metric')?'checked':'';?> onchange="changeUnits('<?php echo $postTitle?>');" />
	    <?php _e("metric", 'childheight_plugin'); ?>
	</label>
	<label for="<?php echo $postTitle?>us">
	    <input type="radio" name="<?php echo $postTitle?>units" value="us" id="<?php echo $postTitle?>us" <?php echo ($units=='us')?'checked':'';?> onchange="changeUnits('<?php echo $postTitle?>');" />
	    <?php _e("us", 'childheight_plugin'); ?>
	</label>
    </div>
    <div class="childheight-parents_height">
	<div id="fathersheight">
	    <label for="<?php echo $postTitle?>father_height">
		<?php _e("Please enter father's height:", 'childheight_plugin') ?>
		<input type="text" id="<?php echo $postTitle?>father-height" name="<?php echo $postTitle?>father-height" />
		<span class="<?php echo $postTitle?>units">
		    <?php
		    if ($units == 'us') {
			_e('in', 'childheight_plugin');
		    } else {
			_e('cm', 'childheight_plugin');
		    }
		    ?>
		</span>
	    </label>
	</div>
	<div id="mothersheight">
	    <label for="<?php echo $postTitle?>mother_height">
		<?php _e("Please enter mother's height:", 'childheight_plugin') ?>
    		<input type="text" id="<?php echo $postTitle?>mother-height" name="<?php echo $postTitle?>mother-height" />
    		<span class="<?php echo $postTitle?>units">
		    <?php
		    if ($units == 'us') {
			_e('in', 'childheight_plugin');
		    } else {
			_e('cm', 'childheight_plugin');
		    }
		    ?>
		</span>
	    </label>
	</div>
    </div>
    <div class="childheight-child_sex">
	<span>
	    <?php _e('Sex of child:', 'childheight_plugin')?>
	</span>
	<label for="<?php echo $postTitle?>boy">
	    <input type="radio" name="<?php echo $postTitle?>child_sex" value="boy" id="<?php echo $postTitle?>boy" checked />
	    <?php _e("boy", 'childheight_plugin'); ?>
	</label>
	<label for="<?php echo $postTitle?>girl">
	    <input type="radio" name="<?php echo $postTitle?>child_sex" value="girl" id="<?php echo $postTitle?>girl" />
	    <?php _e("girl", 'childheight_plugin'); ?>
	</label>
    </div>
    <div class="childheight-button">
	<input type="button" onclick="childheight_calculate('<?php echo $postTitle?>');" value="<?php _e('Calculate', 'childheight_plugin'); ?>" />
    </div>
    <?php if($options['allowlink1'] == 'yes'){?>

    <a href="http://www.ostheimer.at" target="_blank" class="thanku-link">WordPress Plugin by Ostheimer</a>

    <?php }?>

    <div class="childheight-widgrt_result" id="childheight-<?php echo $postTitle; ?>result">

    </div>
</div>
