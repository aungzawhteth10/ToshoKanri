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
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_staff_seibetsu')), 'value', 'id');
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
                'seibetsu'               => $category[$value['seibetsu']]?? '' ,//性別
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

                'kinnkyuuji_name'         => $value['kinkyuuji_name'] ?? '', //緊急氏名
                'kinnkyuuji_post_on'      => $value['kinkyuuji_post_on'] ?? '',//緊急郵便番号
                'kinnkyuuji_todoufuken'   => $value['kinnkyuuji_todoufuken'] ?? '', //緊急都道府県
                'kinnkyuuji_shikuchoson'  => $value['kinkyuuji_shikuchoson'] ?? '', //緊急市区町村
                'kinnkyuuji_chou_name'    => $value['kinkyuuji_chou_name'] ?? '', //緊急町名
                'kinnkyuuji_banchi'       => $value['kinkyuuji_banchi'] ?? '', //緊急番地
                'kinnkyuuji_tel_no'       => $value['kinkyuuji_tel_no'] ?? '', //緊急電話番号
                'kinnkyuuji_bikou'        => $value['kinkyuuji_bikou'] ?? '',//緊急備考
    
            ];
        }
        return parent::toJson($result);
    }
}
