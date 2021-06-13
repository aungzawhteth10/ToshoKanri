<?php
namespace App\model;
class DmBook extends DataModel
{
	public static $schema = [
		'book_id'   => 'string', //書籍ID
		'book_name' => 'string', //書籍名称
		'author'    => 'string', //作者
		'category'  => 'string', //カテゴリ
		'overview'  => 'string', //概要
		'publisher' => 'string', //出版社

	];
	public static $primary_key = [
		'book_id',//ユーザID
	];
}