<?php
/*
  Plugin Name: Child Height Predictor
  Plugin URI: http://www.ostheimer.at/wordpress-plugins/baby-height-predictor/
  Description: This plugin predicts the possible height of a baby.
  Author: Andreas Ostheimer
  Version: 1.3
  Author URI: http://www.ostheimer.at 
 */

class ChildheightPlugin {

    function init() {

	// load all l10n string upon entry
	load_plugin_textdomain('childheight_plugin', dirname(__FILE__), 'childheight');

	// let WP know of this plugin's widget view entry
	wp_register_sidebar_widget('childheight_plugin', __('Childheight Calculator', 'childheight_plugin'), array($this, 'widget'));

	// let WP know of this widget's controller entry
	wp_register_widget_control('childheight_plugin', __('Childheight Calculator', 'childheight_plugin'), array($this, 'control'));

	// short code allows insertion of childheight into regular posts as a [childheight] tag.
	// From PHP in themes, call do_shortcode('childheight');
	add_shortcode('childheight', array($this, 'shortcode'));

	add_action('admin_menu', array($this, 'options_page'));

	wp_enqueue_script('jquery');

	wp_register_style('childheight-style', WP_PLUGIN_URL . '/child-height-predictor/childheight-style.css');
	wp_enqueue_style('childheight-style');
    }

    // back end options dialogue
    function control() {
	$options = get_option('childheight_plugin');

	$options = ChildheightPlugin::setDefaultOptions($options);

	if (isset($_POST['childheight_plugin-submit'])) {
                $link="no";
            if(isset($_POST['childheight_plugin-link'])){ 
                $link="yes";
            }else{
                $link="no";
            }
             $options['allowlink1'] = $link;
	    $options['width'] = (int) strip_tags(stripslashes($_POST['childheight_plugin-width']));
	    $options['height'] = (int) strip_tags(stripslashes($_POST['childheight_plugin-height']));
	    if ($options['width'] < 0) {
		$options['width'] = 0;
	    }
	    if ($options['height'] < 0) {
		$options['height'] = 0;
	    }
	    update_option('childheight_plugin', $options);
	}
	$width = $options['width'];
	$height = $options['height'];
       $allowlink = $options['allowlink1'];

	include(dirname(__FILE__) . '/tpl/widget-control.php');
    }

    function setDefaultOptions($options){
	$defVal = array(
	    'units' => 'metric',
	    'width' => 280,
	    'height' => 350,
            'allowLink' => 'no'
	);

	foreach ($defVal as $k=>$v){
	    if (!isset($options[$k])){
		$options[$k] = $v;
	    }
	}

	return $options;
    }

    function widget($atts) {
	echo ChildheightPlugin::view(true, $atts);
    }

    function shortcode($atts, $content=null) {
	return ChildheightPlugin::view(false);
    }

    function view($is_widget, $args=array()) {
	$uniqId = md5(microtime(true));
	$postTitle = $uniqId; //'shortcode_';
	$width = $height = 'auto';

	// get widget options
	$options = get_option('childheight_plugin');
	$options = ChildheightPlugin::setDefaultOptions($options);

	$units = $options['units'];

	if ($is_widget) {
	    $width = $options['width'] . 'px';
	    $height = $options['height'] . 'px';
	}


	$out = array();
	$display = '';
	if ($is_widget) {
	    ob_start();
	    include(dirname(__FILE__) . '/tpl/widget-layout.php');
	    $display = ob_get_contents();
	    ob_end_clean();
	} else {
	    ob_start();
	    include(dirname(__FILE__) . '/tpl/shortcode-layout.php');
	    $display = ob_get_contents();
	    ob_end_clean();
	}
	return $display;
    }

    function options_page() {
	add_submenu_page('plugins.php', 'Child Height Configuration', 'Child Height Configuration', 8, __FILE__, array($this, 'options'));
    }

    function options() {
	// Read in existing option value from database
	$options = get_option('childheight_plugin');

	$options = ChildheightPlugin::setDefaultOptions($options);

	if (isset($_POST['childheight_update']) ) {
            //print_r($_POST); die();
	    // Read their posted value
            $link="";
            if(isset($_POST['allowLink'])){
                $link="yes";
            }else{
                $link="no";
            }
	    $options['units'] = $_POST['units'];
            $options['allowLink'] = $link;


	    // Save the posted value in the database
	    update_option('childheight_plugin', $options);

	    // Put an options updated message on the screen
	}
	include(dirname(__FILE__) . '/tpl/options-layout.php');
    }

}

$child_plugin = new ChildheightPlugin();
add_action('widgets_init', array($child_plugin, 'init'));
