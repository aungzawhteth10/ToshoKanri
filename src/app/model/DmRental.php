<?php
namespace App\model;
class DmRental extends DataModel
{
    public static $schema = [
        'book_id'        => 'string', //書籍ID
        'user_id'        => 'string', //利用者ID
        'Borrow_date'    => 'string', //借用日付
        'usage_period'   => 'string', //利用期間  
   /*   'author'         => 'string', //作者
        'category'       => 'string', //カテゴリ
        'overview'       => 'string', //概要
        'publisher'      => 'string', //出版社
        'ryoukinn'       => 'string', //料金  */
 //     'book_name'      => 'string', //書籍名称
    ];
    public static $primary_key = [
        'book_id',//書籍ID
    ];
}
