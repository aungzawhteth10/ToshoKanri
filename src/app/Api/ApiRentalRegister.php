<?php
namespace App\Api;
class ApiRentalRegister extends ApiBase
{
    public function chekDuplicate ($request, $response)
    {   
        $bookID = $_GET['book_id'];
        if ($this->_isRentalIdDuplicate($bookId)) {
            return parent::toError('書籍IDが重複しています。');
        }
        return 'OK';
    }

    //レンタル登録入力画面
    public function update ($request, $response)
    {   
        $user_id      = $_POST['user_id'];
        $Borrow_date  = $_POST['Borrow_date'];   
        $usage_period = $_POST['usage_period'];
        $book_id      = $_POST['book_id'];
        $book_name    = $_POST['book_name'];
        $author       = $_POST['author'];
        $category     = $_POST['category'];
        $overview     = $_POST['overview'];
        $publisher    = $_POST['publisher'];
        $ryoukinn     = $_POST['ryoukinn'];
        if ($this->_isRentalIdDuplicate($rental_id)) {
            return parent::toError('書籍IDが重複しています。');
        }
        $dbRentalMapper = new \App\db\DbRentalMapper;
        $dmRental = new \App\model\DmRental;

        $dmRental->user_id      = $user_id;
        $dmRental->Borrow_date  = $Borrow_date;
        $dmRental->usage_period = $usage_period;  
        $dmRental->book_id      = $book_id;
        $dmRental->book_name    = $book_name;
        $dmRental->author       = $author;
        $dmRental->category     = $category;
        $dmRental->overview     = $overview;
        $dmRental->publisher    = $publisher;
        $dmRental->ryoukinn     = $ryoukinn;
        $result = $dbRentalMapper->insert($dmRental);
        return parent::toJson($result);
    }
    private function _isRentalIdDuplicate ($RentalId)
    {
        $dbRentalMapper = new \App\db\DbRentalMapper;
        $dmRental = new \App\model\DmRental;
        $dmRental->Rental_id = $RentalId;
        $Rental = $dbRentalMapper->find($dmRental);
        if (count($Rental) != 0) {
            return true;
        }
        return false;
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