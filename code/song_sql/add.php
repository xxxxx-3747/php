<?php

//header('Content-Type:text/html;charset="GBK"');

// function add() {
//   $data['id'] = uniqid();

//   //判断标题是否为空
//   if(empty($_POST['title'])){
//     $GLOBALS['message'] = '请输入标题名称';
//     return;
//   }

//   $data['title'] = $_POST['title'];

//   //判断歌手是否为空
//   if(empty($_POST['artist'])){
//     $GLOBALS['message'] = '请输入歌手名';
//     return;
//   }

//   $data['artist'] = $_POST['artist'];

//   //==============================================================================
//   //判断海报域是否为空
//   if(empty($_FILES['images'])){
//     $GLOBALS['message'] = '请上传海报文件1';
//     return;
//   }

//   $file_images = $_FILES['images'];

//   //用一个数组装上传的文件的路径
//   $data['images'] = array();
  
//   for($i=0;$i<count($file_images['name']);$i++){
//     //判断上传的海报文件是否有错误
//   if($file_images['error'][$i] !== UPLOAD_ERR_OK){
//     $GLOBALS['message'] = '请上传海报文件2';
//     return;
//   }
//   //判断海报的大小是否合适
//   if($file_images['size'][$i] > 1 * 1024 *1024 ){
//     $GLOBALS['message'] = '上传的海报文件太大';
//     return;
//   }
//   //判断海报的文件格式是否合法
//   $file_images_source = array('image/png', 'image/jpg', 'image/gif');
//   if(array_search($file_images['type'][$i],$file_images_source)){
//     $GLOBALS['message'] = '上传的海报文件格式不对';
//     return;
//   }

//   //判断移动是否成功
//   $target1 = 'uploads/' . uniqid() . '-' . $file_images['name'][$i];
//   var_dump($target1);
//   if(!move_uploaded_file($file_images['tmp_name'][$i], $target1)){
//     $GLOBALS['message'] = '海报移动失败';
//     return;
//   }

//   //移动时的路径
  
//   }
   

  
//   //var_dump($target1);

//   //==============================================================================
//   //上传音乐文件

//   //判断音乐文件域是否为空
//   if(empty($_FILES['source'])){
//     $GLOBALS['message'] = '请上传音乐文件1';
//     return;
//   }
//   //判断上传的音乐文件是否为空
//   $file_source = $_FILES['source'];
//   //var_dump($file_source);
//   if($file_source['error'] !== UPLOAD_ERR_OK){
//     $GLOBALS['message'] = '请上传音乐文件2';
//     return;
//   }
//   //判断上传的音乐文件大小是否合适
//   if($file_source['size'] < 1 * 1024 *1024 ){
//     $GLOBALS['message'] = '上传的音乐文件太小';
//     return;
//   }
//   if($file_source['size'] > 10 * 1024 *1024 ){
//     $GLOBALS['message'] = '上传的音乐文件太大';
//     return;
//   }
//   //判断上传的音乐文件的格式是否合适
//   $file_music_source = array('audio/mp3', 'audio/wma');
//   if(array_search($file_source['type'], $file_music_source)){
//     $GLOBALS['message'] = '上传的音乐文件格式不符合';
//     return;
//   }
//   //判断移动是否成功
//   $target2 = 'uploads/' . uniqid() . '-' . $file_source['name'];
//   if(!(move_uploaded_file($file_source['tmp_name'], $target2))){
//     $GLOBALS['message'] = '上传的音乐文件移动失败';
//     return;
//   }
//   $data['source'] = $target2;

//   //将数据加入原有数据中
//   $json = file_get_contents('data.json');
//   $old = json_decode($json,true);
//   array_push($old,$data);
//   $new = json_encode($old);
//   file_put_contents('data.json', $new);

//   //跳转回列表页
//   //header('Location: list.php');
// }

function add(){
  $id = uniqid();
 // 判断标题是否为空 
 if(empty($_POST['title'])){
  $GLOBALS['message'] = '请添加标题信息';
  return;
 }
 $title = $_POST['title'];
 // 判断歌手名是否为空
 if(empty($_POST['artist'])){
  $GLOBALS['message'] = '请添加标题信息';
  return;
 }
 $artist = $_POST['artist'];
// ==================================
// 判断海报域是否为空
if(empty($_FILES['images'])){
  $GLOBALS['message'] = '海报域为空';
  return;
}
$images = $_FILES['images'];
// 判断是否上传了海报
if($images['error'] !== UPLOAD_ERR_OK){
  $GLOBALS['message'] = '上传的海报文件有错';
  return;
}
// 判断上传的海报大小是否合适
if($images['size'] > 1 * 1024 * 1024){
  $GLOBALS['message'] = '上传的海报太大';
  return;
}
// 判断上传的海报格式是否合适
$images_source = array('image/png', 'image/jpg', 'image/gif');
if(array_search($images['type'],$images_source)){
  $GLOBALS['message'] = '上传的海报文件格式不对';
  return;
}
// 判断海报是否移动成功
// 目标地址
$target1 = 'images/' . uniqid() . '-' . $images['name'];
if(!move_uploaded_file($images['tmp_name'],$target1)){
  $GLOBALS['message'] = '上传的海报文件移动失败';
  return;
}
$images = $target1;

// ==================================
// 判断音乐域是否为空
if(empty($_FILES['source'])){
  $GLOBALS['message'] = '音乐域为空';
  return;
}
$source = $_FILES['source'];
// 判断是否上传了音乐文件
if($source['error'] !== UPLOAD_ERR_OK){
  $GLOBALS['message'] = '上传的音乐文件有错';
  return;
}
// 判断上传的音乐大小是否合适
if($source['size'] < 1 * 1024 * 1024){
  $GLOBALS['message'] = '上传的音乐太小';
  return;
}
if($source['size'] > 10 * 1024 * 1024){
  $GLOBALS['message'] = '上传的音乐太小';
  return;
}
// 判断上传的海报格式是否合适
$music_source = array('audio/mp3', 'audio/wma');
if(array_search($source['type'],$music_source)){
  $GLOBALS['message'] = '上传的音乐文件格式不对';
  return;
}
// 判断海报是否移动成功
// 目标地址
$target2 = 'images/' . uniqid() . '-' . $source['name'];
if(!move_uploaded_file($source['tmp_name'],$target2)){
  $GLOBALS['message'] = '上传的音乐文件移动失败';
  return;
}

$source = $target2;

// var_dump($images);
// var_dump($source);


// 连接数据库
$conn = mysqli_connect('localhost','root','123456','mysql');

//判断数据库是否连接成功
if(!$conn){
  exit('<h1>连接数据可以失败</h1>');
}

//添加数据
$query = mysqli_query($conn,"insert into song values('{$id}','{$title}','{$artist}','{$images}','{$source}');");
if(!$query){
  exit('<h1>修改数据失败</h1>');
}

$affected_rows = mysqli_affected_rows($conn);

  if ($affected_rows !== 1) {
    $GLOBALS['message'] = '添加数据失败';
    return;
  }

//跳转回list页面
header('Location: list.php');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  add();
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>add_music</title>
  <link rel="stylesheet" href="bootstrap.css">
  <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">add_music</h1>
    <hr>

    <?php if (isset($message)): ?>
    <div class="alert alert-danger">
      <?php echo $message; ?>
    </div>
    <?php endif ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="artist">artist</label>
        <input type="text" class="form-control" id="artist" name="artist">
      </div>
      <div class="form-group">
        <label for="images">images</label>
        <!-- multiple 可以让一个文件域多选 -->
        <input type="file" class="form-control" id="images" name="images" accept="image/*" multiple>
      </div>
      <div class="form-group">
        <label for="source">source</label>
        <!-- accept 可以设置两种值分别为  MIME Type / 文件扩展名 -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">commit</button>
    </form>
  </div>
</body>
</html>
