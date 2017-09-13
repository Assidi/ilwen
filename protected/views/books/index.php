<?php
/* @var $this BooksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Книги',
);

$this->menu=array(
	array('label'=>'Новая книга', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Книги</h1>

<? foreach ($models as $model): ?>
    <p><a href="<?= $model->id; ?>"><?= $model->name; ?></a></p>
<? endforeach; ?>