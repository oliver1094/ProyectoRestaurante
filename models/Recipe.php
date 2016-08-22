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
 * @property string $picture1
 * @property string $picture2
 *
 * @property InpGroup $Group
 * @property InpUnit $Unit
 * @property InpPreparedinputHasInpInput[] $PreparedinputHasInpInputs
 * @property InpInput[] $Inputs
 */
class Recipe extends \yii\db\ActiveRecord
{
    public $file_picture1;
    public $file_picture2;
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
            [['picture1', 'picture2'], 'string', 'max' => 100],
            [['idGroup'], 'exist', 'skipOnError' => true, 'targetClass' => InputGroup::className(), 'targetAttribute' => ['idGroup' => 'idGroup']],
            [['idUnit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['idUnit' => 'idUnit']],
            
            [['file_picture1'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp', 'on' => 'Create'],
            [['file_picture1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, bmp', 'on' => 'Update'],
            
            [['file_picture2'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp', 'on' => 'Create'],
            [['file_picture2'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, bmp', 'on' => 'Update'],
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
            'picture1' => Yii::t('app', 'Recipe Picture 1'),
            'picture2' => Yii::t('app', 'Recipe Picture 2')
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
    
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            // PAYMENT_RECEIPT
            if( !empty($this->file_picture1) )
            {
                $fileNameRecipePicture1 = uniqid() . '.' . $this->file_picture1->extension;
                $this->file_picture1->saveAs('uploads/recipe/' . $fileNameRecipePicture1);
                $this->picture1 = $fileNameRecipePicture1;
            }
            
            if( !empty($this->file_picture2) )
            {
                $fileNameRecipePicture2 = uniqid() . '.' . $this->file_picture2->extension;
                $this->file_picture2->saveAs('uploads/recipe/' . $fileNameRecipePicture2);
                $this->picture2 = $fileNameRecipePicture2;
            }

            return true;
        }
        return false;
    }
}
