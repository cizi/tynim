$(function(){

});

function langChangeRedir(url) {
	var newLang = $("#languageSwitcher").val();
	location.assign(url + "/" + newLang);
}
