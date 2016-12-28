<?php

/**
 * This is the model class for table "{{card}}".
 *
 * The followings are the available columns in table '{{card}}':
 * @property integer $id
 * @property string $name
 * @property integer $cardtype
 * @property integer $slot
 * @property integer $id_active_profile
 * @property integer $streamautostart
 *
 * The followings are the available model relations:
 * @property CAnswer $StreamAutostart
 * @property CardProfile $idActiveProfile
 * @property BoardSlot $Slot
 * @property CardType $CardType
 */
class Card extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Card the static model class
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
		return '{{card}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cardtype, slot, id_active_profile, streamautostart', 'required'),
                         array('cardtype, slot, id_active_profile, streamautostart', 'numerical', 'integerOnly'=>true),
			// BH ADD			
                        // array('cardtype', 'in', 'range'=>array_keys(CHtml::listData(CardType::model()->findAll(), 'id', 'name')), 'allowEmpty'=>false),
			// BH ADD			
                       //  array('slot', 'in', 'range'=>array_keys(CHtml::listData(BoardSlot::model()->findAll(), 'id', 'name')), 'allowEmpty'=>false),
			// BH ADD			
            //             array('id_active_profile', 'in', 'range'=>array_keys(CHtml::listData(CardProfile::model()->findAll(), 'id', 'name')), 'allowEmpty'=>false),	
                         // BH ADD
              //           array('streamautostart', 'in', 'range'=>array_keys(CHtml::listData(CAnswer::model()->findAll(), 'id', 'name')), 'allowEmpty'=>false),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, cardtype, slot, id_active_profile, streamautostart', 'safe', 'on'=>'search'),
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
                         'StreamAutostart' => array(self::BELONGS_TO, 'CAnswer', 'streamautostart'),
			'ActiveProfile' => array(self::BELONGS_TO, 'CardProfile', 'id_active_profile'),
			'Cardtype' => array(self::BELONGS_TO, 'CardType', 'cardtype'),
			'BoardSlot' => array(self::BELONGS_TO, 'BoardSlot', 'slot'),
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
                         'cardtype' => 'Card Type',
			'slot' => 'PCI Slot',
			'id_active_profile' => 'Active Profile',
			'streamautostart' => 'Stream Autostart',
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
		$criteria->compare('cardtype',$this->cardtype);
		$criteria->compare('slot',$this->slot,true);
		$criteria->compare('id_active_profile',$this->id_active_profile);
		$criteria->compare('streamautostart',$this->streamautostart);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
  public function behaviors() {
       return array(
           'ERememberFiltersBehavior' => array(
               'class' => 'application.components.ERememberFiltersBehavior',
               'defaults'=>array(),           /* optional line */
               'defaultStickOnClear'=>false   /* optional line */
           ),
       );
}

}