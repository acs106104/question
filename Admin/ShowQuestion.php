<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Question</title>
</head>
<body>
    <center>
    <h1>題庫</h1>

    <?php
        //打開資料庫
        $link = @mysqli_connect("localhost","root","ting813813")
        or die("無法開啟MySQL資料庫連接!<br/>");
        mysqli_query($link, 'SET NAMES utf8');//中文顯示問題

        mysqli_select_db($link,"Question");

        $result = mysqli_query($link,"SELECT * FROM question");

        //目前題庫題數
        $num_rows = mysqli_num_rows($result);
    ?>

    共有&nbsp<font color="red"><?echo $num_rows;?></font>&nbsp題
    &nbsp&nbsp&nbsp&nbsp&nbsp<a href="../index.php">HOME</a>
    &nbsp&nbsp&nbsp&nbsp&nbsp<a href="AdminGui.php">返回管理者介面</a>
    <br/>
    <br/>

    <?php for ($i=0;$i<$num_rows;$i++) {
        $row = mysqli_fetch_assoc($result); //將陣列以欄位名索引  
    ?>
        <table border="1" width="345">
        <tr>
            <td colspan="4" bgcolor="#90CAF9"><b>Level</b>:&nbsp <?echo $row['Level'];?></td>
        </tr>
        <tr>
            <td colspan="4"><font color="blue"><b>Question</b></font>:&nbsp <?echo $row['Question'];?></td>
        </tr>
        <tr>
            <td bgcolor="#F8BBD0"><b>選項 1</b></td>
            <td><?echo $row['choice1'];?></td>
            <td bgcolor="#F8BBD0"><b>選項 2</b></td>
            <td><?echo $row['choice2'];?></td>
        </tr>
        <tr>
            <td bgcolor="#F8BBD0"><b>選項 3 &nbsp</b></td>
            <td><?echo $row['choice3'];?></td>
            <td bgcolor="#F8BBD0"><b>選項 4 &nbsp</b></td>
            <td><?echo $row['choice4'];?></td>
        </tr>
        <tr>
            <td><font color="blue"><b>Answer</b></font></td>
            <?$check="choice".$row['Answer'];?>
            <td colspan="3"><?echo "選項".$row['Answer']."->"."<font color=\"red\">".$row[$check]."</font>";?></td>
        </tr>
        <tr>
            <td colspan="4" bgcolor="#90CAF9">正確pic</td>
        </tr>
        <tr>
            <td colspan="4"><?php if($row['correctPic']!=null){echo "<img alt=無照片 src=\"./pic/".$row['correctPic']."\" width150 height=100/>";}?></td>
        </tr>
        <tr>
            <td colspan="4" bgcolor="#90CAF9">錯誤pic</td>
        </tr>
        <tr>
            <td colspan="4"><?php if($row['wrongPic']!=null){echo "<img alt=無照片 src=\"./pic/".$row['wrongPic']."\" width150 height=100/>";} else echo "無";?></td>
        </tr>
        <tr>
            <td colspan="4" bgcolor="yellow"><center><a href="delete.php?Q=<? echo $row['Question']; ?>" onclick="return confirm('確定要刪除這筆資料？');">刪除</a></center></td>
        </tr>

    </table>
    <br/>
    <hr/>
    <br/>
    <?}?> 

    <a href="../index.php">HOME</a>
    &nbsp&nbsp&nbsp&nbsp&nbsp<a href="AdminGui.php">返回管理者介面</a> 

    </center>
</body>
</html>