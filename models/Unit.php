<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inp_unit".
 *
 * @property string $idUnit
 * @property string $description
 * @property string $quantity
 * @property string $unitId
 *
 * @property InpInput[] $inpInputs
 * @property InpPreparedinput[] $inpPreparedinputs
 * @property Unit $unit
 * @property Unit[] $units
 * @property PrdProduct[] $prdProducts
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inp_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['quantity'], 'number'],
            [['unitId'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['unitId'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unitId' => 'idUnit']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUnit' => Yii::t('app', 'Id Unit'),
            'description' => Yii::t('app', 'Description'),
            'quantity' => Yii::t('app', 'Quantity'),
            'unitId' => Yii::t('app', 'Unit'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInputs()
    {
        return $this->hasMany(Input::className(), ['idUnit' => 'idUnit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::className(), ['idUnit' => 'idUnit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['idUnit' => 'unitId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['unitId' => 'idUnit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['idUnit' => 'idUnit']);
    }
}
