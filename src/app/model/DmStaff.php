<?php
namespace App\model;
class DmStaff extends DataModel
{
    public static $schema = [
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
    //    'sakujo_day'           => 'string', //削除の日
    ];
    public static $primary_key = [
        'staff_id',//スタッフID
    ];
}