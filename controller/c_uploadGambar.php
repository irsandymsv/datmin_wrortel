<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php 
$messages = "";
// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'];
// Optional: instance name (might be used to load a specific configuration file or anything else).
$CKEditor = $_GET['CKEditor'];
// Optional: might be used to provide localized messages.
$langCode = $_GET['langCode'];
// Optional: compare it with the value of `ckCsrfToken` sent in a cookie to protect your server side uploader against CSRF.
// Available since CKEditor 4.5.6.
$token = $_POST['ckCsrfToken'] ;


$dir = "../storage/";
$fileType = strtolower(pathinfo(basename($_FILES["upload"]["name"]), PATHINFO_EXTENSION));
$url = $dir . $_FILES["upload"]["name"]; //set id terbaru sebagai nama pic

$upload = move_uploaded_file($_FILES["upload"]["tmp_name"], $url);

if (!$upload) {
	$message = 'gagal gan upload';
}

echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
?>

</body>
</html>

