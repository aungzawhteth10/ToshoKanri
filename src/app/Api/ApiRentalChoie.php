<?php
namespace App\Api;
class ApiRentalChoie extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //図書の情報を取得する
        $DbRentalMapper = new \App\db\DbRentalMapper;
        $rental = $DbRentalMapper->find();

        $result = [];
        foreach ($rental as $key => $value) {
            $result[] = [
                'book_id'   => $value['book_id'], //書籍ID
                'book_name' => $value['book_name'],//書籍名前
                'author'    => $value['author'], //作者
                'category'  => $category[$value['category']] ?? '',//カテゴリ
                'overview'  => $value['overview'], //概要
                'publisher' => $value['publisher'],//出版社

                //レンタル情報を追加する。
                'user_id'      => $rental[$value['book_id']]['user_id'] ?? '',//利用者ID
                'Borrow_date'  => $rental[$value['book_id']]['Borrow_date'] ?? '', //借用日付
                'usage_period' => $rental[$value['book_id']]['usage_period'] ?? '', //利用期間  
                'ryoukinn'     => $rental[$value['book_id']]['ryoukinn'] ?? '', //料金
            ];
        }
        return parent::toJson($result);
    }

}
