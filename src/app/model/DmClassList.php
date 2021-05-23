<?php
namespace App\model;
class DmClassList extends DataModel
{
	public static $schema = [
		'id'         => 'integer',//クラスＩＤ
		'class_code' => 'string', //クラスコード
		'class_name' => 'string', //クラス名称
	];
}