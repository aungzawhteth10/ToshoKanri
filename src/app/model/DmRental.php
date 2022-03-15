<?php
namespace App\model;
class DmRental extends DataModel
{
    public static $schema = [
        'book_id'   => 'string', //書籍ID
        'book_name' => 'string', //書籍名称
        'rental'    => 'string', //レンタル時間
    ];
    public static $primary_key = [
        'book_id',//書籍ID
    ];
}