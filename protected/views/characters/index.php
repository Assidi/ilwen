<?php
/* @var $this CharactersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Персонажи',
);

$this->menu=array(
	array('label'=>'Новый персонаж', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Персонажи</h1>
<table class="table-characters">
    <tr>
        <th>Персонаж</th>
        <th>Раса</th>        
    </tr>
<? foreach ($models as $modelCharacter): ?>
    <tr>
    <td>
        <a href="<?= $modelCharacter->id; ?>" class="a-inline"><?= $modelCharacter->name; ?></a>
    </td>
    <td>
        <?=$modelCharacter->race0->name; ?>
    </td>
    </tr>
<? endforeach; ?>
</table>

