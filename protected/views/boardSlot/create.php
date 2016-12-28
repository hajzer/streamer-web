<?php
$this->breadcrumbs=array(
	'Board Slots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BoardSlot', 'url'=>array('index')),
	array('label'=>'Manage BoardSlot', 'url'=>array('admin')),
);
?>

<h1>Create Board Slot</h1>
<li><?php echo CHtml::link(('List Board Slots'),array('/boardSlot')); ?></li>  
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>