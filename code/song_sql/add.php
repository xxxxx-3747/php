<?php

//header('Content-Type:text/html;charset="GBK"');

// function add() {
//   $data['id'] = uniqid();

//   //ÅÐ¶Ï±êÌâÊÇ·ñÎª¿Õ
//   if(empty($_POST['title'])){
//     $GLOBALS['message'] = 'ÇëÊäÈë±êÌâÃû³Æ';
//     return;
//   }

//   $data['title'] = $_POST['title'];

//   //ÅÐ¶Ï¸èÊÖÊÇ·ñÎª¿Õ
//   if(empty($_POST['artist'])){
//     $GLOBALS['message'] = 'ÇëÊäÈë¸èÊÖÃû';
//     return;
//   }

//   $data['artist'] = $_POST['artist'];

//   //==============================================================================
//   //ÅÐ¶Ïº£±¨ÓòÊÇ·ñÎª¿Õ
//   if(empty($_FILES['images'])){
//     $GLOBALS['message'] = 'ÇëÉÏ´«º£±¨ÎÄ¼þ1';
//     return;
//   }

//   $file_images = $_FILES['images'];

//   //ÓÃÒ»¸öÊý×é×°ÉÏ´«µÄÎÄ¼þµÄÂ·¾¶
//   $data['images'] = array();
  
//   for($i=0;$i<count($file_images['name']);$i++){
//     //ÅÐ¶ÏÉÏ´«µÄº£±¨ÎÄ¼þÊÇ·ñÓÐ´íÎó
//   if($file_images['error'][$i] !== UPLOAD_ERR_OK){
//     $GLOBALS['message'] = 'ÇëÉÏ´«º£±¨ÎÄ¼þ2';
//     return;
//   }
//   //ÅÐ¶Ïº£±¨µÄ´óÐ¡ÊÇ·ñºÏÊÊ
//   if($file_images['size'][$i] > 1 * 1024 *1024 ){
//     $GLOBALS['message'] = 'ÉÏ´«µÄº£±¨ÎÄ¼þÌ«´ó';
//     return;
//   }
//   //ÅÐ¶Ïº£±¨µÄÎÄ¼þ¸ñÊ½ÊÇ·ñºÏ·¨
//   $file_images_source = array('image/png', 'image/jpg', 'image/gif');
//   if(array_search($file_images['type'][$i],$file_images_source)){
//     $GLOBALS['message'] = 'ÉÏ´«µÄº£±¨ÎÄ¼þ¸ñÊ½²»¶Ô';
//     return;
//   }

//   //ÅÐ¶ÏÒÆ¶¯ÊÇ·ñ³É¹¦
//   $target1 = 'uploads/' . uniqid() . '-' . $file_images['name'][$i];
//   var_dump($target1);
//   if(!move_uploaded_file($file_images['tmp_name'][$i], $target1)){
//     $GLOBALS['message'] = 'º£±¨ÒÆ¶¯Ê§°Ü';
//     return;
//   }

//   //ÒÆ¶¯Ê±µÄÂ·¾¶
  
//   }
   

  
//   //var_dump($target1);

//   //==============================================================================
//   //ÉÏ´«ÒôÀÖÎÄ¼þ

//   //ÅÐ¶ÏÒôÀÖÎÄ¼þÓòÊÇ·ñÎª¿Õ
//   if(empty($_FILES['source'])){
//     $GLOBALS['message'] = 'ÇëÉÏ´«ÒôÀÖÎÄ¼þ1';
//     return;
//   }
//   //ÅÐ¶ÏÉÏ´«µÄÒôÀÖÎÄ¼þÊÇ·ñÎª¿Õ
//   $file_source = $_FILES['source'];
//   //var_dump($file_source);
//   if($file_source['error'] !== UPLOAD_ERR_OK){
//     $GLOBALS['message'] = 'ÇëÉÏ´«ÒôÀÖÎÄ¼þ2';
//     return;
//   }
//   //ÅÐ¶ÏÉÏ´«µÄÒôÀÖÎÄ¼þ´óÐ¡ÊÇ·ñºÏÊÊ
//   if($file_source['size'] < 1 * 1024 *1024 ){
//     $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÎÄ¼þÌ«Ð¡';
//     return;
//   }
//   if($file_source['size'] > 10 * 1024 *1024 ){
//     $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÎÄ¼þÌ«´ó';
//     return;
//   }
//   //ÅÐ¶ÏÉÏ´«µÄÒôÀÖÎÄ¼þµÄ¸ñÊ½ÊÇ·ñºÏÊÊ
//   $file_music_source = array('audio/mp3', 'audio/wma');
//   if(array_search($file_source['type'], $file_music_source)){
//     $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÎÄ¼þ¸ñÊ½²»·ûºÏ';
//     return;
//   }
//   //ÅÐ¶ÏÒÆ¶¯ÊÇ·ñ³É¹¦
//   $target2 = 'uploads/' . uniqid() . '-' . $file_source['name'];
//   if(!(move_uploaded_file($file_source['tmp_name'], $target2))){
//     $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÎÄ¼þÒÆ¶¯Ê§°Ü';
//     return;
//   }
//   $data['source'] = $target2;

//   //½«Êý¾Ý¼ÓÈëÔ­ÓÐÊý¾ÝÖÐ
//   $json = file_get_contents('data.json');
//   $old = json_decode($json,true);
//   array_push($old,$data);
//   $new = json_encode($old);
//   file_put_contents('data.json', $new);

//   //Ìø×ª»ØÁÐ±íÒ³
//   //header('Location: list.php');
// }

function add(){
  $id = uniqid();
 // ÅÐ¶Ï±êÌâÊÇ·ñÎª¿Õ 
 if(empty($_POST['title'])){
  $GLOBALS['message'] = 'ÇëÌí¼Ó±êÌâÐÅÏ¢';
  return;
 }
 $title = $_POST['title'];
 // ÅÐ¶Ï¸èÊÖÃûÊÇ·ñÎª¿Õ
 if(empty($_POST['artist'])){
  $GLOBALS['message'] = 'ÇëÌí¼Ó±êÌâÐÅÏ¢';
  return;
 }
 $artist = $_POST['artist'];
// ==============================================
// ÅÐ¶Ïº£±¨ÓòÊÇ·ñÎª¿Õ
if(empty($_FILES['images'])){
  $GLOBALS['message'] = 'º£±¨ÓòÎª¿Õ';
  return;
}
$images = $_FILES['images'];

//×¼±¸Ò»¸öÈÝÆ÷£¬ÓÃÀ´´æ´¢ÉÏ´«µÄ¶à¸öÎÄ¼þ

//Í¨¹ý±éÀúÀ´´æ´¢¶àÕÅÍ¼Æ¬µÄµØÖ·

  // ÅÐ¶ÏÊÇ·ñÉÏ´«ÁËº£±¨
  if($images['error'] !== UPLOAD_ERR_OK){
    $GLOBALS['message'] = 'ÉÏ´«µÄº£±¨ÎÄ¼þÓÐ´í';
    return;
  }
  // ÅÐ¶ÏÉÏ´«µÄº£±¨´óÐ¡ÊÇ·ñºÏÊÊ
  if($images['size'] > 1 * 1024 * 1024){
    $GLOBALS['message'] = 'ÉÏ´«µÄº£±¨Ì«´ó';
    return;
  }
  // ÅÐ¶ÏÉÏ´«µÄº£±¨¸ñÊ½ÊÇ·ñºÏÊÊ
  $images_source = array('image/png', 'image/jpg', 'image/gif');
  if(array_search($images['type'],$images_source)){
    $GLOBALS['message'] = 'ÉÏ´«µÄº£±¨ÎÄ¼þ¸ñÊ½²»¶Ô';
    return;
  }
  // ÅÐ¶Ïº£±¨ÊÇ·ñÒÆ¶¯³É¹¦
  // Ä¿±êµØÖ·
  $target1 = 'images/' . uniqid() . '-' . $images['name'];
  var_dump($target1);
  if(!move_uploaded_file($images['tmp_name'],$target1)){
    $GLOBALS['message'] = 'ÉÏ´«µÄº£±¨ÎÄ¼þÒÆ¶¯Ê§°Ü';
    return;
  }
  // $data1 = $data['images'];
  // $data1[] = $target1;
  // $data1 = http_build_query($data1);
  $images = $target1;
 






// ===========================================================
// ÅÐ¶ÏÒôÀÖÓòÊÇ·ñÎª¿Õ
if(empty($_FILES['source'])){
  $GLOBALS['message'] = 'ÒôÀÖÓòÎª¿Õ';
  return;
}
$source = $_FILES['source'];
// ÅÐ¶ÏÊÇ·ñÉÏ´«ÁËÒôÀÖÎÄ¼þ
if($source['error'] !== UPLOAD_ERR_OK){
  $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÎÄ¼þÓÐ´í';
  return;
}
// ÅÐ¶ÏÉÏ´«µÄÒôÀÖ´óÐ¡ÊÇ·ñºÏÊÊ
if($source['size'] < 1 * 1024 * 1024){
  $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÌ«Ð¡';
  return;
}
if($source['size'] > 10 * 1024 * 1024){
  $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÌ«Ð¡';
  return;
}
// ÅÐ¶ÏÉÏ´«µÄº£±¨¸ñÊ½ÊÇ·ñºÏÊÊ
$music_source = array('audio/mp3', 'audio/wma');
if(array_search($source['type'],$music_source)){
  $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÎÄ¼þ¸ñÊ½²»¶Ô';
  return;
}
// ÅÐ¶Ïº£±¨ÊÇ·ñÒÆ¶¯³É¹¦
// Ä¿±êµØÖ·
$target2 = 'images/' . uniqid() . '-' . $source['name'];
if(!move_uploaded_file($source['tmp_name'],$target2)){
  $GLOBALS['message'] = 'ÉÏ´«µÄÒôÀÖÎÄ¼þÒÆ¶¯Ê§°Ü';
  return;
}

$source = $target2;

// var_dump($images);
// var_dump($source);


// Á¬½ÓÊý¾Ý¿â
$conn = mysqli_connect('localhost','root','123456','mysql');

//ÅÐ¶ÏÊý¾Ý¿âÊÇ·ñÁ¬½Ó³É¹¦
if(!$conn){
  exit('<h1>Á¬½ÓÊý¾Ý¿ÉÒÔÊ§°Ü</h1>');
}

//Ìí¼ÓÊý¾Ý
$query = mysqli_query($conn,"insert into song values('{$id}','{$title}','{$artist}','{$images}','{$source}');");
if(!$query){
  exit('<h1>ÐÞ¸ÄÊý¾ÝÊ§°Ü</h1>');
}

$affected_rows = mysqli_affected_rows($conn);

  if ($affected_rows !== 1) {
    $GLOBALS['message'] = 'Ìí¼ÓÊý¾ÝÊ§°Ü';
    return;
  }

//Ìø×ª»ØlistÒ³Ãæ
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
        <!-- multiple ¿ÉÒÔÈÃÒ»¸öÎÄ¼þÓò¶àÑ¡ -->
        <input type="file" class="form-control" id="images" name="images" accept="image/*" multiple>
      </div>
      <div class="form-group">
        <label for="source">source</label>
        <!-- accept ¿ÉÒÔÉèÖÃÁ½ÖÖÖµ·Ö±ðÎª  MIME Type / ÎÄ¼þÀ©Õ¹Ãû -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">commit</button>
    </form>
  </div>
</body>
</html>
