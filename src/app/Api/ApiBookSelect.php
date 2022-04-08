<?php
namespace App\Api;
class ApiBookSelect extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        $dbBookMapper = new \App\db\DbBookMapper;
        $book = $dbBookMapper->find();
        error_log(print_r($book, true));
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_book_category')), 'value', 'id');
        error_log(print_r($category, true));
        error_log(print_r($category[1], true));
        $result = [];
        foreach ($book as $key => $value) {
            $result[] = [
                'book_id'   => $value['book_id'], //書籍ID
                'book_name' => $value['book_name'],//書籍名前
                'author'    => $value['author'], //作者
                'category'  => $category[$value['category']] ?? '',//カテゴリ
                'overview'  => $value['overview'], //概要
                'publisher' => $value['publisher'],//出版社
                'ryoukinn'  => $value['ryoukinn'], //料金
            ];
        }
        return parent::toJson($result);
    }
}