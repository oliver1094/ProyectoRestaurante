<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inp_preparedinput".
 *
 * @property string $idPreparedInput
 * @property string $description
 * @property string $performanceRecipe
 * @property string $unitCost
 * @property string $averageCost
 * @property integer $investable
 * @property string $idGroup
 * @property string $idUnit
 *
 * @property InpGroup $idGroup0
 * @property InpUnit $idUnit0
 * @property InpPreparedinputHasInpInput[] $inpPreparedinputHasInpInputs
 * @property InpInput[] $idInputs
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inp_preparedinput';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'performanceRecipe', 'unitCost', 'averageCost', 'investable'], 'required'],
            [['performanceRecipe', 'unitCost', 'averageCost'], 'number'],
            [['investable', 'idGroup', 'idUnit'], 'integer'],
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
            'idPreparedInput' => Yii::t('app', 'Id Recipe'),
            'description' => Yii::t('app', 'Description'),
            'performanceRecipe' => Yii::t('app', 'Performance Recipe'),
            'unitCost' => Yii::t('app', 'Unit Cost'),
            'averageCost' => Yii::t('app', 'Average Cost'),
            'investable' => Yii::t('app', 'Investable'),
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
        return $this->hasMany(RecipeHasInput::className(), ['idPreparedInput' => 'idPreparedInput']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInputs()
    {
        return $this->hasMany(Input::className(), ['idInput' => 'idInput'])->viaTable('inp_preparedinput_has_inp_input', ['idPreparedInput' => 'idPreparedInput']);
    }
}
