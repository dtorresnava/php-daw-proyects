<?php
/* @var $this ActividadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividades',
);

$this->menu=array(
	array('label'=>'Alta de actividades', 'url'=>array('create'),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Modificar una actividad', 'url'=>array('admin'),'visible'=>Yii::app()->user->name=='admin'),
    )
?>

<h1>Actividades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
