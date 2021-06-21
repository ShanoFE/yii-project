<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<?php

NavBar::begin([

      'brandLabel' => Yii::$app->name,  
      'brandUrl' => Yii::$app->homeUrl, 
      'options' => [
         'class' => 'navbar-inverse navbar-fixed-top', 
       ],
  ]);
                  
                  
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [ 'label' => 'Country',
                'items' => [
                    ['label' => 'Overzicht', 'url' => ['/country/overzicht', ''] ],
                    ['label' => 'Overzicht Europe', 'url' => ['/country/overzicht-europe', ''] ],
                    ['label' => 'Voeg toe', 'url' => ['/country/create', ''] ],
                    ['label' => 'Europa', 'url' => ['/country/index?countrySearch[Continent]=Europe'] ],
                    ['label' => 'Azie', 'url' => ['/country/index?countrySearch[Continent]=Asia'] ],
                    ['label' => 'Noord-Amerika', 'url' => ['/country/index?countrySearch[Continent]=North America'] ],
                    ['label' => 'Zuid-Amerika', 'url' => ['/country/index?countrySearch[Continent]=South America'] ],
                    ['label' => 'Africa', 'url' => ['/country/index?countrySearch[Continent]=Africa'] ],
                    ['label' => 'Antarctica', 'url' => ['/country/index?countrySearch[Continent]=Antarctica'] ],
                    ['label' => 'Oceaan', 'url' => ['/country/index?countrySearch[Continent]=Oceania'] ],
                ],
            ],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [ 'label' => 'City',
                'items' => [
                    ['label' => 'Overzicht', 'url' => ['/country/index', ''] ],
                    ['label' => 'Voeg toe', 'url' => ['/country/create', ''] ],
                ],
            ],
        ],
    ]);
                  
   NavBar::end();
 ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
