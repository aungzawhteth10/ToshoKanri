<?php
namespace App\model;
class DmSyainn extends DataModel
{
    public static $schema = [
        'syainn_id'          => 'string', //スタッフコード
        'syainn_name'        => 'string', //社員名
        'syainn_Occupation'  => 'string', //職種
        'mail_address'       => 'string', //メールアドレス
        'keiyaku_jikan'      => 'string', //契約時間
        'furigana'           => 'string', //フリガナ
        'tel_no'             => 'string', //電話番号
        'moblie_no'          => 'string', //携帯番号
    ];
    public static $primary_key = [
        'syainn_id',//スタッフコード
    ];
}