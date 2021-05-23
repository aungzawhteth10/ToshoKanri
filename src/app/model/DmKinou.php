<?php
namespace App\model;
class DmKinou extends DataModel
{
	public static $schema = [
		'screen_id' => 'string',//画面ID
		'name'      => 'string',//画面の名称
	];
}