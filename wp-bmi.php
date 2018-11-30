<?php
/*
Plugin Name: WP BMI
Plugin URI: http://nabtron.com/wp-bmi/
Description: Body Mass Index calculator as a widget on sidebar
Author: nabtron
Version: 1.0.1
Author URI: http://nabtron.com/
*/

function wp_bmi_scripts() {
    wp_register_style( 'wp-bmi-styles',  plugin_dir_url( __FILE__ ) . 'assets/wp-bmi-styles.css' );
    wp_enqueue_style( 'wp-bmi-styles' );
    wp_register_script( 'wp-bmi-js',  plugin_dir_url( __FILE__ ) . 'assets/wp-bmi-js.js' );
    wp_enqueue_script( 'wp-bmi-js' );
}
add_action( 'wp_enqueue_scripts', 'wp_bmi_scripts' );

function wp_bmi_front() 
{
?>
<div id="bmi_div">
<form>
	<p> <span>height</span> <br />
		<span class="bmi_input">
		<input type="text" id="bmi_height" value="0" onKeyUp="AnEventHasOccurred()">
		</span> <span class="bmi_radio">
		<input type="radio" id="bmi_cms" name="bmi_cmsinches" value="cms" checked="checked" onClick="AnEventHasOccurred()">
		cm &nbsp; &nbsp;
		<input type="radio" id="bmi_inches" name="bmi_cmsinches" value="inches" onClick="AnEventHasOccurred()">
		in </span> </p>
	<p> <span>weight</span> <br />
		<span class="bmi_input">
		<input type="text" id="bmi_weight" value="0" onKeyUp="AnEventHasOccurred()">
		</span> <span class="bmi_radio">
		<input type="radio" id="bmi_kg" name="bmi_kglb" value="kgs" checked="checked" onClick="AnEventHasOccurred()">
		kg &nbsp; &nbsp;
		<input type="radio" id="bmi_lb" name="bmi_kglb" value="lbs" onClick="AnEventHasOccurred()">
		lb </span> </p>
	<p>Your BMI is : <span id="bmi_result">0</span></p>

</form>
<script type="text/javascript">
</script>
</div>
<?php
}

function wp_bmi_widget($args) 
{
  extract($args);
  echo $before_widget;
  echo $before_title;?>BMI Calculator<?php echo $after_title;
  wp_bmi_front();
  echo $after_widget;
}

function wp_bmi_init()
{
  register_sidebar_widget('BMI Widget', 'wp_bmi_widget'); 
}

add_action("plugins_loaded", "wp_bmi_init");