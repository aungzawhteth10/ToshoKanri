<?php
namespace App\Api;
class ApiRentalRegister extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
         //図書情報を取得する
        $dbBookMapper = new \App\db\DbBookMapper;
        $dmBook = new \App\model\DmBook;
        $dmBook->book_id   = $this->session->book_id;
        $book = $dbBookMapper->find($dmBook);

        //レンタル情報を取得する
        $dbRentalMapper = new \App\db\DbRentalMapper;
        $dmRental = new \App\model\DmRental;
        $dmRental->book_id   = $this->session->book_id;
        $rentl = $dbRentalMapper->find($dmRental);
        error_log(print_r('aaaaaaa', true));
        error_log(print_r($rentl, true));

        $result = [];
        // if (count($book) != 1) {
        //     return parent::toError('書籍情報が不正です。');
        // }
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
            'user_id'      => $rentl[0]['user_id'] ?? '',//利用者ID
            'Borrow_date'  => $rentl[0]['Borrow_date'] ?? '', //借用日付
            'usage_period' => $rentl[0]['usage_period'] ?? '', //利用期間  
        ];
        return parent::toJson($result);
    }
    /*
     * 書籍情報更新
     */
    public function update ($request, $response)
    {   
        $postData  = $_POST;
        $dbRentalMapper = new \App\db\DbRentalMapper;
        // $dmRental = new \App\model\DmRental;
        // $dmRental->book_id   = $postData['book_id'];
        // $count = $dbRentalMapper->delete($dmRental);
        $dmRental = new \App\model\DmRental;
        $dmRental->book_id        = $postData['book_id'];
        $dmRental->user_id        = $postData['user_id'];
        $dmRental->Borrow_date      = $postData['Borrow_date'];
        $dmRental->usage_period     = $postData['usage_period'];

        $count = $dbRentalMapper->insert($dmRental);

        return parent::toJson($count);
    }
}