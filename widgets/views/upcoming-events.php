<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $events app\models\Sorevnovaniya[] */

?>

<div class="sorevnovaniya-index">

    <h1><?= Html::encode("Предстоящие соревнования") ?></h1>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $events,
            'pagination' => [
                'pageSize' => 5, // Установите размер страницы, если это необходимо
            ],
        ]),
        'filterModel' => null, // Если вам не нужно фильтровать, оставьте null
        'columns' => [
            [
                'attribute' => 'name', // Имя соревнования
                'label' => 'Название',
            ],
            [
                'attribute' => 'data_provedeniya',
                'label' => 'Дата',
                'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'attribute' => 'id_structure',
                'label' => 'Место проведения',
                'value' => function ($model) {
                    return $model->structure ? $model->structure->name : 'Не указано';
                },
            ],
            [
                'attribute' => 'id_vid_sporta',
                'value' => function ($model) {
                    return $model->vidSporta ? $model->vidSporta->name : 'Не указано';
                },
            ],
            // [
            //     'class' => 'yii\grid\ActionColumn', // Столбец действий (редактирование, удаление и т.д.)
            //     'header' => 'Действия',
            // ],
        ],
    ]); ?>
</div>