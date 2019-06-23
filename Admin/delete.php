<?php
        //打開資料庫
        $link = @mysqli_connect("localhost","root","ting813813")
        or die("無法開啟MySQL資料庫連接!<br/>");
        mysqli_query($link, 'SET NAMES utf8');//中文顯示問題

        mysqli_select_db($link,"Question");

        $result = mysqli_query($link,"SELECT * FROM question");
        $check ="SELECT * FROM question WHERE Question="."'".$_GET['Q']."'";
        $data=mysqli_query($link,$check);
        $row=mysqli_fetch_assoc($data);

        //刪除本地存取照片
        $file_delete1="./pic/".$row['correctPic'];
        $file_delete2="./pic/".$row['wrongPic'];
        unlink($file_delete1); 
        unlink($file_delete2); 

        $sql ="DELETE FROM question WHERE Question="."'".$_GET['Q']."'";  //刪除資料

        mysqli_query($link,$sql)or die ("無法刪除!!!".mysql_error()); //執行sql語法
        
        mysql_close($link); //關閉資料庫連結
        
        echo "<script> alert('刪除成功!'); </script>";
        header("location:ShowQuestion.php");  //回index.php
?>