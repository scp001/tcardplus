var utils = {};

utils.showMessage = function(type, message) {
	// Type being one of the bootstrap alert types (success, info, warning, danger)
	var classes = "alert-success alert-info alert-warning alert-danger";
	var glyphiconMap = {
		success: "glyphicon-ok-sign",
		info: "glyphicon-info-sign",
		warning: "glyphicon-exclamation-sign",
		danger: "glyphicon-remove-sign"
	}
	var icon = "";
	if (glyphiconMap.hasOwnProperty(type))
		icon = glyphiconMap[type];

	$(".message-panel .message-panel-content").text(message);
	$(".message-panel").removeClass(classes).addClass("alert-" + type).slideDown("fast");
	$(".message-panel .glyphicon").attr("class", "glyphicon").addClass(icon);
}

utils.hideMessage = function () {
	$(".message-panel .message-panel-content").text('');
	$(".message-panel").slideUp("fast");
}