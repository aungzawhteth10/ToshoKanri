<?php
namespace App\Api;
class ApiBookRegister extends ApiBase
{
    public function chkDuplicate ($request, $response)
    {   
        $bookId = $_GET['book_id'];
        if ($this->_isBookIdDuplicate($bookId)) {
            return parent::toError('書籍IDが重複しています。');
        }
        return 'OK';
    }
    public function register ($request, $response)
    {   
     /* $kainn_id   = $_POST['kainn_id'];
        $Borrow_date   = $_POST['Borrow_date'];
        $usage_period   = $_POST['usage_period'];*/
    
        $book_id   = $_POST['book_id'];
        $book_name = $_POST['book_name'];
        $author    = $_POST['author'];
        $category  = $_POST['category'];
        $overview  = $_POST['overview'];
        $publisher = $_POST['publisher'];
        if ($this->_isBookIdDuplicate($book_id)) {
            return parent::toError('書籍IDが重複しています。');
        }
        $dbBookMapper = new \App\db\DbBookMapper;
        $dmBook = new \App\model\DmBook;

    /*  $dmBook->kainn_id   = $kainn_id;
        $dmBook->Borrow_date   = $Borrow_date;
        $dmBook->usage_period   = $usage_period;  */

        $dmBook->book_id   = $book_id;
        $dmBook->book_name = $book_name;
        $dmBook->author    = $author;
        $dmBook->category  = $category;
        $dmBook->overview  = $overview;
        $dmBook->publisher = $publisher;
        $dmBook->ryoukinn  = $_POST['ryoukinn'];
        $dmBook->rental    = $_POST['rental'];
        $result = $dbBookMapper->insert($dmBook);
        return parent::toJson($result);
    }
    private function _isBookIdDuplicate ($bookId)
    {
        $dbBookMapper = new \App\db\DbBookMapper;
        $dmBook = new \App\model\DmBook;
        $dmBook->book_id = $bookId;
        $book = $dbBookMapper->find($dmBook);
        if (count($book) != 0) {
            return true;
        }
        return false;
    }
}
