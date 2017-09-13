<?php
/* @var $this TextsController */
/* @var $model Texts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'id'); ?><br />
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'title'); ?><br />
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'datePublish'); ?><br />
		<?php echo $form->textField($model,'datePublish'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'raiting'); ?><br />
		<?php echo $form->textField($model,'raiting',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'category'); ?><br />
		<?php echo $form->textField($model,'category',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'summary'); ?><br />
		<?php echo $form->textArea($model,'summary',array('form-groups'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'note'); ?><br />
		<?php echo $form->textArea($model,'note',array('form-groups'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'size'); ?><br />
		<?php echo $form->textField($model,'size'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'epoch'); ?><br />
		<?php echo $form->textField($model,'epoch'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'book'); ?><br />
		<?php echo $form->textField($model,'book'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'text'); ?><br />
		<?php echo $form->textArea($model,'text',array('form-groups'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'translate'); ?><br />
		<?php echo $form->textField($model,'translate'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'author'); ?><br />
		<?php echo $form->textField($model,'author',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'url'); ?><br />
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->