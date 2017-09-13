<?php
/* @var $this TextsController */
/* @var $model Texts */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список текстов', 'url'=>array('index')),
	array('label'=>'Создать новый текст', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить текст <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>