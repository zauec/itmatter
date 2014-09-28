<?php

class WorksController extends Controller
{
	public $layout='column2';

	public function actionIndex($id = 0)
    {
        if ($id) {

            $work = Works::model()->with('images')->findByPk($id);

            $buttons['next'] = Works::model()->getNextId($id);
            $buttons['previous'] = Works::model()->getPreviousId($id);

            $this->render('work',['work'=>$work,'buttons'=>$buttons]);

        } else {
            $works = Works::model()->findAll();
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
