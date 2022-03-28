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
        //レンタル情報を取得する
        $DbRentalMapper = new \App\db\DbRentalMapper;
        $Rental = $DbRentalMapper->find();
        $Rental = array_column($Rental, null, 'book_id') ;
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_book_category')), 'value', 'id');
        //  error_log(print_r($category, true));
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

                //レンタル情報を追加する。
                'user_id'      => $Rental[$value['book_id']]['user_id'] ?? '',//利用者ID
                'Borrow_date'  => $Rental[$value['book_id']]['Borrow_date'] ?? '', //借用日付
                'usage_period' => $Rental[$value['book_id']]['usage_period'] ?? '', //利用期間  
            ];
        }
        return parent::toJson($result);
    }

}
