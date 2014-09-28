<?php

class WorksController extends Controller
{
	public $layout='column2';

	public function actionIndex($id = 0)
    {
        if ($id) {
            $work = Works::model()->findByPk($id);
            $images = Images::model()->findAll();
            $this->render('work',['work'=>$work]);
        } else {

            $works = Works::model()->findAll();

            //$categories = CHtml::listData(Categories::model()->findAll(), 'work_id', 'name');

            $this->render('index', ['works' => $works]);
        }
    }

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
}
