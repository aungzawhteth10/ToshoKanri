<?php
namespace App\Api;
class ApiSyainnRegister extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)  
    {   
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\DmSyainn;
        $syainn = $dbSyainnMapper->find($dmSyainn);
        $result = [
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
    private function _isSyainnIdDuplicate ($syainnId)
    {
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\dmSyainn;
        $dmSyainn->syainn_id = $syainnid;
        $syainn = $dbSyainnMapper->find($dmSyainn);
        if (count($syainn) != 0) {
            return true;
        }
        return false;
    }
}