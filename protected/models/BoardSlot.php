<?php

/**
 * This is the model class for table "{{board_slot}}".
 *
 * The followings are the available columns in table '{{board_slot}}':
 * @property integer $id
 * @property string $name
 * @property string $pciid
 * @property integer $dev
 *
 * The followings are the available model relations:
 * @property Card[] $cards
 */
class BoardSlot extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BoardSlot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{board_slot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, pciid, dev', 'required'),
			array('dev', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pciid, dev', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cards' => array(self::HAS_MANY, 'Card', 'slot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'pciid' => 'Pciid',
			'dev' => 'Dev',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pciid',$this->pciid,true);
		$criteria->compare('dev',$this->dev);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}