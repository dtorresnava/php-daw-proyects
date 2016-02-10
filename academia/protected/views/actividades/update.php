<?php
$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'Lista de Actividades','url'=>array('index')),
	array('label'=>'Alta de Actividades','url'=>array('create')),
	array('label'=>'Detalle de la Actividad','url'=>array('view','id'=>$model->id)),
	array('label'=>'Control de Actividades','url'=>array('admin')),
	);
	?>

	<h1>Modificar Actividad <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>