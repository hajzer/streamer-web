<?php
$this->breadcrumbs=array(
	'Cards',
);

$this->menu=array(
	array('label'=>'Create Card', 'url'=>array('create')),
	array('label'=>'Manage Card', 'url'=>array('admin')),
);
?>

<h1>Cards</h1>

<?php 

/* BH OFF
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
         
	       	array(
			'label'=>'Department',
			'value'=>$model->department->name,
			),         
)); 
BH OFF */
// BH ADD
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'card-grid',
	'dataProvider'=>$model->with('ActiveProfile')->search(),
//         'itemView'=>'_view', 
//dataProvider'=>$model->search(),
	'filter'=>$model,
	'collumns'=>array(
		    'id',
		    'name',
		    'dev',
                     'pci_id',
		    array(
        		    'name'=>'id_active_profile',
        		    'filter'=>CHtml::listData(ActiveProfile::model()->findAll(), 'id','name'),
        		    'value'=>'$data->CardProfile->name',
        	    	    ),
                     'stream_autostart',
	),
));

?>