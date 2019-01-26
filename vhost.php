<?php
error_reporting(0);

header('Access-Control-Allow-Origin: *');
$host = $_GET['host'];

if($host){


$file_path = "C:/Windows/System32/drivers/etc/hosts";
$current = file_get_contents($file_path);

$data_to_write = "".$current."\r\n  127.0.0.1	".$host."\r\n ";
$file_handle = fopen($file_path, 'w'); 
fwrite($file_handle, $data_to_write);
fclose($file_handle);

mkdir("C:/xampp/website/".$host."");



$vhostsConfig = $host;
$vhostString = '<VirtualHost '.$vhostsConfig.':80>
DocumentRoot "C:/xampp/website/'.$vhostsConfig.'"
ServerName '.$vhostsConfig.'
<Directory C:/xampp/website/'.$vhostsConfig.'/>
    AllowOverride All
    Require all granted
</Directory>
</VirtualHost>';



$httpdVhostsFilePath = "C:/xampp/apache/conf/extra/httpd-vhosts.conf";
$httpdVhostsCurrent = file_get_contents($httpdVhostsFilePath);

$data_to_write = "".$httpdVhostsCurrent."\n ".$vhostString."";
$file_handle = fopen($httpdVhostsFilePath, 'w'); 
fwrite($file_handle, $data_to_write);
fclose($file_handle);

$my_file = 'C:/xampp/website/'.$vhostsConfig.'/index.php';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$data = 'Welcome to '.$vhostsConfig.'';
fwrite($handle, $data);

header('Content-Type: application/json');

	$data = (object) array('host' => 1);
	echo json_encode($data);


}else{
	echo "Host required";
}


?>