<?php
$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->name,
);
?>

<h1>View Program <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Update Program'),array('update' , 'id'=>$model->id)),
		),
	));
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                  array(
                 	'label'=>'idProfile',
                         'value'=>$model->idProfile->name,
                         ),
		'name',
		'pid',
		'multicast_ip',
		'multicast_port',
                 array(
                 	'label'=>'Start Stream',
                         'value'=>$model->streamStart->name,
                         ),
	),
)); ?>