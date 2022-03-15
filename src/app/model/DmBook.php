<?php
namespace App\model;
class DmBook extends DataModel
{
    public static $schema = [
     /*   
        'kainn_id'   => 'string', //会員ID
        'Borrow_date'   => 'string', //借用日付
        'usage_period'   => 'string', //利用期間 
    */
        'book_id'   => 'string', //書籍ID
        'book_name' => 'string', //書籍名称
        'author'    => 'string', //作者
        'category'  => 'string', //カテゴリ
        'overview'  => 'string', //概要
        'publisher' => 'string', //出版社
        'rental'    => 'string', //レンタル状態
        'ryoukinn'  => 'string', //料金
    ];
    public static $primary_key = [
        'book_id',//書籍ID
    ];
}