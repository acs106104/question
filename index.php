<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <center>
    <h1>Welcome</h1>
    <!--顯示當前時間-->
    <div id="linkweb">
        <script>
            setInterval("linkweb.innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);
        </script>
    </div>
    <br/>
    <!--建立表單-->
    <form action="index.php" method="post">
        <!--創建題目-->
        <input type="submit" value="管理者" name="Edit" style="font-size:16px;">
        <!--開始回答問題-->
        <input type="submit" value="開始挑戰" name="Answer" style="font-size:16px;">
    </form>

    <?php
        //打開資料庫
        $link = @mysqli_connect("localhost","root","ting813813")
        or die("無法開啟MySQL資料庫連接!<br/>");

        mysqli_select_db($link,"Question");

        $result = mysqli_query($link,"SELECT * FROM question");
        //目前題庫題數
        $num_rows = mysqli_num_rows($result);

        if(isset($_POST["Edit"])){
            header("Location: ./Admin/AdminCheck.php"); 
        }
        else if(isset($_POST["Answer"])){
            if($num_rows==0)
                echo "<script> alert('尚未建立題目'); </script>";
            else
                header("Location: ./Play"); 
        }
    ?>
    </center>
</body>
</html>