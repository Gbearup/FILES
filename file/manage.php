<?php
/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            width:500px;
            margin:20px auto;
        }
        td{
           padding:5px 10px;
        }

        td img{
            width:120px;
        }


    </style>
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
<?php

include_once "function.php";

// echo $_POST['name'];
// echo "<br>";
// dd($_FILES);


if(isset($_FILES['filename'])){
    if($_FILES['filename']['error']==0){
        $filename=time() . $_FILES['filename']['name']; /**加上時間搓讓檔名確定不會重複 */
        move_uploaded_file($_FILES['filename']['tmp_name'],"./files/".$filename);
        $desc=$_POST['desc'];
        insert("imgs",['filename'=>$filename,'desc'=>$desc]);

    }else{
        echo "上傳失敗，請檢查檔案格式或是大小是否符合規定";
    }
}
?>
<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
<?php

$rows=all('imgs');
echo "<table>";
foreach($rows as $file){
    echo "<tr>";
    echo " <td><img src='files/{$file['filename']}'></td>";
    echo " <td>{$file['desc']}</td>";
    echo " <td><a href='del_img.php?id={$file['id']}'>刪除</a></td>";
    echo " <td><a href='re_upload.php?id={$file['id']}'>重新上傳</a></td>";
    echo "</tr>";
}
echo "</table>";
?>





<!-- 指定檔案所在的目錄，這裡是當前目錄下的 'files' 目錄 -->
<!-- scandir() 函數用來獲取指定目錄中的所有檔案和目錄，並返回一個陣列 -->





<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->




</body>
</html>