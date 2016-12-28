<?php
$this->breadcrumbs=array(
	'Cmodulations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CModulation', 'url'=>array('index')),
	array('label'=>'Create CModulation', 'url'=>array('create')),
	array('label'=>'Update CModulation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CModulation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CModulation', 'url'=>array('admin')),
);
?>

<h1>View CModulation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_card_type',
		'dev',
	),
)); ?>
