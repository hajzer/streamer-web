<?php
$this->breadcrumbs=array(
	'Card Profiles',
);

$this->menu=array(
	array('label'=>'Create CardProfile', 'url'=>array('create')),
	array('label'=>'Manage CardProfile', 'url'=>array('admin')),
);
?>

<h1>Card Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
