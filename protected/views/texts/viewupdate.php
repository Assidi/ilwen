<?php
/* @var $this TextsController */
/* @var $model Texts */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Список текстов', 'url'=>array('index')),
	array('label'=>'Создать новый текст', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),    
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->title;?></h1>

<h3>Удаление жанров</h3>
<p>Нажмите на ссылку для удаления</p>
<p>
<? foreach ($model->getGenres() as $genreTextId=>$genre): ?>
    <a href="<?=$this->createAbsoluteUrl('/');?>/texts/deletegenre/<?= $genreTextId; ?>"><?= $genre->name; ?></a><br>    
<? endforeach; ?>
</p>
<h3>Удаление персонажей</h3>
<p>Нажмите на ссылку для удаления</p>
<p>
<? foreach ($model->getCharacters() as $chartextId => $character): ?>
    <a href="<?=$this->createAbsoluteUrl('/');?>/texts/deletecharacter/<?= $chartextId; ?>"><?= $character->name; ?></a><br>     
<? endforeach; ?>
</p>
<h3>Удаление расы</h3>
<p>Нажмите на ссылку для удаления</p>
<p>
<? foreach ($model->getRaces() as $raceTextId=>$race): ?>
    <a href="<?=$this->createAbsoluteUrl('/');?>/texts/deleterace/<?= $raceTextId; ?>"><?= $race->name; ?></a><br>    
<? endforeach; ?>
</p>

<form action="" method="post">
    <p>Добавить жанр</p>
    <?= CHtml::dropDownList('genreId', '', Genres::getList()); ?>
    <input type="submit" value="Добавить"/>    
</form> 
<p></p>
<form action="" method="post">
    <p>Добавить народ</p>
    <?= CHtml::dropDownList('raceId', '', Races::getList()); ?>
    <input type="submit" value="Добавить"/>
</form> 
<p></p>
<form action="" method="post">
    <p>Добавить персонажа</p>
    <?= CHtml::dropDownList('characterId', '', Characters::getList()); ?>
    <input type="submit" value="Добавить"/>
</form>

