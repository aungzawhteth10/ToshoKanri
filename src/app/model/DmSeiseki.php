<?php
namespace App\model;
class DmSeiseki extends DataModel
{
	public static $schema = [
		'student_id' => 'integer',//学籍番号
		'math'       => 'integer',//数学
		'english'    => 'integer',//英語
		'japanese'   => 'integer',//国語
	];
}