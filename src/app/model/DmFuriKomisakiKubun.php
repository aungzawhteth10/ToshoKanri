<?php
namespace App\model;
class DmFuriKomisakiKubun extends DataModel
{
    public static $schema = [
        //基本情報
        'staff_id'             => 'string', //スタッフID            
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