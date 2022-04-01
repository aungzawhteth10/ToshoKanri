<?php
namespace App\Api;
class ApiSyainnManage extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //レンタル情報を取得する
        $DbRentalMapper = new \App\db\DbRentalMapper;
        $rental = $DbRentalMapper->find();


        //社員情報を取得する
        $DbSyainnMapper = new \App\db\DbSyainnMapper;
        $syainn = $DbSyainnMapper->find();
        $syainn = array_column($syainn, null, 'syainn_id') ;        
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_syainn_category')), 'value', 'id');
        error_log(print_r($category, true));

        $result = [];
        foreach ($syainn as $key => $value) {
            $result[] = [
                //社員情報を表示する。
                'syainn_id'          => $value['syainn_id'] ?? '',   //スタッフコード
                'syainn_name'        => $value['syainn_name'] ?? '', //社員名
                'furigana'           => $value['furigana'] ?? '',    //フリガナ
                'syainn_Occupation'  => $value['syainn_Occupation'] ?? '', //職種
                'tel_no'             => $value['tel_no'] ?? '',  //電話番号
                'moblie_no'          => $value['moblie_no'] ?? '', //携帯番号
                'mail_address'       => $value['mail_address'] ?? '', //メールアドレス
                'keiyaku_jikan'      => $value['keiyaku_jikan'] ?? '', //契約時間
            ];
        }
        return parent::toJson($result);
    }

}
