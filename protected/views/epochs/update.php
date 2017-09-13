<?php
/* @var $this EpochsController */
/* @var $model Epochs */

$this->breadcrumbs=array(
	'Эпохи'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список эпох', 'url'=>array('index')),
	array('label'=>'Новая эпоха', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновление эпохи <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>