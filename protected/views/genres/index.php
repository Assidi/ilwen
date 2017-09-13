<?php
/* @var $this GenresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Жанры',
);

$this->menu=array(
	array('label'=>'Новый жанр', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Жанры</h1>

<? foreach ($models as $model): ?>
    <p><a href="<?= $model->id; ?>"><?= $model->name; ?></a></p>
<? endforeach; ?>

