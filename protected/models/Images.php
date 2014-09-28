<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 */
class Images extends CActiveRecord
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
		return 'images';
	}
	public function primaryKey()
	{
		return 'id';
	}
    public function relations()
    {
        return array(
            'images'=>array(self::BELONGS_TO, 'Works', 'id'),
        );
    }
}