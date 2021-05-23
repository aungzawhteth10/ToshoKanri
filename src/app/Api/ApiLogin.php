<?php
namespace App\Api;
use Slim\Views\Twig as View;
class ApiLogin 
{
   public function loginAuth($request, $response)
   {
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$dbUserMapper = new \App\db\DbUserMapper;
		$dmUser = new \App\model\DmUser;
		$dmUser->user_name = $user_name;
		$dmUser->password  = $password;
		$user = $dbUserMapper->find($dmUser);
		if (count($user) == 0) {
			return false;
		}
		$auth_key = $this->createAuthKey($user[0]['user_id']);
		$result = [
			'auth_key' => $auth_key,
		];
	    return json_encode($result, JSON_UNESCAPED_UNICODE);
   }
   public function register($request, $response)
   {
        $user_name   = $_POST['reg_user_name'];
        $password    = $_POST['reg_password'];
        $dbUserMapper = new \App\db\DbUserMapper;
        $dmUser = new \App\model\DmUser;
        $dmUser->user_name = $user_name;
        $dmUser->password  = $password;
        $count = $dbUserMapper->insert($dmUser);
        $user = $dbUserMapper->find($dmUser);
        $auth_key = $this->createAuthKey($user[0]['user_id']);
        $result = [
            'auth_key' => $auth_key,
        ];
        return json_encode($result, JSON_UNESCAPED_UNICODE);
   }
   public function createAuthKey($user_id)
   {
        //認証キーを作成する。
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $auth_key = '';
        for ($i = 0; $i < 100; $i++) {
            $auth_key .= $characters[rand(0, $charactersLength - 1)];
        }
        //認証キーの有効期間を作成（有効期間：3時間）
        $jikan_3 = time() + (3 * 60 * 60);
        $time_limit = date('Y-m-d H:i:s', $jikan_3);
        $dbUserMapper = new \App\db\DbUserMapper;
        $dmUser = new \App\model\DmUser;
        $dmUser->user_id    = $user_id;
        $dmUser->auth_key   = $auth_key;
        $dmUser->time_limit = $time_limit;
        $user = $dbUserMapper->update($dmUser);
        return $auth_key;
   }
}
