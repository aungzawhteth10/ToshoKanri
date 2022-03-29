<?php
namespace App\Api;
class ApiBookRyoukinn extends ApiBase
{
    /*
     * 初期化
     */
     
    public function init ($request, $response)
    {   
        $dbBookMapper = new \App\db\DbBookMapper;
        $book = $dbBookMapper->find();
        error_log(print_r($book, true));
        $result = [];
        foreach ($book as $key => $value) {
            $result[] = [
                'book_id'        => $value['book_id'],
                'book_name'      => $value['book_name'],
                'book_ryoukinn'  => $value['ryoukinn'],
            ];
        }
        return parent::toJson($result);
    }
}
