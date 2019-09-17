<?php

$json_string = file_get_contents('unused_data.json');  
$data = json_decode($json_string);  
	//var_dump ($data->data[0]);
$thisKeyword = '';
$thisPrio='';
$thisStatus='';
$valueString = '';
foreach ( $data->data as $obj)	
{
	//var_dump($obj->user);
	$thisKeyword =$obj->keyword;
	$thisPrio=$obj->prio;
	$thisStatus=$obj->status;




$dbhost = '127.0.0.1:3306';  // mysql服务器主机地址
$dbuser = 'homestead';            // mysql用户名
$dbpass = 'secret';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

//$sql = "INSERT INTO crm.ticket".
//        "(keyword,prio,user,status) ".
//        "VALUES ". "('$thisKeyword','$thisPrio','$thisUser','$thisStatus')";
		
$sql = "INSERT INTO weibo.tickets".
        "(content,prio,status) ".
        "VALUES ".
		//$valueString;
        "('$thisKeyword','$thisPrio','$thisStatus')";
 
echo PHP_EOL;
echo $sql.PHP_EOL;
	
 
mysqli_select_db( $conn, 'RUNOOB' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
  die('无法插入数据: ' . mysqli_error($conn));
}
echo "数据插入成功\n";

mysqli_close($conn);
}
?>