<?php
namespace App\Api;
class ApiShuukei
{
	public function init ($request, $response)
	{	
		$kihonAllFlg = $_GET['kihonAllFlg'];
		$result = [
			'KIHON'   => [],
			'SEISEKI' => [],
		];
		//学生情報を全部取得する。
		$dbStudentMapper = new \App\db\DbStudentMapper;
		$dmStudent = new \App\model\DmStudent;
		if ($kihonAllFlg == '0') {//全て表示ではない場合
			$dmStudent->zaigaku = 1;//在学フラグ（0：在学ではない、1：在学中）
		}
		$kihon = $dbStudentMapper->find($dmStudent);
		if (count($kihon) == 0) {
			return $result;
		}
		$result['KIHON'] = $kihon;//学生の基本情報
		error_log(print_r($result, true));
		//学生の成績情報を取得する。
		$studentList = [];
		foreach ($kihon as $key => $value) {
			$studentList[] = $value['student_id'];
		}
		$dbSeisekiMapper = new \App\db\DbSeisekiMapper;
		$dmSeiseki = new \App\model\DmSeiseki;
		$dmSeiseki->student_id = $studentList;
		$seiseki = $dbSeisekiMapper->find($dmSeiseki);
		error_log(print_r($seiseki, true));
		//学生の合計点数を計算する
		$id_name = array_column($kihon, 'name', 'student_id');//学籍番号をindexにする学生の成績配列
		error_log(print_r($id_name, true));
		$seiseki_wk = [];
		foreach ($seiseki as $key => $seisekiFld) {
			$seisekiFld['name'] = $id_name[$seisekiFld['student_id']];//学生の名前
			$kamokuArr = [];//合計対象の点数
			$kamokuArr[] = $seisekiFld['math'];//数学の点数
			$kamokuArr[] = $seisekiFld['english'];//英語の点数
			$kamokuArr[] = $seisekiFld['japanese'];//国語の点数
			$seisekiFld['total'] = array_sum($kamokuArr);//成績の合計
			$seiseki_wk[] = $seisekiFld;
		}
		//合計点数の降順で学生をソートする
		array_multisort(array_column($seiseki_wk, 'total'), SORT_DESC , SORT_NUMERIC, $seiseki_wk);
		//順位を設定する
		$rank = 1;
		foreach ($seiseki_wk as $key => $value) {
			$value['rank'] = '第' . $rank . '位';
			$result['SEISEKI'][] = $value;
			$next_total = isset($seiseki_wk[$key+1]) ? $seiseki_wk[$key+1]['total'] : -1;
			if ($value['total'] != $next_total) {
				$rank++;
			}
			error_log(print_r($next_total, true));
		}
		return json_encode($result, JSON_UNESCAPED_UNICODE);
	}
}
