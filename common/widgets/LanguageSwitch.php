<?php

namespace common\widgets;

use Yii;
use common\models\Language;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class LanguageSwitch extends Widget
{
    public $items = [];
    public $labelAttribute = 'icon';

    public function init()
    {
        $languages = Language::find()->all();

        if (count($languages) <= 1) {
            return false;
        }
        foreach ($languages as $language) {
            $this->items[] =
                Html::a($language->name, Url::current(['language' => $language->url]), ['class' => Yii::$app->language == $language->name ? 'active_lang' : ''])
                . '<span class="special" style = "color: #fff;" >|</span >';;
        }

        echo implode(' ', $this->items);
    }
}