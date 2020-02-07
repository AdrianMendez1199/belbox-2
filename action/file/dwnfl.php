<?php
require_once("../../config/config.php");
$id = base64_decode($_GET["id"]);
$count = (int) base64_decode($_GET["count"]) + 1;
$id_code =  base64_decode($_GET["code"]);

$sql = mysqli_query($con, "UPDATE file SET download ='$count' WHERE id ='$id' ");
//end count donwload
$file = mysqli_query($con, "select * from file where code=\"$id_code\"");

while ($rows = mysqli_fetch_array($file)) {

	$filename  = $rows['filename'];
	$user_id   = $rows['user_id'];

}

$url = "../../storage/data/" . $user_id . "/";


$fullurl = $url . $filename;

header("Content-type:application/pdf");

header("Content-Disposition:attachment;filename=$filename");
readfile($fullurl);
