<?php
/* @var $this ActividadesController */
/* @var $model Actividades */

$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Actividades', 'url'=>array('index')),
	array('label'=>'Create Actividades', 'url'=>array('create'),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Update Actividades', 'url'=>array('update', 'id'=>$model->id),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Delete Actividades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Manage Actividades', 'url'=>array('admin'),'visible'=>Yii::app()->user->name=='admin'),
);
?>

<h1>View Actividades #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'actividad',
		'detalle',
	),
)); ?>
