<?php
$this->breadcrumbs=array(
	'Board Slots'=>array('index'),
	$model->name,
);
?>



<h1>View BoardSlot <?php echo $model->id; ?></h1>
<?php
	echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Update Board Slot'),array('update' , 'id'=>$model->id)),
		),
	));
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pciid',
		'dev',
	),
)); ?>