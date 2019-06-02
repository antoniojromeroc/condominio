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
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => [
    //         ['label' => 'Home', 'url' => ['/site/index']],
    //         ['label' => 'About', 'url' => ['/site/about']],
    //         ['label' => 'Contact', 'url' => ['/site/contact']],
    //         Yii::$app->user->isGuest ? (
    //             ['label' => 'Login', 'url' => ['/site/login']]
    //         ) : (
    //             '<li>'
    //             . Html::beginForm(['/site/logout'], 'post')
    //             . Html::submitButton(
    //                 'Logout (' . Yii::$app->user->identity->username . ')',
    //                 ['class' => 'btn btn-link logout']
    //             )
    //             . Html::endForm()
    //             . '</li>'
    //         )
    //     ],
    // ]);
    $navItems=[
        ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-home']).'  Inicio', 'url' => ['/site/index']],
        // ['label' => 'Status', 'url' => ['/status/index']],
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']]
      ];
      if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => Yii::t('app', 'Sign In'), 'url' => ['/user/security/login']],
                             ['label' => Yii::t('app', 'Sign Up'), 'url' => ['/user/registration/register']]);
      } else {
        array_push($navItems,
            ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-tasks']).'  Datos Maestros',  'items' => [
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-xbt']).'  Bancos', 'url' => ['/bancos']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-user']).'  Habitantes',
                        'options' =>[ 'data-toggle' => 'tooltip',  
                                   'data-placement' => 'tooltip',
                                   'title' =>'Residentes de la Urbanización', 
                                   'class' => 'myTooltipClass'],
                        'url' => ['/personas']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-road']).'  Autos', 
                        'url' => ['/autos']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-home']).'  Viviendas',
                        'options' =>[ 'data-toggle' => 'tooltip',  
                                   'data-placement' => 'tooltip',
                                   'title' =>'Viviendas de la Urbanización', 
                                   'class' => 'myTooltipClass'],
                        'url' => ['/viviendas']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-pencil']).'  Conceptos de Ingresos y Egresos', 'url' => ['/conceptos']],
                ],
            ],
            ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-flash']).'  Operaciones',  'items' => [
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-plus']).'  Obligaciones',
                        'options' =>[ 'data-toggle' => 'tooltip',  
                                   'data-placement' => 'tooltip',
                                   'title' =>'Listado de las Obligaciones adquiridas por los Residentes', 
                                   'class' => 'myTooltipClass'],
                        'url' => ['/cuentavivienda']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-briefcase']).'  Pagos por Servicios', 
                        'url' => ['/pagosvivienda']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-book']).'  Historico de Mensualidades',
                        'options' =>[ 'data-toggle' => 'tooltip',  
                                   'data-placement' => 'tooltip',
                                   'title' =>'Historico de Mensualidades', 
                                   'class' => 'myTooltipClass'],
                        'url' => ['/historicomensualidad']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-signal']).'  Saldos Iniciales', 
                        'url' => ['/saldosiniciales']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-transfer']).'  Ingresos y Egresos',
                        'options' =>[ 'data-toggle' => 'tooltip',  
                                   'data-placement' => 'tooltip',
                                   'title' =>'Ingresos y Egresos', 
                                   'class' => 'myTooltipClass'],
                        'url' => ['/ingresosegresos']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-stats']).'  Saldos Mensuales', 
                        'url' => ['/saldosmensuales']],
                    ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-file']).'  Recibos',
                        'options' =>[ 'data-toggle' => 'tooltip',  
                                   'data-placement' => 'tooltip',
                                   'title' =>'Emisión de Recibos', 
                                   'class' => 'myTooltipClass'],
                        'url' => ['/recibos']],
                ],
            ],
            ['label' => '<span style="font-size:1.0em;" class="glyphicon glyphicon-cog"</span>'.'  Panel de Control', 
                'options' =>[ 'data-toggle' => 'tooltip',  
                              'data-placement' => 'tooltip',
                              'title' =>'Notifications', 
                              'class' => 'myTooltipClass'],
                'url' => ['/site/controlPanel'],
                'data-toggle' => 'tooltip',
                'title' => 'Control Panel',
            ],
            ['label' => 'Salir (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
        );
      }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
        'items' => $navItems,
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
        <p class="pull-left">&copy; Gerantor <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
