<?php
namespace App\Api;
class ApiBookInfo extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
         //図書情報を取得する
        $dbBookMapper = new \App\db\DbBookMapper;
        $dmBook = new \App\model\DmBook;
        error_log(print_r($this->session, true));
        $dmBook->book_id   = $this->session->book_id;
        $book = $dbBookMapper->find($dmBook);

        //レンタル情報を取得する
        $dbRentalMapper = new \App\db\DbRentalMapper;
        $dmrental = new \App\model\DmRental;
        error_log(print_r($this->session, true));
        $dmrental->book_id   = $this->session->book_id;
        $rentl = $dbRentalMapper->find($dmrental);

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
            'publisher' => $book[0]['publisher'],
            'rental'    => $book[0]['rental'],
            'ryoukinn'  => $book[0]['ryoukinn'],
            //利用者の情報追加
            'user_id'      => $book[0]['user_id'] ?? '',//利用者ID
            'Borrow_date'  => $book[0]['Borrow_date'] ?? '', //借用日付
            'usage_period' => $book[0]['usage_period'] ?? '', //利用期間  
        ];
        return parent::toJson($result);
    }
    /*
     * 書籍情報更新
     */
    public function update ($request, $response)
    {   
        $postData  = $_POST;
        error_log(print_r($postData, true));
        $dbBookMapper = new \App\db\DbBookMapper;
        $dmBook = new \App\model\DmBook;
        $dmBook->book_id   = $this->session->book_id;
        $dmBook->book_name = $postData['book_name'];
        $dmBook->author    = $postData['author'];
        $dmBook->category  = $postData['category'];
        $dmBook->overview  = $postData['overview'];
        $dmBook->publisher = $postData['publisher'];
        $dmBook->rental    = $postData['rental'];   
        $dmBook->ryoukinn  = $postData['ryoukinn'];     

        $dmBook->user_id          = $postData['user_id'];
        $dmBook->Borrow_date      = $postData['Borrow_date'];
        $dmBook->usage_period     = $postData['usage_period'];

        $count = $dbBookMapper->update($dmBook);
        return parent::toJson($count);
    }
}