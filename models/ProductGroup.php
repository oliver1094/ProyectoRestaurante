<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_group".
 *
 * @property string $idGroup
 * @property string $description
 * @property integer $requestAutorization
 * @property string $idClassification
 * @property string $groupId
 *
 * @property InpClassification $idClassification0
 * @property ProductGroup $group
 * @property ProductGroup[] $productGroups
 * @property PrdProduct[] $prdProducts
 */
class ProductGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'requestAutorization'], 'required'],
            [['requestAutorization', 'idClassification', 'groupId'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['idClassification'], 'exist', 'skipOnError' => true, 'targetClass' => Classification::className(), 'targetAttribute' => ['idClassification' => 'idClassification']],
            [['groupId'], 'exist', 'skipOnError' => true, 'targetClass' => ProductGroup::className(), 'targetAttribute' => ['groupId' => 'idGroup']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idGroup' => Yii::t('app', 'Id Group'),
            'description' => Yii::t('app', 'Description'),
            'requestAutorization' => Yii::t('app', 'Request Autorization'),
            'idClassification' => Yii::t('app', 'Id Classification'),
            'groupId' => Yii::t('app', 'Group ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClassification0()
    {
        return $this->hasOne(Classification::className(), ['idClassification' => 'idClassification']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(ProductGroup::className(), ['idGroup' => 'groupId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGroups()
    {
        return $this->hasMany(ProductGroup::className(), ['groupId' => 'idGroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['idGroup' => 'idGroup']);
    }
}
