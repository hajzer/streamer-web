<?php
$this->breadcrumbs=array(
	'Cards'=>array('index'),
	$model->name,
);
?>

<h1>View Card <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Update Card'),array('update' , 'id'=>$model->id)),
		),
	));
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
                 array(
                 	'label'=>'Card Type',
                         'value'=>$model->Cardtype->name,
                         ),
                 array(
                 	'label'=>'PCI Slot',
                         'value'=>$model->BoardSlot->name,
                         ),
                 array(
                 	'label'=>'Active profile',
                         'value'=>$model->ActiveProfile->name,
                         ),
                 array(
                 	'label'=>'Stream Autostart',
                         'value'=>$model->StreamAutostart->name,
                         ),
	),
)); ?>


