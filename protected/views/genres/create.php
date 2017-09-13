<?php
/* @var $this GenresController */
/* @var $model Genres */

$this->breadcrumbs=array(
	'Жанры'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список жанров', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый жанр</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>