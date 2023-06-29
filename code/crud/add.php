<?php

// function add_user() {
//   // 验证非空
//   if (empty($_POST['name'])) {
//     $GLOBALS['error_message'] = '请输入姓名';
//     return;
//   }

//   if (!(isset($_POST['gender']) && $_POST['gender'] !== '-1')) {
//     $GLOBALS['error_message'] = '请选择性别';
//     return;
//   }

//   if (empty($_POST['birthday'])) {
//     $GLOBALS['error_message'] = '请输入日期';
//     return;
//   }

//   // 取值
//   $name = $_POST['name'];
//   $gender = $_POST['gender'];
//   $birthday = $_POST['birthday'];

//   // 接收文件并验证
//   if (empty($_FILES['avatar'])) {
//     $GLOBALS['error_message'] = '请上传头像';
//     return;
//   }

//   $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
//   // => jpg
//   $target = '../uploads/avatar-' . uniqid() . '.' . $ext;

//   if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
//     $GLOBALS['error_message'] = '上传头像失败';
//     return;
//   }

//   $avatar = substr($target, 2);

//   // var_dump($name);
//   // var_dump($gender);
//   // var_dump($birthday);
//   // var_dump($avatar);
//   // 保存

//   // 1. 建立连接
//   $conn = mysqli_connect('localhost', 'root', '123456', 'test');

//   if (!$conn) {
//     $GLOBALS['error_message'] = '连接数据库失败';
//     return;
//   }

//   // var_dump("insert into users values (null, '{$name}', {$gender}, '{$birthday}', '{$avatar}');");
//   // 2. 开始查询
//   $query = mysqli_query($conn, "insert into users values (null, '{$name}', {$gender}, '{$birthday}', '{$avatar}');");

//   if (!$query) {
//     $GLOBALS['error_message'] = '查询过程失败';
//     return;
//   }

//   $affected_rows = mysqli_affected_rows($conn);

//   if ($affected_rows !== 1) {
//     $GLOBALS['error_message'] = '添加数据失败';
//     return;
//   }

//   // 响应
//   header('Location: index.php');
// }
function add_user(){
  //判断头像域是否为空
  if(empty($_FILES['avatar'])){
    $GLOBALS['message'] = '上传的头像域为空';
    return;
  }
  $avatar = $_FILES['avatar'];
  //判断是否上传了头像照
  if($avatar['error'] !== UPLOAD_ERR_OK){
    $GLOBALS['message'] = '上传的头像';
    return;
  }
  //判断头像的照片大小是否合适
  if($avatar['size'] > 1 * 1024 * 1024){
    $GLOBALS['message'] = '上传的头像太大';
    return;
  }
  //判断上传的照片的格式是否正确
  $avatar_source = array('image/png', 'image/jpg', 'image/gif');
  if(array_search($avatar['type'], $avatar_source)){
    $GLOBALS['message'] = '上传的头像文件格式不正确';
    return;
  }
  //判断头像照片是否移动成功
  $target = 'assets/' . uniqid() . '-' . $avatar['name'];
  if(!move_uploaded_file($avatar['tmp_name'], $target)){
    $GLOBALS['message'] = '上传头像失败';
    return;
  }

  //==================================
  //判断是否填写了姓名
  if(empty($_POST['name'])){
    $GLOBALS['message'] = '请填写姓名';
    return;
  }
  $name = $_POST['name'];
  //判断是否选了性别
  if(!(isset($_POST['gender']) && $_POST['gender'] !== '-1')){
    $GLOBALS['message'] = '请选择性别';
    return;
  }
  $gender = $_POST['gender'];
  //判断是否选择了出生年月
  if(empty($_POST['birthday'])){
    $GLOBALS['message'] = '请选择出生年月日';
    return;
  }
  $age = $_POST['birthday'];
  //连接数据库
  $conn = mysqli_connect('localhost','root','123456','user');
  //判断数据库是否连接成功
  if(!$conn){
    exit('<h1>数据库连接失败</h1>');
  }
  //查询数据
  $query = mysqli_query($conn,"insert into user_info values(null,'{$target}','{$name}','{$gender}','{$age}');");
  //判断数据是否查询成功
  if(!$query){
    exit('<h1>数据查询失败</h1>');
  }
  //返回list界面
  header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  add_user();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">添加用户</h1>
    <?php if (!empty($message)): ?>
    <div class="alert alert-warning">
      <?php echo $message; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1">男</option>
          <option value="0">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
