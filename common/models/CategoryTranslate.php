<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_translate".
 *
 * @property int $id
 * @property int $category_id
 * @property string $language
 * @property string $name
 * @property string $description
 *
 * @property Category $category
 */
class CategoryTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'language', 'name', 'description'], 'required'],
            [['category_id'], 'integer'],
            [['description'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'language' => Yii::t('app', 'Language'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
