<?php
/* @var $this TextsController */
/* @var $model Texts */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	'Поиск',
);

if (!$minSize) $minSize = 0;
if (!$maxSize) $maxSize = Texts::maxSize();

?>
<h1>Поиск текстов</h1>
<p>Введите параметры для поиска текста, один или несколько. </p>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'title'); ?><br />
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'raiting'); ?><br />
		<?php echo $form->radioButtonList($model,'raiting',array('G'=>'G','PG'=>'PG', 'PG-13'=>'PG-13', 'R'=>'R', 'NC-17'=>'NC-17', 'NC-21'=>'NC-21')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'category'); ?><br />
		<?php echo $form->radioButtonList($model,'category',array('Джен'=>'Джен','Гет'=>'Гет')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'summary'); ?><br />
		<?php echo $form->textArea($model,'summary',array('form-groups'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
        <label>Размер</label><br />
        От <input type="text" name="Texts[minSize]" id="minsize" value="<?=$minSize;?>"/>
        до <input type="text" name="Texts[maxSize]" id="maxsize" value="<?=$maxSize;?>"/>
        слов	
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'epoch'); ?><br />
		<?php echo $form->dropDownList($model, 'epoch', Epochs::getList()); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'book'); ?><br />
		<?php echo $form->dropDownList($model, 'book', Books::getList()); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'text'); ?><br />
		<?php echo $form->textArea($model,'text',array('form-groups'=>6, 'cols'=>50)); ?>
	</div>
    
    <div class="form-group">
		<label for="characters">Персонажи</label><br />
		<?= CHtml::dropDownList('characters[]', $character, Characters::getList(),array('multiple'=>true)); ?>
	</div>
	
	<div class="form-group">
		<label for="genres">Жанры</label><br />
		<?= CHtml::checkBoxList('genres[]', $genre, Helper::deleteEmpty(Genres::getList())); ?>
	</div>
    
	<div class="form-group">
		<?php echo $form->label($model,'translate'); ?><br />
		<?php echo $form->radioButtonList($model,'translate',array('0'=>'Нет','1'=>'Да')); ?>
	</div>
	

	<div class="form-group buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->