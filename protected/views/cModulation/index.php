<?php
$this->breadcrumbs=array(
	'Cmodulations',
);

$this->menu=array(
	array('label'=>'Create CModulation', 'url'=>array('create')),
	array('label'=>'Manage CModulation', 'url'=>array('admin')),
);
?>

<h1>Cmodulations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
