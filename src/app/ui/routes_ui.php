<?php
$app->get('/', function ($request, $response) {
	return 'URLを見直してください！';
});
$app->get('/{id}', function ($request, $response, $args) {
	$auth_key = $_GET['auth_key'] ?? 'zzz';
   	return _screenInit($args['id'], $auth_key, $this->view, $response);
});
/*
 *画面の初期化
 */
function _screenInit ($screenId, $auth_key, $view, $response)
{
	if (in_array($screenId, ['Login', 'login'])) {//ログイン画面の場合
		$sessionInfo = _createSessionInfo('Login');
		return $view->render($response, 'Login.twig', $sessionInfo);
	}
	$dbUserMapper = new \App\db\DbUserMapper;
	$dmUser = new \App\model\DmUser;
	$dmUser->auth_key = $auth_key;
	$user = $dbUserMapper->find($dmUser);
	if (count($user) == 0) {
		return _toLoginPage();
	}
	$timeLimit = $user[0]['time_limit'];
	$timeNow = date('Y-m-d H:i:s');
	$kigen_gire = false;//false：期限切れではない
	if ($timeNow > $timeLimit) {//期限切れ
		$kigen_gire = true;
	}
	if ($screenId == 'index' && $kigen_gire == false) {
		return _toHomePage($auth_key);
	}
	$sessionInfo = _createSessionInfo($screenId);
	return $view->render($response, $screenId . '.twig', $sessionInfo);
}
/*
 *Login画面へ遷移する
 */
function _toLoginPage ()
{
	$url = '/Login';
    $script = '<script>location.href="' . $url .'"</script>';
	return $script;
}
/*
 *Login画面へ遷移する
 */
function _createSessionInfo ($screenId)
{
	$dbKinouMapper = new \App\db\DbKinouMapper;
	$dmKinou = new \App\Model\DmKinou;
	$dmKinou->screen_id = $screenId;
	$kinou = $dbKinouMapper->find($dmKinou);
    $session = new \App\Model\DmSession;
    $session->screen_name = (isset($kinou[0])) ? $kinou[0]['name'] : "未登録";
    $result = $session->getSessionArr();
	return $result;
}
/*
 *Login画面へ遷移する
 */
function _toHomePage ($auth_key)
{
	$url = '/Home?auth_key=' . $auth_key;
    $script = '<script>location.href="' . $url .'"</script>';
	return $script;
}