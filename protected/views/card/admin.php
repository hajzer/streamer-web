<?php
$this->breadcrumbs=array(
	'Cards'=>array('index'),
	'Manage',
);
?>

<h1>Cards</h1>
<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Create Card'),array('create')),
		),
	));
?>

<?php

//	$data_slots=Card::Activedevices();	
  //       echo $data_slots;
         
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'card-grid',
	'dataProvider'=>$model->search(), 
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
        		    'name'=>'cardtype',
        		    'filter'=>CHtml::listData(CardType::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Cardtype->name',
        	    	    ),
		array(
        		    'name'=>'slot',
        		    'filter'=>CHtml::listData(BoardSlot::model()->findAll(), 'id','name'),
                     //'filter'=>CHtml::listData($data_slots, 'id','name'),
        		    'value'=>'$data->BoardSlot->name',
        	    	    ),
		array(
        		    'name'=>'id_active_profile',
        		    'filter'=>CHtml::listData(CardProfile::model()->findAll(), 'id','name'),
        		    'value'=>'$data->ActiveProfile->name',
        	    	    ),
		array(
        		    'name'=>'streamautostart',
        		    'filter'=>CHtml::listData(CAnswer::model()->findAll(), 'id','name'),
        		    'value'=>'$data->StreamAutostart->name',
        	    	    ),
		array(
                     'htmlOptions'=>array('width'=>'80px'),
		    'class'=>'CButtonColumn',
                     'template'=>'{view}{update}{scan}{control}{delete}',
		    'buttons'=>array(
		        'scan' => array(
			     'label'=>'Scan',
                              'imageUrl'=>Yii::app()->request->baseUrl.'/images/scan.png',
			     'url'=>'Yii::app()->createUrl("card/scan", array("id"=>$data->id))',
		             ),
		        'control' => array(
			     'label'=>'Control',
                              'imageUrl'=>Yii::app()->request->baseUrl.'/images/control.png',
			     'url'=>'Yii::app()->createUrl("card/control", array("id"=>$data->id))',
		             ),
		    	),

		    ),
  		),
)); ?>