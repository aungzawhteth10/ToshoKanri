<?php
namespace App\Api;
class ApiBase 
{
   public function __construct(View $views)
   {
       return $this->views = $views;
   }
   public function auth($request, $response)
   {
      return "success";
   }
}
?>