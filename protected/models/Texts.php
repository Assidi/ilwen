<?php

/**
 * This is the model class for table "texts".
 *
 * The followings are the available columns in table 'texts':
 * @property integer $id
 * @property string $title
 * @property integer $datePublish
 * @property string $raiting
 * @property string $category
 * @property string $summary
 * @property string $note
 * @property integer $size
 * @property integer $epoch
 * @property integer $book
 * @property string $text
 * @property integer $translate
 * @property string $author
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Charactertext[] $charactertexts
 * @property Genrestext[] $genrestexts
 * @property Racestext[] $racestexts
 * @property Epochs $epoch0
 * @property Books $book0
 */
class Texts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'texts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, raiting, summary,  epoch, text, book, category', 'required'),
			array('datePublish, size, epoch, book, translate', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('raiting, category', 'length', 'max'=>10),
			array('author', 'length', 'max'=>50),
			array('url', 'length', 'max'=>100),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, datePublish, raiting, category, summary, note, size, epoch, book, text, translate, author, url', 'safe', 'on'=>'search'),
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
			'charactertexts' => array(self::HAS_MANY, 'Charactertext', 'textid'),
			'genrestexts' => array(self::HAS_MANY, 'Genrestext', 'textid'),
			'racestexts' => array(self::HAS_MANY, 'Racestext', 'textid'),
			'epoch0' => array(self::BELONGS_TO, 'Epochs', 'epoch'),
            'book0' => array(self::BELONGS_TO, 'Books', 'book'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'title' => 'Заголовок',
			'datePublish' => 'Дата публикации',
			'raiting' => 'Рейтинг',
            'category' => 'Категория',
			'summary' => 'Краткое содержание',
			'note' => 'Примечание',
			'size' => 'Количество слов',
			'epoch' => 'Эпоха',
            'book' => 'Книга',
			'text' => 'Текст',
			'translate' => 'Перевод',
			'author' => 'Автор оригинала',
			'url' => 'Ссылка на оригинал',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('datePublish',$this->datePublish);
		$criteria->compare('raiting',$this->raiting,true);
        $criteria->compare('category',$this->category,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('epoch',$this->epoch);
        $criteria->compare('book',$this->book);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('translate',$this->translate);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Texts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /** 
    * Перед сохранением записываем текущую дату и считаем количество слов  
    */ 
    
    protected function beforeSave() {
        if(parent::beforeSave()) {
            if($this->isNewRecord) {
                $this->datePublish = time();            
                $this->size = Helper::countWords($this->text);
         }  
         return true;
        }
        else 
            return false;                
    }
    
    /** 
    * @return array список моделей жанров текущего текста 
    */ 
    public function getGenres() 
    { 
        $arGenres = array();
       
        if ($this->genrestexts) { 
            foreach($this->genrestexts as $genreTextModel) {                
                $arGenres[$genreTextModel->id] = $genreTextModel->genre; 
            } 
        }        
        return $arGenres; 
    }
    
    /** 
    * @return array список моделей жанров текущего текста 
    */ 
    public function genresList() 
    { 
        $arGenres = array();
        $genList = '';
       
        if ($this->genrestexts) { 
            foreach($this->genrestexts as $genreTextModel) {                
                $arGenres[$genreTextModel->id] = $genreTextModel->genre; 
            } 
            // здесь у нас есть жанры, надо из них сделать строку            
            foreach($arGenres as $gen) {                
                $genList = $genList.$gen->name.', ';
            }
            // теперь убираем последние два символа
            $l = strlen($genList);
            $genList = substr($genList, 0, $l-2);
        }        
        return $genList; 
    }
    
    /** 
    * @return array список моделей персонажей текущего текста 
    */ 
    
    public function getCharacters() {
        $arCharact = array();
        if ($this->charactertexts) {
            foreach($this->charactertexts as $charTextModel) { 
                $arCharact[$charTextModel->id] = $charTextModel->char; 
            } 
        } 
        return $arCharact;   
    } 
    /** 
    * @return string список  персонажей текущего текста через запятую 
    */ 
    
    public function characterList() {
        $arCharact = array();
        $charList = '';
        if ($this->charactertexts) {
            foreach($this->charactertexts as $charTextModel) { 
                $arCharact[$charTextModel->id] = $charTextModel->char; 
            } 
            // здесь у нас есть персонажи, надо из них сделать строку            
            foreach($arCharact as $charact) {                
                $charList = $charList.$charact->name.', ';
            }
            // теперь убираем последние два символа
            $l = strlen($charList);
            $charList = substr($charList, 0, $l-2);
        } 
        
        return $charList;
    }
    
    /** 
    * @return array список моделей народов текущего текста 
    */ 
    
    public function getRaces() {
        $arRace = array();
        if ($this->racestexts) {
            foreach($this->racestexts as $raceTextModel) { 
                $arRace[$raceTextModel->id] = $raceTextModel->race; 
            } 
        } 
        return $arRace;   
    } 
    
    /** 
    * @return array тексты по определенному народу
    */ 
    public function textRace($id) {
        $criteria = new CDbCriteria();
		$withCriteria = array();
        $races = array($id);        
        $withCriteria['racestexts'] = array('together' => true);
        $criteria->addInCondition('racestexts.raceid', $races);
        $criteria->with = $withCriteria;
        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));        		
    }
    
    /** 
    * @return array тексты по определенному народу
    */ 
    public static function textRace1($id) {
        $criteria = new CDbCriteria();
		$withCriteria = array();
        $races = array($id);        
        $withCriteria[] = 'racestexts.race';
        $criteria->addInCondition('race.id', $races);
        $criteria->with = $withCriteria;
        $model = Texts::model()->findAll($criteria);        
        return $model;		
    }
    
    
}
