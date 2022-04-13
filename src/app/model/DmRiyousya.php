<?php
namespace App\model;
class DmRiyousya extends DataModel
{
    public static $schema = [
        'riyousya_id'        => 'string', //利用者ID
        'riyousya_name'      => 'string', //利用者名
        'mail_address'       => 'string', //メールアドレス
        'furigana'           => 'string', //フリガナ
        'tel_no'             => 'string', //電話番号
        'moblie_no'          => 'string', //携帯番号
    ];
    public static $primary_key = [
        'riyousya_id',//利用者ID
    ];
}