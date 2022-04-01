<?php
namespace App\Api;
class ApiSyainnManage extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
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
                'syainn_id'     => $value['syainn_id'] ?? '',   //社員ID
                'syainn_name'   => $value['syainn_name'] ?? '', //社員名
                'furigana'      => $value['furigana'] ?? '',    //フリガナ
                'syainn_sex'    => $value['syainn_sex'] ?? '',  //社員性別  
                'syainn_age'    => $value['syainn_age'] ?? '',  //社員年齢
                'syainn_Occupation' => $value['syainn_Occupation'] ?? '', //職種

            ];
        }
        return parent::toJson($result);
    }

}
