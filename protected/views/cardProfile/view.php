<?php
$this->breadcrumbs=array(
	'Card Profiles'=>array('index'),
	$model->name,
);
?>

<h1>View CardProfile <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Update Card Profile'),array('update' , 'id'=>$model->id)),
		),
	));
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                  array(
                 	'label'=>'Cardtype',
                         'value'=>$model->Cardtype->name,
                         ),
		'name',
		'frequency',
		'symbolrate',
		//'diseqc',
                  array(
                 	'label'=>'Diseqc',
                         'value'=>$model->Diseqc->name,
                         ),
		'ttl',
		//'lnb_voltage',
                  array(
                 	'label'=>'LNB voltage',
                         'value'=>$model->Lnbvoltage->value,
                         ),
		// 'modulation',
                  array(
                 	'label'=>'Modulation',
                         'value'=>$model->Modulation->name,
                         ),
                  array(
                 	'label'=>'HighBand',
                         'value'=>$model->Highband->name,
                         ),
                  array(
                 	'label'=>'Slowcam',
                         'value'=>$model->Slowcam->name,
                         ),
		// 'epg',
                  array(
                 	'label'=>'EPG',
                         'value'=>$model->Epg->name,
                         ),
		// 'stream',
                  array(
                 	'label'=>'Stream Type',
                         'value'=>$model->Streamtype->name,
                         ),
		'priority',
		'multicastnetwork',
	),
)); ?>