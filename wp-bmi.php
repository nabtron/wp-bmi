<?php
/*
Plugin Name: WP BMI
Plugin URI: http://nabtron.com/wp-bmi/
Description: Body Mass Index calculator as a widget on sidebar
Author: nabtron
Version: 1.0
Author URI: http://nabtron.com/
*/

function wp_bmi_front() 
{
  $url=WP_PLUGIN_URL; ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $url; ?>/bodymassindex/style.css" />

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
	<p class="bmi_credits">Developed by <a href="http://nabtron.com/" target="_blank">Nabtron</a></p>

</form>
<script type="text/javascript">
function AnEventHasOccurred() {
	
	var height = document.getElementById("bmi_height").value;
	var cmsorinches = (document.getElementById("bmi_cms").checked ? 'cms' : (document.getElementById("bmi_inches").checked ? 'inches' : '[neither]') );
	var weight = document.getElementById("bmi_weight").value;
	var kglb = (document.getElementById("bmi_kg").checked ? 'kgs' : (document.getElementById("bmi_lb").checked ? 'lbs' : '[neither]') );

	var max_chars = 3;
    if(height.length > max_chars) {
        document.getElementById("bmi_height").value = height.substr(0, max_chars);
    }
	
	
	if(cmsorinches == 'inches') { height = height*2.54; }
	if(kglb == 'lbs') { weight = weight*0.45359237; }
	
	height = height/100; //cm to m
	var bmi = weight/(height*height);
	bmi = Math.round(bmi*10)/10
	
document.getElementById("bmi_result").innerHTML = bmi;	

}
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
?>
