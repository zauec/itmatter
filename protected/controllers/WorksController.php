<?php

class WorksController extends Controller
{
	public $layout='column2';

	public function actionIndex($id = 0)
    {
        $worksCategory = CHtml::listData(Workscategory::model()->findAll(),
            'work_id', 'category_id');
        $list['all'] = count($worksCategory);
        $list['categories'] = array_count_values($worksCategory);

        if ($id) {
            $work = Works::model()->with('images')->findByPk($id);
            //$work = Works::model()->with('images')->with('workscategory')->findByPk($id);
			//$work->workscategory[0]['id'];
			$category = @$_GET['category'];

            $buttons['next'] = Works::model()->getNextId($id, $category);
            $buttons['previous'] = Works::model()->getPreviousId($id, $category);

            $this->render('work',['work'=>$work,'buttons'=>$buttons,'list'=>$list]);

        } else {
            if(isset($_GET['category'])){
                $category = $_GET['category'];
                $works = Yii::app()->db->createCommand("
                    SELECT * FROM works_category
                     INNER JOIN categories
                        ON works_category.category_id = categories.id
                     INNER JOIN works
                        ON works_category.work_id = works.id
                    WHERE categories.alt_name = '$category'
					ORDER BY works.id ASC")->queryAll();
            }
            else{
                $works = Works::model()->findAll(['order'=>'id ASC']);
            }
           $this->render('index', ['works' => $works,'list'=>$list]);
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
