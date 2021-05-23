<?php
$app->get('/', function ($request, $response) {
	if (!isset($_GET['auth_key'])) {
		return $this->view->render($response, 'index.twig');
	}
	if ($_GET['auth_key'] == '') {
		return _toLoginPage();
	}
	$auth_key = $_GET['auth_key'];
  	return _screenInit('index', $auth_key, $this->view, $response);
});
$app->get('/{id}', function ($request, $response, $args) {
	// $name = $args['id'];
	// $result = json_encode(['title' => $name], JSON_UNESCAPED_UNICODE);
	// return $this->view->render($response, 'home.twig', ['screen_data' => $result]);
	$auth_key = $_GET['auth_key'] ?? 'zzz';
   	return _screenInit($args['id'], $auth_key, $this->view, $response);
});
// $app->get('/Shuukei', function ($request, $response) {
//    return $this->view->render($response, 'Shuukei.twig');
// });
// $app->get('/StudentList', function ($request, $response) {
//    return $this->view->render($response, 'StudentList.twig');
// });
// $app->get('/login', function ($request, $response) {
//    return $this->view->render($response, 'login.twig');
// });
// $app->post('/home', function ($request, $response) {
//    return $this->view->render($response, 'home.twig');
// });
// $app->get('/new', 'HomeController:index');
$app->post('/Api/ApiLogin/loginAuth', 'ApiLogin:loginAuth');
$app->post('/Api/ApiLogin/register', 'ApiLogin:register');
// $app->get('/runVideo', 'RunVideo:run');
// $app->get('/closeVideo', 'RunVideo:close');
$app->get('/Api/ApiShuukei', 'ApiShuukei:init');
$app->get('/Api/cm_class_list', 'HtmlHelper:getClassList');
$app->get('/Api/ApiStudentList', 'ApiStudentList:init');
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
    $session->screen_name = $kinou[0]['name'];
    $session->dummy = 'dummy';
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