<?php
/* @var $this TextsController */
/* @var $model Texts */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список текстов', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый текст</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>