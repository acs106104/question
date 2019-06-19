<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Gui</title>
</head>
<body>
    <center>
    <h1>管理者介面</h1>
    <!--提醒-->
    <font color="red">你可以執行以下動作</font>
    <!--建立登入表單-->
    <form action="AdminGui.php" method="post">
        <br/><input type="submit" name="edit" value="出題" style="width:100px;font-size:16px;">
        <input type="submit" name="show" value="查看題庫" style="width:100px;font-size:16px;"><br/>
    </form>
    <br/>
    <h3><a href="../index.php">HOME</a></h3>

    <?php
        if(isset($_POST["edit"]))
            header("Location: ./EditQuestion.php"); 
        else if(isset($_POST["show"]))
            header("Location: ./ShowQuestion.php"); 
    ?>
    </center>
</body>
</html>