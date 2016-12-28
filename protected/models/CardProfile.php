<?php

/**
 * This is the model class for table "{{card_profile}}".
 *
 * The followings are the available columns in table '{{card_profile}}':
 * @property integer $id
 * @property integer $cardtype
 * @property string  $name
 * @property integer $frequency
 * @property integer $symbolrate
 * @property integer $diseqc
 * @property integer $lnbvoltage
 * @property integer $modulation
 * @property integer $highband
 * @property integer $slowcam
 * @property integer $ttl
 * @property integer $epg
 * @property integer $streamtype
 * @property integer $priority
 * @property string $multicastnetwork
 *
 * The followings are the available model relations:
 * @property Card[] $cards
 * @property CStreamtype $streamtype
 * @property CAnswer $epg
 * @property CAnswer $slowscam
 * @property CAnswer $highband
 * @property CModulation $modulation
 * @property CLnbvoltage $lnbVoltage
 * @property CDiseqc $diseqc
 * @property CardType $cardtype
 * @property Program[] $programs
 */
class CardProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CardProfile the static model class
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
		return '{{card_profile}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cardtype, name, frequency, diseqc, lnbvoltage, modulation, highband, slowcam, ttl, epg, streamtype, priority, multicastnetwork', 'required'),
			array('cardtype, frequency, symbolrate, diseqc, lnbvoltage, modulation, highband, slowcam, ttl, epg, streamtype, priority', 'numerical', 'integerOnly'=>true),
			array('id, cardtype, name, frequency, symbolrate, diseqc, lnbvoltage, modulation, highband, slowcam, ttl, epg, streamtype, priority, multicastnetwork', 'safe', 'on'=>'search'),
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
			'Cards' => array(self::HAS_MANY, 'Card', 'id_active_profile'),
			'Streamtype' => array(self::BELONGS_TO, 'CStreamtype', 'streamtype'),
			'Epg' => array(self::BELONGS_TO, 'CAnswer', 'epg'),
			'Slowcam' => array(self::BELONGS_TO, 'CAnswer', 'slowcam'),
			'Highband' => array(self::BELONGS_TO, 'CAnswer', 'highband'),
			'Modulation' => array(self::BELONGS_TO, 'CModulation', 'modulation'),
			'Lnbvoltage' => array(self::BELONGS_TO, 'CLnbvoltage', 'lnbvoltage'),
			'Diseqc' => array(self::BELONGS_TO, 'CDiseqc', 'diseqc'),
			'Cardtype' => array(self::BELONGS_TO, 'CardType', 'cardtype'),
			'Programs' => array(self::HAS_MANY, 'Program', 'id_profile'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cardtype' => 'Card Type',                         
			'name' => 'Name',
			'frequency' => 'Frequency',
			'symbolrate' => 'Symbol Rate',
			'diseqc' => 'Diseqc',
			'lnbvoltage' => 'Lnb Voltage',
			'modulation' => 'Modulation',
			'highband' => 'High Band',              
			'slowcam' => 'Slow CAM',                                                                
			'ttl' => 'Ttl',
			'epg' => 'Epg',
			'streamtype' => 'Streamtype',
			'priority' => 'Priority',
			'multicastnetwork' => 'Multicast Network',
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
		$criteria->compare('cardtype',$this->cardtype);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('frequency',$this->frequency);
		$criteria->compare('symbolrate',$this->symbolrate);
		$criteria->compare('diseqc',$this->diseqc);
		$criteria->compare('lnbvoltage',$this->lnbvoltage);
		$criteria->compare('modulation',$this->modulation);        
		$criteria->compare('highband',$this->highband);
		$criteria->compare('slowcam',$this->slowcam);  
		$criteria->compare('ttl',$this->ttl);
		$criteria->compare('epg',$this->epg);
		$criteria->compare('streamtype',$this->streamtype);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('multicastnetwork',$this->multicastnetwork,true);

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