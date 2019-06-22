<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Start</title>
    <style>
        body {
            background-image:url("./pic/backgroundPic.png");
            background-repeat:no-repeat;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
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
        function jump(now,numRow){
            if(now>numRow){
                location.replace('end.php');
            }
            else
                location.replace('start.php?Q='+now);
        }
    </script> 
</head>
<body>
    <center>
    <br/>
    <b><I><font size="6">20th二迎</font></I></b>
    <br/><br/>
    <!--題目開始-->

    <?php
        //打開資料庫
        $link = @mysqli_connect("localhost","root","")
        or die("無法開啟MySQL資料庫連接!<br/>");
        mysqli_query($link, 'SET NAMES utf8');//中文顯示問題

        mysqli_select_db($link,"Question");

        $result = mysqli_query($link,"SELECT * FROM question");
    ?>

    <?php
        $now=$_GET['Q']-1;
    ?>
    <?php
        $check ="SELECT * FROM question WHERE Level="."'"."20th二迎"."'"."limit ".$now.",1";
        $data=mysqli_query($link,$check);
        $row=mysqli_fetch_assoc($data);

        //目前題庫題數
        $checkTotal ="SELECT * FROM question WHERE Level="."'"."20th二迎"."'";
        $dataTotal=mysqli_query($link,$checkTotal);
        $num_rows = mysqli_num_rows($dataTotal);

        $answer=$row['Answer'];
        $which="choice".$answer;
        $ans=$row[$which];
    ?>
        <br/><br/>
        <b><font size="5">Q:<?echo $row['Question']?></font></b>
        <br/><br/>
        <button class="button button1" onclick="<?php PHPfunction($row['choice1']) ?>"><? echo $row['choice1'];?></button><br/>
        <button class="button button2" onclick="<?php PHPfunction($row['choice2']) ?>"><? echo $row['choice2'];?></button><br/>
        <button class="button button3" onclick="<?php PHPfunction($row['choice3']) ?>"><? echo $row['choice3'];?></button><br/>
        <button class="button button4" onclick="<?php PHPfunction($row['choice4']) ?>"><? echo $row['choice4'];?></button><br/>
        
        
        <?php
            function PHPfunction($check){
                global $ans;
                if($check==$ans){
                    echo "show('light1');";
                }
                else
                    echo "show('light2');";
            }
        ?>
        
        <!--correct-->
        <div id="light1" class="white_content"> 
                <div class="con"> 
                    <?php 
                        if($row['correctPic']!=null){
                            echo "<img alt=無照片 src=\"../../Admin/pic/".$row['correctPic']."\" height=150 />";
                        } 
                        else echo "無";
                    ?>
                </div> 
                <div class="close"><a href="javascript:void(0)" 
                onclick="hide('light1');jump('<?echo ($now+2);?>','<?echo $num_rows;?>');"
                >close</a></div> 
        </div> 
        <div id="fade" class="black_overlay"></div> 
        <!--wrong-->
        <div id="light2" class="white_content"> 
                <div class="con"> 
                    <?php if($row['wrongPic']!=null){echo "<img alt=無照片 src=\"../../Admin/pic/".$row['wrongPic']."\" height=150 />";} else echo "無";?>
                </div> 
                <div class="close"><a href="javascript:void(0)" onclick="hide('light2')">close</a></div> 
        </div> 
        <div id="fade" class="black_overlay"></div> 

    </center>
</body>
</html>