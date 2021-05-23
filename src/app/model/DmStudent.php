<?php
namespace App\model;
class DmStudent extends DataModel
{
	public static $schema = [
		'student_id' => 'integer',//学籍番号
		'name'       => 'string',//名前
		'seibetsu'   => 'string',//性別
		'birthday'   => 'string',//生年月日
		'zaigaku'    => 'integer',//在学フラグ
		'class_code' => 'string',//クラス
	];
}