<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inp_classification".
 *
 * @property string $idClassification
 * @property string $description
 *
 * @property InpGroup[] $inpGroups
 * @property PrdGroup[] $prdGroups
 */
class Classification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inp_classification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idClassification' => Yii::t('app', 'Id Classification'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInputGroups()
    {
        return $this->hasMany(InputGroup::className(), ['idClassification' => 'idClassification']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGroups()
    {
        return $this->hasMany(ProductGroup::className(), ['idClassification' => 'idClassification']);
    }
}
