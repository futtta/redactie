sheet = window.document.styleSheets[0];
sheet.insertRule('.headlines .article .summary{display:none;}', sheet.cssRules.length);
sheet.insertRule('.headlines .article{position:relative;}', sheet.cssRules.length);
sheet.insertRule('.headlines .article h2 a {color:white;letter-spacing:-1px;background:rgba(0, 0, 0, 0.6);padding: 10px 10px 10px 50px;text-decoration:none;position:absolute;bottom:30px;width:380px;}', sheet.cssRules.length);
sheet.insertRule('.headlines .article .image, .headlines .article .image img {width:640px !important;height:360px !important;}', sheet.cssRules.length);
sheet.insertRule('.headlines .article:not(:first-child){display:none;}', sheet.cssRules.length);
sheet.insertRule('.inNav{visibility:hidden;}', sheet.cssRules.length);

var highArts = document.querySelectorAll('.headlines .article');
var nmbrHA = highArts.length;
var currHA = 0;
var nextHA = 0;

function rotator() {
    nextHA=findNextHA(currHA);
    _anchor=highArts[nextHA].getElementsByTagName("a")[1];
    _hasImg=_anchor.getElementsByClassName("image")[0];
    if (typeof(_hasImg)!="object") {
    	insertImage(_anchor);
    }
    highArts[currHA].style.display = 'none';
    currHA=nextHA;
    highArts[currHA].style.display = 'block';
}

function findNextHA(currHA){
    if (currHA < nmbrHA - 1) {
        nextHA=currHA+1;
    } else {
        nextHA=0;
    }
    return nextHA;
}

function insertImage(node) {
	var _newD=document.createElement('div');
	_newD.className="image fakeImg imgLoaded";
	var _newI=new Image;
	_newI.src="data:image/jpg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAQwAA/+4ADkFkb2JlAGTAAAAAAf/bAIQABQMDAwMDBQMDBQcEBAQHCAYFBQYICQcHCAcHCQsJCgoKCgkLCwwMDAwMCw4ODg4ODhQUFBQUFhYWFhYWFhYWFgEFBQUJCAkRCwsRFA8ODxQWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYW/8AAEQgAEAAPAwERAAIRAQMRAf/EAFMAAQEBAAAAAAAAAAAAAAAAAAMCBQEBAAAAAAAAAAAAAAAAAAAAABABAAICAwAAAAAAAAAAAAAAAQACEQMhQVERAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ANOvGWBZYawD1jcx2wGrqCr6kD//2Q==";
	_newD.appendChild(_newI);
	node.appendChild(_newD);
}

rotateInterval=window.setInterval(rotator,3000);

// window.clearInterval(rotateInterval);
