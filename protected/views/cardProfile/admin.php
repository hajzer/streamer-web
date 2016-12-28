<?php
$this->breadcrumbs=array(
	'Card Profiles'=>array('index'),
	'Manage',
);
?>


<h1>Card Profiles</h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(('Create Card Profile'),array('create')),
		),
	));
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'card-profile-grid',
	// 'dataProvider'=>$model->search(),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'ajaxUpdate'=>false,
	'columns'=>array(
		'id',
		array(
        		    'name'=>'cardtype',
        		    'filter'=>CHtml::listData(CardType::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Cardtype->name',
        	    	    ),
		'name',
		'frequency',
		'symbolrate',
		//'diseqc',
		array(
        		    'name'=>'diseqc',
        		    'filter'=>CHtml::listData(CDiseqc::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Diseqc->name',
        	    	    ),
		'ttl',
		array(
        		    'name'=>'lnbvoltage',
        		    'filter'=>CHtml::listData(CLnbvoltage::model()->findAll(), 'id','value'),
        		    'value'=>'$data->Lnbvoltage->value',
        	    	    ),
		array(
        		    'name'=>'modulation',
        		    'filter'=>CHtml::listData(CModulation::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Modulation->name',
        	    	    ),
/*                 
		array(
        		    'name'=>'highband',
        		    'filter'=>CHtml::listData(CAnswer::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Highband->name',
        	    	    ),
                     
		array(
        		    'name'=>'slowcam',
        		    'filter'=>CHtml::listData(CAnswer::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Slowcam->name',
        	    	    ),                     
                 
		array(
        		    'name'=>'epg',
        		    'filter'=>CHtml::listData(CAnswer::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Epg->name',
        	    	    ),
*/
		array(
        		    'name'=>'streamtype',
        		    'filter'=>CHtml::listData(CStreamtype::model()->findAll(), 'id','name'),
        		    'value'=>'$data->Streamtype->name',
        	    	    ),
         	'multicastnetwork',
		/*
		'lnb_voltage',
		'modulation',
		'epg',
		'stream',
		'priority',
		'multicast_network',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>