<?php
// 设置上传文件的目录
$target_dir = "/www/wwwroot/chinjua.net/sc/";

// 检查用户是否上传了文件
if(isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // 获取文件名和文件路径
    $filename = basename($file["name"]);
    $target_file = $target_dir . $filename;

    // 检查文件是否已经存在
    if (file_exists($target_file)) {
        echo "文件已经存在！";
    } else {
        // 将文件保存到服务器
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "文件上传成功！";
             echo "文件路径：<a href='" . $filename . "'>" . $target_file . "</a>";
        } else {
            echo "文件上传失败！";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>文件上传</title>
</head>
<body>
    <center>
    <h1>上传文件</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <p><input type="file" name="file"></p>
        <p><input type="submit" value="上传"></p>
    </form>
    </center>
</body>
</html>
