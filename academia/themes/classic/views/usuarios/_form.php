<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

    	<!-- div class="row">
		/*echo $form->labelEx($model,'fecha_alta'); ?>
		 echo $form->textField($model,'fecha_alta'); ?>
		 echo $form->error($model,'fecha_alta'); 
                
                $date = date("d/m/y");
                echo $form->hiddenField($model,'fecha_alta',array('value'=>$date));
                //$model->attributes->fecha_alta=$date;
                
                echo $form->error($model,'roles');*/
               
	</div -->

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'origen'); ?>
		<?php echo $form->textField($model,'origen',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observ'); ?>
		<?php echo $form->textArea($model,'observ',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observ'); ?>
	</div>

	<!-- div class="row">
		</* echo $form->labelEx($model,'ult_fecha'); ?>
		<echo $form->textField($model,'ult_fecha'); ?>
		echo $form->error($model,'ult_fecha');*/?>
	</div -->
        <?php
        if(Yii::app()->user->name=='admin'){
        ?>
            <div class="row">
                <?php echo $form->labelEx($model,'roles'); ?>
                <?php echo $form->textField($model,'roles',array('size'=>8,'maxlength'=>8)); ?>
                <?php echo $form->error($model,'roles'); ?>
            </div>
        <?php
        }  else {
            echo $form->hiddenField($model,'roles',array('value'=>'AL'));
            echo $form->error($model,'roles');
        }
        ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->