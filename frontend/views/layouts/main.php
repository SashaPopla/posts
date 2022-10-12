<?php
/** @var \yii\web\View $this */
/** @var string $content */
/** @var object $category */

use common\models\Category;
use common\widgets\LanguageSwitch;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use frontend\assets\LtAppAsset;
use yii\helpers\Url;

AppAsset::register($this);
LtAppAsset::register($this);

$category = Category::find()->joinWith('categoryTranslates')->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i|Roboto+Mono" rel="stylesheet">
    </head>
    <body>
    <?php $this->beginBody() ?>
        <div class="gtco-loader"></div>
        <div id="page">
            <nav class="gtco-nav" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 text-left">
                            <div id="gtco-logo"><a href="<?= Url::home()?>">Verb<span>.</span></a></div>
                            <?= LanguageSwitch::widget(); ?>
                        </div>
                        <div class="col-xs-6 text-right menu-1">
                            <ul>
                                <?php foreach ($category as $categor): ?>
                                    <?php $category_tr = $categor->categoryTranslates ?>
                                    <?php foreach ($category_tr as $item): ?>
                                        <?php if(Yii::$app->language == $item->language): ?>
                                            <li><a href="<?= Url::to(['/view', 'id'=>$item->category_id]) ?>"><?= $item->name ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </nav>

            <?= $content ?>
        <footer id="gtco-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-12">
                        <h3 class="footer-heading">Most Popular</h3>
                    </div>
                    <div class="col-md-4">
                        <div class="post-entry">
                            <div class="post-img">
                                <a href="#"><img src="images/img_1.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by GetTemplates.co"></a>
                            </div>
                            <div class="post-copy">
                                <h4><a href="#">How Web Hosting Can Impact Page Load Speed</a></h4>
                                <a href="#" class="post-meta"><span class="date-posted">4 days ago</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post-entry">
                            <div class="post-img">
                                <a href="#"><img src="images/img_2.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by GetTemplates.co"></a>
                            </div>
                            <div class="post-copy">
                                <h4><a href="#">How Web Hosting Can Impact Page Load Speed</a></h4>
                                <a href="#" class="post-meta"><span class="date-posted">4 days ago</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post-entry">
                            <div class="post-img">
                                <a href="#"><img src="images/img_3.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by GetTemplates.co"></a>
                            </div>
                            <div class="post-copy">
                                <h4><a href="#">How Web Hosting Can Impact Page Load Speed</a></h4>
                                <a href="#" class="post-meta"><span class="date-posted">4 days ago</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row copyright">
                    <div class="col-md-12 text-center">
                        <p>
                            <ul class="gtco-social-icons">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            </ul>
                        </p>
                    </div>
                </div>

            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage();?>