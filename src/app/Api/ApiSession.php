<?php
namespace App\Api;
class ApiSession extends ApiBase
{
   public function update($request, $response)
   {
        foreach ($_POST as $key => $value) {
            if (!isset(\App\model\DmSession::$schema[$key])) {
                return parent::toError('セッションが不正です。');
            }
            $_SESSION[$key] = $value;
        }
        error_log(print_r($_SESSION, true));
        return parent::toJson($_SESSION);
   }
}
