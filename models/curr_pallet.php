<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curr_pallet".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_pallet
 *
 * @property ColorPallet $pallet
 * @property User $user
 */
class curr_pallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curr_pallet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_pallet'], 'required'],
            [['id_user', 'id_pallet'], 'integer'],
            [['id_user'], 'unique'],
            [['id_pallet'], 'exist', 'skipOnError' => true, 'targetClass' => ColorPallet::class, 'targetAttribute' => ['id_pallet' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
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
            'id_pallet' => 'Id Pallet',
        ];
    }

    /**
     * Gets query for [[Pallet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPallet()
    {
        return $this->hasOne(ColorPallet::class, ['id' => 'id_pallet']);
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
