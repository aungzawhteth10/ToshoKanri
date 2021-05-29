var AUNG = AUNG || {};
AUNG.init = function() {
	session = AUNG.session;
	AUNG.setSession(session);
	var _title = session.screen_name;
	var _dom = document.getElementsByClassName("title");
	_dom[0].innerHTML = _title;
	_dom[1].innerHTML = _title;
}
AUNG.setSession = function(session) {
	webix.storage.session.put('session', session);
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
AUNG.GET = function(request, getData, cb) {
	webix.ajax().get(request, getData, {
        error:function(text, data, xml){
        	AUNG.errorMessage(text);
        	AUNG.AjaxError = true;
            cb(text, data, xml);
        },
        success:function(text, data, xml){
        	AUNG.AjaxError = false;
            cb(text, data, xml);
        }
    });
}
AUNG.POST = function(request, getData, cb) {
	webix.ajax().post(request, getData, {
        error:function(text, data, xml){
        	AUNG.errorMessage(text);
        	AUNG.AjaxError = true;
            cb(text, data, xml);
        },
        success:function(text, data, xml){
        	AUNG.AjaxError = false;
            cb(text, data, xml);
        }
    });
}
AUNG.AjaxError = false;
AUNG.isAjaxError = function() {
	return AUNG.AjaxError;
}
