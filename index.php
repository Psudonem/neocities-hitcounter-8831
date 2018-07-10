<?php
	$siteName=$_GET['yudosai'];
	$apiRequest="https://neocities.org/api/info?sitename="+$siteName;
	header("Content-type: image/png");
	$imgWidth=88;
	$imgHeight=31;
	$image=imagecreate($imgWidth, $imgHeight);
	$black=imagecolorallocate($image, 0, 0, 0);
	$blue=imagecolorallocate($image, 0, 255, 255);
	$red=imagecolorallocate($image, 255, 255, 0);

	$site_data=json_decode(file_get_contents("https://neocities.org/api/info?sitename=yudosai"),true);

	imagestring($image, 1, 5, 5, "Hit Counter:", $red);
	imagestring($image, 2, 5, 13, $site_data['info']['hits'], $blue);

	imagepng($image);
	imagedestroy($image);
?>