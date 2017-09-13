<?php
/* @var $this ArticleController */
/* @var $data Article */
?>

<div class="view-text">

    <div class="text-title">
    <?php echo CHtml::link(CHtml::encode($data->title), array('article/view', 'id'=>$data->id)); ?>
    </div>

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />


</div>