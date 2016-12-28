<?php
$this->breadcrumbs=array(
	'Board Slots'=>array('index'),
	'Manage',
);
?>

<h1>Board Slots</h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Create Board Slot'),array('create')),
		),
	));

      $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'board-slot-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'pciid',
		'dev',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>