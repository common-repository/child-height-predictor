<script type="text/javascript">
    function childheight_calculate(type){
	var $ = jQuery;
	var error = false;
	
	var fHeight = parseInt($('#'+type+'father-height').val());
	var mHeight = parseInt($('#'+type+'mother-height').val());
	var units = $("input[name|='"+type+"units']:checked").val();
	var sex = $("input[name|='"+type+"child_sex']:checked").val();

	if (
		!fHeight
		|| !mHeight
		|| fHeight <= 0
		|| mHeight <= 0
	    ){
		    error = true;
	    }

	var childHeight = (fHeight + mHeight)/2;

	var sign = 1;
	if (sex != 'boy'){
	    sign = -1;
	}

	if (units == 'us'){
	    childHeight += sign*2.5;
	    var diff = 4;
	    var unitT = '<?php _e('in', 'childheight_plugin');?>';
	}else{
	    childHeight += sign*6.5;
	    var diff = 10;
	    var unitT = '<?php _e('cm', 'childheight_plugin');?>';
	}

	if (!error){
	    var result1 = "<?php _e("Your child's height will be <strong> {fromH} {units} to {toH} {units} </strong>",'childheight_plugin')?>";
	    result1 = result1.replace("{fromH}", childHeight-diff);
	    result1 = result1.replace("{toH}", childHeight+diff);
	    result1 = result1.replace(new RegExp("{units}",'g'), unitT);

	    var out = '<div class="childheight_table" >'
		    + '<div class="childheight-string1">'+ result1 +'</div>'
		    + '</div>';
	}else{
	    var out = '<div class="childheight_table error" >'
		    + '<?php _e('Please, enter correct values.','childheight_plugin')?>'
		    + '</div>';
	}

	document.getElementById('childheight-'+type+'result').innerHTML = out;
    }
    function changeUnits(type){
	var units = jQuery("input[name|='"+type+"units']:checked").val();

	if (units=='us'){
	    jQuery('span.'+type+'units').text('<?php _e('in', 'childheight_plugin');?>');
	}else{
	    jQuery('span.'+type+'units').text('<?php _e('cm', 'childheight_plugin');?>');
	}
    }
</script>