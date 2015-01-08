<?php
namespace app\models\forms;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
	/**
	 * @var UploadedFile|Null file attribute
	 */
	public $file;
	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
				[['file'], 'file', ],
		];
	}
	public function attributeLabels()
	{
		return [
				'file' => \Yii::t('admin', 'file'),
		];
	}
}