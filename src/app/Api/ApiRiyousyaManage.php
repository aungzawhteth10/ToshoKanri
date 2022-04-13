<?php
namespace App\Api;
class ApiRiyousyaManage extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response) 
    {   
        //利用者情報を取得する
        $DbRiyousyaMapper = new \App\db\DbRiyousyaMapper;
        $riyousya = $DbRiyousyaMapper->find();
        $riyousya = array_column($riyousya, null, 'riyousya_id') ;        
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_riyousya_category')), 'value', 'id');
        error_log(print_r($category, true));
        $result = [];
        foreach ($riyousya as $key => $value) {
            $result[] = [
                //利用者情報を表示する。
                'riyousya_id'        => $value['riyousya_id'] ?? '',  //利用者ID
                'riyousya_name'      => $value['riyousya_name'] ?? '',//利用者名
                'furigana'           => $value['furigana'] ?? '',    //フリガナ
                'tel_no'             => $value['tel_no'] ?? '',  //電話番号
                'moblie_no'          => $value['moblie_no'] ?? '', //携帯番号
                'mail_address'       => $value['mail_address'] ?? '', //メールアドレス
            ];
        }
        return parent::toJson($result);
    }

}
