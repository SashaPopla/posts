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
        //$category = Category::find()->joinWith('categoryTranslates')->all();
        //$post = Post::find()->joinWith('postTranslations')->all();

        $this->setMeta('Verb');

        return $this->render('index');
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $category = CategoryTranslate::findOne(['category_id' => $id]);

        $this->setMeta('View: '.$category->name.'', '.$category->name.', '.$category->name.');

        return $this->render('view', compact('category'));
    }
}