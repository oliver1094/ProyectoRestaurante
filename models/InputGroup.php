<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inp_group".
 *
 * @property string $idGroup
 * @property string $description
 * @property string $idClassification
 *
 * @property InpClassification $idClassification0
 * @property InpInput[] $inpInputs
 * @property InpPreparedinput[] $inpPreparedinputs
 * @property InpPresentation[] $inpPresentations
 */
class InputGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inp_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['idClassification'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['idClassification'], 'exist', 'skipOnError' => true, 'targetClass' => Classification::className(), 'targetAttribute' => ['idClassification' => 'idClassification']],
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
            'idClassification' => Yii::t('app', 'Id Classification'),
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
    public function getInputs()
    {
        return $this->hasMany(Input::className(), ['idGroup' => 'idGroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::className(), ['idGroup' => 'idGroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentations()
    {
        return $this->hasMany(Presentation::className(), ['idGroup' => 'idGroup']);
    }
}
