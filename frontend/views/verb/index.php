<?php
/** @var yii\web\View $this */
/** @var yii\frontend\controller\VerbController $posts */
/** @var yii\frontend\controller\VerbController $categories */

use yii\helpers\Url;
?>
<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-left">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                        <span class="date-post">4 days ago</span>
                        <h1 class="mb30"><a href="#">How Web Hosting Can Impact Page Load Speed</a></h1>
                        <p><a href="#" class="text-link">Read More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="gtco-main">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-12">
                <ul id="gtco-post-list">
                    <?php $i = 0; foreach ($posts as $post): ?>
                        <?php $post_translate = $post->postTranslations; ?>
                        <?php foreach ($post_translate as $pt): ?>
                            <?php if($pt->language == Yii::$app->language && $post->publish == 1): ?>
                            <li class="one-third entry animate-box" data-animate-effect="fadeIn">
                                <a href="<?= Url::to(['single', 'id'=>$pt->id_post]) ?>">
                                    <div class="entry-img" style="background-image: url(images/img_4.jpg)"></div>
                                    <div class="entry-desc">
                                        <h3><?= $pt->name ?></h3>
                                        <p><?= $pt->description ?></p>
                                    </div>
                                </a>
                                <a href="<?= Url::to(['view', 'id' => $post->id_post_category]) ?>" class="post-meta">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if($post->id_post_category == $category->category_id && $category->language == Yii::$app->language): ?>
                                            <?= $category->name ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <span class="date-posted"><?= Yii::$app->formatter->asRelativeTime($post->create_date)?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php $i++; ?>
                        <?php if($i % 3 === 0): ?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
