<?php
namespace App\model;
class DmCmTable extends DataModel
{
    public static $schema = [
        'bunrui_id' => 'string',//分類ID
        'id'        => 'string', //コードID
        'name'      => 'string', //名称
    ];
    public static $primary_key = [
        'bunrui_id',//分類ID
        'id',//コードID
    ];
}