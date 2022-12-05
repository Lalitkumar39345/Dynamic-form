<?php
include_once './back_end/connection.php';
 $file_name ="";
if(isset($_POST["image"]))
{
	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	$imageName = time() . '.png';
	file_put_contents($imageName, $data);
	echo $imageName;
}

 


?>