<?php if (isset($_POST['childheight_update']) ):?>
<div class="updated">
    <p>
	<strong>
	    <?php _e('Options saved.', 'childheight_plugin'); ?>
	</strong>
    </p>
</div>
<?php endif;?>
<div class="wrap">
    <h2>
	<?php _e('Child height plugin Options', 'childheight_plugin') ?>
        </h2>
        <form name="form1" method="post" action="">
    	<input type="hidden" name="childheight_update" value="1" />

    	<div>
	    <?php _e("Units system:", 'childheight_plugin'); ?>
    	</div>
	<div>
	    <label for="metric">
		<input type="radio" name="units" value="metric" id="metric" checked />
		<?php _e("metric", 'childheight_plugin'); ?>
	    </label>
	    <label for="us">
		<input type="radio" name="units" value="us" id="us" <?php echo ($options['units']=='us')?'checked':'';?> />
		<?php _e("us", 'childheight_plugin'); ?>
	    </label>
	</div>



        <div style="padding-top: 10px; padding-bottom: 10px;"><label>Allow link back to www.ostheimer.at&nbsp;&nbsp;<input name="allowLink" type="checkbox"

                                                                   value="yes" <?php echo $options['allowLink'] == 'yes' ? "checked" : "" ?>/></label>
        </div>
         
        
        
	<hr />

    	<div class="submit">
    	    <input type="submit" name="Submit" value="<?php _e('Update Options', 'childheight_plugin') ?>" />
	</div>
    </form>
</div>