<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inp_preparedinput_has_inp_input".
 *
 * @property string $idPreparedInput
 * @property string $idInput
 * @property string $quantity
 *
 * @property InpInput $idInput0
 * @property InpPreparedinput $idPreparedInput0
 */
class RecipeHasInput extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inp_preparedinput_has_inp_input';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPreparedInput', 'idInput', 'quantity'], 'required'],
            [['idPreparedInput', 'idInput'], 'integer'],
            [['quantity'], 'number'],
            [['idInput'], 'exist', 'skipOnError' => true, 'targetClass' => Input::className(), 'targetAttribute' => ['idInput' => 'idInput']],
            [['idPreparedInput'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['idPreparedInput' => 'idPreparedInput']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPreparedInput' => Yii::t('app', 'Id Recipe'),
            'idInput' => Yii::t('app', 'Id Input'),
            'quantity' => Yii::t('app', 'Quantity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInput()
    {
        return $this->hasOne(Input::className(), ['idInput' => 'idInput']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::className(), ['idPreparedInput' => 'idPreparedInput']);
    }
}
