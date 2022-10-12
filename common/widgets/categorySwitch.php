<?php

namespace common\widgets;

use yii\base\Widget;
use common\models\Category;

class categorySwitch extends Widget
{
    public function init()
    {
        $category = Category::find()->joinWith('categoryTranslates')->all();

        foreach ($category as $categor){
            $category_tr = $categor->categoryTranslates;



        }
    }
}