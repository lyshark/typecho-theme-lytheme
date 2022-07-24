window.onkeydown = window.onkeyup = window.onkeypress = function (event) {
		event.preventDefault();
		window.event.returnValue = false;
}
window.oncontextmenu = function() {
	event.preventDefault();
	return false;
}

var threshold = 160; 
window.setInterval(function() {  
	if (window.outerWidth - window.innerWidth > threshold || window.outerHeight - window.innerHeight > threshold){    
		window.location.href="/Do/not/turn/on/debug/mode/!!!";
}
},100);
