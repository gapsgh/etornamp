<?php 

function currency_code(){
	return "‎GH₵";
}

function make_slug($val){
	return strtolower(str_replace(' ','-',$val) );
}

function nice_date($val){
	return date('d F Y', strtotime($val));
}

function product_images_path(){
	return '/uploads/product_images_thumb/';
}

function product_images_large_path(){
	return '/uploads/product_images_large/';
}


function generateRandomString($length) {
	$characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ123456789123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}


?>