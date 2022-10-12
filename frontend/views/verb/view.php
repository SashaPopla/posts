<?php
/** @var object $categories */
/** @var object $category */
/** @var object $posts */

use yii\helpers\Url;
?>

<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image:url(images/img_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-left">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                        <span class="date-post">Category</span>
                        <?php foreach ($categories as $categoryLang): ?>
                            <?php if($categoryLang->language == Yii::$app->language): ?>
                                <h1 class="mb30t"> <?= $categoryLang->name ?> </h1>
                            <?php endif; ?>
                        <?php endforeach; ?>
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
                <?php if( !empty($posts) ): ?>
                    <ul id="gtco-post-list">
                        <?php $i = 0; foreach ($posts as $post): ?>
                            <?php $post_translate = $post->postTranslations; ?>
                            <?php foreach ($post_translate as $pt): ?>
                                <?php if($pt->language == Yii::$app->language && $post->publish == 1 && $category->category_id == $post->id_post_category): ?>
                                    <li class="one-third entry animate-box" data-animate-effect="fadeIn">
                                        <a href="<?= Url::to(['single', 'id'=>$pt->id_post]) ?>">
                                            <div class="entry-img" style="background-image: url(images/img_4.jpg)"></div>
                                            <div class="entry-desc">
                                                <h3><?= $pt->name ?></h3>
                                                <p><?= $pt->description ?></p>
                                            </div>
                                        </a>
                                        <a href="<?= Url::to(['view', 'id' => $post->id_post_category]) ?>" class="post-meta"> <span class="date-posted"><?= Yii::$app->formatter->asRelativeTime($post->create_date)?></span></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                        <?php $i++; ?>
                        <?php if($i % 3 === 0): ?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
