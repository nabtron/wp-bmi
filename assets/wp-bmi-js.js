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
	bmi = Math.round(bmi*10)/10;

	document.getElementById("bmi_result").innerHTML = bmi;	

}