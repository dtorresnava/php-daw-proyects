<?php
/* @var $this SalasController */
/* @var $model Salas */

$this->breadcrumbs=array(
	'Salases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Salas', 'url'=>array('index')),
	array('label'=>'Create Salas', 'url'=>array('create')),
	array('label'=>'View Salas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Salas', 'url'=>array('admin')),
);
?>

<h1>Update Salas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>