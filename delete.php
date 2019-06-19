<?php
        //打開資料庫
        $link = @mysqli_connect("localhost","root","")
        or die("無法開啟MySQL資料庫連接!<br/>");
        mysqli_query($link, 'SET NAMES utf8');//中文顯示問題

        mysqli_select_db($link,"Question");

        $result = mysqli_query($link,"SELECT * FROM question");

        echo $_GET['key'];

        $sql ="DELETE FROM question WHERE Question="."'".$_GET['Q']."'";  //刪除資料

        mysqli_query($link,$sql)or die ("無法刪除!!!".mysql_error()); //執行sql語法
        
        mysql_close($link); //關閉資料庫連結
        
        echo "sucess";
        header("location:ShowQuestion.php");  //回index.php
?>