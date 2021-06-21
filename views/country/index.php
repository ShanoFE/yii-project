<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\countrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],
            'Code',
            [
                'label' => 'Naam',
                'attribute' => 'Name',
                'contentOptions' => ['style' => 'font-weight: bold;'],
            ],
            [
                'label' => 'Hoofdstad',
                'attribute' => 'Capital',
                'contentOptions' => ['style' => 'width:120px; white-space: normal;'],
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->Capital,['/city/index', 'naar'=>$data->Capital]);
                }
            ],
            [
                'label' => 'Inwoners',
                'attribute' => 'Population',
            ],
            [
                'label' => 'Oppervlakte',
                'attribute' => 'SurfaceArea',
            ],
            //'Region',
            //'IndepYear',
            //'LifeExpectancy',
            //'GNP',
            //'GNPOld',
            //'LocalName',
            //'GovernmentForm',
            //'HeadOfState',
            //'Code2',
        ],
    ]); ?>


</div>