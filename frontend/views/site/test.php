<?php
use common\models\Post;
use common\models\PostTranslation;
use common\models\Category;
use common\models\CategoryTranslate;

$model = Category::find()->joinWith("posts")->all();

$post = Post::find()->joinWith('postTranslations')->all();
?>

<div>
    <?php foreach ($post as $p): ?>
        <?= debug($p->id_post_category) ?>
        <?php $post_t = $p->postTranslations; ?>
        <?php foreach ($post_t as $t): ?>
            <?php if(Yii::$app->language == $t->language): ?>
                <?= $t->name ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>