<?php
namespace App\model;
class DmSyainn extends DataModel
{
    public static $schema = [
        'syainn_id'          => 'string', //社員ID
        'syainn_name'        => 'string', //社員名
        'syainn_Occupation'  => 'string', //職種
        'syainn_sex'         => 'string', //社員性別
        'syainn_age'         => 'string', //社員年齢
        'furigana'           => 'string', //フリガナ
    ];
    public static $primary_key = [
        'syainn_id',//社員ID
    ];
}