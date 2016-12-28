<?php
$this->breadcrumbs=array(
	'Log'=>array('index'),
	
);

?>
<h1><?php echo "Logs"; ?></h1>

<p>

<?php

$dirFiles=array();
echo "Log files in /etc/dvblast/logs:<br><br>";

if ($handle = opendir('/etc/dvblast/logs')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $dirFiles[] = $entry;
        }
    }
    closedir($handle);
}

sort($dirFiles);

foreach($dirFiles as $file)
{
    //echo "<a href=\"\">$file</a><br>";
    echo CHtml::link($file,array('show' , 'id'=>$file));
    echo "<br>";
}


?>

</p>
