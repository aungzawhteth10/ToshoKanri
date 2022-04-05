<?php
namespace App\Api;
class ApiSyainnFix extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //図書情報を取得する
        $dbBookMapper = new \App\db\DbBookMapper;
        $dmBook = new \App\model\DmBook;
        $dmBook->book_id   = $this->session->book_id;
        $book = $dbBookMapper->find($dmBook);

        //社員情報
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\DmSyainn;
        error_log(print_r($this->session, true));
        $dmSyainn->syainn_id   = $this->session->book_id;
        $syainn = $dbSyainnMapper->find($dmSyainn);
        
        $result = [
            'syainn_id'          => $syainn[0]['syainn_id'] ?? '',   //スタッフコード
            'syainn_name'        => $syainn[0]['syainn_name'] ?? '', //社員名
            'furigana'           => $syainn[0]['furigana'] ?? '',    //フリガナ
            'syainn_Occupation'  => $syainn[0]['syainn_Occupation'] ?? '', //職種
            'tel_no'             => $syainn[0]['tel_no'] ?? '',  //電話番号
            'moblie_no'          => $syainn[0]['moblie_no'] ?? '', //携帯番号
            'mail_address'       => $syainn[0]['mail_address'] ?? '', //メールアドレス
            'keiyaku_jikan'      => $syainn[0]['keiyaku_jikan'] ??  '', //契約時間
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
        $dmSyainn = new \App\model\DmSyainn;
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