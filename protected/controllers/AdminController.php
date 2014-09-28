<?php

class AdminController extends Controller
{
	public $layout='column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('/admin');
	}
	public function actionLogin()
	{

		if(Yii::app()->user->isGuest){
		
			if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
				throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");

			$model=new LoginForm;

			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			
			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				
				$model->attributes=$_POST['LoginForm'];
	
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login())				
					$this->redirect(Yii::app()->user->returnUrl);

			}
			// display the login form
			$this->render('login',array('model'=>$model));
			
		}
		else $this->redirect('/admin');
	}
	
	public function actionDelete($id = 0){
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'work_id = :work_id';
		$criteria->params = [':work_id'=>$id];
		
		Workscategory::model()->deleteAll($criteria);

		Images::model()->deleteAll($criteria);
			
		$post = Works::model()->findByPk($id);
		$post->delete();
		
		$this->redirect('/admin');
	}

	public function actionAdd()
    {
        if (Yii::app()->request->getPost('add')) {

            define ('PATH', realpath(dirname(__FILE__) . "../../../"));

            $post = new Works;

            $post->header = Yii::app()->request->getPost('header');
            $post->link = Yii::app()->request->getPost('link');
            $post->description = Yii::app()->request->getPost('description');
            $post->tags = Yii::app()->request->getPost('tags');

            if (!empty($_FILES['preview']['tmp_name'])) {
                $imageinfo = getimagesize($_FILES['preview']['tmp_name']);
                if ($imageinfo['mime'] != 'image/gif' || $imageinfo['mime'] != 'image/jpeg' || $imageinfo['mime'] != 'image/png') {
                    $post->preview = time() . $this->translit(basename($_FILES['preview']['name']));
                    move_uploaded_file($_FILES['preview']['tmp_name'], PATH . 'static/img/works/' . $post->preview);
                }
            }

            if ($post->save()) {

                $worksCategory = new Workscategory;
                $worksCategory->category_id = Yii::app()->request->getPost('category');
                $worksCategory->work_id = $post->id;
                $worksCategory->save();

                foreach ($_FILES["files"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $imageinfo = getimagesize($_FILES['files']['tmp_name'][$key]);
                        if ($imageinfo['mime'] != 'image/gif' || $imageinfo['mime'] != 'image/jpeg' || $imageinfo['mime'] != 'image/png') {
                            $tmp_name = $_FILES["files"]["tmp_name"][$key];
                            $name = time() . $_FILES["files"]["name"][$key];

                            $image = new Images;
                            $image->work_id = $post->id;
                            $image->image = $name;

                            if (move_uploaded_file($tmp_name, PATH . 'static/img/works/' . $name)) {
                                $image->save();
                            }
                        }
                    }
                }

                $this->redirect('/admin');

            }
            else {
                echo "При сохранении произошла ошибка";
            }
        }
        else{
            $categories = Categories::model()->findAll();
            $this->render('add',['categories'=>$categories]);
        }

    }
	public function actionIndex(){
		$works = Works::model()->findAll();

		$this->render('index', ['works'=>$works]);
	}
	
	function translit($str) 
	{
		$tr = array(
			"А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
			"Д"=>"d","Е"=>"e","Ё"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
			"Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
			"О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
			"У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
			"Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
			"Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
			"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
			"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
			"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
			"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
			"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
			"ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", 
			" "=> "-", "/"=> "_","&"=>"", "?"=> "", ","=> "","«"=>"","»"=>"",":"=>"","^"=>"","&"=>"", "("=> "", ")"=> "", "&raquo;"=>"", "&laquo;"=>"", '"'=>"", "'"=>""
		);
		return strtr($str,$tr);
	}
	
}
