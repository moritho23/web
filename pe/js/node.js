document.onkeydown = function (event) {
	if (event.keyCode == 123) {
		return false;
	}
	
	if (event.ctrlKey && event.shiftKey && (event.keyCode == 'I'.charCodeAt(0) || event.keyCode == 'i'.charCodeAt(0))) {
		return false;
	}

	if (event.ctrlKey && event.shiftKey && (event.keyCode == 'C'.charCodeAt(0) || event.keyCode == 'c'.charCodeAt(0))) {
		return false;
	}

	if (event.ctrlKey && event.shiftKey && (event.keyCode == 'J'.charCodeAt(0) || event.keyCode == 'j'.charCodeAt(0))) {
		return false;
	}

	if (event.ctrlKey && (event.keyCode == 'U'.charCodeAt(0) || event.keyCode == 'u'.charCodeAt(0))) {
		return false;
	}

	if (event.ctrlKey && (event.keyCode == 'S'.charCodeAt(0) || event.keyCode == 's'.charCodeAt(0))) {
		return false;
	}
	
	if (event.ctrlKey && (event.keyCode == 'P'.charCodeAt(0) || event.keyCode == 'p'.charCodeAt(0))) {
		return false;
	}
}

$(function() {
	$(document).bind("contextmenu",function(e) {
		return false;
	});
});