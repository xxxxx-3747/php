<?php

// 接收要删除的数据 ID
// 如果要删除的数据不存在，则跳出
if(empty($_GET['id'])){
	exit('<h1>没有这个要删除的数据</h1>');
}

$id = $_GET['id'];

//连接数据库
$conn = mysqli_connect('localhost','root','123456','user');

if(!$conn){
	exit('<h1>数据库连接失败</h1>');
}
//判断数据库是否连接成功
$query = mysqli_query($conn,'delete from user_info where xh = ' . $id . ';');

//查询数据
if(!$query){
	exit('<h1>删除数据失败</h1>');
}
//查看影响的行数
$col = mysqli_affected_rows($conn);

var_dump($col);



header('Location: index.php');
