<?php
$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update Program <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('View Program'),array('view' , 'id'=>$model->id)),
		),
	));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>