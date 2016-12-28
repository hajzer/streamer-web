<?php
$this->breadcrumbs=array(
	'Programs',
);

$this->menu=array(
	array('label'=>'Create Program', 'url'=>array('create')),
	array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>Programs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
