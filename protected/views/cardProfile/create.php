<?php
$this->breadcrumbs=array(
	'Card Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CardProfile', 'url'=>array('index')),
	array('label'=>'Manage CardProfile', 'url'=>array('admin')),
);
?>

<h1>Create Card Profile</h1>
<li><?php echo CHtml::link(('List Card Profiles'),array('/cardProfile')); ?></li> 
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>