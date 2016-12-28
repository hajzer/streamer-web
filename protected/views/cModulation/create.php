<?php
$this->breadcrumbs=array(
	'Cmodulations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CModulation', 'url'=>array('index')),
	array('label'=>'Manage CModulation', 'url'=>array('admin')),
);
?>

<h1>Create CModulation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>