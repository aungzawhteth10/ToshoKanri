<?php
namespace App\Api;
class ApiStudentList
{
	public function init($request, $response)
	{	
		$kihonAllFlg = $_GET['kihonAllFlg'];
		$class_code  = $_GET['class_code'];
		$result = [];
		if ($class_code == '') {
			$dbClassListMapper = new \App\db\DbClassListMapper;
			$dmClassList = new \App\Model\DmClassList;
			$classList = $dbClassListMapper->find($dmClassList);
			if (count($classList) == 0) {
				return $result;
			}
			$class_code = $classList[0]['class_code'];
		}
		//学生情報を全部取得する。
		$dbStudentMapper = new \App\db\DbStudentMapper;
		$dmStudent = new \App\model\DmStudent;
		if ($kihonAllFlg == '0') {//全て表示ではない場合
			$dmStudent->zaigaku = 1;//在学フラグ（0：在学ではない、1：在学中）
		}
		$dmStudent->class_code = $class_code;//クラス
		$kihon = $dbStudentMapper->find($dmStudent);
		if (count($kihon) == 0) {
			return false;
		}
		$result['class_list'] = 's1a';//学生の基本情報
		$result['KIHON'] = $kihon;//学生の基本情報
		//学生の成績情報を取得する。
		error_log(print_r($class_code.':', true));
		error_log(print_r($result, true));
		return json_encode($result, JSON_UNESCAPED_UNICODE);
	}
}