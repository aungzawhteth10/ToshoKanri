<?php
namespace App\Api;
class ApiStaffRegister extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        if(!isset($this->session->staff_id)){
            return parent::toJson([]);
        }
        //スタッフ情報
        $dbStaffMapper = new \App\db\DbStaffMapper;
        $dmStaff = new \App\model\DmStaff;
        $dmStaff->staff_id  = $this->session->staff_id;
        $staff = $dbStaffMapper->find($dmStaff);
        if(count($staff) == 0){
            return parent::toJson([]);
        }
        $result = [
            'staff_id'               => $staff['staff_id'] , //スタッフID
            'staff_code'             => $staff['staff_code'] ,   //利用者ID
            'name'                   => $staff['name'] , //氏名
            'furigana'               => $staff['furigana'] ,    //フリガナ
            'hyouji_ryakushou'       => $staff['hyouji_ryakushou'], //表示略称
            'seibetsu'               => $staff['seibetsu'] , //性別
            'seinengappi_gengou'     => $staff['seinengappi_gengou'] , //生年月日元号
            'seinengappi_year'       => $staff['seinengappi_year'] , //生年月日 年
            'seinengappi_month'      => $staff['seinengappi_month'] , //生年月日　月
            'seinengappi_day'        => $staff['seinengappi_day'] , //生年月日　日
            'age'                    => $staff['age'] , //年齢
            'post_no'                => $staff['post_no'] , //郵便番号
            'todoufuken'             => $staff['todoufuken'] , //都道府県
            'shikuchoson'            => $staff['shikuchoson'], //市区町村
            'chou_name'              => $staff['chou_name'] , //町名
            'banchi'                 => $staff['banchi'] , //番地
            'tel_no'                 => $staff['tel_no'] ,  //電話番号
            'moblie_no'              => $staff['moblie_no'] , //携帯番号
            'fax_no'                 => $staff['fax_no'] , //fax番号
            'mail_address'           => $staff['mail_address'] , //メールアドレス
            'bikou'                  => $staff['bikou'] , //備考
        ];
        return parent::toJson($result);
    }
    /*
     * スタッフ情報更新
     */
     public function update ($request, $response)
     {   
         $postData  = $_POST;   
         $dbStaffMapper = new \App\db\DbStaffMapper;
         $dmStaff = new \App\model\dmStaff;
       //  $dmStaff->staff_id              =$postData['staff_id'];             //スタッフID
         $dmStaff->staff_code            =$postData['staff_code'];           //スタッフコード
         $dmStaff->name                  =$postData['name'];                 //氏名
         $dmStaff->furigana              =$postData['furigana'];             //フリガナ
         $dmStaff->hyouji_ryakushou      =$postData['hyouji_ryakushou'];     //表示略称
         $dmStaff->seibetsu              =$postData['seibetsu'];             //性別
         $dmStaff->seinengappi_gengou    =$postData['seinengappi_gengou'];   //生年月日　元号
         $dmStaff->seinengappi_year      =$postData['seinengappi_year'];     //生年月日　年
         $dmStaff->seinengappi_month     =$postData['seinengappi_month'];    //生年月日　月
         $dmStaff->seinengappi_day       =$postData['seinengappi_day'];      //生年月日  日
         $dmStaff->age                   =$postData['age'];                  //年齢
         $dmStaff->post_no               =$postData['post_no'];              //郵便番号
         $dmStaff->todoufuken            =$postData['todoufuken'];           //都道府県
         $dmStaff->shikuchoson           =$postData['shikuchoson'];          //市区町村
         $dmStaff->chou_name             =$postData['chou_name'];            //町名
         $dmStaff->banchi                =$postData['banchi'];               //番地
         $dmStaff->tel_no                =$postData['tel_no'];               //電話番号
         $dmStaff->moblie_no             =$postData['moblie_no'];            //携帯番号 
         $dmStaff->fax_no                =$postData['fax_no'];               //FAX番号
         $dmStaff->mail_address          =$postData['mail_address'];         //メールアドレス
         $dmStaff->bikou                 =$postData['bikou'];                //備考
         $count = $dbStaffMapper->insert($dmStaff);
         return parent::toJson($count);
     }
}