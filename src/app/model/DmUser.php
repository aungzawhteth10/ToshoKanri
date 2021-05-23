<?php
namespace App\model;
class DmUser extends DataModel
{
	public static $schema = [
		'user_id'    => 'integer',//ユーザID
		'user_name'  => 'string', //ユーザ名
		'password'   => 'string', //パスワード
		'auth_key'   => 'string', //認証キー
		'time_limit' => 'string', //有効時間
	];
	public static $primary_key = [
		'user_id',//ユーザID
	];
}