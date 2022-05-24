<?php
namespace App\Api;
class ApiBase 
{
   protected $session;
   protected $HtmlHelper;
   public function __construct () {
      $this->HtmlHelper = new \App\Api\HtmlHelper;
      $dmSession = new \App\model\DmSession;
      $dmSession->setModelData($_SESSION);
      $this->session = $dmSession;
   }
   public function toError($ErrorMsg)
   {
      http_response_code(500);
      die($ErrorMsg);
   }
   public function toJson($rtnData)
   {
      http_response_code(200);
      return json_encode($rtnData, JSON_UNESCAPED_UNICODE);
   }
   public function isJson($string)
   {
      return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
   }
   private function _check_array_json($json)
   {
      if (!is_array($json)) {
         $json = [$json];
      }
      $result = [];
      foreach ($json as $key => $value) {
         if ($this->isJson($value)) {
            $result[$key] = json_decode($value, true);
         } else {
            $result[$key] = $value;
         }
      }
      return $result;
   }
   public function getValues($request)
   {
      return $this->_check_array_json($request->getParsedBody());
   }
}
