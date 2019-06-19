<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Question</title>

    <script>
        function readURL(input){
            if(input.files && input.files[0]){
                var imageTagID = input.getAttribute("targetID");
                var reader = new FileReader();
                reader.onload = function (e) {
                var img = document.getElementById(imageTagID);
                img.setAttribute("src", e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>
<body>
    <h1>題目建立</h1>

    <?php
        session_start();
        if(isset($_SESSION['levelName']))
            $levelName=$_SESSION['levelName'];
        else
            $levelName="";
    ?>

    <form action="EditQuestion.php" method="post" Enctype="multipart/form-data">
        <table>
            <tr>
                <td>關卡</td>
                <td><input type="text" name="level" value="<?php echo $levelName;?>" size="35"></td>
            </tr>
            <tr>
                <td>題目</td>
                <td><input type="text" name="question" size="35"></td>
            </tr>
            <tr>
                <td>選項1</td>
                <td><input type="text" name="choice1" size="35"></td>
            </tr>
            <tr>
                <td>選項2</td>
                <td><input type="text" name="choice2" size="35"></td>
            </tr>
            <tr>
                <td>選項3</td>
                <td><input type="text" name="choice3" size="35"></td>
            </tr>
            <tr>
                <td>選項4</td>
                <td><input type="text" name="choice4" size="35"></td>
            </tr>
            <tr>
                <td>答案</td>
                <td><input type="number" name="answer" value="1" min="1" max="4" ></td>
            </tr>
            <tr>
                <td>正解pic</td>
                <td><input type="file" name="Image1" onchange="readURL(this)" targetID="preview_progressbarTW_img1" accept="image/gif, image/jpeg, image/png"/></td>
            </tr>
            <tr>
                <td colspan="2"><img id="preview_progressbarTW_img1" src="#" ,width="450" height="300" /></td>
            </tr>
            <tr>
                <td>錯誤pic</td>
                <td><input type="file" name="Image2" onchange="readURL(this)" targetID="preview_progressbarTW_img2" accept="image/gif, image/jpeg, image/png" ></td>
            </tr>
            <tr>
                <td colspan="2"><img id="preview_progressbarTW_img2" src="#" ,width="450" height="300" /></td>
            </tr>
        </table>
        <br/>
        <input type="submit" name="send" value="建立題目">
        <input type="submit" name="returnHome" value="返回首頁">
    </form>

    <?php

        //建立題目
        if (isset($_POST["send"])) {
            if($_POST["level"]=="" || $_POST["question"] == "" || 
                $_POST["choice1"] == "" || $_POST["choice2"] == "" || 
                $_POST["choice3"] == "" || $_POST["choice4"] == "" || 
                $_POST["answer"] == ""){
                echo "全部資料皆要填寫，不可空白";
            }
            else{
                if(isset($_FILES["Image1"]["name"]))
                    $img1=$_FILES["Image1"]["name"];
                if(isset($_FILES["Image2"]["name"]))
                    $img2=$_FILES["Image2"]["name"];
                
                //新增資料夾
                $tmp_file_path="pic/";
                if(is_dir($tmp_file_path)){}
                else{
                    mkdir($tmp_file_path,0700);
                }
                //圖片存到資料夾
                move_uploaded_file($_FILES["Image1"]["tmp_name"],"pic/".$_FILES["Image1"]["name"]);
                move_uploaded_file($_FILES["Image2"]["tmp_name"],"pic/".$_FILES["Image2"]["name"]);
                
                // 開啟MySQL的資料庫連接
                $link = @mysqli_connect("localhost","root","") 
                        or die("無法開啟MySQL資料庫連接!<br/>");
                mysqli_select_db($link, "Question");  // 選擇資料庫
                
                // 建立新增記錄的SQL指令字串
                $sql ="INSERT INTO question (Level, Question, Answer, ";
                $sql.="choice1,choice2,choice3,choice4,correctPic,wrongPic) VALUES ('";
                $sql.=$_POST["level"]."','".$_POST["question"]."','";
                $sql.=$_POST["answer"]."','".$_POST["choice1"]."','".$_POST["choice2"]."','"
                    .$_POST["choice3"]."','".$_POST["choice4"]."','".$img1."','".$img2."')";

                //送出UTF8編碼的MySQL指令
                mysqli_query($link, 'SET NAMES utf8'); 
                if ( mysqli_query($link, $sql) ) // 執行SQL指令
                    echo "<script> alert('新增成功!'); </script>";
                else
                    echo "<script> alert('新增失敗...'); </script>";
                mysqli_close($link);      // 關閉資料庫連接	

                $_SESSION['levelName']=$_POST['level'];
            }
        }
        //返回首頁
        if(isset($_POST["returnHome"])){
            header("Location: ./Home.php"); 
        }
    ?>
</body>
</html>