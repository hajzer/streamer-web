<?php
$id = $_GET['id'];

$this->breadcrumbs=array(
	'Log'=>array('index'),
	$id,
);
?>

<h1><?php echo "Content of log file: $id"; ?></h1>

<p>

<?php

//readfile("/etc/dvblast/logs/log_file");
$fd = fopen("/etc/dvblast/logs/$id", "r");
while (!feof($fd)) {
  $buffer = fgets($fd, 4096);
  echo "$buffer<br>";
}
fclose($fd);


?>

</p>
