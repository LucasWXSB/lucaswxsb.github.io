<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>科学计算器</title>
    <meta charset="utf-8"/>
    <meta name="csdn-baidu-search" content="小闪工作室">
    <meta name="description"content="小闪工作室">
    <meta name="keywords" content="qierkang,shutiao,erkang,xyqierkang@163.com"/>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1, minimum-scale=1,maximum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="full-screen" content="yes"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <meta name="screen-orientation" content=""/>
    <meta name="x5-orientation" content="">
    <meta name="x5-page-mode" content="app">
    <link href="css/button.css" rel="stylesheet" type="text/css">
</head>


<style type="text/css">
.a_cal{
background:#1207a978;
width:100%;
height:100%;
border:1.5px solid black;
border-radius:5px;
text-align:center;
margin:  0 auto;
}

.input {
 border: none;
 border-radius: 15px;
 padding: 15px;
 background-color: #e8e8e8;
 box-shadow: 6px 6px 12px #ffffff,
             -6px -6px 12px #c5c5c5;
 font-size: medium;
 font-weight: bold;
 max-width: 200px;
}

.input:focus {
 outline-color: white;
 place-content: "Enter your message!";
}

.a1_cal{
background:snow;
width:100%;
height:300px;
border:1px solid dark;
display:flex;
display:-wibkit-flex;
flex-direction:row;
flex-wrap:wrap;
justify-content:center;
}
 
.bt{
width:50px;
height:50px;
border-radius:10px;
background:black;
color:#ffffff;
}
.dis_cal{
width:100%;
height:50px;
background:snow;
border-radius:5px;
border:1.5px solid black;
}
 
 
</style>
 
<div class="a_cal">
	 <h2>科学计算器</h2>
	 <span id="dis_time" style="color:#fbfbfb;">教你学习flex布局</span>
     <div class='a1_cal'>
	        <div id="disa" class='dis_cal'></div>
			<button class="bt" onclick="djc()">←</button>
			<button class="bt"onclick="djce()" >ce</button>
			<button class="bt" onclick="djTime()">time</button>
			<button class="bt" onclick="djMusic()">music</button>
		    <button class="bt" onclick="dj(this)">1</button>
		    <button class="bt"  onclick="dj(this)">2</button>
		    <button class="bt" onclick="dj(this)">3</button>
		    <button class="bt" onclick="dj(this)">4</button>
		    <button class="bt" onclick="dj(this)">5</button>
		    <button class="bt" onclick="dj(this)">6</button>
		    <button class="bt" onclick="dj(this)">7</button>
			<button class="bt" onclick="dj(this)">8</button>
			<button class="bt" onclick="dj(this)">9</button>
			<button class="bt" onclick="dj(this)">0</button>
			<button class="bt" onclick="dj(this)">.</button>
			<button class="bt" onclick="dj(this)">+</button>
			<button class="bt" onclick="dj(this)">-</button>
			<button class="bt" onclick="dj(this)">*</button>
			<button class="bt" onclick="dj(this)">/</button>
			<button class="bt" onclick="cal()">=</button>
	</div>
</div>
<script src="./jsq.js"></script>
<script type="text/javascript">
var audio=new Audio();
audio.src=adu;
var musicFlag=true;
var disFlag=false;
 
 
setInterval(function(){
if(disFlag){
document.getElementById("dis_time").innerText=new Date().toLocaleString();
}else{
document.getElementById("dis_time").innerText="教你学习flex布局";
}
 
},1000);
function djMusic(){
   musicFlag=!musicFlag;
   if(musicFlag){
   audio.play();
   }
}
 
 
function djTime(){
  disFlag=!disFlag;
 
 
}
function djc(){
   if(musicFlag){
   audio.play();
   }
var dis_d=document.getElementById("disa").innerText
  if(dis_d){
     if(document.getElementById("disa").innerText=="error"){
        document.getElementById("disa").innerText="";
      }else{
        document.getElementById("disa").innerText=dis_d.slice(0,dis_d.length-1);
      }
  }
}
function djce(){
   if(musicFlag){
     audio.play();
   }
   document.getElementById("disa").innerText="";
}
 
function dj(e){
   if(musicFlag){
     audio.play();
   }
if(document.getElementById("disa").innerText=="error"){
     document.getElementById("disa").innerText=e.innerText;
    }else{
     document.getElementById("disa").innerText+=e.innerText;
    }
}
function cal(){
   if(musicFlag){
      audio.play();
   }
      var dis_d=document.getElementById("disa").innerText;
    if(dis_d){
    try{
       document.getElementById("disa").innerText=eval(dis_d);
       }catch(e){
       document.getElementById("disa").innerText="error";
  
      }
   }
}
 
 
 
</script>