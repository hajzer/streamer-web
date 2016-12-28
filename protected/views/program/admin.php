<?php
$this->breadcrumbs=array(
	'Programs'=>array('index'),
	'Manage',
);
?>

<h1>Programs</h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Create Program'),array('create')),
		),
	));


      $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'program-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
         'ajaxUpdate'=>false,
	'columns'=>array(
		'id',
		array(
        		    'name'=>'id_profile',
        		    'filter'=>CHtml::listData(CardProfile::model()->findAll(), 'id','name'),
        		    'value'=>'$data->idProfile->name',
        	    	    ),
		'name',
		'pid',
		'multicast_ip',
		'multicast_port',
		array(
        		    'name'=>'stream',
        		    'filter'=>CHtml::listData(CAnswer::model()->findAll(), 'id','name'),
        		    'value'=>'$data->streamStart->name',
        	    	    ),
		/*
		'stream',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>