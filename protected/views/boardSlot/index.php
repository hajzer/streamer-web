<?php
$this->breadcrumbs=array(
	'Board Slots',
);

$this->menu=array(
	array('label'=>'Create BoardSlot', 'url'=>array('create')),
	array('label'=>'Manage BoardSlot', 'url'=>array('admin')),
);
?>

<h1>Board Slots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
