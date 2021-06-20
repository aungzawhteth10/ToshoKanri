var AUNG = AUNG || {};
AUNG.session = {};
AUNG.init = function() {
    
};
AUNG.updateSession = function(session) {
    AUNG.session = session;
    webix.storage.session.put('session', session);
};
AUNG.pageMove = function(page, session = {}) {
    var _authKey = webix.storage.session.get("auth_key");
    console.log(session);
    if(Object.keys(session).length != 0) {
        AUNG.POST("Api/ApiSession/update", session, function(text, data, xml) {
            if(AUNG.isAjaxError()) return false;
            AUNG.pageMove(page);
        });
    } else {
        location.href= "/" + page + "?auth_key=" + _authKey;
    }
};
AUNG.errorMessage = function(message) {
    webix.alert({
    title:"",
    ok:"OK",
    type:"alert-error",
    width:350,
    text:message
    });
};
AUNG.GET = function(url, getData, cb) {
    webix.ajax().get(url, getData, {
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
};
AUNG.POST = function(url, postData, cb) {
    webix.ajax().post(url, postData, {
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
};
AUNG.AjaxError = false;
AUNG.isAjaxError = function() {
    return AUNG.AjaxError;
};
AUNG.datatable = {};
AUNG.datatable.parse = function(ichiranName, parseData) {
    $$(ichiranName).clearAll();
    $$(ichiranName).parse(parseData);
};
