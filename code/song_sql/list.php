<?php

// PHP 的价值：
// 通过执行某些PHP代码获取到指定的数据，填充到HTML的指定位置

//连接数据库
$conn = mysqli_connect('localhost','root','123456','mysql');

//判断数据库是否连接成功
if(!$conn){
  exit('<h1>数据库连接失败</h1>');
}

//获取需要的数据
$content = mysqli_query($conn,'select * from song;');

//判断查取的数据是否成功
if(!$content){
  exit('<h1>数据获取失败</h1>');
}

//遍历结果集存储数据
while($item = mysqli_fetch_assoc($content)){
  $data[] = $item;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>音乐列表</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">音乐列表</h1>
    <hr>
    <div class="mb-3">
      <a href="add.php" class="btn btn-secondary btn-sm">添加</a>
    </div>
    <table class="table table-bordered table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th class="text-center">标题</th>
          <th class="text-center">歌手</th>
          <th class="text-center">海报</th>
          <th class="text-center">音乐</th>
          <th class="text-center">操作</th>
        </tr>
      </thead>
      <tbody class="text-center">
      <?php foreach ($data as $value): ?>
        <div>
          
             
          
        </div>
         <tr>
          <td class="align-middle"><?php echo $value['title'] ?></td>
          <td class="align-middle"><?php echo $value['songer'] ?></td>
          <td class="align-middle">
            
              <img src="<?php echo $value['photo']; ?>" alt="">
            
          </td>
          <td class="align-middle"><audio src="<?php echo $value['music'] ?>" controls></audio></td>
          <td class="align-middle"><a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $value['id'] ?>">删除</a></td>
        </tr>
       <?php endforeach ?> 
        
        
      </tbody>
    </table>
  </div>
</body>
</html>
