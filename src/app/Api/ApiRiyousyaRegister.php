<?php
namespace App\Api;
class ApiRiyousyaRegister extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)  
    {   
        //社員の情報
        $dbRiyousyaMapper = new \App\db\DbRiyousyaMapper;
        $dmRiyousya = new \App\model\DmRiyousya;
        $riyousya = $dbRiyousyaMapper->find($dmRiyousya);
        $result = [
            'riyousya_id'        => $value['riyousya_id'] ?? '',   //利用者ID
            'riyousya_name'      => $value['riyousya_name'] ?? '', //利用者名
            'furigana'           => $value['furigana'] ?? '',    //フリガナ
            'tel_no'             => $value['tel_no'] ?? '',  //電話番号
            'moblie_no'          => $value['moblie_no'] ?? '', //携帯番号
            'mail_address'       => $value['mail_address'] ?? '', //メールアドレス
        ];
        return parent::toJson($result);
    }
    /*
     * 利用者情報更新
     */
    public function update ($request, $response)
    {   
        $postData  = $_POST;    
        $dbRiyousyaMapper = new \App\db\DbRiyousyaMapper;
        $dmRiyousya = new \App\model\dmRiyousya;
        $dmRiyousya->riyousya_id           = $postData['riyousya_id'];
        $dmRiyousya->riyousya_name         = $postData['riyousya_name'];
        $dmRiyousya->mail_address          = $postData['mail_address'];
        $dmRiyousya->furigana              = $postData['furigana'];
        $dmRiyousya->tel_no                = $postData['tel_no'];
        $dmRiyousya->moblie_no             = $postData['moblie_no'];
        $count = $dbRiyousyaMapper->insert($dmRiyousya);
        return parent::toJson($count);
    }
}