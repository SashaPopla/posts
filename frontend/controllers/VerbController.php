<?php

namespace frontend\controllers;

use Yii;
use common\models\Category;
use common\models\CategoryTranslate;
use common\models\Post;
use common\models\PostTranslation;

class VerbController extends AppController
{
    public function actionIndex()
    {
        $categories = CategoryTranslate::find()->all();
        $posts = Post::find()->joinWith('postTranslations')->all();

        $this->setMeta('Verb');

        return $this->render('index', compact('posts', 'categories'));
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $categories = CategoryTranslate::find()->where(['category_id' => $id])->all();
        $category = CategoryTranslate::find()->where(['category_id' => $id])->one();

        $posts = Post::find()->joinWith('postTranslations')->all();

        $this->setMeta('View: '.$category->name.'', '.$category->name.', '.$category->name.');

        return $this->render('view', compact('categories', 'posts', 'category'));
    }

    public function actionSingle()
    {
        $id = Yii::$app->request->get('id');

        //$categories = CategoryTranslate::find()->where(['category_id' => $id])->all();

        return $this->render('single');
    }
}