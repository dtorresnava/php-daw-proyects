<?php
/* @var $this SalasController */
/* @var $model Salas */

$this->breadcrumbs=array(
	'Salases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Salas', 'url'=>array('index')),
	array('label'=>'Create Salas', 'url'=>array('create')),
	array('label'=>'Update Salas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Salas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Salas', 'url'=>array('admin')),
);
?>

<h1>View Salas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
