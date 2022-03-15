<?php
namespace App\model;
class DmRental extends DataModel
{
    public static $schema = [
        'book_id'   => 'string', //書籍ID
        'book_name' => 'string', //書籍名称
        'rental'    => 'static', //レンタル時間
    ];
    public static $primary_key = [
        'book_id',//書籍ID
    ];

    echo date('Y-m-d');                       //"今日"
    echo date('Y-m-d', strtotime('+10 day')); //"十日"
    echo date('Y-m-d', strtotime('+1 week')); //"1週間後:"
    echo date('Y-m-d', strtotime('+1 month'));//"1ヵ月後:"
}