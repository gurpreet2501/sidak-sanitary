<?php
function calculateGst($sub_total, $gst_in_per){
	
	if(empty($gst_in_per))
		return 0.00;
	
	return (float)($sub_total*$gst_in_per)/100.00;
	
}

function calculateDiscount($sub_total, $discount){
	if(empty($discount))
		return 0.00;

	return (float)($sub_total*$discount)/100.00;
	
}

function calculateSubTotal(){

}



function _t($data){
	return htmlspecialchars(htmlentities($data));
}