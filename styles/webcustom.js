//UDMv3.4.1
//**DO NOT EDIT THIS *****
if (!exclude) { //********
//************************



///////////////////////////////////////////////////////////////////////////
//
//  ULTIMATE DROPDOWN MENU VERSION 3.5 by Brothercake
//  http://www.brothercake.com/dropdown/ 
//
//  Link-wrapping routine by Brendan Armstrong
//  KDE modifications by David Joham
//  Opera reload/resize routine by Michael Wallner
//  http://www.wallner-software.com/
//
//  This script featured on Dynamic Drive (http://www.dynamicdrive.com)
///////////////////////////////////////////////////////////////////////////



// *** POSITIONING AND STYLES *********************************************



var menuALIGN = "right";		// alignment
var absLEFT = 	280;		// absolute left or right position (if menu is left or right aligned)
var absTOP = 	100; 		// absolute top position

var staticMENU = false;		// static positioning mode (ie5,ie6 and ns4 only)

var stretchMENU = true;		// show empty cells
var showBORDERS = true;		// show empty cell borders

var baseHREF = "";	// base path to .js files for the script (ie: resources/)
var zORDER = 	1000;		// base z-order of nav structure (not ns4)

var mCOLOR = 	" #138BA7";	// main nav cell color
var rCOLOR = 	"#FFFFFF";	// main nav cell rollover color
var bSIZE = 	1;		// main nav border size
        
var bCOLOR = 	"#1C1C1C"	// main nav border color
var aLINK = 	"#FFFFF";	// main nav link color
var aHOVER = 	"#000000";		// main nav link hover-color (dual purpose)
var aDEC = 	"none";		// main nav link decoration
var fFONT = 	"arial";	// main nav font face
var fSIZE = 	15;		// main nav font size (pixels)
var fWEIGHT = 	"bold"		// main nav font weight
var tINDENT = 	10;		// main nav text indent (if text is left or right aligned)
var vPADDING = 	20;		// main nav vertical cell padding
var vtOFFSET = 	0;		// main nav vertical text offset (+/- pixels from middle)

var keepLIT =	true;		// keep rollover color when browsing menu
var vOFFSET = 	5;		// shift the submenus vertically
var hOFFSET = 	4;		// shift the submenus horizontally

var smCOLOR = 	"lightblue";	// submenu cell color

var srCOLOR = 	"lightgreen";	// submenu cell rollover color
var sbSIZE = 	1;		// submenu border size
var sbCOLOR = 	"black"	// submenu border color
var saLINK = 	"black";	// submenu link color
var saHOVER = 	"";		// submenu link hover-color (dual purpose)
var saDEC = 	"none";		// submenu link decoration
var sfFONT = 	"comic sans ms,arial";// submenu font face
var sfSIZE = 	13;		// submenu font size (pixels)
var sfWEIGHT = 	"normal"	// submenu font weight
var stINDENT = 	5;		// submenu text indent (if text is left or right aligned)
var svPADDING = 1;		// submenu vertical cell padding
var svtOFFSET = 0;		// submenu vertical text offset (+/- pixels from middle)

var shSIZE =	2;		// submenu drop shadow size
var shCOLOR =	"cccccc";	// submenu drop shadow color
var shOPACITY = 75;		// submenu drop shadow opacity (not ie4,ns4 or opera)

var keepSubLIT = true;		// keep submenu rollover color when browsing child menu
var chvOFFSET = -12;		// shift the child menus vertically
var chhOFFSET = 7;		// shift the child menus horizontally

var closeTIMER = 330;		// menu closing delay time

var cellCLICK = true;		// links activate on TD click
var aCURSOR = "hand";		// cursor for active links (not ns4 or opera)

var altDISPLAY = "";		// where to display alt text
var allowRESIZE = true;		// allow resize/reload

var redGRID = false;		// show a red grid
var gridWIDTH = 0;		// override grid width
var gridHEIGHT = 0;		// override grid height
var documentWIDTH = 0;		// override document width

var hideSELECT = true;		// auto-hide select boxes when menus open (ie only)
var allowForSCALING = false;	// allow for text scaling in mozilla 5


//** LINKS ***********************************************************

// add main link item ("url","Link name",width,"text-alignment","_target","alt text",top position,left position,"key trigger")

addMainItem("./index.php","<img src=\"../images/joblist.png\" border=\"0\" width=\"30px\" height=\"30\"\"> Job Openings ",200,"center","","",0,0,"");
addMainItem("./login.php","<img src=\"../images/login.png\" border=\"0\"  width=\"30px\" height=\"30\"> Log in",200,"center","","",0,0,"");




//**DO NOT EDIT THIS *****
}//***********************
//************************
