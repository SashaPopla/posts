<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_translation".
 *
 * @property int $id
 * @property int $id_post
 * @property string $language
 * @property string $name
 * @property string $description
 * @property string $content
 *
 * @property Post $post
 */
class PostTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_post', 'language', 'name', 'description', 'content'], 'required'],
            [['id_post'], 'integer'],
            [['description', 'content'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['name'], 'string', 'max' => 255],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_post' => Yii::t('app', 'Id Post'),
            'language' => Yii::t('app', 'Language'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }
}
