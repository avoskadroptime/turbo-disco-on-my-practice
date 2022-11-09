<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mood".
 *
 * @property int $id
 * @property string $description
 * @property string $pic
 *
 * @property MoodByUser[] $moodByUsers
 */
class mood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mood';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'pic'], 'required'],
            [['description'], 'string', 'max' => 25],
            [['pic'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'pic' => 'Pic',
        ];
    }

    /**
     * Gets query for [[MoodByUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMoodByUsers()
    {
        return $this->hasMany(MoodByUser::class, ['id_mood' => 'id']);
    }
}
