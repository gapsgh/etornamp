<?php 

function product_images_path(){
	return '/uploads/product_images_thumb/';
}
function product_images_large_path(){
	return '/uploads/product_images/';
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