<?php
namespace App\Api;
class ApiSyainnManage extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        //図書情報を取得する
        $DbBookMapper = new \App\db\DbBookMapper;
        $book = $DbBookMapper->find();
        //社員情報を取得する
        $DbSyainnMapper = new \App\db\DbSyainnMapper;
        $syainn = $DbSyainnMapper->find();
        $syainn = array_column($syainn, null, 'book_id') ;        
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_book_category')), 'value', 'id');
        error_log(print_r($category, true));

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
                //社員情報を表示する。
                'syainn_id'    => $syainn[$value['book_id']]['syainn_id'] ?? '',//社員ID
                'syainn_name'  => $syainn[$value['book_id']]['syainn_name'] ?? '', //社員名
                'syainn_sex'   => $syainn[$value['book_id']]['syainn_sex'] ?? '', //社員性別  
            ];
        }
        return parent::toJson($result);
    }

}
