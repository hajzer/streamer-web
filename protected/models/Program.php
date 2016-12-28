<?php

/**
 * This is the model class for table "{{program}}".
 *
 * The followings are the available columns in table '{{program}}':
 * @property integer $id
 * @property integer $id_profile
 * @property string $name
 * @property integer $pid
 * @property string $multicast_ip
 * @property integer $multicast_port
 * @property integer $stream
 *
 * The followings are the available model relations:
 * @property CAnswer $streamStart
 * @property CardProfile $idProfile
 */
class Program extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Program the static model class
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
		return '{{program}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_profile, name, pid, stream', 'required'),
			array('id_profile, pid, multicast_port, stream', 'numerical', 'integerOnly'=>true),
			array('multicast_ip', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_profile, name, pid, multicast_ip, multicast_port, stream', 'safe', 'on'=>'search'),
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
			'streamStart' => array(self::BELONGS_TO, 'CAnswer', 'stream'),
			'idProfile' => array(self::BELONGS_TO, 'CardProfile', 'id_profile'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_profile' => 'Id Profile',
			'name' => 'Name',
			'pid' => 'Sid',
			'multicast_ip' => 'Multicast Ip',
			'multicast_port' => 'Multicast Port',
			'stream' => 'Stream Start',
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
		$criteria->compare('id_profile',$this->id_profile);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('multicast_ip',$this->multicast_ip,true);
		$criteria->compare('multicast_port',$this->multicast_port);
		$criteria->compare('stream',$this->stream);

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