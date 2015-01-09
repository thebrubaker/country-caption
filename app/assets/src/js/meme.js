var bgImage,stage,stageW,stageH,shapesLayer;

var gblFillColor = "#fff";
var gblStrokeColor = "#000";
var gblFontFamily = 'Impact';
var gblFontSize = 32;
var gblOutlineSize = 1;
var gblStrokeWidth = 1;

var heightStage;

function getSimpleTextHeight()
{
	heightStage.clear();
	var simpleText = new Kinetic.Text({
		x: 0,
	    y: 0,
	    text: "M",
	    fontSize: gblFontSize,
	    fontFamily: gblFontFamily,
	    textFill: "#ff0000",
	    textStroke: "#ff0000",
	    textStrokeWidth: gblStrokeWidth
	});

	var l = new Kinetic.Layer();
	
	l.add(simpleText);
	heightStage.add(l);

	var imgd = l.getContext('2d').getImageData(0, 0, 200, 200);
	var pix = imgd.data,last=0;


	for (var i = 0, n = pix.length; i < n; i += 4) {
		    if(pix[i])
			    last = i;
	}

	//console.log((Math.floor((last/4)/200)));
	return (Math.ceil((last/4)/200));

}


function getSimpleText(text,x,y)
{
	var simpleText;

	if(gblStrokeWidth != 0)
	{

	simpleText = new Kinetic.Text({
		x: x,
	    y: y,
	    text: text,
	    fontSize: gblFontSize,
	    fontFamily: gblFontFamily,
	    textFill: gblFillColor,
	    textStroke: gblStrokeColor,
	    textStrokeWidth: gblStrokeWidth
	});
	}
	else
	{
			simpleText = new Kinetic.Text({
		x: x,
	    y: y,
	    text: text,
	    fontSize: gblFontSize,
	    fontFamily: gblFontFamily,
	    textFill: gblFillColor
		});

	}

	simpleText.on("mouseover", function() {
		document.body.style.cursor = "move";
	});
	simpleText.on("mouseout", function() {
		document.body.style.cursor = "default";
	});

	return simpleText;

}

function getTextWidth(text)
{
	var temp = new Kinetic.Layer();
	temp = temp.getContext('2d');
	temp.font = gblFontSize+"pt "+gblFontFamily;
	return(temp.measureText(text).width);
}

function addText(text,x,y){
	// returns the draggable text object

	var tl = new Kinetic.Layer();

	var temp = new Kinetic.Layer();

	var grp = new Kinetic.Group({draggable: true});

	temp = temp.getContext('2d');
	temp.font = gblFontSize+"pt "+gblFontFamily;
	var textWidth = temp.measureText(text).width;

	var words = text.toUpperCase().split(' ');
	var message = '';
	var tm = '', ptm = '';

	var lx,ly;
	var line = 0;
	var lines = new Array();

	var th = getSimpleTextHeight();

	for(var n = 0; n < words.length; n++)
	{
		ptm = tm;
		tm = tm + " " + words[n];
		//console.log(tm);
		textWidth = temp.measureText(tm).width;
		if(textWidth > stageW)
		{
			lines[line] = ptm;
			tm = words[n];
			line++;
		}
	}
	lines[line] = tm;


	for(var n = 0; n < lines.length; n++)
	{
		var lx = (stageW / 2) - temp.measureText(lines[n]).width / 2;
		var ly = y + (th + 3) * n +  5 * (n > 0);
		grp.add(getSimpleText(lines[n],lx,ly));
		//console.log(y,ly,n,(n>0));
	}

	tl.add(grp);
	stage.add(tl);


	return tl;
}

var t;

function initStage()
{
	stage = new Kinetic.Stage({
		container: 'memestage',
	      width: stageW,
	      height: stageH
	});

	heightStage = new Kinetic.Stage({
		container: 'heightStage',
	      width: 200,
	      height: 200
	});

	var bg = new Kinetic.Image({
		x: 0,
	    y: 0,
	    image: bgImage
	});

	shapesLayer = new Kinetic.Layer();
	shapesLayer.add(bg);




	stage.add(shapesLayer);

	t1 = addText($("#tc1").val(),0,30);

	t2 = addText($("#tc2").val(),0,bgImage.height - 100);

}

$(function() {

	//return false;

	bgImage = new Image();
	bgImage.onload = function () {	
		stageW = bgImage.width;
		stageH = bgImage.height;
		initStage();
	};

	bgImage.src = gblImgName;


	$("#tc1").keyup(function() {
		t1.remove();

		t1 = addText($("#tc1").val(),0,30);

	});

	$("#tc2").keyup(function() {
		t2.remove();
		t2 = addText($("#tc2").val(),30,bgImage.height - 100);		
	});


	$("#cap1").click(function() {
		t1.remove();
		t1 = addText($("#tc1").val(),0,30);
	});


	$("#cap2").click(function() {
		t2.remove();
		t2 = addText($("#tc2").val(),30,bgImage.height - 100);		
	});

	$("#rcap1").click(function() {
		t1.remove();
		$("#tc1").val('');
		t1 = addText('',0,30);
	});


	$("#rcap2").click(function() {
		t2.remove();
		$("#tc2").val('');
		t2 = addText('',30,bgImage.height - 100);		
	});

	$("#fontsizesel").change(function() {
		gblFontSize = $("#fontsizesel").val();
	});

	$("#custom").spectrum({
		color: "#fff",
		showPalette: true,
		showSelectionPalette: true, // true by default
		palette: [ ],
		showInput: true,
		clickoutFiresChange: true,
		change: function(color) {
			gblFillColor = color.toHexString();
		}
	});
	
	$("#strokesel").spectrum({
		color: "#000",
		showPalette: true,
		showSelectionPalette: true, // true by default
		palette: [ ],
		showInput: true,
		clickoutFiresChange: true,
		change: function(color) {
			gblStrokeColor = color.toHexString();
		}
	});

	$("#cands").click(function () {
		gblFontSize = 8;
		gblFontFamily = "Arial";
		gblStrokeWidth = 0;
		addText(watermark,bgImage.width - getTextWidth(watermark)  ,bgImage.height - 10 -getSimpleTextHeight() + 5);
		//addText(watermark,100,100);
		
		stage.toDataURL({
			callback: function(dataUrl) {
					  $("#imgdata").val(dataUrl);
					  $("#createimg").submit();
				  }
		});
		
	});


});

function writeMessage(messageLayer, message) {
	var context = messageLayer.getContext();
	messageLayer.clear();
	context.font = '18pt Calibri';
	context.fillStyle = 'black';
	context.fillText(message, 10, 25);
}
