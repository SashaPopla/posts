<?php

namespace common\components;

use Yii;
use codemix\localeurls\UrlManager as BaseUrlManager;
use common\models\Language;

class UrlManager extends BaseUrlManager
{
    public $items = [];
    public function init()
    {
        $languages = Language::find()->all();

        if(count($languages) < 1) {
            return false;
        }
        foreach ($languages as $language) {
            $this->items[] = $language->url;
        }
        $this->languages = $this->items;
        parent::init();
    }
}