<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $id_post_category
 * @property string $url
 * @property string $img
 * @property int $publish
 * @property int $create_date
 *
 * @property Category $postCategory
 * @property PostTranslation[] $postTranslations
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_post_category', 'url', 'img', 'create_date'], 'required'],
            [['id_post_category', 'publish', 'create_date'], 'integer'],
            [['url', 'img'], 'string', 'max' => 100],
            [['id_post_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_post_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_post_category' => Yii::t('app', 'Id Post Category'),
            'url' => Yii::t('app', 'Url'),
            'img' => Yii::t('app', 'Img'),
            'publish' => Yii::t('app', 'Publish'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[PostCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_post_category']);
    }

    /**
     * Gets query for [[PostTranslations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostTranslations()
    {
        return $this->hasMany(PostTranslation::className(), ['id_post' => 'id']);
    }
}
