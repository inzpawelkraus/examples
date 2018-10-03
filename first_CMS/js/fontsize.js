var TCMSStart = new Object();
TCMSStart.functions = new Array();

TCMSStart.Add = function(fnc)
{
	TCMSStart.functions[TCMSStart.functions.length] = fnc;
}

TCMSStart.init = function()
{
	for(var i = 0; i < TCMSStart.functions.length; i++)
	{
		TCMSStart.functions[i]();
	}
}

window.onload = function()
{
	TCMSStart.init();
}


function getCookie(name)
{
	var dc = document.cookie;
	var cname = name + "=";
	var clen = dc.length;
	var cbegin = 0;
	
	while (cbegin < clen)
	{ 
		var vbegin = cbegin + cname.length;
	
		if (dc.substring(cbegin, vbegin) == cname)
		{ 
			var vend = dc.indexOf (";", vbegin);
			if (vend == -1) vend = clen;
	
			return unescape(dc.substring(vbegin, vend));
		}
	
		cbegin = dc.indexOf(" ", cbegin) + 1;
	
		if (cbegin== 0) break;
	}
	return null;
}

function setCookie(name, value, days, path, domain, secure) 
{
	var expires = null;
	
	if(days)
	{
		expires = new Date();
		var theDay = expires.getDay();
		theDay = theDay + days;
		expires.setDate(theDay);
	}
	
	var ciacho = name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires.toGMTString() : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
	
    document.cookie = ciacho;
}

function fontsizeup(active) {
  switch (active) {
    case 'A' : 
      setActiveStyleSheet('A');
      break;
    case 'A+' : 
      setActiveStyleSheet('A+');
      break;
    case 'A++' : 
      setActiveStyleSheet('A++');
      break;
    default :
      setActiveStyleSheet('A');
      break;
  }
}

function setActiveStyleSheet(title) 
{
  var i, a;
  var dn = document.getElementById("dfdfdf");
  
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) 
  {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) 
    {		
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;      
    }
  }
}

function getActiveStyleSheet() 
{
  var i, a;
  for(i=1; (a = document.getElementsByTagName("link")[i]); i++) 
  {	
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled)
    {
		return a.getAttribute("title");
	}	
  }
  return null;
}

function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function readstyle() 
{
  var cookie = readCookie("style");
  var title = cookie ? cookie : 'A';
  setActiveStyleSheet(title);
}

window.onunload = function(e) {
  var title = getActiveStyleSheet();
  createCookie("style", title, 365);
}

function handlers() 
{
	if (!document.getElementById) return false;
	
	if (!document.getElementById("font_down")) return false;
	var dn = document.getElementById("font_down");
	dn.onclick = function() {
		fontsizeup('A');
		return false;
	}
	dn.onkeypressed = function() {
		fontsizeup('A');
		return false;
	}
	
	if (!document.getElementById("font_up")) return false;
	var up = document.getElementById("font_up");
	up.onclick = function() {
		fontsizeup('A++');
		return false;
	}
	up.onkeypressed = function() {
		fontsizeup('A++');
		return false;
	}
	
	if (!document.getElementById("font_or")) return false;
	var dn = document.getElementById("font_or");
	dn.onclick = function() {
		fontsizeup('A+');
		return false;
	}
	dn.onkeypressed = function() {
		fontsizeup('A+');
		return false;
	}
}

TCMSStart.Add(readstyle);
TCMSStart.Add(handlers);