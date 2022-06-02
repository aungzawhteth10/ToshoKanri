<?php
namespace App\Api;
class ApiStaffManage extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //スタッフ情報を取得する    
        $DbStaffMapper = new \App\db\DbStaffMapper;
        $staff = $DbStaffMapper->find();
        $staff = array_column($staff, null, 'staff_id') ;   
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_syubetu_category')), 'value', 'id');
        error_log(print_r($category, true));
        $result = [];
        foreach ($staff as $key => $value) {
            $result[] = [
                //スタッフ情報を表示する。
                'staff_id'               => $value['staff_id'] ?? '',   //スタッフID
                'staff_code'             => $value['staff_code'] ?? '', //スターフコード    
                'name'                   => $value['name'] ?? '', //社員名
                'furigana'               => $value['furigana'] ?? '',    //フリガナ
                'hyouji_ryakushou'       => $value['hyouji_ryakushou'] ?? '', //表示略称
                'seibetsu'               => $value['seibetsu'] ,//性別
                'seinengappi_gengou'     => $value['seinengappi_gengou'] ,//生年月日　元号
                'seinengappi_year'       => $value['seinengappi_year'] ?? '', //生年月日　年
                'seinengappi_month'      => $value['seinengappi_month'] ?? '', //生年月日　月
                'seinengappi_day'        => $value['seinengappi_day'] ?? '', //生年月日　日
                'age'                    => $value['age'] ?? '', //年齢
                'post_no'                => $value['post_no'] ?? '', //郵便番号
                'todoufuken'             => $value['todoufuken'] ?? '', //都道府県
                'shikuchoson'            => $value['shikuchoson'] ?? '', //市区町村
                'chou_name'              => $value['chou_name'] ?? '', //町名
                'banchi'                 => $value['banchi'] ?? '', //番地
                'keiyaku_jikan'          => $value['keiyaku_jikan'] ?? '', //契約時間
                'tel_no'                 => $value['tel_no'] ?? '',  //電話番号
                'moblie_no'              => $value['moblie_no'] ?? '', //携帯番号
                'fax_no'                 => $value['fax_no'] ?? '', //FAX番号
                'mail_address'           => $value['mail_address'] ?? '', //メールアドレス
                'bikou'                  => $value['bikou'] ?? '', //備考
                //緊急連絡先
                'kinkyuuji_name'         => $value['kinkyuuji_name'] ?? '', //緊急氏名
                'kinkyuuji_post_on'      => $value['kinkyuuji_post_on'] ?? '',//緊急郵便番号
                'kinkyuuji_todoufuken'   => $value['kinkyuuji_todoufuken'] ?? '', //緊急都道府県
                'kinkyuuji_shikuchoson'  => $value['kinkyuuji_shikuchoson'] ?? '', //緊急市区町村
                'kinkyuuji_chou_name'    => $value['kinkyuuji_chou_name'] ?? '', //緊急町名
                'kinkyuuji_banchi'       => $value['kinkyuuji_banchi'] ?? '', //緊急番地
                'kinkyuuji_tel_no'       => $value['kinkyuuji_tel_no'] ?? '', //緊急電話番号
                'kinkyuuji_bikou'        => $value['kinkyuuji_bikou'] ?? '',//緊急備考
                   //勤務形態
                'nyusyaday_gengou'       => $value['nyusyaday_gengou']?? '',     //入社日元号
                'nyusyaday_year'         => $value['nyusyaday_year']?? '',       //入社日　年
                'nyusyaday_month'        => $value['nyusyaday_month']?? '',      //入社日　月
                'nyusyaday_day'          => $value['nyusyaday_day']?? '',        //入社日　日
                'yuukyuukyuuka_gengou'   => $value['yuukyuukyuuka_gengou']?? '', //有給休暇の基準日 元号
                'yuukyuukyuuka_year'     => $value['yuukyuukyuuka_year']?? '',   //有給休暇の基準日 年
                'yuukyuukyuuka_month'    => $value['yuukyuukyuuka_month']?? '',  //有給休暇の基準日 月
                'yuukyuukyuuka_day'      => $value['yuukyuukyuuka_day']?? '',    //有給休暇の基準日 日
                'syubetu_bikou'          => $category[$value['syubetu_bikou']]?? '',        //種別
                'keiyaku_nissuu'         => $value['keiyaku_nissuu']?? '',       //契約日数
                'keiyaku_jikan'          => $value['keiyaku_jikan']?? '',        //契約時間
                'kinmu_kubun'            => $value['kinmu_kubun']?? '',          //勤務区分
                'kinmu_kibouchi'         => $value['kinmu_kibouchi']?? '',       //勤務希望地
                'check_koutu_1'          => $value['check_koutu_1']?? '',        //徒歩
                'check_koutu_2'          => $value['check_koutu_2']?? '',        //自転車
                'check_koutu_3'          => $value['check_koutu_3']?? '',        //オートバイ
                'check_koutu_4'          => $value['check_koutu_4']?? '',        //自動車
                'check_koutu_5'          => $value['check_koutu_5']?? '',        //電車・バス
                'check_koutu_6'          => $value['check_koutu_6']?? '',        //その他        
            ];
        }
        return parent::toJson($result);
    }
}
