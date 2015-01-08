<?php
namespace app\helpers;

use yii\db\TableSchema;

class dbHelper
{
	public static function db_restore($filename, $unzip = false)
	{
		set_time_limit ( 0 );
		if ($unzip) {
			$zip = new \ZipArchive ();
			if ($zip->open ( $filename ) === FALSE) {
				return false;
			}
			$sqlfilename = dirname ( $filename ) . DIRECTORY_SEPARATOR . $zip->getNameIndex ( 0 );
			if ($zip->extractTo ( dirname ( $filename ) ) === FALSE) {
				return false;
			}
			$zip->close ();
			$filename = $sqlfilename;
		}
		$sql = file_get_contents ( $filename );
		if ($sql === FALSE) {
			return false;
		}
		\Yii::$app->db->createCommand ( $sql )->execute ();
		unlink ( $filename );
		return true;
	}
	public static function db_backup($dir = null)
	{
		set_time_limit ( 0 );
		$return = "";
		$tablesData = \Yii::$app->db->schema->getTableSchemas ();
		arsort ( $tablesData ); // User table now on the top in the SQL file
		foreach ( $tablesData as $table ) {
			$return .= "SET FOREIGN_KEY_CHECKS=0;\n";
			$return .= 'DROP TABLE IF EXISTS ' . $table->name . ";\n";
			$stru = \Yii::$app->db->createCommand ( "SHOW CREATE TABLE {$table->name}" )->queryOne ();
			// \Yii::warning($stru['Create Table']);
			$return .= $stru ['Create Table'] . ";\n";
			$return .= "SET FOREIGN_KEY_CHECKS=1;\n\n";
			$data = \Yii::$app->db->createCommand ( "SELECT * FROM {$table->name}" )->queryAll ();
			foreach ( $data as $row ) {
				foreach ( $row as $key => $item ) {
					if (is_string ( $item ))
						$row [$key] = "'{$item}'";
					if (empty ( $item ))
						$row [$key] = "''";
				}
				$return .= "INSERT INTO {$table->name} VALUES(" . implode ( ",", $row ) . ");\n";
			}
			$return .= "\n";
		}
		$return .= "\n\n\n";
		if (! isset ( $dir )) {
			$dir = \Yii::$app->basePath . '/runtime/';
		}
		$filename = $dir . 'db-backup-' . time () . '.sql';
		file_put_contents ( $filename, $return );
		$zipname = self::createZip ( $filename );
		if ($zipname) {
			unlink ( $filename );
		}
		return $zipname;
	}
	public static function createZip($filename)
	{
		$zip = new \ZipArchive ();
		$zipname = str_replace ( 'sql', 'zip', $filename );
		if ($zip->open ( $zipname, \ZIPARCHIVE::CREATE ) !== TRUE)
			return false;
		if (! $zip->addFile ( $filename, basename ( $filename ) ))
			return false;
		if (! $zip->close ())
			return false;
		return $zipname;
	}
}
