<?php 

session_start();


if(empty($_SESSION['num']) || empty($_GET['num'])){
  //产生一个随机数
  $num = rand(0, 100);
 
  $_SESSION['num'] = $num;
}else {

  //用来记录用户输入的次数
  $count = empty($_SESSION['count']) ? 0 : $_SESSION['count'];
  //$_SESSION['count'] = $count;

  if($count<10){

    $result = $_SESSION['num'] - $_GET['num'];

    if($result > 0){
        $message = '输入的数太小了';
        // echo $_POST['num'];
      } elseif($result < 0) {
        $message = '输入的数太大了';
        // echo $_POST['num'];
      } else {
        $message = '答对了';
        unset($_SESSION['num']);
        unset($_SESSION['count']);
      }

      $_SESSION['count'] = $count + 1 ;
      // echo $_SESSION['num'];
      // echo '============';
      // echo $_SESSION['count'];
      // echo '============';
      // echo $count;

  }else {
    $message = '游戏结束';
    unset($_SESSION['num']);
    unset($_SESSION['count']);
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
  <form action="session.php" method="get">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
  </form>
</body>
</html>