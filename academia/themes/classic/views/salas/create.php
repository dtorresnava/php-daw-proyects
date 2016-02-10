<?php
/* @var $this SalasController */
/* @var $model Salas */

$this->breadcrumbs=array(
	'Salases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Salas', 'url'=>array('index')),
	array('label'=>'Manage Salas', 'url'=>array('admin')),
);
?>

<h1>Create Salas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>