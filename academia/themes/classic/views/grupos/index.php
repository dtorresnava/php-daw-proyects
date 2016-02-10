<?php
/* @var $this GruposController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupos',
);

$this->menu=array(
	array('label'=>'Create Grupos', 'url'=>array('create'),'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Manage Grupos', 'url'=>array('admin'),'visible'=>Yii::app()->user->name=='admin'),
);
?>

<h1>Grupos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
