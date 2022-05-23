<?php
namespace App\model;
class DmStaff extends DataModel
{
    public static $schema = [
        //基本情報
        'staff_id'             => 'string', //スタッフID            
        'staff_code'           => 'string', //スタッフコード
        'name'                 => 'string', //氏名
        'furigana'             => 'string', //フリガナ
        'hyouji_ryakushou'     => 'string', //表示略称
        'seibetsu'             => 'string', //性別
        'seinengappi_gengou'   => 'string', //生年月日　元号
        'seinengappi_year'     => 'string', //年
        'seinengappi_month'    => 'string', //月
        'seinengappi_day'      => 'string', //日
        'age'                  => 'string', //年齢
        'post_no'              => 'string', //郵便番号
        'todoufuken'           => 'string', //都道府県
        'shikuchoson'          => 'string', //市区町村
        'chou_name'            => 'string', //町名
        'banchi'               => 'string', //番地
        'tel_no'               => 'string', //電話番号
        'moblie_no'            => 'string', //携帯番号
        'fax_no'               => 'string', //FAX番号
        'mail_address'         => 'string', //メールアドレス
        'bikou'                => 'string', //備考
        //緊急連絡先
        'kinkyuuji_name'         => 'string', //緊急氏名
        'kinkyuuji_post_on'      => 'string', //緊急郵便番号
        'kinkyuuji_todoufuken'   => 'string',  //緊急都道府県
        'kinkyuuji_shikuchoson'  => 'string', //緊急市区町村
        'kinkyuuji_chou_name'    => 'string', //緊急町名
        'kinkyuuji_banchi'       => 'string', //緊急番地
        'kinkyuuji_tel_no'       => 'string', //緊急電話番号
        'kinkyuuji_bikou'        => 'string', //緊急備考
        //勤務形態
        'nyusyaday_gengou'       => 'string',     //入社日元号
        'nyusyaday_year'         => 'string',    //入社日　年
        'nyusyaday_month'        => 'string',     //入社日　月
        'nyusyaday_day'          => 'string',    //入社日　日
        'yuukyuukyuuka_gengou'   => 'string',    //有給休暇の基準日 元号
        'yuukyuukyuuka_year'     => 'string',    //有給休暇の基準日 年
        'yuukyuukyuuka_month'    => 'string',     //有給休暇の基準日 月
        'yuukyuukyuuka_day'      => 'string',    //有給休暇の基準日 日
        'syubetu_bikou'          => 'string',    //種別
        'keiyaku_nissuu'         => 'string',    //契約日数
        'keiyaku_jikan'          => 'string',    //契約時間
        'kinmu_kubun'            => 'string',    //勤務区分
        'kinmu_kibouchi'         => 'string',     //勤務希望地
        'check_koutu_1'          => 'string',    //徒歩
        'check_koutu_2'          => 'string',     //自転車
        'check_koutu_3'          => 'string',    //オートバイ
        'check_koutu_4'          => 'string',    //自動車
        'check_koutu_5'          => 'string',    //電車・バス
        'check_koutu_6'          => 'string',    //その他
      
    ];  
    public static $primary_key = [
        'staff_id',//スタッフID
    ];
}