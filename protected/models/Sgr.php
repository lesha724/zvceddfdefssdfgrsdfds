<?php

/**
 * This is the model class for table "sgr".
 *
 * The followings are the available columns in table 'sgr':
 * @property integer $sgr1
 * @property string $sgr2
 * @property integer $sgr4
 */
class Sgr extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sgr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sgr1', 'required'),
			array('sgr1, sgr4', 'numerical', 'integerOnly'=>true),
			array('sgr2', 'length', 'max'=>180),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sgr1, sgr2, sgr4', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sgr1' => 'Sgr1',
			'sgr2' => 'Sgr2',
			'sgr4' => 'Sgr4',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('sgr1',$this->sgr1);
		$criteria->compare('sgr2',$this->sgr2,true);
		$criteria->compare('sgr4',$this->sgr4);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sgr the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getAllCitizenship()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('sgr1 > 0');

        $citizenship = $this->findAll($criteria);

        return $citizenship;
    }

}
