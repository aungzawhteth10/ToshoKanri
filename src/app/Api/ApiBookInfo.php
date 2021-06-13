<?php
namespace App\Api;
class ApiBookInfo extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        $dbBookMapper = new \App\db\DbBookMapper;
        $dmBook = new \App\model\DmBook;
        error_log(print_r($this->session, true));
        $dmBook->book_id   = $this->session->book_id;
        $book = $dbBookMapper->find($dmBook);
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_book_category')), 'value', 'id');
        error_log(print_r($category, true));
        error_log(print_r($category[1], true));
        $result = [];
        if (count($book) != 1) {
            return parent::toError('書籍情報が不正です。');
        }
        $result = [
            'book_id'   => $book[0]['book_id'],
            'book_name' => $book[0]['book_name'],
            'author'    => $book[0]['author'],
            'category'  => $book[0]['category'],
            'overview'  => $book[0]['overview'],
            'publisher' => $book[0]['publisher']
        ];
        return parent::toJson($result);
    }
}
