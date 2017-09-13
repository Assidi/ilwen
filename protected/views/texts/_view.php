<?php
/* @var $this TextsController */
/* @var $data Texts */
?>

<div class="view-text">

    <div class="text-title">
    <?php echo CHtml::link(CHtml::encode($data->title), array('texts/view', 'id'=>$data->id)); ?>
    </div>	

	<b><?php echo CHtml::encode($data->getAttributeLabel('raiting')); ?>:</b>
	<?php echo CHtml::encode($data->raiting); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('datePublish')); ?>:</b>
	<?php echo Helper::dateFormat($data->datePublish); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('epoch')); ?>:</b>
	<?php echo CHtml::encode($data->epoch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('translate')); ?>:</b>
	<?php echo CHtml::encode($data->translate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	*/ ?>

</div>