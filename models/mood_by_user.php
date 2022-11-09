<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mood_by_user".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_mood
 * @property string $created_at
 *
 * @property Mood $mood
 * @property User $user
 */
class mood_by_user extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mood_by_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_mood', 'created_at'], 'required'],
            [['id_user', 'id_mood'], 'integer'],
            [['created_at'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_mood'], 'exist', 'skipOnError' => true, 'targetClass' => Mood::class, 'targetAttribute' => ['id_mood' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_mood' => 'Id Mood',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Mood]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMood()
    {
        return $this->hasOne(Mood::class, ['id' => 'id_mood']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
