<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_product".
 *
 * @property string $idProduct
 * @property string $description
 * @property string $costWithTaxes
 * @property string $costWithoutTaxes
 * @property integer $taxFreeProduct
 * @property string $iva
 * @property string $idGroup
 * @property string $idUnit
 *
 * @property InpUnit $idUnit0
 * @property PrdGroup $idGroup0
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'costWithTaxes', 'costWithoutTaxes', 'taxFreeProduct', 'iva'], 'required'],
            [['costWithTaxes', 'costWithoutTaxes', 'iva'], 'number'],
            [['taxFreeProduct', 'idGroup', 'idUnit'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['idUnit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['idUnit' => 'idUnit']],
            [['idGroup'], 'exist', 'skipOnError' => true, 'targetClass' => ProductGroup::className(), 'targetAttribute' => ['idGroup' => 'idGroup']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProduct' => Yii::t('app', 'Id Product'),
            'description' => Yii::t('app', 'Description'),
            'costWithTaxes' => Yii::t('app', 'Cost With Taxes'),
            'costWithoutTaxes' => Yii::t('app', 'Cost Without Taxes'),
            'taxFreeProduct' => Yii::t('app', 'Tax Free Product'),
            'iva' => Yii::t('app', 'Iva'),
            'idGroup' => Yii::t('app', 'Id Group'),
            'idUnit' => Yii::t('app', 'Id Unit'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['idUnit' => 'idUnit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(ProductGroup::className(), ['idGroup' => 'idGroup']);
    }
}
