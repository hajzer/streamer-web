<?php
$this->breadcrumbs=array(
	'Cards'=>array('index'),
	'Create',
);
?>

<h1>Create Card</h1>
<li><?php echo CHtml::link(('List Cards'),array('/card')); ?></li> 
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>