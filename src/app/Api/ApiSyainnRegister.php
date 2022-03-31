<?php
namespace App\Api;
class ApiSyainnRegister extends ApiBase
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
        //社員情報を取得する
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\DmSyainn;
        $dmSyainn->book_id   = $this->session->book_id;
        $syainn = $dbSyainnMapper->find($dmSyainn);
        error_log(print_r('aaaaaaa', true));
        error_log(print_r($syainn, true));
        $result = [
            'book_id'   => $book[0]['book_id'],
            'book_name' => $book[0]['book_name'],
            'author'    => $book[0]['author'],
            'category'  => $book[0]['category'],
            'overview'  => $book[0]['overview'],
            'publisher' => $book[0]['publisher'],
            'ryoukinn'  => $book[0]['ryoukinn'],
            //社員の情報追加画面
            'syainn_id'  => $syainn[0]['syainn_id'] ?? '',//社員ID
            'syainn_name'=> $syainn[0]['syainn_name'] ?? '', //社員名
            'syainn_sex' => $syainn[0]['syainn_sex'] ?? '', //社員性別
        ];
        return parent::toJson($result);
    }
    /*
     * 書籍情報更新
     */
    public function update ($request, $response)
    {   
        $postData  = $_POST;
        $dbSyainnMapper = new \App\db\DbSyainnMapper;
        $dmSyainn = new \App\model\dmSyainn;
        $dmSyainn->book_id        = $postData['book_id'];
        $dmSyainn->syainn_id      = $postData['syainn_id'];
        $dmSyainn->syainn_name    = $postData['syainn_name'];
        $dmSyainn->syainn_sex     = $postData['syainn_sex'];
        $count = $dbSyainnMapper->insert($dmSyainn);
        return parent::toJson($count);
    }
}