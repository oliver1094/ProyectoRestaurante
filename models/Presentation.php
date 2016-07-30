<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inp_presentation".
 *
 * @property string $idPresentation
 * @property string $description
 * @property string $lastCost
 * @property string $averageCost
 * @property string $iva
 * @property string $costWithTaxes
 * @property string $provider
 * @property string $performance
 * @property string $status
 * @property string $location
 * @property string $minimumStock
 * @property string $maximumStock
 * @property string $idGroup
 * @property string $idInput
 *
 * @property InpGroup $idGroup0
 * @property InpInput $idInput0
 */
class Presentation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inp_presentation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'lastCost', 'averageCost', 'iva', 'costWithTaxes', 'provider', 'performance', 'status', 'minimumStock', 'maximumStock'], 'required'],
            [['lastCost', 'averageCost', 'iva', 'costWithTaxes', 'performance', 'minimumStock', 'maximumStock'], 'number'],
            [['idGroup', 'idInput'], 'integer'],
            [['description', 'location'], 'string', 'max' => 255],
            [['provider', 'status'], 'string', 'max' => 45],
            [['idGroup'], 'exist', 'skipOnError' => true, 'targetClass' => InputGroup::className(), 'targetAttribute' => ['idGroup' => 'idGroup']],
            [['idInput'], 'exist', 'skipOnError' => true, 'targetClass' => Input::className(), 'targetAttribute' => ['idInput' => 'idInput']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPresentation' => Yii::t('app', 'Id Presentation'),
            'description' => Yii::t('app', 'Description'),
            'lastCost' => Yii::t('app', 'Last Cost'),
            'averageCost' => Yii::t('app', 'Average Cost'),
            'iva' => Yii::t('app', 'Iva'),
            'costWithTaxes' => Yii::t('app', 'Cost With Taxes'),
            'provider' => Yii::t('app', 'Provider'),
            'performance' => Yii::t('app', 'Performance'),
            'status' => Yii::t('app', 'Status'),
            'location' => Yii::t('app', 'Location'),
            'minimumStock' => Yii::t('app', 'Minimum Stock'),
            'maximumStock' => Yii::t('app', 'Maximum Stock'),
            'idGroup' => Yii::t('app', 'Id Group'),
            'idInput' => Yii::t('app', 'Id Input'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup0()
    {
        return $this->hasOne(InputGroup::className(), ['idGroup' => 'idGroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInput0()
    {
        return $this->hasOne(Input::className(), ['idInput' => 'idInput']);
    }
}
