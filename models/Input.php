<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inp_input".
 *
 * @property string $idInput
 * @property string $description
 * @property string $lastCost
 * @property string $averageCost
 * @property string $iva
 * @property string $costWithTax
 * @property integer $stockable
 * @property string $wasteRate
 * @property string $lastCostWaste
 * @property string $idGroup
 * @property string $idUnit
 *
 * @property InpGroup $idGroup0
 * @property InpUnit $idUnit0
 * @property InpPreparedinputHasInpInput[] $inpPreparedinputHasInpInputs
 * @property InpPreparedinput[] $idPreparedInputs
 * @property InpPresentation[] $inpPresentations
 */
class Input extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inp_input';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'lastCost', 'averageCost', 'costWithTax', 'wasteRate', 'lastCostWaste'], 'required'],
            [['lastCost', 'averageCost', 'iva', 'costWithTax', 'wasteRate', 'lastCostWaste'], 'number'],
            [['stockable', 'idGroup', 'idUnit'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['idGroup'], 'exist', 'skipOnError' => true, 'targetClass' => InputGroup::className(), 'targetAttribute' => ['idGroup' => 'idGroup']],
            [['idUnit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['idUnit' => 'idUnit']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInput' => Yii::t('app', 'Id Input'),
            'description' => Yii::t('app', 'Description'),
            'lastCost' => Yii::t('app', 'Last Cost'),
            'averageCost' => Yii::t('app', 'Average Cost'),
            'iva' => Yii::t('app', 'Iva'),
            'costWithTax' => Yii::t('app', 'Cost With Tax'),
            'stockable' => Yii::t('app', 'Stockable'),
            'wasteRate' => Yii::t('app', 'Waste Rate'),
            'lastCostWaste' => Yii::t('app', 'Last Cost Waste'),
            'idGroup' => Yii::t('app', 'Id Group'),
            'idUnit' => Yii::t('app', 'Id Unit'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(InputGroup::className(), ['idGroup' => 'idGroup']);
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
    public function getRecipeHasInputs()
    {
        return $this->hasMany(RecipeHasInput::className(), ['idInput' => 'idInput']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::className(), ['idPreparedInput' => 'idPreparedInput'])->viaTable('inp_preparedinput_has_inp_input', ['idInput' => 'idInput']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentations()
    {
        return $this->hasMany(Presentation::className(), ['idInput' => 'idInput']);
    }
}
