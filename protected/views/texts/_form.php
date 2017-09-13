<?php
/* @var $this TextsController */
/* @var $model Texts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'texts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> являются обязательными.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?><br />        
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'title'); ?>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'raiting'); ?><br />
		<?php echo $form->radioButtonList($model,'raiting',array('G'=>'G','PG'=>'PG', 'PG-13'=>'PG-13', 'R'=>'R', 'NC-17'=>'NC-17', 'NC-21'=>'NC-21')); ?>
		<?php echo $form->error($model,'raiting'); ?>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'category'); ?><br />		
        <?php echo $form->radioButtonList($model,'category',array('Джен'=>'Джен','Гет'=>'Гет')); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'summary'); ?><br />
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'note'); ?><br />
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'epoch'); ?><br />		
        <?php echo $form->dropDownList($model, 'epoch', Epochs::getList()); ?>
		<?php echo $form->error($model,'epoch'); ?>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'book'); ?><br />		
        <?php echo $form->dropDownList($model, 'book', Books::getList()); ?>
		<?php echo $form->error($model,'book'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'text'); ?><br />
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'translate'); ?><br />		
        <?php echo $form->radioButtonList($model,'translate',array('0'=>'Нет','1'=>'Да')); ?>
		<?php echo $form->error($model,'translate'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'author'); ?><br />
		<?php echo $form->textField($model,'author',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'url'); ?><br />
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->