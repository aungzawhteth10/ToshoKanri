<?php
namespace App\Api;
class ApiRentalChoie extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //図書情報を取得する
        $DbBookMapper = new \App\db\DbBookMapper;
        $book = $DbBookMapper->find();

        $result = [];
        foreach ($book as $key => $value) {
            $result[] = [
                'book_name' => $value['book_name'],//書籍名前
            ];
        }
        return parent::toJson($result);
    }

}
