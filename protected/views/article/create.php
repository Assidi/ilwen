<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Статьи'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новая статья</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>