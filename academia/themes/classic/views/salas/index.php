<?php
/* @var $this SalasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Salases',
);

$this->menu=array(
	array('label'=>'Alta de sala', 'url'=>array('create')),
	array('label'=>'Modificar una sala', 'url'=>array('admin')),
        array('label'=>'Dar de baja una sala', 'url'=>array('delete')),
);
?>

<h1>Salases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
