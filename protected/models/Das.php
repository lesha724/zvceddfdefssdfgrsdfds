<?php

/**
 * This is the model class for table "das".
 *
 * The followings are the available columns in table 'das':
 * @property integer $das1
 * @property string $das2
 * @property integer $das3
 * @property integer $das4
 * @property string $das5
 */
class Das extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'das';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('das1', 'required'),
			array('das1, das3, das4', 'numerical', 'integerOnly'=>true),
			array('das2', 'length', 'max'=>120),
			array('das5', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('das1, das2, das3, das4, das5', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'das1' => 'Das1',
			'das2' => 'Das2',
			'das3' => 'Das3',
			'das4' => 'Das4',
			'das5' => 'Das5',
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

		$criteria->compare('das1',$this->das1);
		$criteria->compare('das2',$this->das2,true);
		$criteria->compare('das3',$this->das3);
		$criteria->compare('das4',$this->das4);
		$criteria->compare('das5',$this->das5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Das the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getAllCountries()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('das1 > 0');

        $countries = $this->findAll($criteria);

        return $countries;
    }

}
