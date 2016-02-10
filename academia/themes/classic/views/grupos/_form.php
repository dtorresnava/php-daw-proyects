<?php
/* @var $this GruposController */
/* @var $model Grupos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'actividades_id'); ?>
		<?php echo $form->textField($model,'actividades_id'); ?>
		<?php echo $form->error($model,'actividades_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php echo $form->textField($model,'fecha_inicio'); ?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php echo $form->textField($model,'fecha_fin'); ?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dias_semana'); ?>
		<?php echo $form->textField($model,'dias_semana',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'dias_semana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horario'); ?>
		<?php echo $form->textField($model,'horario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'horario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuota'); ?>
		<?php echo $form->textField($model,'cuota',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cuota'); ?>
	</div>

	<div class="row">
		
                <?php echo $form->labelEx($model,'profesor_id'); ?>
		<?php
                $profesores= Usuarios::model()->profesores()->findAll();
                $listprofesores=CHtml::listData($profesores,'id','nombre');
                echo $form->dropDownList($model,'profesor_id',$listprofesores); ?>
		<?php echo $form->error($model,'profesor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salas_id'); ?>
		<?php echo $form->textField($model,'salas_id'); ?>
		<?php echo $form->error($model,'salas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plazas'); ?>
		<?php echo $form->textField($model,'plazas'); ?>
		<?php echo $form->error($model,'plazas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->