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


function stock_manipulation($bill_details){

    foreach ($bill_details->billingItems as $key => $item) {
        Models\Items::find($item->item_id);
    }
    
}




function bill_processing($data){
	$total = 0;

	foreach ($data['items'] as $key => $item) {
		$stotal = $item['item_price']*$item['quantity_ordered'];
		$discount = calculateDiscount($stotal,$item['discount']);
		$gst = calculateGst($stotal,$item['gst']);
		$total = $total + $stotal + $gst - $discount;
	}
	

	$bill = Models\Bill::create([
		'bill_total' => $total, //Gst and discount applied
		'freight_charges' => $data['freight_charges'],
		'party_id' => $data['party_id'],
		'bill_date' => date('Y-m-d H:i:s',strtotime($data['bill_date'])),
	]);

	foreach ($data['items'] as $key => $item) {
        
        $new_stock = $item['item_stock'] - $item['quantity_ordered'];
        
        if($new_stock<0)
            $new_stock = 0;

    		Models\BillingItems::create([
    			'item_name' => $item['item_name'],
    			'item_id' => $item['item_id'],
    			'quantity_ordered' => $item['quantity_ordered'],
    			'gst_in_percentage' => $item['gst'],
    			'discount_in_percentage' => $item['discount'],
    			'bill_id' => $bill->id,
    			'price' => $item['item_price'],
    		]);

         Models\Items::where('id',$item['item_id'])->update([
            'stock' => $new_stock
        ]);
        
     
	}

	return $bill->id;


}



function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}


function _t($data){
	return htmlspecialchars(htmlentities($data));
}