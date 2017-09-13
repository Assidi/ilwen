<?php

/**
 * This is the model class for table "characters".
 *
 * The followings are the available columns in table 'characters':
 * @property integer $id
 * @property string $name
 * @property integer $race
 *
 * The followings are the available model relations:
 * @property Races $race0
 * @property Charactertext[] $charactertexts
 */
class Characters extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'characters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, race', 'required'),
			array('race', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, race', 'safe', 'on'=>'search'),
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
			'race0' => array(self::BELONGS_TO, 'Races', 'race'),
			'charactertexts' => array(self::HAS_MANY, 'Charactertext', 'charid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'name' => 'Имя',
			'race' => 'Народ',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('race',$this->race);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Characters the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * Получает список всех персонажей, отсортированных по алфавиту
     */
    public static function getList() {
        $criteria=new CDbCriteria(array('order'=>'name'));
        $models = self::model()->findAll($criteria);
		if (!$models) {
			return array();
		}
		
        $arList = array('' => '');
		foreach ($models as $model) {
			$arList[$model->id] = $model->name;
		}
		return $arList;
    }
}
