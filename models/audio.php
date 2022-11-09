<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "audio".
 *
 * @property int $id
 * @property int $way
 * @property string|null $tittle
 * @property int $id_user
 * @property string $created_at
 */
class audio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'audio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['way', 'id_user'], 'required'],
            [['way', 'id_user'], 'integer'],
            [['created_at'], 'safe'],
            [['tittle'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'way' => 'Путь',
            'tittle' => 'Название',
            'id_user' => 'Id пользователя',
            'created_at' => 'создано в',
        ];
    }
}
