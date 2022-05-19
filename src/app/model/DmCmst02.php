<?php
namespace App\model;
class DmCmst02 extends DataModel
{
    public static $schema = [
        'staff_id'           => 'string', //スタッフコード
        'youbi'              => 'string', //社員名
        'kinmu_kubun_id'     => 'string', //職種
        'kinmu_kubun_settei' => 'string', //メールアドレス
        'jikantai1'          => 'string', //契約時間
        'jikantai2'          => 'string', //フリガナ
        'jikantai3'          => 'string', //電話番号
        'jikantai4'          => 'string', //携帯番号
        'jikantai5'          => 'string', //携帯番号
    ];
    public static $primary_key = [
        'syainn_id',//スタッフコード
    ];
}