<?php
namespace App\model;
class DmSession extends DataModel
{
	public static $schema = [
		'screen_name' => 'string',//画面名称
		'book_id'     => 'string',//書籍ＩＤ
	];
	public function getSessionArr ()
	{
    	$data = $this->toArray();
    	$data['session'] = json_encode($data, JSON_UNESCAPED_UNICODE);
    	return $data;
	}
}