<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Check</title>
</head>
<body>
    <center>
    <h1>管理者登入</h1>
    <!--提醒-->
    <font color="red">只有管理者可以出題</font>
    <!--建立登入表單-->
    <form action="AdminCheck.php" method="post">
        <br/>帳號：<input type="text" name="account" size="20" style="border-width:3px;font-size:16px;"><br/>
        密碼：<input type="text" name="password" size="20" style="border-width:3px;font-size:16px;"><br/><br/>
        <input type="submit" name="login" value="確認" style="border-width:3px;width:250px;font-size:16px;">
    </form>
    <br/>
    <h3><a href="../index.php">HOME</a></h3>

    <?php
        if(isset($_POST["login"])){
            //帳號、密碼
            $account=$_POST["account"];
            $password=$_POST["password"];

            if($account=="" || $password == ""){
                echo "<script> alert('帳號或密碼不可空白!'); </script>";
            }
            else if($account=="admin1234" && $password=="1234"){
                echo "<script> alert('管理者確認,可開始建立題目!'); </script>";
                header("Location: ./AdminGui.php"); 
            }
            else
                echo "<script> alert('帳號或密碼輸入錯誤!'); </script>";
        }
    ?>
    </center>
</body>
</html>