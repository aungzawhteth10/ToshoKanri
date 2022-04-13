<?php
namespace App\Api;
class ApiRiyousyaFix extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //利用者情報
        $dbRiyousyaMapper = new \App\db\DbRiyousyaMapper;
        $dmRiyousya = new \App\model\DmRiyousya;
        error_log(print_r($this->session, true));
        $dmRiyousya->riyousya_id  = $this->session->riyousya_id;
        $riyousya = $dbRiyousyaMapper->find($dmRiyousya);
        $result = [
            'riyousya_id'        => $riyousya[0]['riyousya_id'] ?? '',   //利用者ID
            'riyousya_name'      => $riyousya[0]['riyousya_name'] ?? '', //利用者名
            'furigana'           => $riyousya[0]['furigana'] ?? '',    //フリガナ
            'tel_no'             => $riyousya[0]['tel_no'] ?? '',  //電話番号
            'moblie_no'          => $riyousya[0]['moblie_no'] ?? '', //携帯番号
            'mail_address'       => $riyousya[0]['mail_address'] ?? '', //メールアドレス
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
        $dmRiyousya = new \App\model\DmRiyousya;
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