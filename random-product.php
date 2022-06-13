<?php

	$bgsmletter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$numbr = '0123456789';
	$bgletter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$smletter = 'abcdefghijklmnopqrstuvwxyz';

	$productx = substr(str_shuffle($bgletter), 0, 1).substr(str_shuffle($smletter), 0, 5).' '.substr(str_shuffle($numbr), 0, 2).substr(str_shuffle($smletter), 0, 3);
	$unitx = substr(str_shuffle($smletter), 0, 3);
	$pricex = substr(str_shuffle($numbr), 0, 3).'.'.substr(str_shuffle($numbr), 0, 2);
	$stockx = substr(str_shuffle($numbr), 0, 2);

	$myObj = new stdClass();
	$myObj->product = $productx;
	$myObj->unit = $unitx;
	$myObj->price = $pricex;
	$myObj->stock = $stockx;

	$myJSON = json_encode($myObj);

	echo $myJSON;

	// By Ludwig Bethnicer C. Napigkit