<?php 
if(empty($_COOKIE['num']) || empty($_POST['num'])){
//产生一个随机数
  $num = rand(0,100);

//用COOkie存储这个随机数
  setcookie('num',$num);
} else {
 //获取用户上传的数据
// $count = $_POST['num'];

  //记录用户猜了多少次数据
  $count = empty($_COOKIE['count']) ? 0 : (int)$_COOKIE['count'];

  if($count < 10){
  //获取两个数字的差值
    $result = (int)$_POST['num'] - (int)$_COOKIE['num'];
    
    if($result > 0){
      $message = '输入的数太大了';
      echo $_POST['num'];
    } elseif($result < 0) {
      $message = '输入的数太小了';
      echo $_POST['num'];
    } else {
      $message = '答对了';
      setcookie('num');
      setcookie('count');
    }

    setcookie('count', $count + 1);
  }else {
    $message = '游戏结束';
    setcookie('num');
    setcookie('count');
  }


}

 




 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个0~100的数字，你需要在仅有的10机会之内猜对它。</p>
  <?php if (isset($message)): ?>
    <p><?php echo $message ?></p>
  <?php endif ?>
  <form action="index.php" method="post">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
  </form>
</body>
</html>