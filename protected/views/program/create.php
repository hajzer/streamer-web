<?php
$this->breadcrumbs=array(
	'Programs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>Create Program</h1>
<li><?php echo CHtml::link(('List Programs'),array('/program')); ?></li> 
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>