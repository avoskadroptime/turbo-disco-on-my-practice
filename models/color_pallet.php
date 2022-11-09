<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "color_pallet".
 *
 * @property int $id
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $e
 *
 * @property CurrPallet[] $currPallets
 */
class color_pallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'color_pallet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a', 'b', 'c', 'd', 'e'], 'required'],
            [['a', 'b', 'c', 'd', 'e'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'a' => 'Цвет A',
            'b' => 'Цвет B',
            'c' => 'Цвет C',
            'd' => 'Цвет D',
            'e' => 'Цвет E',
        ];
    }

    /**
     * Gets query for [[CurrPallets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrPallets()
    {
        return $this->hasMany(CurrPallet::class, ['id_pallet' => 'id']);
    }
}
