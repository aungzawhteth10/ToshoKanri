<?php
namespace App\model;
class DmKinmuKubun extends DataModel        
{
    public static $schema = [
        //基本情報
        'staff_id'             => 'string',//スタッフID            
        'kinmu_kubun_id'       => 'string',//勤務区分
        'start_time_1'         => 'string',//時間開始1
        'end_time_1'           => 'string',//時間終了1
        'start_time_2'         => 'string',//時間開始2
        'end_time_2'           => 'string',//時間終了2
        'start_time_3'         => 'string',//時間開始3
        'end_time_3'           => 'string',//時間終了3
        'start_time_4'         => 'string',//時間開始4
        'end_time_4'           => 'string',//時間終了4
        'start_time_5'         => 'string',//時間開始5
        'end_time_5'           => 'string',//時間終了5
    ];  
    public static $primary_key = [
        'staff_id',//スタッフID
    ];
}