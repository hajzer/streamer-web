<?php
$this->breadcrumbs=array(
	'Cmodulations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CModulation', 'url'=>array('index')),
	array('label'=>'Create CModulation', 'url'=>array('create')),
	array('label'=>'View CModulation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CModulation', 'url'=>array('admin')),
);
?>

<h1>Update CModulation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>