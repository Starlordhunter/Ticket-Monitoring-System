

function realtimeClock(){
	var rtClock = new Date();

	var hours = rtClock.getHours();
	var minutes = rtClock.getMinutes();
	var seconds = rtClock.getSeconds();

	//Add AM/PM
	var amPm = ( hours < 12 ) ? "AM" : "PM";

	//Convert 12hrs
	hours = ( hours > 12 ) ? hours - 12 : hours;

	//pad the h,m,s with leading 0
	hours = ("0" + hours).slice(-2);
	minutes = ("0" + minutes).slice(-2);
	seconds = ("0" + seconds).slice(-2);

	//display clock
	document.getElementById('clock').innerHTML = 
		hours + "  :  " + minutes + "  :  " + seconds + " " + amPm;
	var t = setTimeout(realtimeClock,500);
}

window.setTimeout(function () {
	window.location.reload();
  }, 1800000);