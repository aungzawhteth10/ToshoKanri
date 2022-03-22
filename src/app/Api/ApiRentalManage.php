<?php
namespace App\Api;
class ApiRentalManage extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        $DbRentalMapper = new \App\db\DbRentalMapper;
        $rental = $DbRentalMapper->find();
        error_log(print_r($rental, true));
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_rental_category')), 'value', 'id');
        //  error_log(print_r($category, true));
        $result = [];
        foreach ($rental as $key => $value) {
            $result[] = [
                'rental_id'   => $value['rental_id'], //書籍ID
                'rental_name' => $value['rental_name'],//書籍名前
                'user_id'   => $value['user_id'],//利用者ID
                'Borrow_date'=> $value['Borrow_date'], //借用日付
                'usage_period' => $value['usage_period'], //利用期間  
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

/*
rental_id
rental_name
user_id
Borrow_date
usage_period
author
category
overview
publisher
ryoukinn
rental
*/