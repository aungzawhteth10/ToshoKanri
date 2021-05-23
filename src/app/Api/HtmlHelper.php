<?php
namespace App\Api;
class HtmlHelper
{
	public function getClassList($request, $response)
	{	
		$result = [];
		//クラスリストを全部取得する。
		$dbClassListMapper = new \App\db\DbClassListMapper;
		$dmClassList = new \App\Model\DmClassList;
		$classList = $dbClassListMapper->find($dmClassList);
		if (count($classList) == 0) {
			return $result;
		}
		foreach ($classList as $key => $value) {
			$result[] = [
				'id'    => $value['class_code'],
				'value' => $value['class_name'],
			];
		}
		return json_encode($result, JSON_UNESCAPED_UNICODE);
	}
}