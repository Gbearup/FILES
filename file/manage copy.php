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
        .item{
            width:200px;
        }
        .item img{
            width:100%;
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

// 用來檢查檔案是否存在於表單中，即檢查是否有使用者選擇檔案並提交。如果檔案存在（即有使用者上傳檔案），則會執行內部的代碼區塊。
if(isset($_FILES['img'])){
if($_FILES['img']['error']==0){

    move_uploaded_file($_FILES['img']['tmp_name'],"./files/".$_FILES['img']['name']);

}else{

    echo "上傳失敗，請檢查檔案格式或是大小是否符合規定";
}
}
?>
<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
<?php
$dirpath="./files";

$items=scandir($dirpath);
$items=array_diff($items,array('.','..'));

foreach($items as $file){
    echo "<div>";
    echo "<img src='{$dirpath}/{$file}'>";
    echo "</div>";


}


?>




<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->




</body>
</html>