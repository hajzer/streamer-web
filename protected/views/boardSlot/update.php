<?php
$this->breadcrumbs=array(
	'Board Slots'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update BoardSlot <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('View Board Slot'),array('view' , 'id'=>$model->id)),
		),
	));
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>