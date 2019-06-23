<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Level Two</title>
    <style>
        body {
            background-image:url("./pic/backgroundPic.png");
            background-repeat:no-repeat;
            background-size: cover;
        }
    </style>
    <script> 
        function show(tag){ 
            var light=document.getElementById(tag); 
            var fade=document.getElementById('fade'); 
            light.style.display='block'; 
            fade.style.display='block'; 
        } 
        function hide(tag){ 
            var light=document.getElementById(tag); 
            var fade=document.getElementById('fade'); 
            light.style.display='none'; 
            fade.style.display='none'; 
        } 
    </script> 
    <link rel="stylesheet" type="text/css" href="styleEnd.css">
</head>
<body>
    <center>
    <br/>
    <b><I><font size="6">21th一迎</font></I></b>
    <br/><br/><br/><br/>
    <b><font size="6" color="red" style="text-shadow:0px 0px 15px #FFC400;">
    恭喜你答對所有題目啦！</font></b>
    <h3>うぷぷぷぷ～<br/>
    這張CG就送給你吧！<br/><br/>
    <font><u><I>記得要拿給工作人員看來集章唷！</I></u></font><br/>
    <br/>
    </h3>
    <h3><font color="red" size="5">※血腥畫面警告※</font><br/>
    不敢看血腥畫面者<br/>
    直接拿此頁給工作人員看就行囉！</h3>

    <button class="button button1" onclick="show('light1')"><b>要看CG請按此</b></button>
    </center>

        <!--correct-->
        <div id="light1" class="white_content"> 
            <div class="con"> 
                <img src="./pic/cgPic.png" width="380" />
            </div> 
            <div class="close"><a href="javascript:void(0)" onclick="hide('light1');location.replace('');">close</a></div> 
        </div> 
        <div id="fade" class="black_overlay"></div> 
</body>
</html>