<?php
namespace App\model;
class DmSyainn extends DataModel
{
    public static $schema = [
        'book_id'      => 'string', //書籍ID
        'syainn_id'    => 'string', //社員ID
        'syainn_name'  => 'string', //社員名
        'syainn_sex'   => 'string', //社員性別
    ];
    public static $primary_key = [
        'book_id',//書籍ID
    ];
}