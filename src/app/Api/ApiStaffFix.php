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
       $dbStaffMapper = new \App\db\DbStaffMapper;
       $dmStaff = new \App\model\DmStaff;
       error_log(print_r($this->session, true));
       $dmStaff->staff_id  = $this->session->staff_id;
       $staff = $dbStaffMapper->find($dmStaff);
        
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_staff_category')), 'value', 'id');
        error_log(print_r($category, true));
        if(count($staff) == 0){
            return parent::toJson([]);
        }
        $result = [
            'staff_id'               => $staff[0]['staff_id'] , //スタッフID
            'staff_code'             => $staff[0]['staff_code'] ,   //利用者ID
            'name'                   => $staff[0]['name'] , //氏名
            'furigana'               => $staff[0]['furigana'] ,    //フリガナ
            'hyouji_ryakushou'       => $staff[0]['hyouji_ryakushou'], //表示略称
            'seibetsu'               => $staff[0]['seibetsu'] , //性別
            'seinengappi_gengou'     => $staff[0]['seinengappi_gengou'] , //生年月日元号
            'seinengappi_year'       => $staff[0]['seinengappi_year'] , //生年月日 年
            'seinengappi_month'      => $staff[0]['seinengappi_month'] , //生年月日　月
            'seinengappi_day'        => $staff[0]['seinengappi_day'] , //生年月日　日
            'age'                    => $staff[0]['age'] , //年齢
            'post_no'                => $staff[0]['post_no'] , //郵便番号
            'todoufuken'             => $staff[0]['todoufuken'] , //都道府県
            'shikuchoson'            => $staff[0]['shikuchoson'], //市区町村
            'chou_name'              => $staff[0]['chou_name'] , //町名
            'banchi'                 => $staff[0]['banchi'] , //番地
            'tel_no'                 => $staff[0]['tel_no'] ,  //電話番号
            'moblie_no'              => $staff[0]['moblie_no'] , //携帯番号
            'fax_no'                 => $staff[0]['fax_no'] , //fax番号
            'mail_address'           => $staff[0]['mail_address'] , //メールアドレス
            'bikou'                  => $staff[0]['bikou'] , //備考
            //緊急連絡先
            'kinkyuuji_name'         => $staff[0]['kinkyuuji_name'], //緊急氏名
            'kinkyuuji_post_on'      => $staff[0]['kinkyuuji_post_on'],//緊急郵便番号
            'kinkyuuji_todoufuken'   => $staff[0]['kinkyuuji_todoufuken'], //緊急都道府県
            'kinkyuuji_shikuchoson'  => $staff[0]['kinkyuuji_shikuchoson'], //緊急市区町村
            'kinkyuuji_chou_name'    => $staff[0]['kinkyuuji_chou_name'], //緊急町名
            'kinkyuuji_banchi'       => $staff[0]['kinkyuuji_banchi'], //緊急番地
            'kinkyuuji_tel_no'       => $staff[0]['kinkyuuji_tel_no'], //緊急電話番号
            'kinkyuuji_bikou'        => $staff[0]['kinkyuuji_bikou'],//緊急備考
            //勤務形態
            'nyusyaday_gengou'       => $staff[0]['nyusyaday_gengou'],     //入社日元号
            'nyusyaday_year'         => $staff[0]['nyusyaday_year'],       //入社日　年
            'nyusyaday_month'        => $staff[0]['nyusyaday_month'],      //入社日　月
            'nyusyaday_day'          => $staff[0]['nyusyaday_day'],        //入社日　日
            'yuukyuukyuuka_gengou'   => $staff[0]['yuukyuukyuuka_gengou'], //有給休暇の基準日 元号
            'yuukyuukyuuka_year'     => $staff[0]['yuukyuukyuuka_year'],   //有給休暇の基準日 年
            'yuukyuukyuuka_month'    => $staff[0]['yuukyuukyuuka_month'],  //有給休暇の基準日 月
            'yuukyuukyuuka_day'      => $staff[0]['yuukyuukyuuka_day'],    //有給休暇の基準日 日
            'syubetu_bikou'          => $staff[0]['syubetu_bikou'],        //種別
            'keiyaku_nissuu'         => $staff[0]['keiyaku_nissuu'],       //契約日数
            'keiyaku_jikan'          => $staff[0]['keiyaku_jikan'],        //契約時間
            'kinmu_kubun'            => $staff[0]['kinmu_kubun'],          //勤務区分
            'kinmu_kibouchi'         => $staff[0]['kinmu_kibouchi'],       //勤務希望地
            'check_koutu_1'          => $staff[0]['check_koutu_1'],        //徒歩
            'check_koutu_2'          => $staff[0]['check_koutu_2'],        //自転車
            'check_koutu_3'          => $staff[0]['check_koutu_3'],        //オートバイ
            'check_koutu_4'          => $staff[0]['check_koutu_4'],        //自動車
            'check_koutu_5'          => $staff[0]['check_koutu_5'],        //電車・バス
            'check_koutu_6'          => $staff[0]['check_koutu_6'],        //その他        
            //振込口座情報
                 
        ];
        return parent::toJson($result);
    }
    /*
     * スタッフ情報更新
     */
     public function update ($request, $response)
     {   
        $postData  = $_POST;
        error_log(print_r($postData, true));
        
        $dbStaffMapper = new \App\db\DbStaffMapper;
        $dmStaff = new \App\model\DmStaff;
         $dmStaff->staff_id              =$postData['staff_id'];             //スタッフID
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
        //緊急連絡先
         $dmStaff->kinkyuuji_name        =$postData['kinkyuuji_name'];       //緊急氏名
         $dmStaff->kinkyuuji_post_on     =$postData['kinkyuuji_post_on'];    //緊急郵便番号
         $dmStaff->kinkyuuji_todoufuken  =$postData['kinkyuuji_todoufuken']; //緊急都道府県
         $dmStaff->kinkyuuji_shikuchoson =$postData['kinkyuuji_shikuchoson']; //緊急市区町村
         $dmStaff->kinkyuuji_chou_name   =$postData['kinkyuuji_chou_name'];   //緊急町名
         $dmStaff->kinkyuuji_banchi      =$postData['kinkyuuji_banchi'];      //緊急番地
         $dmStaff->kinkyuuji_tel_no      =$postData['kinkyuuji_tel_no'];      //緊急電話番号
         $dmStaff->kinkyuuji_bikou       =$postData['kinkyuuji_bikou'];        //緊急備考
        //勤務形態
         $dmStaff->nyusyaday_gengou        =$postData['nyusyaday_gengou'];        //入社日元号
         $dmStaff->nyusyaday_year          =$postData['nyusyaday_year'];          //入社日　年
         $dmStaff->nyusyaday_month         =$postData['nyusyaday_month'];         //入社日　月
         $dmStaff->nyusyaday_day           =$postData['nyusyaday_day'];           //入社日　日
         $dmStaff->yuukyuukyuuka_gengou    =$postData['yuukyuukyuuka_gengou'];    //有給休暇の基準日 元号
         $dmStaff->yuukyuukyuuka_year      =$postData['yuukyuukyuuka_year'];      //有給休暇の基準日 年
         $dmStaff->yuukyuukyuuka_month     =$postData['yuukyuukyuuka_month'];     //有給休暇の基準日 月
         $dmStaff->yuukyuukyuuka_day       =$postData['yuukyuukyuuka_day'];       //有給休暇の基準日 日
         $dmStaff->syubetu_bikou           =$postData['syubetu_bikou'];           //種別
         $dmStaff->keiyaku_nissuu          =$postData['keiyaku_nissuu'];          //契約日数
         $dmStaff->keiyaku_jikan           =$postData['keiyaku_jikan'];           //契約時間
         $dmStaff->kinmu_kubun             =$postData['kinmu_kubun'];             //勤務区分
         $dmStaff->kinmu_kibouchi          =$postData['kinmu_kibouchi'];          //勤務希望地
         $dmStaff->check_koutu_1           =$postData['check_koutu_1'];           //徒歩
         $dmStaff->check_koutu_2           =$postData['check_koutu_2'];           //自転車
         $dmStaff->check_koutu_3           =$postData['check_koutu_3'];           //オートバイ
         $dmStaff->check_koutu_4           =$postData['check_koutu_4'];           //自動車
         $dmStaff->check_koutu_5           =$postData['check_koutu_5'];           //電車・バス
         $dmStaff->check_koutu_6           =$postData['check_koutu_6'];           //その他              

         error_log(print_r('postData', true));
         error_log(print_r($postData['seinengappi_gengou'], true));

         $count = $dbStaffMapper->update($dmStaff);
         return parent::toJson($count);
     }
}