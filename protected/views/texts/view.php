<?php
/* @var $this TextsController */
/* @var $model Texts */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список текстов', 'url'=>array('index')),
	array('label'=>'Создать новый текст', 'url'=>array('create')),
	array('label'=>'Обновить текст', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Добавить персонажей или жанры', 'url'=>array('viewupdate', 'id'=>$model->id)),
	array('label'=>'Удалить текст', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить этот текст?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>
<h1><?=$model->title;?></h1>
<?php if($model->translate): ?>
<h2>Перевод</h2>
<?php endif; ?>

<div class="text-head">
<?php if($model->translate): ?>
<p><b>Автор: </b><?= $model->author?></p>
<p><b>Ссылка на оригинал: </b><a href="<?='http://'.$model->url?>" target="_blank"><?= $model->url?></a></p>
<?php endif; ?>
<p><b>Рейтинг: </b><?= $model->raiting?></p>
<p><b>Категория: </b><?= $model->category?></p>
<p><b>Источник: </b><?= Books::getBook($model->book)->name?></p>
<p><b>Жанры:</b> 
<?= $model->genresList(); ?>
</p>
<p><b>Персонажи:</b>
    <?= $model->characterList(); ?>  
</p>

<?php 
        if ($model->note !="") {
            ?>  
                <p><b>Примечание: </b><?= $model->note?></p>
            <?php 
        }
?>
<p><b>Краткое содержание: </b><?= $model->summary ?></p>
</div>


<?= nl2br($model->text); ?>
