<?php
require_once "jssdk/jssdk.php";
$jssdk = new JSSDK("wx0d7d983e3c4b1735", "ed0d5d5ef5d812de713c1d1ebff2d1d3");//填写开发者中心你的开发者ID
$signPackage = $jssdk->GetSignPackage();
	
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>“治来水"投诉</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=haBz31hiMKdXbAxs8fRdWs1G"></script>
  <style>
		body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}

	
	  html {
	  -ms-text-size-adjust: 100%;
	  -webkit-text-size-adjust: 100%;
	  -webkit-user-select: none;
	  user-select: none;
	}
	body {
	  line-height: 1.6;
	  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	  background-color:#FFF;
	}
	* {
	  margin: 0;
	  padding: 0;
	}
	.banner {
	width:100%;
	margin:0 auto;
	padding:0;overflow: hidden;
	background-color: #333333;
}
#wrapper {
	margin:0;
	width:100%;
	height:auto;
	float:left;
	position:relative;	/* On older OS versions "position" and "z-index" must be defined, */
	z-index:-1;			/* it seems that recent webkit is less picky and works anyway. */
	overflow:hidden;
	
}

#scroller {
	height:auto;
	float:left;
	padding:0;
}
#scroller ul {
	list-style:none;
	display:block;
	float:left;
	width:100%;
	height:auto;
	padding:0;
	margin:0;
	text-align:left;
}

#scroller li {
	
	display:block; float:left;
	width:auto; height:auto;
	text-align:center;
	font-size:0px;
	padding:0;
	position:relative;
}
	button {
	  font-family: inherit;
	  font-size: 100%;
	  margin: 0;
	  *font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	ul,
	ol {
	  padding-left: 0;
	  list-style-type: none;
	}
	a {
	  text-decoration: none;
	}
	.label_box {
	  background-color: #ffffff;
	}
	.label_item {
	  padding-left: 15px;
	}
	.label_inner {
	  padding-top: 10px;
	  padding-bottom: 10px;
	  min-height: 24px;
	  position: relative;
	}
	.label_inner:before {
	  content: " ";
	  position: absolute;
	  left: 0;
	  top: 0;
	  width: 200%;
	  height: 1px;
	  border-top: 1px solid #ededed;
	  -webkit-transform-origin: 0 0;
	  transform-origin: 0 0;
	  -webkit-transform: scale(0.5);
	  transform: scale(0.5);
	  top: auto;
	  bottom: -2px;
	}
	.lbox_close {
	  position: relative;
	}
	.lbox_close:before {
	  content: " ";
	  position: absolute;
	  left: 0;
	  top: 0;
	  width: 200%;
	  height: 1px;
	  border-top: 1px solid #ededed;
	  -webkit-transform-origin: 0 0;
	  transform-origin: 0 0;
	  -webkit-transform: scale(0.5);
	  transform: scale(0.5);
	}
	.lbox_close:after {
	  content: " ";
	  position: absolute;
	  left: 0;
	  top: 0;
	  width: 200%;
	  height: 1px;
	  border-top: 1px solid #ededed;
	  -webkit-transform-origin: 0 0;
	  transform-origin: 0 0;
	  -webkit-transform: scale(0.5);
	  transform: scale(0.5);
	  top: auto;
	  bottom: -2px;
	}
	.lbox_close .label_item:last-child .label_inner:before {
	  display: none;
	}
	.btn {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  padding-left: 14px;
	  padding-right: 14px;
	  font-size: 18px;
	  text-align: center;
	  text-decoration: none;
	  overflow: visible;
	  /*.btn_h(@btnHeight);*/
	  height: 42px;
	  border-radius: 5px;
	  -moz-border-radius: 5px;
	  -webkit-border-radius: 5px;
	  box-sizing: border-box;
	  -moz-box-sizing: border-box;
	  -webkit-box-sizing: border-box;
	  color: #ffffff;
	  line-height: 42px;
	  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
	}
	.btn.btn_inline {
	  display: inline-block;
	}
	.btn_primary {
	  background-color: #04be02;
	}
	.btn_primary:not(.btn_disabled):visited {
	  color: #ffffff;
	}
	.btn_primary:not(.btn_disabled):active {
	  color: rgba(255, 255, 255, 0.9);
	  background-color: #039702;
	}
	button.btn {
	  width: 100%;
	  border: 0;
	  outline: 0;
	  -webkit-appearance: none;
	}
	button.btn:focus {
	  outline: 0;
	}
	.wxapi_container {
	  font-size: 16px;
	}
	h1 {
	  font-size: 14px;
	  font-weight: 400;
	  line-height: 2em;
	  padding-left: 15px;
	  color: #8d8c92;
	}
	.desc {
	  font-size: 14px;
	  font-weight: 400;
	  line-height: 2em;
	  color: #8d8c92;
	}
	.wxapi_index_item a {
	  display: block;
	  color: #3e3e3e;
	  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	}
	.wxapi_form {
	  background-color: #ffffff;
	  padding: 0 15px;
	  margin-top: 30px;
	  padding-bottom: 15px;
	}
	h3 {
	  padding-top: 16px;
	  margin-top: 25px;
	  font-size: 16px;
	  font-weight: 400;
	  color: #3e3e3e;
	  position: relative;
	}
	h3:first-child {
	  padding-top: 15px;
	}
	h3:before {
	  content: " ";
	  position: absolute;
	  left: 0;
	  top: 0;
	  width: 200%;
	  height: 1px;
	  border-top: 1px solid #ededed;
	  -webkit-transform-origin: 0 0;
	  transform-origin: 0 0;
	  -webkit-transform: scale(0.5);
	  transform: scale(0.5);
	}
	.btn {
	  margin-bottom: 15px;
	}
	body, article, section, h1, h2, hgroup, p, a, ul, li, em, div, small, span, footer, canvas, figure, figcaption, input {
    margin: 0;
    padding: 0;
}
a {
	color:#333;
    cursor: pointer;
    text-decoration: none;
}
ul,li{
    list-style-type: none;
}
.clr{
	clear:both;
}
body {
    font-family: Microsoft YaHei,Helvitica,Verdana,Tohoma,Arial,san-serif;
    margin: 0;
    overflow-x: hidden;
    padding: 0;
}
.qiandaobanner{
	display:block;
	text-align:center;
	position: relative;
	min-height: 26px;
}
.qiandaobanner img{
	width:100%;
	border:0;
	min-width:320px;
}

.qiandaobanner  span {
    background-color: rgba(0, 0, 0, 0.5);
    bottom: 0;
    color: #FFFFFF;
    display: block;
    font-size: 16px;
    margin: 0 auto;
    line-height: 26px;
    position: absolute;
    text-align: center;
    width: 100%;
}
.cardexplain{
	margin:0px;
	min-width:301px;
}
h2 {
    color: #373B3E;
    font-size: 14px;
    line-height: 32px;
    padding-left: 10px;
    padding-top: 0px;
    text-align: left;
	font-weight:normal;
}

ul.round {
	border:1px solid #C6C6C6;
	background-color:rgba(255, 255, 255, 0.9);
	text-align:left;
	font-size:14px;
	line-height:24px;
	border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	-moz-box-shadow:0 1px 1px #f6f6f6;
	-webkit-box-shadow:0 1px 1px #f6f6f6;
	box-shadow:0 1px 1px #f6f6f6;
	margin-top:-5px;
	margin-bottom:11px;
	display:block
}

ul.round li {
	border:solid #C6C6C6;
	border-width:0 0 1px 0;
	padding:0px 10px 0 10px;
}
ul.round li:only-of-type {
	border-width:0;
}
ul.round li:last-of-type {
	border-width:0;
}
.round li, .round li span, .round li a {
	line-height:22px;
}
.round li span {
	display:block;
	background:url(img/arrow3.png) no-repeat right 50%;
	-webkit-background-size:8.5px 13px;
	background-size:8.5px 13px;
	padding:10px 20px 9px 0;
	position:relative;
	font-size:16px;
	min-height: 22px;
}
.round li span.none {
    background: none repeat scroll 0 0 transparent;
}
.round li span.noneorder {
    background: none repeat scroll 0 0 transparent;
	padding:10px 5px 9px 0;
}
.round li span.none em {
    right: 0;
}

.round li.addr{
    background: url(img/addr.png) no-repeat scroll 10px 13px transparent;
	background-size:15px 15px;
    line-height: 22px;
    padding-left: 34px;
}
.round li.addr span{
	font-size:14px;
}
.mb{ margin-bottom:4px}
.round li.nob {
    border-width:0;
}
.round li.dandanb {
	border-color:#EBEBEB;
}
.round li.nob .px{
    border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	background-color: #FFFFFF;
	border: 1px solid #E8E8E8;
	margin: 5px 0 4px;
	padding: 5px 10px;
}
.round li.nob .dropdown-select{
    border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	background-color: #FFFFFF;
	border: 1px solid #E8E8E8;
	margin: 5px 0 4px;
	padding: 5px 10px;
}
.round li.nob .pxtextarea{
    border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	background-color: #FFFFFF;
	border: 1px solid #E8E8E8;
	margin: 5px 0 5px;
	padding: 5px 10px;
}
ul.round li.nob:last-of-type {
	margin-bottom:8px
}
.round li.tel {
    background: url(img/tel.png) no-repeat scroll 11px 13px transparent;
	background-size:15px 15px;
    line-height: 22px;
    padding-left: 34px;
}
.round li.tel2 {
    background: url(img/tel2.png) no-repeat scroll 11px 13px transparent;
	background-size:15px 15px;
    line-height: 22px;
    padding-left: 34px;
}
.round li.userinfo {
    background: url(img/userinfo.png) no-repeat scroll 11px 13px transparent;
	background-size:15px 15px;
    line-height: 22px;
    padding-left: 34px;
}
.round li.detail {
    background: url(img/detail.png) no-repeat scroll 10px 13px transparent;
	background-size:15px 15px;
    line-height: 22px;
    padding-left: 34px;
	-webkit-border-radius:0 0 5px 5px;
	border-radius:0 0 5px 5px;
}
.round li.gift {
    background: url(img/gift.png) no-repeat scroll 10px 13px transparent;
	background-size:15px 15px;
    line-height: 22px;
    padding-left: 34px;
	-webkit-border-radius:0 0 5px 5px;
	border-radius:0 0 5px 5px;
}
.round li h2 {
    color: #373B3E;
    font-size: 16px;
    font-weight: normal;
    line-height: 20px;
    padding: 10px 0 10px 0;
	border-bottom:1px dotted #C6C6C6;
}
.round li span h2 {
    color: #373B3E;
    font-size: 16px;
    font-weight: normal;
    line-height: 20px;
    padding: 6px 20px 6px 0;
	border-bottom:0;
	overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.round li span img {
    border: 0 none;
	width:50px;
	height:50px;
	float:left;
	margin:0 10px 0 0;
}
.round li span img.showimg {
    border: 0 none;
	width:108px;
	height:60px;
	float:left;
	margin:0 10px 0 0;
	border-radius: 3px 3px 3px 3px;
}
.round li span p{
	overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
	padding-right: 10px;
}

.round li .text {
	padding:10px 0 10px;
}
.round li .btop {
    background-color: #F5F5F5;
    margin-bottom: 10px;
    padding: 10px;
}
.round li .text p {
    line-height: 20px; font-size:14px; color:#666;
}
.round li img{
	max-width:100%;
	border:0;
}

.round li span em{
	display:block;
	-webkit-border-radius:20px;
	border-radius:20px;
	color:#FFF;
	font-size: 12px;
    line-height: 12px;
    margin-top: -10px;
    padding: 4px 8px;
    position: absolute;
    right: 20px;
    top: 50%;
	text-shadow: 0 0 #FFFFFF;
	font-style:normal;
}
em.ok{
	background-color: #1CC200;
}
em.error{
	background-color: #FF6600;
}
em.no{
	background-color: #BBBBBB;
}
em.more {
    text-shadow:0 1px #FFF !important;
	color: #666666 !important;
	right:8px !important;
}
.price{
	color: #FF6600; font-size:16px;
}
.price2{
	color: #1CC200; font-size:16px;
}
.round li span.jifen em{
	left:70px; font-style:normal;color: #1CC200;font-size: 18px;
}
ul.round li.biaotou { padding-right:30px;border-bottom: 1px solid #DADADA;background-color: #EBEBEB;}
ul.round li.pad { padding-right:15px;}
.bradius {-webkit-border-radius:5px 5px 0 0;
	-moz-border-radius:5px 5px 0 0;
	-o-border-radius:5px 5px 0 0;
	border-radius:5px 5px 0 0;}
.biaotou td{ color:#999;font-size: 12px;}
.biaotou td.yuanjia{ color:#999;font-size: 12px;text-align: right; width:70px;}
.biaotou td.youhuijia{ color:#999;font-size: 12px; text-align:right; width:70px;}



.jiagebiao td.yuanjia{ color:#999;font-size: 14px; text-align:right; width:70px;}
.jiagebiao td.youhuijia{ color:#F60;font-size: 14px; text-align:right; width:70px;}

a.yuanjia{ color:#999;font-size: 12px; line-height:14px }
a.youhuijia{ color:#F60;font-size: 14px; line-height:14px }
.round li.orderinfo{
    background: url(img/order.png) no-repeat scroll 10px 13px transparent;
	background-size:15px 15px;
    line-height: 22px;
    padding-left: 34px;
}
.round li.title{
	background-color:#E1E1E1;
    background-image: linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -o-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -moz-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -webkit-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -ms-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #E7E7E7),
	color-stop(1, #f9f9f9)
	);
	-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	-o-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}
.round li.title span{
    padding: 5px 15px 4px 0;font-size: 14px; color:#666;text-shadow:0 1px #FFF;
}

.round li p{
	padding:0; margin:2px 0; color:#999; font-size:12px;line-height: 14px;
}


.kuang th {
    color: #333333;padding:0; font-size:16px; font-weight:normal;text-align: left;width: 140px;
}
.kuang td {
    color: #999999;padding:0;
}
.kuang th.thtop{ padding:10px 0 0 0}
.kuang td.userinfo{
    padding:10px;
}
.round li span .kuang td.userinfo{
    padding:0 0 1px 10px;color: #666666;
}
.kuang td.title{
    padding:10px 0;color: #333333;
}
.kuang td.price{
	color: #FF6600; font-size:16px;
}
.kuang td.price2{
	color: #1CC200; font-size:16px;
}
.kuang td.pm{
    font-size:14px;
	line-height:20px;
}
.green{
	color:#090;
}
.red{
	color:#FF6600;
}
.time{
	font-size:12px;
}
.small{
	font-size:12px;
}
.detailcontent {
	border:1px solid #C6C6C6;
	background-color:rgba(255, 255, 255, 0.9);
	text-align:left;
	font-size:14px;
	line-height:22px;
	-webkit-border-radius:5px;
	border-radius:5px;
	box-shadow:0 1px 1px #f6f6f6;
	-moz-box-shadow:0 1px 1px #f6f6f6;
	-webkit-box-shadow:0 1px 1px #f6f6f6;
	padding:10px;
	margin-bottom:11px;
}
.detailcontent h2 {
    color: #373B3E;
    font-size: 16px;
    font-weight: normal;
    line-height: 20px;
    padding: 0 0 5px 0;
	border-bottom:1px solid #C6C6C6;
	margin-bottom:6px;
}

.detailcontent img {
	max-width:100%;
	border:0;
}
.zongjifen li{
	width:33%;
	float:left;
	display:block;
}
.zongjifen li p{
	display:block;
	text-align:center;
	
}
.zongjifen li span{
	display:block;
	text-align:center;
}
.zongjifen li .fengexian{
	border-right: 1px dotted #ccc;
}
.jifen-box{
	border:1px solid #C6C6C6;
	background-color:rgba(255, 255, 255, 0.8);
	text-align:left;
	font-size:14px;
	line-height:24px;
	-webkit-border-radius:5px;
	border-radius:5px;
	box-shadow:0 1px 1px #f6f6f6;
	padding:10px;
	margin-bottom:10px;
	position: relative;
}
/*login*/
.px {
	position: relative;
	background-color: transparent;
	color: #999999;
	display: block;
	width: 100%; 
	padding:10px;
	font-size: 16px;
	margin:0 auto;
	font-family:Arial, Helvetica, sans-serif;
	border:0;
	-webkit-appearance:none;
}

.px[type="text"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.px[type="password"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.px[type="button"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.pxbtn[type="button"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.submit[type="button"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.del[type="button"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.pxtextarea[type="textarea"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.pxtextarea{
	position: relative;
	background-color: transparent;
	color: #999999;
	display: block;
	width: 100%; 
	font-size: 14px;
	font-family:Arial, Helvetica, sans-serif;
	border:0;
	overflow:auto;
	-webkit-appearance:none;
}
.pxbtn {
	
	background: #ff6501;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffa201 ), to( #ff6501 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffa201 , #ff6501 ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffa201 , #ff6501 ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffa201 , #ff6501 ); /* IE10 */
	background-image:      -o-linear-gradient( #ffa201 , #ff6501 ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffa201 , #ff6501 );
	border: 1px solid #ff6501;
	border-bottom: 1px solid #d35605;
	color: #ffffff;
	font-weight: bold;
	text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0.6em 0.6em 0.6em 0.6em;
	display: block;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
	-moz-box-shadow:0 1px 3px rgba(0, 0, 0, 0.5);
	-webkit-box-shadow:0 1px 3px rgba(0, 0, 0, 0.5);
	text-overflow: ellipsis;
	white-space: nowrap;
	cursor: pointer;
	text-align: center;
	font-weight: bold;
	text-shadow: 0 0 2px #BE4205;
	font-size: 18px;
	padding:8px 10px;
	margin:10px 0 0 0;
}
.pxbtn:visited {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffa201 ), to( #ff6501 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffa201 , #ff6501 ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffa201 , #ff6501 ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffa201 , #ff6501 ); /* IE10 */
	background-image:      -o-linear-gradient( #ffa201 , #ff6501 ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffa201 , #ff6501 );
}
.pxbtn:hover {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ff7f01 ), to( #ff6501 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ff7f01 , #ff6501 ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ff7f01 , #ff6501 ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ff7f01 , #ff6501 ); /* IE10 */
	background-image:      -o-linear-gradient( #ff7f01 , #ff6501 ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ff7f01 , #ff6501 );
}
.pxbtn:active {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ff6501 ), to( #ffa201 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ff6501 , #ffa201 ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ff6501 , #ffa201 ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ff6501 , #ffa201 ); /* IE10 */
	background-image:      -o-linear-gradient( #ff6501 , #ffa201 ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ff6501 , #ffa201 );
	border: 1px solid #ff6501;
	border-top: 1px solid #d35605;
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3) inset;
}
input::-moz-placeholder, textarea::-moz-placeholder { color: #cccccc;}

/* Start Dropdown Select */
.dropdown-select {-webkit-appearance: button; -webkit-user-select: none; font-size: 13px; overflow: visible; text-overflow: ellipsis; white-space: nowrap;color: #999999; display: inline; position: relative; margin: 0px 1px 0px 1px;font-size: 16px; width: 100%; height: auto;  padding:10px; outline: none; border:0;background-color: transparent;}




.dropdown-option {color: #999;background-color: transparent;}

/* End Dropdown Select */
.roundyellow {
	background-color:#ffe156;
	text-decoration:none;
	border:1px solid #D2BD85;
	background-image: linear-gradient(bottom,  #ffe156 0%, #fff5cb 100%);
	background-image: -o-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -moz-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -webkit-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -ms-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #ffe156),
	color-stop(1, #fff5cb)
	);
	-webkit-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	display:block;
}
ul.roundyellow {
	background-color:#ffe156;
	text-decoration:none;
	border:1px solid #D2BD85;
	background-image: linear-gradient(bottom,  #ffe156 0%, #fff5cb 100%);
	background-image: -o-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -moz-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -webkit-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -ms-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #ffe156),
	color-stop(1, #fff5cb)
	);
	-webkit-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.1);
	box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.1);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	display:block;
}
.beizhu{
	border:1px solid #EDE17E;
	background-color: #FFF5C5;
	text-align: center;
	color: #BCA24B;
	font-size:14px;
	line-height:22px;
	-webkit-border-radius:5px;
	border-radius:5px;
	box-shadow:0 1px 1px #f6f6f6;
	-moz-box-shadow:0 1px 1px #f6f6f6;
	-webkit-box-shadow:0 1px 1px #f6f6f6;
	padding: 4px 10px 5px;
	margin: 11px 0 8px;
}
.footReturn {
    display: block;
    margin: 11px auto;
    padding: 0;
	position: relative;
}
.footerbtn{ width:50%; float:left;}
.right3{ margin-right:3px}
.left3{ margin-left:3px}
.vm {
vertical-align: middle;
}
.submit {
	background-color:#179F00;
	padding:10px 20px;
	font-size:16px;
	text-decoration:none;
	border:1px solid #0B8E00;
	background-image: linear-gradient(bottom,  #179F00 0%, #5DD300 100%);
	background-image: -o-linear-gradient(bottom, #179F00 0%, #5DD300 100%);
	background-image: -moz-linear-gradient(bottom, #179F00 0%, #5DD300 100%);
	background-image: -webkit-linear-gradient(bottom, #179F00 0%, #5DD300 100%);
	background-image: -ms-linear-gradient(bottom, #179F00 0%, #5DD300 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #179F00),
	color-stop(1, #5DD300)
	);
	-webkit-box-shadow: 0 1px 0 #94E700 inset, 0 1px 2px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 1px 0 #94E700 inset, 0 1px 2px rgba(0, 0, 0, 0.5);
	box-shadow: 0 1px 0 #94E700 inset, 0 1px 2px rgba(0, 0, 0, 0.5);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	color: #ffffff;
	display:block;
	text-align:center;
	text-shadow:0 1px rgba(0, 0, 0, 0.2);
}
.submit:active {
	padding-bottom:9px;
	padding-left:20px;
	padding-right:20px;
	padding-top:11px;
	top:0px;
	background-image: linear-gradient(bottom, #5DD300 0%, #179F00 100%);
	background-image: -o-linear-gradient(bottom,  #5DD300 0%, #179F00 100%);
	background-image: -moz-linear-gradient(bottom,  #5DD300 0%, #179F00 100%);
	background-image: -webkit-linear-gradient(bottom,  #5DD300 0%, #179F00 100%);
	background-image: -ms-linear-gradient(bottom,  #5DD300 0%, #179F00 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #5DD300),
	color-stop(1, #179F00)
	);
	-webkit-box-shadow: 0 1px 0 #5DD300 inset, 0 1px 2px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 1px 0 #5DD300 inset, 0 1px 2px rgba(0, 0, 0, 0.5);
	box-shadow: 0 1px 0 #5DD300 inset, 0 1px 2px rgba(0, 0, 0, 0.5);
}
.submit img{ width:15px; margin:-4px 10px 0 0;}
.del{
	background-color:#F4F4F4;
	padding:10px 20px;
	font-size:16px;
	text-decoration:none;
	border:1px solid #ABABAB;
	background-image: linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -o-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -moz-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -webkit-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -ms-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #E1E1E1),
	color-stop(1, #ffffff)
	);
	-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
	box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	color: #666666;
	display:block;
	text-align:center;
	text-shadow:0 1px #FFF;
}
.del:active {
	padding-bottom:9px;
	padding-left:20px;
	padding-right:20px;
	padding-top:11px;
	top:0px;
	background-image: linear-gradient(bottom, #ffffff 0%, #E1E1E1 100%);
	background-image: -o-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -moz-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -webkit-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -ms-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #ffffff),
	color-stop(1, #E1E1E1)
	);
	-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
	box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
}
.del img{ width:15px;width:15px; margin:-4px 10px 0 0;}
.submit2 {
	background-color:#ffe156;
	padding:10px 20px;
	font-size:16px;
	text-decoration:none;
	border:1px solid #D2BD85;
	background-image: linear-gradient(bottom,  #ffe156 0%, #fff5cb 100%);
	background-image: -o-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -moz-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -webkit-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -ms-linear-gradient(bottom, #ffe156 0%, #fff5cb 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #ffe156),
	color-stop(1, #fff5cb)
	);
	-webkit-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	color: #333;
	display:block;
	text-align:center;
	text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.submit2:active {
	padding-bottom:9px;
	padding-left:20px;
	padding-right:20px;
	padding-top:11px;
	top:0px;
	background-image: linear-gradient(bottom, #fff5cb 0%, #ffe156 100%);
	background-image: -o-linear-gradient(bottom,  #fff5cb 0%, #ffe156 100%);
	background-image: -moz-linear-gradient(bottom,  #fff5cb 0%, #ffe156 100%);
	background-image: -webkit-linear-gradient(bottom,  #fff5cb 0%, #ffe156 100%);
	background-image: -ms-linear-gradient(bottom,  #fff5cb 0%, #ffe156 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #fff5cb),
	color-stop(1, #ffe156)
	);
	-webkit-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
	box-shadow: 0 1px 1px #fff3c2 inset, 0 1px 2px rgba(0, 0, 0, 0.15);
}
.submit2 img{ width:15px; margin:-4px 10px 0 0;}
.receive {
	background-color:#F4F4F4;
	padding:10px 20px;
	font-size:16px;
	text-decoration:none;
	border:1px solid #C6C6C6;
	background-image: linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -o-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -moz-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -webkit-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -ms-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #E1E1E1),
	color-stop(1, #ffffff)
	);
	-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	color: #666666;
	display:block;
	text-align:center;
	text-shadow:0 1px rgba(0, 0, 0, 0.2);
}

.receive:before {
	background-image: linear-gradient(bottom, rgba(255, 255, 255, 0.41) 0%, #E1E1E1 100%);
	background-image: -o-linear-gradient(bottom, rgba(255, 255, 255, 0.41) 0%, #E1E1E1 100%);
	background-image: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0.41) 0%, #E1E1E1 100%);
	background-image: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0.41) 0%, #E1E1E1 100%);
	background-image: -ms-linear-gradient(bottom, rgba(255, 255, 255, 0.41) 0%, #E1E1E1 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, rgba(255, 255, 255, 0.41)),
	color-stop(1, #E1E1E1)
	);
	content:"";
	display:block;
	position:absolute;
	width:100%;
	height:100%;
	padding:5px;
	left:-5px;
	top:-6px;
	z-index:-1;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 1px rgba(144, 145, 147, 0.21) inset, 0 1px 0 rgba(255, 255, 255, 0.57);
	-moz-box-shadow: 0 1px 1px rgba(144, 145, 147, 0.21) inset, 0 1px 0 rgba(255, 255, 255, 0.57);
	-o-box-shadow:0 1px 1px rgba(144, 145, 147, 0.21) inset, 0 1px 0 rgba(255, 255, 255, 0.57);
	box-shadow:0 1px 1px rgba(144, 145, 147, 0.21) inset, 0 1px 0 rgba(255, 255, 255, 0.57);
}

.receive:active {
	padding-bottom:9px;
	padding-left:20px;
	padding-right:20px;
	padding-top:11px;
	top:0px;
	background-image: linear-gradient(bottom, #ffffff 0%, #E1E1E1 100%);
	background-image: -o-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -moz-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -webkit-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -ms-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #ffffff),
	color-stop(1, #E1E1E1)
	);
	-webkit-box-shadow: 0 1px 0 #E1E1E1 inset, 0 1px 1px #F6F6F6;
	-moz-box-shadow: 0 1px 0 #E1E1E1 inset, 0 1px 1px #F6F6F6;
	box-shadow: 0 1px 0 #E1E1E1 inset, 0 1px 1px #F6F6F6;
}

/*window*/
.window {
	width:267px;
	position:absolute;
	display:none;
	margin:0px auto 0 -136px;
	padding:2px;
	bottom:60px;
	left:50%;
	border-radius:0.6em;
	-webkit-border-radius:0.6em;
	-moz-border-radius:0.6em;
	background-color: #f1f1f1;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	font:14px/1.5 Microsoft YaHei, Helvitica, Verdana, Arial, san-serif;
	z-index:10;
}
.window .wtitle {
	background-color: #585858;
	line-height: 26px;
	padding: 5px 5px 5px 10px;
	color:#ffffff;
	font-size:16px;
	border-radius:0.5em 0.5em 0 0;
	-webkit-border-radius:0.5em 0.5em 0 0;
	-moz-border-radius:0.5em 0.5em 0 0;
}
.window .content {
	/*min-height:100px;*/
	overflow:auto;
	padding:10px;
	color: #222222;
	text-shadow: 0 1px 0 #FFFFFF;
}
.window #txt {
	min-height:30px;
	font-size:14px;
	line-height:20px;
}
.window .content p {
	margin:10px 0 0 0;
}

.window .wtitle .close {
	float:right;
	background-image: url("img/QJ8o7KOek84fkCWSBtfLNy2MPpCkPFMH6PWEhWhKncIyEk69VfiUuVhqJefdsYcwNbEwxGqGIFWYAAAAASUVORK5CYII=");
	width:26px;
	height:26px;
	display:block;
}
#overlay {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	background:#000000;
	opacity:0.5;
	filter:alpha(opacity=0);
	display:none;
	z-index: 9;
}

/*page*/
.pagination{
    margin: 0 auto;
    text-align: center;
    text-align: center;
	min-width:301px;
}
.pagination a {
	margin: 0 ;
    padding: 6px 27px;
	border:1px solid #D1D1D1;
	background:#fefefe;
	border:1px solid #ABABAB;
	background-image: linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -o-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -moz-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -webkit-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -ms-linear-gradient(bottom, #E1E1E1 0%, #ffffff 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #E1E1E1),
	color-stop(1, #ffffff)
	);
	-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 1px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 1px rgba(0, 0, 0, 0.1);
	box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 1px rgba(0, 0, 0, 0.1);
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	color:#666;
	text-shadow:0 1px #fff;
	display:block;
}
.pagination a:hover {
	background-image: linear-gradient(bottom, #F5F2F2 0%, #ffffff 100%);
	background-image: -o-linear-gradient(bottom, #F5F2F2 0%, #ffffff 100%);
	background-image: -moz-linear-gradient(bottom, #F5F2F2 0%, #ffffff 100%);
	background-image: -webkit-linear-gradient(bottom, #F5F2F2 0%, #ffffff 100%);
	background-image: -ms-linear-gradient(bottom, #F5F2F2 0%, #ffffff 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #F5F2F2),
	color-stop(1, #ffffff)
	);
}
.pagination a:active {
	background-image: linear-gradient(bottom, #ffffff 0%, #E1E1E1 100%);
	background-image: -o-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -moz-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -webkit-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -ms-linear-gradient(bottom,  #ffffff 0%, #E1E1E1 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #ffffff),
	color-stop(1, #E1E1E1)
	);
	-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
	box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 2px rgba(0, 0, 0, 0.25);
}
.pagination .disabled a, .pagination .disabled a:hover {
	background:none;
	border:1px solid #cbcbcb;
	-webkit-box-shadow:none;
	-moz-box-shadow:none;
	box-shadow:none;
	color:A4A3A3;
}
.pagination .allpage{
	position: relative;
    text-align: center;
    vertical-align: baseline;
	display: inline-block;
}
.pagination .currentpage{
    line-height: 36px;
    width: 80px;
}
#dropdown-select{position:absolute;
	top:0;
	left:0;
	height:36px;
	width:80px;
	opacity:0;
}
.pagination .left{ float:left}
.pagination .right{ float:right}


/*iscroll*/

.banner {
	width:100%;
	margin:0 auto;
	padding:0;overflow: hidden;
	background-color: #333333;
}
#wrapper {
	margin:0;
	width:100%;
	height:auto;
	float:left;
	position:relative;	/* On older OS versions "position" and "z-index" must be defined, */
	z-index:1;			/* it seems that recent webkit is less picky and works anyway. */
	overflow:hidden;
	
}

#scroller {
	height:auto;
	float:left;
	padding:0;
}

#scroller ul {
	list-style:none;
	display:block;
	float:left;
	width:100%;
	height:auto;
	padding:0;
	margin:0;
	text-align:left;
}

#scroller li {
	
	display:block; float:left;
	width:auto; height:auto;
	text-align:center;
	font-size:0px;
	padding:0;
	position:relative;
}
#scroller li a{
	
	display:block;
	padding:0;
	margin:0;
}
#scroller li p{
	position:absolute;
	z-index:2;
	display:block;
	width:100%;
	bottom:0;
	background-color:rgba(0, 0, 0, 0.5);
	color:#F4F4F4;
	font-size:14px;
	text-indent: 55px;
	line-height:24px;
	text-align: left;
    text-indent: 10px;
    text-overflow: ellipsis;
    white-space: nowrap;
	padding:0;
	margin:0;
}
#nav {
	float: right;
    margin-top: -15px;
    padding: 0;
    position: relative;
    width: auto;
    z-index: 3;
}

#prev, #next {
	float:left;
	font-weight:bold;
	font-size:14px;
	padding:5px 0;
	width:80px;
	display: none;
}

#next {
	float:right;
	text-align:right;
}

#indicator > li {
	display:block; float:left;
	list-style:none;
	padding:0; margin:0;
}

#indicator {
	display: block;
    margin: 0 8px;
    padding: 0;
    width: auto;
}

#indicator > li {
	text-indent:-9999em;
	width:8px; height:8px;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	-o-border-radius:4px;
	border-radius:4px;
	background:#888;
	overflow:hidden;
	margin-right:4px;
}

#indicator > li.active {
	background:#DDDDDD;
}

#indicator > li:last-child {
	margin:0;
}
.shangchuang
{
	background-color:#B5B4B4;
	text-align:center;
	color:#FFF;
	height:50px;
	line-height:50px;
	margin-top:5px;
	margin-bottom:5px;
}
.shangchuang1
{
}
#imgshang imgshang{width:200px;}
  </style>
  <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <link href="../js/bootstrap.min.css" rel="stylesheet" />
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>    
</head>
<body ontouchstart="">
<div class="wxapi_container">
    <div class="banner">
          <div id="wrapper">
            <div id="scroller" style="float:none">
              <ul id="thelist"><img src="../img/logo.jpg" alt="微信投诉" style="width:100%">
              </ul>
            </div>
          </div>
      </div>
    </div>

  <div class="cardexplain">
      <ul class="round">
        <li>
          <h2>"治来水"微信投诉</h2>
          <div class="text">
            "治来水"竭诚为您服务<br/>
          联系电话：18405865011/18405865735</div>
        </li>
      </ul>
      <form method="post" action="submit.php" id="form" onsubmit="return tgSubmit()">
        <ul class="round">
          <li class="title mb"><span class="none">请填写以下信息</span></li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>被举报河流*</th>
                  <td><input type="text" class="px" placeholder="请输入您要举报的河流" id="name" name="name" value="">
                    
                  </td>
                </tr>
              </tbody>
            </table>
            </li>
            <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>被举报所在地图片*</th>
                  
                </tr>
              </tbody>
            </table>
          </li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>被举报所在地*</th>
                  <td><input type="text" class="px" placeholder="请输入河流大概地址" id="mobile" name="mobile" value="">
                  </td>

                  <div id="chooseImage" class="shangchuang">拍照或从手机相册中选图</div>
                 
                
			    <div class="group">
                	<lable class="group_p">相关图片</lable>
                    <div class="course">
                   	<input id="ComPhoto" type="file" name="photo" ></input>
                    <span class="help">(5M以内，支持jpg、png、jpeg格式图片)</span>
                    </div>
                </div>

                  
                </tr>
              </tbody>
            </table>
          </li>
            <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>举报日期*</th>
                  <td>
                    <select style="line-height:35px;" id="bookdate" name="bookdate" class="dropdown-select">
                      <option value="" selected="">请选择举报日期</option>
                      <?php
                      for ($i = 1; $i <= 6; $i++) {
                        $offset = strtotime("-".($i-1)." day");
                        $bDate = date("m月d日",$offset);
                        $optionString .= '<option value="'.$bDate.'">'.$bDate.'</option>';
                      }
                      echo $optionString;
                      ?>
                    </select>
                  </td>
                  <!--<div id="openLocation" class="shangchuang">从地图中选点</div>-->
                   <div class="shangchuang" ><a href="map4.html"><font color="#FFFFFF">从地图中选点</font></a></div><!--LHX加的，调用百度地图-->
                   <input class="shangchuang" name="location" value="<?php $location=$_POST['location']; echo $location;?> "/>
                   <!--<div id="getLocation" class="shangchuang1"></div>-->
                </tr>
              </tbody>
            </table>
          </li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>您对此的容忍程度*</th>
                  <td><select style="line-height:35px;" id="bookexpert" name="bookexpert" class="dropdown-select"><option value="" selected="">请选择程度</option><option value="不能忍">不能忍</option><option value="一般般">一般般</option><option value="能忍受">能忍受</option></select>
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
          <li class="nob">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
              <tbody>
                <tr>
                  <th>请简短描述现场</th>
                  <td>
                <input type="text" class="px" placeholder="请在此输入文本" id="topic_content" name="topic_content" value="">
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
         
        
          
        </ul>

        <div class="footReturn" style="text-align:center">
          <input type="hidden" name="openid" value="<?php echo $openid;?>">
          <input type="submit" style="margin:0 auto 20px auto;width:90%" class="submit" onClick="tgSubmit" value="提交信息">
        </div>
      </form>
      <script>
        function showTip(tipTxt) {
          var div = document.createElement('div');
		  alert(tipTxt);
          div.innerHTML = '<div class="deploy_ctype_tip"><p>' + tipTxt + '</p></div>';
          var tipNode = div.firstChild;
          $("#wrap").after(tipNode);
          setTimeout(function () {
            $(tipNode).remove();
          }, 1500);
        }
        function tgSubmit(){
	      
          var name=$("#name").val();
          if($.trim(name) == ""){
            showTip('请输入河流')
            return false;
          }
		   var name=$("#mobile").val();
          if($.trim(name) == ""){
            showTip('请输入地址')
            return false;
          }
		  var bookdate=$("#bookdate").val();
          if($.trim(bookdate) == ""){
            showTip('请输入举报日期')
            return false;
          }
         
          var bookexpert=$("#bookexpert").val();
          if($.trim(bookexpert) == ""){
            showTip('请输入容忍程度')
            return false;
          }
          return true;
        }
      </script>
    </div>
</body>
<script>
  wx.config({
       appId: '<?php echo $signPackage["appId"];?>',
   	   timestamp: <?php echo $signPackage["timestamp"];?>,
   	   nonceStr: '<?php echo $signPackage["nonceStr"];?>',
   	   signature: '<?php echo $signPackage["signature"];?>',
   	   jsApiList:[
	    'uploadImage',
        'previewImage',
        'chooseImage',
        'openLocation',
        'getLocation',
        'scanQRCode'
      ]
  });
   wx.ready(function () {
  
  document.querySelector('#openLocation').onclick = function () {
    wx.openLocation({///---------不用了
      latitude: 28.88,
      longitude: 121.17,
      name: '台州学院',
      address: '临海市东方大道605号',
      scale: 12,
      infoUrl: 'http://weixin.qq.com'
    });
  };
  // 7.2 获取当前地理位置----不用了
  document.querySelector('#getLocation').onclick = function () {
    wx.getLocation({
      success: function (res) {
	    var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        var speed = res.speed; // 速度，以米/每秒计
        var accuracy = res.accuracy; // 位置精度
        alert(JSON.stringify(res));
      },
      cancel: function (res) {
        alert('用户拒绝授权获取地理位置');
      }
    });
  };
 
 	// 百度地图API功能
	var map = new BMap.Map("getLocation");            
	map.centerAndZoom("临海",12);           
	//单击获取点击的经纬度
	map.addEventListener("click",function(e){
		alert(e.point.lng + "," + e.point.lat);
	});
 
  // 5 图片接口
  // 5.1 拍照、本地选图
  var images = {
    localId: [],
    serverId: []
  };
  document.querySelector('#chooseImage').onclick = function () {
    wx.chooseImage({
      success: function (res) {
        images.localId = res.localIds;
        alert('已选择 ' + res.localIds.length + ' 张图片');
      }
    });
  };

  // 5.2 图片预览
  document.querySelector('#previewImage').onclick = function () {
    wx.previewImage({
      current: 'http://img5.douban.com/view/photo/photo/public/p1353993776.jpg',
      urls: [
        'http://img3.douban.com/view/photo/photo/public/p2152117150.jpg',
        'http://img5.douban.com/view/photo/photo/public/p1353993776.jpg',
        'http://img3.douban.com/view/photo/photo/public/p2152134700.jpg'
      ]
    });
  };

  // 5.3 上传图片
  document.querySelector('#uploadImage').onclick = function () {
    if (images.localId.length == 0) {
      alert('请先使用 chooseImage 接口选择图片');
      return;
    }
    var i = 0, length = images.localId.length;
    images.serverId = [];
    function upload() {
      wx.uploadImage({
        localId: images.localId[i],
        success: function (res) {
          i++;
          alert('已上传：' + i + '/' + length);
          images.serverId.push(res.serverId);
          if (i < length) {
            upload();
          }
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
    }
    upload();
  };

  // 5.4 下载图片
  document.querySelector('#downloadImage').onclick = function () {
    if (images.serverId.length === 0) {
      alert('请先使用 uploadImage 上传图片');
      return;
    }
    var i = 0, length = images.serverId.length;
    images.localId = [];
    function download() {
      wx.downloadImage({
        serverId: images.serverId[i],
        success: function (res) {
          i++;
          alert('已下载：' + i + '/' + length);
          images.localId.push(res.localId);
          if (i < length) {
            download();
          }
        }
      });
    }
    download();
  };

  // 6 设备信息接口
  // 6.1 获取当前网络状态
  document.querySelector('#getNetworkType').onclick = function () {
    wx.getNetworkType({
      success: function (res) {
        alert(res.networkType);
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
  };

  // 8 界面操作接口
  // 8.1 隐藏右上角菜单
  document.querySelector('#hideOptionMenu').onclick = function () {
    wx.hideOptionMenu();
  };

  // 8.2 显示右上角菜单
  document.querySelector('#showOptionMenu').onclick = function () {
    wx.showOptionMenu();
  };

  // 8.3 批量隐藏菜单项
  document.querySelector('#hideMenuItems').onclick = function () {
    wx.hideMenuItems({
      menuList: [
        'menuItem:readMode', // 阅读模式
        'menuItem:share:timeline', // 分享到朋友圈
        'menuItem:copyUrl' // 复制链接
      ],
      success: function (res) {
        alert('已隐藏“阅读模式”，“分享到朋友圈”，“复制链接”等按钮');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
  };

  // 8.4 批量显示菜单项
  document.querySelector('#showMenuItems').onclick = function () {
    wx.showMenuItems({
      menuList: [
        'menuItem:readMode', // 阅读模式
        'menuItem:share:timeline', // 分享到朋友圈
        'menuItem:copyUrl' // 复制链接
      ],
      success: function (res) {
        alert('已显示“阅读模式”，“分享到朋友圈”，“复制链接”等按钮');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
  };

  // 8.5 隐藏所有非基本菜单项
  document.querySelector('#hideAllNonBaseMenuItem').onclick = function () {
    wx.hideAllNonBaseMenuItem({
      success: function () {
        alert('已隐藏所有非基本菜单项');
      }
    });
  };

  // 8.6 显示所有被隐藏的非基本菜单项
  document.querySelector('#showAllNonBaseMenuItem').onclick = function () {
    wx.showAllNonBaseMenuItem({
      success: function () {
        alert('已显示所有非基本菜单项');
      }
    });
  };

  // 8.7 关闭当前窗口
  document.querySelector('#closeWindow').onclick = function () {
    wx.closeWindow();
  };

  // 9 微信原生接口
  // 9.1.1 扫描二维码并返回结果
  document.querySelector('#scanQRCode0').onclick = function () {
    wx.scanQRCode({
      desc: 'scanQRCode desc'
    });
  };
  // 9.1.2 扫描二维码并返回结果
  document.querySelector('#scanQRCode1').onclick = function () {
    wx.scanQRCode({
      needResult: 1,
      desc: 'scanQRCode desc',
      success: function (res) {
        alert(JSON.stringify(res));
      }
    });
  };

  // 10 微信支付接口
  // 10.1 发起一个支付请求
  document.querySelector('#chooseWXPay').onclick = function () {
    wx.chooseWXPay({
      timestamp: 1414723227,
      nonceStr: 'noncestr',
      package: 'addition=action_id%3dgaby1234%26limit_pay%3d&bank_type=WX&body=innertest&fee_type=1&input_charset=GBK&notify_url=http%3A%2F%2F120.204.206.246%2Fcgi-bin%2Fmmsupport-bin%2Fnotifypay&out_trade_no=1414723227818375338&partner=1900000109&spbill_create_ip=127.0.0.1&total_fee=1&sign=432B647FE95C7BF73BCD177CEECBEF8D',
      paySign: 'bd5b1933cda6e9548862944836a9b52e8c9a2b69'
    });
  };

  // 11.3  跳转微信商品页
  document.querySelector('#openProductSpecificView').onclick = function () {
    wx.openProductSpecificView({
      productId: 'pDF3iY0ptap-mIIPYnsM5n8VtCR0'
    });
  };

  // 12 微信卡券接口
  // 12.1 添加卡券
  document.querySelector('#addCard').onclick = function () {
    wx.addCard({
      cardList: [
        {
          cardId: 'pDF3iY9tv9zCGCj4jTXFOo1DxHdo',
          cardExt: '{"code": "", "openid": "", "timestamp": "1418301401", "signature":"64e6a7cc85c6e84b726f2d1cbef1b36e9b0f9750"}'
        },
        {
          cardId: 'pDF3iY9tv9zCGCj4jTXFOo1DxHdo',
          cardExt: '{"code": "", "openid": "", "timestamp": "1418301401", "signature":"64e6a7cc85c6e84b726f2d1cbef1b36e9b0f9750"}'
        }
      ],
      success: function (res) {
        alert('已添加卡券：' + JSON.stringify(res.cardList));
      }
    });
  };

  // 12.2 选择卡券
  document.querySelector('#chooseCard').onclick = function () {
    wx.chooseCard({
      cardSign: '97e9c5e58aab3bdf6fd6150e599d7e5806e5cb91',
      timestamp: 1417504553,
      nonceStr: 'k0hGdSXKZEj3Min5',
      success: function (res) {
        alert('已选择卡券：' + JSON.stringify(res.cardList));
      }
    });
  };

  // 12.3 查看卡券
  document.querySelector('#openCard').onclick = function () {
    alert('您没有该公众号的卡券无法打开卡券。');
    wx.openCard({
      cardList: [
      ]
    });
  };

  var shareData = {
    title: '五水共治小团队 微信JS-SDK DEMO',
    desc: '微信JS-SDK',
    link: 'http://2.wushuigongzhi.sinaapp.com/wsgz-wbs/index.html',
    imgUrl: 'http://mmbiz.qpic.cn/mmbiz/icTdbqWNOwNRt8Qia4lv7k3M9J1SKqKCImxJCt7j9rHYicKDI45jRPBxdzdyREWnk0ia0N5TMnMfth7SdxtzMvVgXg/0'
  };
  wx.onMenuShareAppMessage(shareData);
  wx.onMenuShareTimeline(shareData);
});

wx.error(function (res) {
  alert(res.errMsg);
});
</script>
<script src="http://demo.open.weixin.qq.com/jssdk/js/api-6.1.js?ts=1420774989"> </script>
</html>