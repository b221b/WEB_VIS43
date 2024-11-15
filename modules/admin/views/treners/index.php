<?php

use app\models\Treners;
use app\models\VidSporta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\TrenersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Тренеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тренера', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'attribute' => 'id_vid_sporta', // Указываем атрибут
            'value' => function ($model) {
                return $model->vidSporta ? $model->vidSporta->name : 'Не указано'; // Проверяем наличие связи и выводим имя
            },
            'filter' => \yii\helpers\ArrayHelper::map(VidSporta::find()->all(), 'id', 'name'), // Добавляем фильтр для выбора вида спорта
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Treners $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>



</div>