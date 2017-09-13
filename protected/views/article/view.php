<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Статьи'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
	array('label'=>'Новая статья', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->title;?></h1>

<div class="text-head">
    <?php if($model->note !=""): ?>
        <p><b>Примечание: </b><?= $model->note?></p>
    <?php endif; ?>    
    <p><b>Краткое содержание: </b><?= $model->summary ?></p>
</div>

<?= nl2br($model->text); ?>

