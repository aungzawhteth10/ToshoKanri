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
        'sakujo_day'           => 'string', //削除日
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
        'nyusyaday_year'         => 'string',     //入社日　年
        'nyusyaday_month'        => 'string',     //入社日　月
        'nyusyaday_day'          => 'string',     //入社日　日
        'kijunbi_henkou'         => 'string',     //有給休暇の基準日 変更
        'yuukyuukyuuka_gengou'   => 'string',     //有給休暇の基準日 元号
        'yuukyuukyuuka_year'     => 'string',     //有給休暇の基準日 年
        'yuukyuukyuuka_month'    => 'string',     //有給休暇の基準日 月
        'yuukyuukyuuka_day'      => 'string',     //有給休暇の基準日 日
        'syubetu_bikou'          => 'string',     //種別
        'keiyaku_nissuu'         => 'string',     //契約日数
        'keiyaku_jikan'          => 'string',     //契約時間
        'kinmu_kubun'            => 'string',     //勤務区分
        'kinmu_kibouchi'         => 'string',     //勤務希望地
        'check_koutu_1'          => 'string',     //徒歩
        'check_koutu_2'          => 'string',     //自転車
        'check_koutu_3'          => 'string',     //オートバイ
        'check_koutu_4'          => 'string',     //自動車
        'check_koutu_5'          => 'string',     //電車・バス
        'check_koutu_6'          => 'string',     //その他
        //銀行振込口座振込
        'furikomisaki_kubun'        => 'string',   //振込先区分
        'bank_bank_name_furi'       => 'string',   //銀行名
        'bank_shiten_furigana'      => 'string',     //支店名
        'bank_bank_code'            => 'string',     //銀行コード
        'bank_shiten_code'          => 'string',     //支店コード
        'bank_kouza_shubets'        => 'string',      //口座種別
        'bank_kouza_no'             => 'string',      //口座番号
        'bank_kouza_meigi_furigana' => 'string',     //口座名義フリガナ
        'bank_kokyaku_code'         => 'string',     //顧客コード     
        //郵便局口座振込
        'post_office_kouza_kigou'           => 'string',   //郵便局口座記号
        'post_office_kouza_no'              => 'string',   //郵便局口座番号
        'post_office_kouza_meigi_furigana'  => 'string',    //郵便局口座名義フリガナ
        'post_office_kokyaku_code'          => 'string',    //郵便局顧客コード
        //振込データ「新規コード」初期設定
        'touroku_month'             => 'string',    //登録年月
        'modification_month'        => 'string',    //更新年月
    ];  
    public static $primary_key = [
        'staff_id',//スタッフID
    ];
}