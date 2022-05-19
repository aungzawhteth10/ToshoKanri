<?php
namespace App\Api;
class ApiStaffFix extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {
       //スタッフ情報
       $dbCmst02Mapper = new \App\db\DbCmst02Mapper;
       $dmCmst02 = new \App\model\DmCmst02;
       $dmCmst02->staff_id  = $this->session->staff_id;
       $cmst02 = $dbCmst02Mapper->find($dmCmst02);
       $category = array_column(json_decode($this->HtmlHelper->getJson('cm_staff_category')), 'value', 'id');
        if(count($staff) == 0){
            return parent::toJson([]);
        }
        $result = [
            'staff_id'              => $cmst02[0]['staff_id'] , //スタッフID
            'youbi'                 => $cmst02[0]['youbi'],   //曜日
            'kinmu_kubun_id'        => $cmst02[0]['kinmu_kubun_id'], //勤務区分
            'kinmu_kubun_settei'    => $cmst02[0]['kinmu_kubun_settei'], //勤務区分設定
            'jikantai1'             => $cmst02[0]['jikantai1'], //時間帯①
            'jikantai2'             => $cmst02[0]['jikantai2'], //時間帯②
            'jikantai3'             => $cmst02[0]['jikantai3'], //時間帯③
            'jikantai4'             => $cmst02[0]['jikantai4'], //時間帯④
            'jikantai5'             => $cmst02[0]['jikantai5'], //時間帯⑤

        ];
        return parent::toJson($result);
    }
    /*
     * スタッフ情報更新
     */
     public function update ($request, $response)
     {   
        $postData  = $_POST;
        $dbCmst02Mapper = new \App\db\DbCmst02Mapper;
        $dmCmst02 = new \App\model\DmCmst02;
         $dmCmst02->staff_id              =$postData['staff_id'];             //スタッフID
         $dmCmst02->youbi                 =$postData['youbi'];
         $dmCmst02->jikantai1             =$postData['jikantai1'];
         $dmCmst02->jikantai2             =$postData['jikantai2'];
         $dmCmst02->jikantai3             =$postData['jikantai3'];
         $dmCmst02->jikantai4             =$postData['jikantai4'];
         $dmCmst02->jikantai5             =$postData['jikantai5'];
         if($this->session->staff_id==''){
            $count = $dbCmst02Mapper->insert($dmCmst02);
         }else{
            $count = $dbCmst02Mapper->update($dmCmst02);
         }
         return parent::toJson($count);
     }
}