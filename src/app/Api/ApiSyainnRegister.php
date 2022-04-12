<?php
namespace App\Api;
class ApiSyainnRegister extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)  
    {   
        //社員の情報
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\DmSyainn;
        $syainn = $dbSyainnMapper->find($dmSyainn);
        $result = [
            'syainn_id'          => $value['syainn_id'] ?? '',   //スタッフコード
            'syainn_name'        => $value['syainn_name'] ?? '', //社員名
            'furigana'           => $value['furigana'] ?? '',    //フリガナ
            'syainn_Occupation'  => $value['syainn_Occupation'] ?? '', //職種
            'tel_no'             => $value['tel_no'] ?? '',  //電話番号
            'moblie_no'          => $value['moblie_no'] ?? '', //携帯番号
            'mail_address'       => $value['mail_address'] ?? '', //メールアドレス
            'keiyaku_jikan'      => $value['keiyaku_jikan'] ??  '', //契約時間
        ];
        return parent::toJson($result);
    }
    /*
     * 書籍情報更新
     */
    public function update ($request, $response)
    {   
        $postData  = $_POST;    
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\dmSyainn;
        $dmSyainn->syainn_id             = $postData['syainn_id'];
        $dmSyainn->syainn_name           = $postData['syainn_name'];
        $dmSyainn->mail_address          = $postData['mail_address'];
        $dmSyainn->keiyaku_jikan         = $postData['keiyaku_jikan'];
        $dmSyainn->syainn_Occupation     = $postData['syainn_Occupation'];
        $dmSyainn->furigana              = $postData['furigana'];
        $dmSyainn->tel_no                = $postData['tel_no'];
        $dmSyainn->moblie_no             = $postData['moblie_no'];
        $count = $dbSyainnMapper->insert($dmSyainn);
        return parent::toJson($count);
    }
}