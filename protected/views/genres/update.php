<?php
/* @var $this GenresController */
/* @var $model Genres */

$this->breadcrumbs=array(
	'Жанры'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список жанров', 'url'=>array('index')),
	array('label'=>'Новый жанр', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновление жанра <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>