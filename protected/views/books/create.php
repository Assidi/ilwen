<?php
/* @var $this BooksController */
/* @var $model Books */

$this->breadcrumbs=array(
	'Книги'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список книг', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новая книга</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>