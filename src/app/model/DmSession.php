<?php
namespace App\model;
class DmSession extends DataModel
{
    public static $schema = [
        'screen_name' => 'string',//画面名称
        'book_id'     => 'string',//書籍ID
        'syainn_id'   => 'string', //社員ID
        'riyousya_id'  => 'string', //利用者ID
    ];
    public function getSessionArr ()
    {
        $data = $this->toArray();
        $data['session'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        return $data;
    }
}