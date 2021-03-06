<?php
namespace App\Api;
class ApiRentalRegister extends ApiBase
{   
    public function init ( $request, $response)
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
        $rental = $dbRentalMapper->find($dmRental);
        error_log(print_r('aaaa', true));
        error_log(print_r($rental, true));

        //スタッフ情報を取得する
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\DmSyainn;
        $result = [
            'book_id'   => $book[0]['book_id'],
            'book_name' => $book[0]['book_name'],
            'author'    => $book[0]['author'],
            'category'  => $book[0]['category'],
            'overview'  => $book[0]['overview'],
            'publisher' => $book[0]['publisher'],
            'ryoukinn'  => $book[0]['ryoukinn'],
            //利用者情報
            'riyousya_id'  => $riyousya[0]['riyousya_id'],
            //社員の情報
            'syainn_id'    => $syainn[0]['syainn_id'] ?? '', //スタッフコード
            'syainn_name'  => $syainn[0]['syainn_name'] ?? '', //社員名
            //利用者の情報
            'user_id'      => $rental[0]['user_id'] ?? '',//利用者ID
            'Borrow_date'  => $rental[0]['Borrow_date'] ?? '', //借用日付
            'usage_period' => $rental[0]['usage_period'] ?? '', //利用期間
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
        $dmRental = new \App\model\DmRental;
        $dmRental->book_id       = $postData['book_id'];
        $dmRental->user_id       = $postData['user_id'];
        $dmRental->Borrow_date   = $postData['Borrow_date'];
        $dmRental->usage_period  = $postData['usage_period'];
        $dmRental->syainn_id     = $postData['syainn_id'];
        $dmRental->syainn_name   = $postData['syainn_name'];
        $dmRental->rental_id     = $postData['rental_id'];
        $count = $dbRentalMapper->insert($dmRental);
        return parent::toJson($count);
    }
}