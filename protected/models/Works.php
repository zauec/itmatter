<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 */
class Works extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'works';
	}
	public function primaryKey()
	{
		return 'id';

	}

    public function getNextId($id, $category)
    {
		if($category){
			$record = Yii::app()->db->createCommand("
                    SELECT * FROM works_category
                     INNER JOIN categories
                        ON works_category.category_id = categories.id
                     INNER JOIN works
                        ON works_category.work_id = works.id
                    WHERE categories.alt_name = '$category' AND works.id > '$id' ORDER BY works.id ASC LIMIT 1")->queryAll();
			if(!$record){
				$record = Yii::app()->db->createCommand("
                    SELECT * FROM works_category
                     INNER JOIN categories
                        ON works_category.category_id = categories.id
                     INNER JOIN works
                        ON works_category.work_id = works.id
                    WHERE categories.alt_name = '$category' AND works.id < '$id' ORDER BY works.id ASC LIMIT 1")->queryAll();
			}
            return $record[0]['id'];
		}
		else{
			$record=self::model()->find(array(
				'condition' => 'id>:current_id',
				'order' => 'id ASC',
				'limit' => 1,
				'params'=>array(':current_id'=>$id),
			));
			if(!$record){

				$record=self::model()->find(array(
					'order' => 'id ASC',
					'limit' => 1,
				));
				
			}
			return $record['id'];
		}
    }
    public function getPreviousId($id, $category)
    {
		if($category){
			$record = Yii::app()->db->createCommand("
                    SELECT * FROM works_category
                     INNER JOIN categories
                        ON works_category.category_id = categories.id
                     INNER JOIN works
                        ON works_category.work_id = works.id
                    WHERE categories.alt_name = '$category'  AND works.id < '$id' ORDER BY works.id DESC LIMIT 1")->queryAll();
			if(!$record){
				$record = Yii::app()->db->createCommand("
                    SELECT * FROM works_category
                     INNER JOIN categories
                        ON works_category.category_id = categories.id
                     INNER JOIN works
                        ON works_category.work_id = works.id
                    WHERE categories.alt_name = '$category'  AND works.id > '$id' ORDER BY works.id DESC LIMIT 1")->queryAll();
			}
            return $record[0]['id'];
		}
		else{
			$record=self::model()->find(array(
				'condition' => 'id<:current_id',
				'order' => 'id DESC',
				'limit' => 1,
				'params'=>array(':current_id'=>$id),
			));
			if(!$record){

				$record=self::model()->find(array(
					'order' => 'id DESC',
					'limit' => 1,
				));
				
			}
			return $record['id'];
        }
    }
    public function relations()
    {
        return array(
            'images'=>array(self::HAS_MANY, 'Images', 'work_id'),
            'workscategory'=>array(self::HAS_MANY, 'Workscategory', 'work_id')
        );
    }
}