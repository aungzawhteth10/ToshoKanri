<?php
namespace App\Api;
class ApiRentalInfo extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        $dbRentalMapper = new \App\db\DbRentalMapper;
        $dmRental = new \App\model\DmRental;
        error_log(print_r($this->session, true));
        $dmRental-> book_id   = $this->session->book_id;
        $rental = $dbRentalMapper->find($dmRental);
        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_rental_category')), 'value', 'id');
        error_log(print_r($category, true));
        error_log(print_r($category[1], true));
        $result = [];
        if (count($rental) != 1) {
            return parent::toError('書籍情報が不正です。');
        }
        $result = [

            //レンタル情報を追加する。
            'user_id'      => $rental[0]['user_id'] ?? '',//利用者ID
            'Borrow_date'  => $rental[0]['Borrow_date'] ?? '', //借用日付
            'usage_period' => $rental[0]['usage_period'] ?? '', //利用期間  
            'book_id'      => $rental[0]['book_id'],
            'book_name'    => $rental[0]['book_name'],
            'author'       => $rental[0]['author'],
            'category'     => $rental[0]['category'],
            'overview'     => $rental[0]['overview'],
            'publisher'    => $rental[0]['publisher'],
            'ryoukinn'     => $rental[0]['ryoukinn']
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
        $dbrentalMapper = new \App\db\DbrentalMapper;
        $dmrental = new \App\model\Dmrental;
        $dmrental->book_id          = $this->session->book_id;
        $dmrental->book_name        = $postData['book_name'];
        $dmrental->author           = $postData['author'];
        $dmrental->category         = $postData['category'];
        $dmrental->overview         = $postData['overview'];
        $dmrental->publisher        = $postData['publisher'];
        $dmrental->rental           = $postData['rental'];
        $dmrental->ryoukinn         = $postData['ryoukinn'];
        $dmrental->user_id          = $postData['user_id'];
        $dmrental->Borrow_date      = $postData['Borrow_date'];
        $dmrental->usage_period     = $postData['usage_period'];
        $count = $dbrentalMapper->update($dmrental);
        return parent::toJson($count);
    }
}
