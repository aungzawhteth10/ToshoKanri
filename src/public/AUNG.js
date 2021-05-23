var AUNG = AUNG || {};
AUNG.init = function(session) {
	var _obj = JSON.parse(session.replace(/&quot;/g,'"'));
	AUNG.setSession(session);
	var _title = _obj.screen_name;
	var _dom = document.getElementsByClassName("title");
	_dom[0].innerHTML = _title;
	_dom[1].innerHTML = _title;
}
AUNG.setSession = function(session) {
	var _obj = JSON.parse(session.replace(/&quot;/g,'"'));
	webix.storage.session.put('session', _obj);
}
AUNG.pageMove = function(page) {
	var _authKey = webix.storage.session.get("auth_key");
	location.href= "/" + page + "?auth_key=" + _authKey;
}
AUNG.errorMessage = function(message) {
	webix.alert({
	title:"",
	ok:"OK",
	type:"alert-error",
	width:350,
	text:message
	});
}
