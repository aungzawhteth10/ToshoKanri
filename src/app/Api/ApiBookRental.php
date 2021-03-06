<?php
namespace App\Api;
class ApiBookRental extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {   
        $dbBookMapper = new \App\db\DbBookMapper;
        $book = $dbBookMapper->find();
        error_log(print_r($book, true));

        $category = array_column(json_decode($this->HtmlHelper->getJson('cm_book_category')), 'value', 'id');
        $rental   = array_column(json_decode($this->HtmlHelper->getJson('cm_rental_condition')), 'value', 'id');
        error_log(print_r($category, true));
        error_log(print_r($category[1], true));
        $result = [];
        foreach ($book as $key => $value) {
            $result[] = [
                'book_id'   => $value['book_id'],
                'book_name' => '<span class="pageMove" onclick="logic.toEditBook('. $value['book_id'] .')">' . $value['book_name']. '</span>',
                'author'    => $value['author'],
                'category'  => $category[$value['category']] ?? '',
                'overview'  => $value['overview'],
                'publisher' => $value['publisher'],
                'rental'    => $rental[$value['rental']],
            ];
        }
        return parent::toJson($result);
    }
}
