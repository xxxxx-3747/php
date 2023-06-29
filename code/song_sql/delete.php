<?php

//判断是否有这个数据
if(empty($_GET['id'])){
	exit('<h1>没有这个要删除的元素</h1>');
}

$id = $_GET['id']; 

//连接数据库
$conn = mysqli_connect('localhost','root','123456','mysql');

//判断数据库是否已连接成功
if(!$conn){
	exit('<h1>数据库连接失败</h1>');
}

//获取数据
$query = mysqli_query($conn,"delete from song where id = '{$id}'");

//判断是否查询成功
if(!$query){
	exit('<h1>查询数据失败</h1>');
}

//获取受影响的行数
$affect = mysqli_affected_rows($conn);
//打印受影响的行数
//var_dump($affect);
//
//关闭连接
mysqli_close($conn);

//返回list页面
header('Location: list.php');

?>
