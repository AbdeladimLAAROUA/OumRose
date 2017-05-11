<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<meta charset="utf-8"/>
	<style type="text/css">

body {
	font-family: 'Sintony', sans-serif;
	color: #e5e5e5;
	font-size: 12px;
	background: #bfbfbf;
	line-height: 1;
}
*, *:before, *:after {
    box-sizing: border-box;
}
/** * Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/) * http://cssreset.com */
html, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
	display: block;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after, q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
header h2 {
	margin: 25px 10px;
font-size: 28px;
text-align: center;
color: cornsilk;
}
.container {
	margin: 10px auto;
	display: table;
	max-width: 1140px;
	width: 100%;
}
.container:after, .container:before {
	content: "" clear : both;
}
nav.menu {
	background: #a4729a;
	position: relative;
	min-height: 45px;
	height: 100%;
	font-size: 15px;
}

.menu > ul > li {
	list-style: none;
	display: inline-block;
	color: #fff;
	line-height: 45px;
	vertical-align: middle;
}
body > div:nth-child(3) > nav > ul > li:nth-child(1) > svg{

}
.menu > ul li a, .xs-menu li a {
	text-decoration: none;
	color: #fff;
	 display:block;
	 padding: 0px 6px;
}
.menu > ul li a:hover {
	background:#444;
	color: #fff;
	transition-duration: 0.3s;
	-moz-transition-duration: 0.3s;
	-webkit-transition-duration: 0.3s;
}
.active{
	background:#444 !important;
	
}
.displaynone{
	display: none;
}
.xs-menu-cont{
display:none;
}
.xs-menu-cont > a {
    background: none repeat scroll 0 0 #ff7f50;
    border-radius: 3px;
    padding: 3px 6px;
	display: block;
	border-bottom:1px solid #E67248;
	    box-shadow: 0 1px 2px #e67248;
		-webkit-box-shadow: 0 1px 2px #e67248;
		-moz-box-shadow: 0 1px 2px #e67248;
}
.xs-menu-cont > a:hover{
 cursor: pointer;
}
  
.xs-menu li {
color: #fff;
padding: 14px 30px;
border-bottom: 1px solid #ccc;
background: #FF7F50;

}
.xs-menu  a{
text-decoration:none;
}

.mega-menu {
   background: none repeat scroll 0 0 #888;
    left: 0;
    margin-top: 3px;
    position: absolute;
    width: 100%;
	padding:15px;
	display:none;
	 transition-duration: 0.9s;
    
}
#menutoggle i {
    color: #fff;
    font-size: 33px;
    margin: 0;
    padding: 0;
}


/*--column--*/
.mm-6column:after, .mm-6column:before, .mm-3column:after, .mm-3column:before{
content:"";
display:table;
clear:both;


}
.mm-6column, .mm-3column {
 float: left;
 position: relative;
 }
.mm-6column {
    width: 50%;
}
.mm-3column {
        width: 25%;
}
.responsive-img {
    display: block;
    max-width: 100%;

}
.left-images{
margin-right:25px;
}
 .left-images, .left-categories-list {
   float: left;
}
.categories-list li {
    display: block;
    line-height: normal;
    margin: 0;
    padding: 5px 0;
}
.categories-list li :hover{
		background:inherit !important;
}
.left-images > p {
    background: none repeat scroll 0 0 #ff7f50;
    display: block;
    font-size: 18px;
    line-height: normal;
    margin: 0;
    padding: 5px 14px;
}
.categories-list span {
    font-size: 18px;
    padding-bottom: 5px;
    text-transform: uppercase;
}
.mm-view-more{
	background: none repeat scroll 0 0 #ff7f50;
    color: #fff;
    display: inline !important;
    line-height: normal;
    padding: 5px 8px !important;
	margin-top:10px;
}
.display-on{
display:block;
 transition-duration: 0.9s;
}
.drop-down > a:after{
/*content:"\f103";
color:#fff;
font-family: FontAwesome;
font-style: normal;
margin-left: 5px;
 */

}
 /*MediaQuerys*/
 @media (max-width: 600px) {
.menu {
 display:none;
 }
 .xs-menu li a {

	 padding:0px;
}
 .xs-menu-cont{
 display:block ;
 }
 }


/*Animation--*/

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
@-webkit-keyframes fadeIn {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}




	</style>
</head>
<body>
	<!--Google -Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>
		
<!--Font-awsome-->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="">
			
			
			<div class="xs-menu-cont">
			<a id="menutoggle"><i class="fa fa-align-justify"></i> </a>
				<nav class="xs-menu displaynone">
					<ul>
						<li class="active">
							<a href="#">Historique</a>
						</li>
						<li>
							<a href="#">Mon compte</a>
						</li>
						<li>
							<a href="#">Servicess</a>
						</li>
						<li>
							<a href="#">Team</a>
						</li>
						<li>
							<a href="#">Portfolio</a>
						</li>
						<li>
							<a href="#">Blog</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>

					</ul>
				</nav>
			</div>
			<nav class="menu">
				<ul>
					<li class="activee">
						
						<svg width="107px" height="46px" viewBox="0 0 107 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 39.1 (31720) - http://www.bohemiancoding.com/sketch -->
    <title>oumbox white</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Bonzai_Oumbox_Guide1_170113" transform="translate(-604.000000, -841.000000)" fill="#FFFFFF">
            <g id="Group-561" transform="translate(604.000000, 841.000000)">
                <path d="M45.0077,8.8122 C45.3366,8.158 45.7426,7.62 46.3038,7.2055 C47.0718,6.6393 47.9534,6.3678 48.8791,6.292 C50.1912,6.1868 51.4984,6.2284 52.7554,6.7102 C54.2326,7.2764 55.1595,8.3402 55.5018,9.8651 C55.6718,10.6257 55.7574,11.4205 55.7647,12.1994 C55.7953,15.08648 55.7782,17.97354 55.7757,20.8606 C55.7757,21.87553 55.6327,22.01371 54.6031,22.01249 C53.5796,22.01249 53.4279,21.86086 53.4279,20.82269 C53.4267,17.9662 53.4341,15.11093 53.4206,12.2557 C53.4182,11.7127 53.3766,11.1625 53.2763,10.6293 C53.0819,9.6144 52.4705,8.9431 51.4592,8.6716 C50.3734,8.3806 49.2789,8.3916 48.1931,8.6618 C46.9813,8.9639 46.387,9.8088 46.2378,11.0011 C46.1816,11.4474 46.1571,11.9011 46.1559,12.3498 C46.1498,15.17452 46.1534,17.99922 46.1522,20.82269 C46.1522,21.8792 46.0116,22.01616 44.9514,22.01249 C44.0025,22.01004 43.8399,21.85108 43.8399,20.88995 C43.8374,18.00289 43.8484,15.11583 43.8289,12.2288 C43.8252,11.6369 43.7653,11.0316 43.6332,10.4557 C43.3899,9.3882 42.6379,8.8098 41.596,8.6068 C40.4894,8.3904 39.3852,8.383 38.3042,8.7596 C37.3822,9.0812 36.876,9.7709 36.7023,10.6954 C36.6033,11.2175 36.5666,11.758 36.5641,12.2899 C36.5507,15.13539 36.558,17.97965 36.5568,20.82514 C36.5568,21.88165 36.4198,22.01493 35.3548,22.01249 C34.3692,22.01127 34.2078,21.84619 34.209,20.85693 C34.2114,17.8855 34.2078,14.91528 34.2188,11.9438 C34.2237,10.8861 34.3802,9.8553 34.8644,8.8942 C35.4281,7.7753 36.3159,7.0245 37.4947,6.6503 C39.1528,6.122 40.8354,6.0743 42.5095,6.5843 C43.5574,6.9034 44.3547,7.5527 44.8499,8.5469 C44.8915,8.6288 44.9429,8.7034 45.0077,8.8122" id="Fill-552"></path>
                <path d="M62.0668,8.4361 C62.2196,8.227 62.3223,8.0741 62.4373,7.9323 C63.1758,7.0164 64.1749,6.5701 65.3035,6.3867 C66.7171,6.1568 68.1258,6.18 69.5112,6.5774 C71.4885,7.1448 72.6857,8.4679 73.1442,10.4488 C73.2958,11.1079 73.3741,11.7939 73.3937,12.4714 C73.4316,13.7932 73.4401,15.11754 73.3912,16.4394 C73.3337,17.9459 72.973,19.36681 71.9079,20.5187 C71.1229,21.36733 70.1202,21.83689 69.016,22.068 C67.2356,22.44096 65.4515,22.44952 63.6906,21.93716 C61.5202,21.30375 60.2717,19.82292 59.8669,17.63164 C59.7397,16.94442 59.6994,16.23397 59.6969,15.53452 C59.6835,10.7888 59.6896,6.0418 59.6896,1.2961 C59.6896,0.1858 59.8302,0.0464 60.9393,0.0513 C60.9919,0.0513 61.0445,0.0513 61.0971,0.0525 C61.8185,0.0733 62.0374,0.2799 62.0423,1.0063 C62.0533,2.3502 62.0472,3.694 62.0472,5.0379 C62.0484,6.0467 62.0472,7.0543 62.0484,8.0619 C62.0484,8.161 62.0582,8.2612 62.0668,8.4361 M62.0105,14.25056 C62.0509,15.18846 62.0313,16.13736 62.1438,17.07159 C62.3223,18.54753 63.0548,19.49765 64.5833,19.87183 C65.8024,20.17142 67.0375,20.17142 68.2664,19.93909 C69.8707,19.63583 70.8539,18.65269 70.9309,17.04469 C71.019,15.19457 71.0116,13.3347 70.9285,11.4833 C70.8624,9.9976 69.9771,9.0524 68.5403,8.6904 C67.3322,8.3847 66.1106,8.4153 64.8878,8.6097 C63.3189,8.8592 62.2881,9.9035 62.1389,11.4784 C62.0521,12.3956 62.0509,13.3212 62.0105,14.25056" id="Fill-554"></path>
                <path d="M14.5061,14.25839 C14.4718,15.15227 14.4755,16.04736 14.3936,16.9339 C14.2554,18.42451 13.7748,19.78061 12.6193,20.81022 C11.7621,21.57448 10.7312,21.96578 9.6173,22.15287 C7.9408,22.43289 6.2716,22.40232 4.6319,21.92909 C2.5555,21.32991 1.3168,19.93102 0.9414,17.82411 C0.5587,15.67074 0.643,13.4941 0.846,11.3298 C0.9585,10.14 1.389,9.0541 2.2009,8.1431 C2.8417,7.4253 3.6402,6.9447 4.5438,6.6721 C6.367,6.1218 8.2245,6.1071 10.0795,6.4923 C11.5151,6.7919 12.7281,7.4706 13.5254,8.7594 C14.061,9.6264 14.3165,10.5863 14.396,11.5878 C14.4669,12.4755 14.4718,13.3682 14.5061,14.25839 M12.1509,14.45282 C12.1045,13.3437 12.0959,12.4401 12.0238,11.5413 C11.9027,10.0544 11.0712,9.0822 9.6332,8.6946 C8.7002,8.4439 7.7476,8.4366 6.7913,8.5038 C6.1286,8.5491 5.478,8.6628 4.8752,8.9526 C3.6915,9.5237 3.2024,10.5643 3.1571,11.7883 C3.0936,13.4538 3.0911,15.12536 3.1571,16.79083 C3.2244,18.48565 4.1207,19.50181 5.763,19.89311 C6.9638,20.18047 8.1805,20.16947 9.3849,19.92613 C10.8437,19.63021 11.7743,18.75956 11.9675,17.25795 C12.0959,16.2638 12.102,15.25254 12.1509,14.45282" id="Fill-555"></path>
                <path d="M76.4666,14.29446 C76.518,13.2991 76.5131,12.2988 76.6329,11.312 C76.8273,9.7004 77.484,8.3149 78.8768,7.3697 C79.745,6.7791 80.7269,6.4795 81.7528,6.3498 C82.9952,6.1933 84.2437,6.1872 85.4812,6.411 C86.8568,6.6604 88.0968,7.1752 88.9943,8.3125 C89.5996,9.0804 89.9554,9.9633 90.0875,10.9207 C90.3736,12.9885 90.3357,15.0685 90.1511,17.13872 C90.0227,18.58409 89.4822,19.88516 88.3438,20.86341 C87.5,21.58854 86.4973,21.96761 85.4164,22.14981 C83.7289,22.43473 82.0487,22.40293 80.3992,21.92481 C78.4879,21.36966 77.2895,20.11016 76.7943,18.17689 C76.4666,16.89783 76.518,15.59676 76.4666,14.29446 M87.9243,14.26145 L87.8816,14.26145 C87.8816,13.5791 87.8877,12.8968 87.8791,12.2132 C87.8767,11.9944 87.84,11.7755 87.8192,11.5566 C87.67,9.9559 86.6416,8.8664 85.0691,8.6059 C84.0762,8.4421 83.0832,8.4262 82.0903,8.5521 C81.3334,8.6487 80.6132,8.8627 80.0152,9.3714 C79.2656,10.0085 78.9648,10.8755 78.9379,11.8036 C78.8902,13.4703 78.8694,15.14187 78.9452,16.80612 C79.0223,18.51317 79.9076,19.50487 81.5633,19.89739 C82.6773,20.16152 83.8059,20.14807 84.9395,19.96587 C86.6697,19.68707 87.6822,18.64278 87.818,16.90272 C87.8864,16.02474 87.8913,15.14187 87.9243,14.26145" id="Fill-556"></path>
                <path d="M30.701,12.2245 C30.701,13.7359 30.7096,15.2485 30.6973,16.7599 C30.69,17.72225 30.531,18.65893 30.1079,19.5369 C29.4586,20.88444 28.3385,21.64992 26.9335,21.99354 C24.8645,22.49856 22.7882,22.50467 20.7705,21.75264 C19.0745,21.11922 18.1134,19.82793 17.7918,18.06831 C17.6854,17.4838 17.6438,16.88096 17.6401,16.28545 C17.6255,13.4302 17.634,10.5737 17.634,7.7184 C17.634,7.623 17.634,7.5289 17.6352,7.4347 C17.6499,6.7866 17.8431,6.5873 18.4827,6.5714 C18.7456,6.5641 19.0085,6.5629 19.2701,6.5739 C19.7165,6.5934 19.8975,6.7524 19.9647,7.1877 C19.9916,7.3626 19.9855,7.5436 19.9855,7.7221 C19.9879,10.6617 19.9782,13.6026 19.9953,16.54224 C19.9989,17.03992 20.0613,17.5535 20.1934,18.03285 C20.5174,19.20552 21.4162,19.73745 22.5387,19.94532 C23.7371,20.16665 24.9379,20.1532 26.1326,19.88174 C27.3419,19.6066 28.1331,18.74941 28.2749,17.50948 C28.3239,17.08394 28.3471,16.65229 28.3483,16.22308 C28.3544,13.3886 28.3508,10.5541 28.352,7.7184 C28.352,6.7145 28.4963,6.569 29.4892,6.5629 C30.5995,6.5567 30.7034,6.6607 30.7034,7.7832 L30.7034,12.2245 L30.701,12.2245 L30.701,12.2245 Z" id="Fill-557"></path>
                <path d="M100.9874,13.8901 C101.5572,14.19578 101.9253,14.76317 102.2799,15.333 C103.4367,17.19534 104.5849,19.06135 105.7331,20.92736 C105.8481,21.11446 105.9422,21.31377 106.0352,21.51309 C106.1379,21.7332 106.0511,21.87015 105.8322,21.95086 C104.8503,22.30914 103.7118,21.9264 103.1738,21.03742 C102.1466,19.3426 101.1305,17.64167 100.1045,15.94685 C99.959,15.70473 99.7878,15.47851 99.6264,15.24495 C99.2315,14.67512 98.3486,14.68124 97.9671,15.2743 C97.4351,16.10337 96.9154,16.941 96.4031,17.78229 C95.7379,18.87426 95.0763,19.9699 94.4319,21.0741 C94.0492,21.72831 93.505,22.04991 92.7481,22.01322 C92.4864,22.00099 92.2211,22.02056 91.9618,21.98754 C91.5412,21.93252 91.4434,21.76255 91.6329,21.38837 C91.8114,21.03375 92.0254,20.69503 92.2357,20.35753 C93.3522,18.56978 94.4613,16.77714 95.5997,15.00406 C95.8785,14.56996 96.2563,14.20067 96.5694,13.8253 C94.9944,12.2381 94.125,10.0994 92.8679,8.2223 C92.6356,7.8751 92.4265,7.5082 92.2455,7.1316 C92.0743,6.777 92.1966,6.596 92.5965,6.5801 C92.9951,6.563 93.395,6.563 93.7936,6.5801 C94.2827,6.6021 94.6422,6.8614 94.8892,7.2722 C95.4982,8.2884 96.0986,9.3094 96.7051,10.328 C97.0744,10.9492 97.4437,11.5716 97.824,12.1867 C98.0392,12.5364 98.3425,12.7504 98.7753,12.7602 C99.2632,12.7724 99.591,12.5291 99.827,12.1366 C100.4433,11.1118 101.0547,10.0847 101.6648,9.0575 C102.0023,8.4901 102.335,7.9191 102.6712,7.3505 C102.9708,6.8406 103.4012,6.5556 104.0102,6.5703 C104.3355,6.5777 104.662,6.563 104.986,6.5777 C105.4323,6.596 105.5583,6.7904 105.3492,7.1878 C105.1107,7.6427 104.838,8.0793 104.5715,8.5183 C103.7387,9.8903 102.9207,11.2708 102.0574,12.622 C101.7651,13.0781 101.3555,13.4596 100.9874,13.8901" id="Fill-558"></path>
                <path d="M30.5233,2.4048 C30.2164,1.643 29.6502,1.3031 28.9862,1.2615 C25.1784,1.0218 23.5533,5.4472 23.5533,5.4472 C26.1726,4.0483 28.2648,5.479 29.9364,4.3784 C30.4805,4.0201 30.8425,3.196 30.5233,2.4048 M28.1682,4.3332 C27.1239,4.9532 25.8962,4.0263 24.2674,4.8003 C24.2674,4.8003 25.3777,2.1627 27.6803,2.4158 C28.0814,2.4598 28.4152,2.6812 28.5803,3.1519 C28.7515,3.6411 28.5081,4.1302 28.1682,4.3332" id="Fill-559"></path>
                <path d="M18.91,2.216 C18.3598,2.2894 17.9085,2.6061 17.6982,3.2578 C17.4793,3.9365 17.8291,4.6005 18.3035,4.8671 C19.7599,5.6839 21.4168,4.3694 23.6802,5.3782 C23.6802,5.3782 22.0649,1.7917 18.91,2.216 M19.7024,4.6922 C19.404,4.5406 19.1729,4.1395 19.2915,3.7176 C19.4053,3.3116 19.6743,3.1074 20.0118,3.0475 C21.9402,2.7112 23.0187,4.8768 23.0187,4.8768 C21.6039,4.3107 20.6171,5.1593 19.7024,4.6922" id="Fill-560"></path>
            </g>
        </g>
    </g>
Oumbox
</svg>
					</li>
					<li class="activee">
						<a href="#">Bienvenue Visiteur, </a>
					</li>
					<li class="drop-down">
						<a href="#">Connexion</a>			 
					</li>
					<li>
						<a href="#">Créer un compte</a>
					</li>
		  
   

          <li style="float:right;">
           <a href="http://www.mywebtricks.com/">Historique</a>
          </li>

          <li style="float:right;">
           <a href="http://www.mywebtricks.com/">Mon compte</a>
          </li>

          <li class="drop-down" style="float:right;">
				<a href="#">Programme</a>
			 
				<div class="mega-menu fadeIn animated ">
					<div class="mm-6column">
						<span class="left-images">
						<img  src="http://4.bp.blogspot.com/-faF-AemPFUM/U4ryP7pQRsI/AAAAAAAAEvA/fZ-hskCSln4/s1600/Magento%2Bthemes.jpg">
						<p>Titre </p>
		</span>
						<span class="categories-list">
					<ul>
					<span>Titre 1</span>
						<li>Sous titre 1</li>
						<li>Sous titre 2</li>
						<li>Sous titre 3</li>
						<li>Sous titre 4</li>
						<li>Sous titre 5</li>
						<li>Sous titre 6</li>
						<li>Sous titre 7</li>
						<li><a class="mm-view-more" href="#">View more →</a></li>
					</ul>
				</span>
					
					</div>
					<div class="mm-3column">
				<span class="categories-list">
				<ul>
					 <span>Titre 2</span>
						<li>Sous titre 1
						<li>Sous titre 2
						<li>Sous titre 3
						<li>Sous titre 4
						<li>Sous titre 5
						<li>Sous titre 6
						<li>Sous titre 7
						<li><a class="mm-view-more" href="#">View more →</a></li>
					</ul>
				</span>							
					</div>
					<div class="mm-3column">
						<span class="categories-list">
				<ul>
					<span>Titre 3</span>
					<li>Sous titre 1</li>
					<li>Sous titre 2</li>
					<li>Sous titre 3</li>
					<li>Sous titre 4</li>
					<li>Sous titre 5</li>
				    <li>Sous titre 6</li>
					<li>Sous titre 7</li>
				   	<li><a class="mm-view-more" href="#">View more →</a></li>
				</ul>
			</span>
				</div>
			</div>
	 
			</li>


				</ul>
			</nav>
		</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/header.js"></script>
</body>
</html>