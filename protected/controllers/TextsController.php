<?php

class TextsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
    
    /**
     * Меняет шаблон отображения в зависимости от того, гость или админ
     */
    
    protected function beforeRender($view) {
        if(parent::beforeRender($view)) {
         if(Yii::app()->user->isGuest) $this->layout ='//layouts/column1';
         return true;
        }
        else 
            return false;                
    }
    
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','epoch', 'race', 'search'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','viewupdate', 'deletecharacter', 'deletegenre', 'deleterace'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$text = $this->loadModel($id);
        $this->pageTitle = Yii::app()->name.' - '.$text->title;
        $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


 /**
     * Добавление к фанфику персонажей, фандомов и жанров 
     */
     
     public function actionViewupdate($id) {
        $this->pageTitle = Yii::app()->name.' - '.$text->title.' Добавление персонажей';
        if(isset($_POST['genreId'])) {
	           $genreFanficModel = new Genrestext;
               $genreFanficModel->textid = $id;
               $genreFanficModel->genreid = $_POST['genreId'];
               $genreFanficModel->save();
        }
        
        if(isset($_POST['characterId'])) {
	           $charactersFanficsModel = new Charactertext;
               $charactersFanficsModel->textid = $id;
               $charactersFanficsModel->charid = $_POST['characterId'];
               $charactersFanficsModel->save();
	       }
           
        if(isset($_POST['raceId'])) {
	           $racesFanficsModel = new Racestext;
               $racesFanficsModel->textid = $id;
               $racesFanficsModel->raceid = $_POST['raceId'];
               $racesFanficsModel->save();
	    }   
        
        $this->pageTitle = Yii::app()->name.' - Добавление персонажей';   
		$this->render('viewupdate',array(
			'model'=>$this->loadModel($id),
		));
     }
     
     
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Texts;
        $this->pageTitle = Yii::app()->name.' -  Новый текст';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Texts']))
		{
			$model->attributes=$_POST['Texts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $this->pageTitle = Yii::app()->name.' - '.$model->title.' - Обновление';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Texts']))
		{
			$model->attributes=$_POST['Texts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
    
    
    /**
     * удаляет персонажей у определенного текста
     * @param integer $id  идентификатор связи "фанфик - персонаж"
     */
    public function actionDeletecharacter($id)	{
        $characterFanfModel = Charactertext::model()->findByPk($id);
        $idtext = $characterFanfModel->textid;
		$characterFanfModel->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id'=>$idtext));
	}
    
    /**
     * удаляет жанр у определенного текста
     * @param integer $id  идентификатор связи "фанфик - персонаж"
     */
    
    public function actionDeleteGenre($id) 
     {
        $genreFanfModel = Genrestext::model()->findByPk($id);
        $idtext = $genreFanfModel->textid;
		$genreFanfModel->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id'=>$idtext));
     }
    
    /**
     * удаляет упоминание народа у определенного текста
     * @param integer $id  идентификатор связи "текст - народ"
     */
    
    public function actionDeleteRace($id) 
     {
        $raceFanfModel = Racestext::model()->findByPk($id);
        $idtext = $raceFanfModel->textid;
		$raceFanfModel->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id'=>$idtext));
     }
    
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    $this->pageTitle = Yii::app()->name.' - Тексты';
		$dataProvider=new CActiveDataProvider('Texts',array('criteria'=>array('order'=>'datePublish DESC')));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
    
    /**
     * Выводит только тексты по определенной эпохе
     * @param integer $id  идентификатор эпохи
     */
    public function actionEpoch($id) {
        $epoch = Epochs::getEpoch($id); 
        $this->pageTitle = Yii::app()->name.' - '.$epoch->name.' эпоха';
        $criteria = new CDbCriteria();
        $criteria->addInCondition('epoch', array($id));
        $dataProvider=new CActiveDataProvider('Texts',array('criteria'=>$criteria));
        $this->render('epoch',array(
			'dataProvider'=>$dataProvider,
            'epochid'=>$id,
		));
         
    }
    
     /**
     * Выводит только тексты с определенным народом
     * @param integer $id  идентификатор народа
     */
    public function actionRace($id) {
        $race = Races::getRace($id); 
        $model = new Texts;
        $this->pageTitle = Yii::app()->name.' - '.$race->name;
        $dataProvider = $model -> textRace($id);
        $this->render('race',array(
			'dataProvider'=>$dataProvider,
            'raceid'=>$id,
		));
    }
	
    /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Texts('search');
        $this->pageTitle = Yii::app()->name.' -  Управление текстами';
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Texts']))
			$model->attributes=$_GET['Texts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
    
    /**
     * Поиск текстов по различным параметрам
     */
    public function actionSearch()    
	{
	    $characters = Helper::getArrayFromRequest('characters');	
		$genres = Helper::getArrayFromRequest('genres');
	    $model=new Texts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Texts']))
			$model->attributes=$_GET['Texts'];
        $requestText = Yii::app()->request->getParam('Texts');
        
        $this->pageTitle =Yii::app()->name.' - Поиск текстов'; 
        $this->render('special',array(
            'model' => $model,
            'character' => isset($characters[0]) ? $characters[0] : '',
			'characters' => Characters::getList($fandom),
			'genre' =>  isset($genres[0]) ? $genres[0] : '',
			'genres' => Genres::getList(),
            'minSize' => $requestText['minSize'],
            'maxSize' => $requestText['maxSize'],
		));
	   
	}
	   
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Texts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Texts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Texts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='texts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
