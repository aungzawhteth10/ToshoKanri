<?php
namespace App\Api;
class ApiStaffRegister extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //スタッフ情報
        $dbStaffMapper = new \App\db\DbStaffMapper;
        $dmStaff = new \App\model\DmStaff;
        error_log(print_r($this->session, true));
        $dmStaff->Staff_id  = $this->session->Staff_id;
        $staff = $dbStaffMapper->find($dmStaff);
        $result = [
            'staff_id'               => $staff[0]['staff_id'] , //スタッフID
            'staff_code'             => $Staff[0]['staff_code'] ,   //利用者ID
            'name'                   => $Staff[0]['name'] , //利用者名
            'furigana'               => $Staff[0]['furigana'] ,    //フリガナ
            'hyouji_ryakushou'       => $staff[0]['hyouji_ryakushou'], //表示略称
            'seibetsu'               => $staff[0]['seibetsu'] , //性別
            'seinenngappi_gengou'    => $staff[0]['seinenngappi_gengou'] , //生年月日元号
            'seinenngappi_year'      => $staff[0]['seinenngappi_year'] , //生年月日元号
            'seinenngappi_month'     => $staff[0]['seinenngappi_month'] , //生年月日元号
            'seinenngappi_day'       => $staff[0]['seinenngappi_day'] , //生年月日元号
            'age'                    => $staff[0]['age'] , //年齢
            'post_no'                => $staff[0]['post_no'] , //郵便番号
            'todoufuken'             => $staff[0]['todoufuken'] , //都道府県
            'shikuchouson'           => $staff[0]['shikuchouson'], //市区町村
            'chou_name'              => $staff[0]['chou_name'] , //町名
            'banchi'                 => $staff[0]['banchi'] , //番地
            'tel_no'                 => $staff[0]['tel_no'] ,  //電話番号
            'moblie_no'              => $staff[0]['moblie_no'] , //携帯番号
            'fax_no'                 => $staff[0]['fax_no'] , //fax番号
            'mail_address'           => $staff[0]['mail_address'] , //メールアドレス
            'bikou'                  => $staff[0]['bikou'] , //備考
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
        $dmStaff->staff_id              =$postData['staff_id'];  //スタッフID
        $dmStaff->staff_code            =$postData['staff_code'];    //スタッフコード
        $dmStaff->eigyoushou_id         =$postData['eigyoushou_id']; //営業所ID
        $dmStaff->name                  =$postData['name'];         //氏名
        $dmStaff->furigana              =$postData['furigana'];         //フリガナ
        $dmStaff->hyouji_ryakushou      =$postData['hyouji_ryakushou'];     //表示略称
        $dmStaff->seibetsu              =$postData['seibetsu'];     //性別
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
