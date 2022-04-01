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
        $dmSyainn->syainn_sex            = $postData['syainn_sex'];
        $dmSyainn->syainn_age            = $postData['syainn_age'];
        $dmSyainn->syainn_Occupation     = $postData['syainn_Occupation'];
      
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