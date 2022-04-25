<?php
namespace App\Api;
class ApiStaffRegister extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)  
    {   
        //スタッフの情報
        $dbStaffMapper = new \App\db\DbStaffMapper;
        $dmStaff = new \App\model\DmStaff;
        $staff = $dbStaffMapper->find($dmStaff);
        $result = [
            'staff_code'             => $value['staff_code'] ?? '',   //スタッフコード
            'eigyousho_id'           => $value['eigyousho_id'] ?? '', //営業所ID
            'name'                   => $value['name'] ?? '',    //氏名
            'furigana'               => $value['furigana'] ?? '', //フリガナ
            'hyouji_ryakushou'       => $value['hyouji_ryakushou'] ?? '', //表示略称
            'seibetsu'               => $value['seibetsu'] ?? '', //性別
            'seinenngappi_gengou'    => $value['seinenngappi_gengou'] ?? '', //元号
            'seinenngappi_yer'       => $value['seinenngappi_yer'] ?? '', //年
            'seinenngappi_month'     => $value['seinenngappi_month'] ?? '', //月
            'seinenngappi_day'       => $value['seinenngappi_day'] ?? '', //日
            'age'                    => $value['age'] ?? '', //年齢
            'post_no'                => $value['post_no'] ?? '', //郵便番号
            'todoufuken'             => $value['todoufuken'] ?? '', //都道府県
            'shikuchouson'           => $value['shikuchouson'] ?? '', //市区町村
            'chou_name'              => $value['chou_name'] ?? '', //町名
            'banchi'                 => $value['banchi'] ?? '', //番地
            'tel_no'                 => $value['tel_no'] ?? '',  //電話番号
            'moblie_no'              => $value['moblie_no'] ?? '', //携帯番号
            'fax_no'                 => $value['fax_no'] ?? '', //fax番号
            'mail_address'           => $value['mail_address'] ?? '', //メールアドレス
            'bikou'                  => $value['bikou'] ?? '', //備考
            'sakujo_day'             => $value['sakujo_day'] ?? '', //削除の日
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
        $dmStaff->sakujo_day            =$postData['sakujo_day']            //削除の日

        $count = $dbStaffMapper->insert($dmStaff);
        return parent::toJson($count);
    }
}