<?php

//header('Content-Type:text/html;charset="GBK"');

// function add() {
//   $data['id'] = uniqid();

//   //�жϱ����Ƿ�Ϊ��
//   if(empty($_POST['title'])){
//     $GLOBALS['message'] = '�������������';
//     return;
//   }

//   $data['title'] = $_POST['title'];

//   //�жϸ����Ƿ�Ϊ��
//   if(empty($_POST['artist'])){
//     $GLOBALS['message'] = '�����������';
//     return;
//   }

//   $data['artist'] = $_POST['artist'];

//   //==============================================================================
//   //�жϺ������Ƿ�Ϊ��
//   if(empty($_FILES['images'])){
//     $GLOBALS['message'] = '���ϴ������ļ�1';
//     return;
//   }

//   $file_images = $_FILES['images'];

//   //��һ������װ�ϴ����ļ���·��
//   $data['images'] = array();
  
//   for($i=0;$i<count($file_images['name']);$i++){
//     //�ж��ϴ��ĺ����ļ��Ƿ��д���
//   if($file_images['error'][$i] !== UPLOAD_ERR_OK){
//     $GLOBALS['message'] = '���ϴ������ļ�2';
//     return;
//   }
//   //�жϺ����Ĵ�С�Ƿ����
//   if($file_images['size'][$i] > 1 * 1024 *1024 ){
//     $GLOBALS['message'] = '�ϴ��ĺ����ļ�̫��';
//     return;
//   }
//   //�жϺ������ļ���ʽ�Ƿ�Ϸ�
//   $file_images_source = array('image/png', 'image/jpg', 'image/gif');
//   if(array_search($file_images['type'][$i],$file_images_source)){
//     $GLOBALS['message'] = '�ϴ��ĺ����ļ���ʽ����';
//     return;
//   }

//   //�ж��ƶ��Ƿ�ɹ�
//   $target1 = 'uploads/' . uniqid() . '-' . $file_images['name'][$i];
//   var_dump($target1);
//   if(!move_uploaded_file($file_images['tmp_name'][$i], $target1)){
//     $GLOBALS['message'] = '�����ƶ�ʧ��';
//     return;
//   }

//   //�ƶ�ʱ��·��
  
//   }
   

  
//   //var_dump($target1);

//   //==============================================================================
//   //�ϴ������ļ�

//   //�ж������ļ����Ƿ�Ϊ��
//   if(empty($_FILES['source'])){
//     $GLOBALS['message'] = '���ϴ������ļ�1';
//     return;
//   }
//   //�ж��ϴ��������ļ��Ƿ�Ϊ��
//   $file_source = $_FILES['source'];
//   //var_dump($file_source);
//   if($file_source['error'] !== UPLOAD_ERR_OK){
//     $GLOBALS['message'] = '���ϴ������ļ�2';
//     return;
//   }
//   //�ж��ϴ��������ļ���С�Ƿ����
//   if($file_source['size'] < 1 * 1024 *1024 ){
//     $GLOBALS['message'] = '�ϴ��������ļ�̫С';
//     return;
//   }
//   if($file_source['size'] > 10 * 1024 *1024 ){
//     $GLOBALS['message'] = '�ϴ��������ļ�̫��';
//     return;
//   }
//   //�ж��ϴ��������ļ��ĸ�ʽ�Ƿ����
//   $file_music_source = array('audio/mp3', 'audio/wma');
//   if(array_search($file_source['type'], $file_music_source)){
//     $GLOBALS['message'] = '�ϴ��������ļ���ʽ������';
//     return;
//   }
//   //�ж��ƶ��Ƿ�ɹ�
//   $target2 = 'uploads/' . uniqid() . '-' . $file_source['name'];
//   if(!(move_uploaded_file($file_source['tmp_name'], $target2))){
//     $GLOBALS['message'] = '�ϴ��������ļ��ƶ�ʧ��';
//     return;
//   }
//   $data['source'] = $target2;

//   //�����ݼ���ԭ��������
//   $json = file_get_contents('data.json');
//   $old = json_decode($json,true);
//   array_push($old,$data);
//   $new = json_encode($old);
//   file_put_contents('data.json', $new);

//   //��ת���б�ҳ
//   //header('Location: list.php');
// }

function add(){
  $id = uniqid();
 // �жϱ����Ƿ�Ϊ�� 
 if(empty($_POST['title'])){
  $GLOBALS['message'] = '����ӱ�����Ϣ';
  return;
 }
 $title = $_POST['title'];
 // �жϸ������Ƿ�Ϊ��
 if(empty($_POST['artist'])){
  $GLOBALS['message'] = '����ӱ�����Ϣ';
  return;
 }
 $artist = $_POST['artist'];
// ==================================
// �жϺ������Ƿ�Ϊ��
if(empty($_FILES['images'])){
  $GLOBALS['message'] = '������Ϊ��';
  return;
}
$images = $_FILES['images'];
// �ж��Ƿ��ϴ��˺���
if($images['error'] !== UPLOAD_ERR_OK){
  $GLOBALS['message'] = '�ϴ��ĺ����ļ��д�';
  return;
}
// �ж��ϴ��ĺ�����С�Ƿ����
if($images['size'] > 1 * 1024 * 1024){
  $GLOBALS['message'] = '�ϴ��ĺ���̫��';
  return;
}
// �ж��ϴ��ĺ�����ʽ�Ƿ����
$images_source = array('image/png', 'image/jpg', 'image/gif');
if(array_search($images['type'],$images_source)){
  $GLOBALS['message'] = '�ϴ��ĺ����ļ���ʽ����';
  return;
}
// �жϺ����Ƿ��ƶ��ɹ�
// Ŀ���ַ
$target1 = 'images/' . uniqid() . '-' . $images['name'];
if(!move_uploaded_file($images['tmp_name'],$target1)){
  $GLOBALS['message'] = '�ϴ��ĺ����ļ��ƶ�ʧ��';
  return;
}
$images = $target1;

// ==================================
// �ж��������Ƿ�Ϊ��
if(empty($_FILES['source'])){
  $GLOBALS['message'] = '������Ϊ��';
  return;
}
$source = $_FILES['source'];
// �ж��Ƿ��ϴ��������ļ�
if($source['error'] !== UPLOAD_ERR_OK){
  $GLOBALS['message'] = '�ϴ��������ļ��д�';
  return;
}
// �ж��ϴ������ִ�С�Ƿ����
if($source['size'] < 1 * 1024 * 1024){
  $GLOBALS['message'] = '�ϴ�������̫С';
  return;
}
if($source['size'] > 10 * 1024 * 1024){
  $GLOBALS['message'] = '�ϴ�������̫С';
  return;
}
// �ж��ϴ��ĺ�����ʽ�Ƿ����
$music_source = array('audio/mp3', 'audio/wma');
if(array_search($source['type'],$music_source)){
  $GLOBALS['message'] = '�ϴ��������ļ���ʽ����';
  return;
}
// �жϺ����Ƿ��ƶ��ɹ�
// Ŀ���ַ
$target2 = 'images/' . uniqid() . '-' . $source['name'];
if(!move_uploaded_file($source['tmp_name'],$target2)){
  $GLOBALS['message'] = '�ϴ��������ļ��ƶ�ʧ��';
  return;
}

$source = $target2;

// var_dump($images);
// var_dump($source);


// �������ݿ�
$conn = mysqli_connect('localhost','root','123456','mysql');

//�ж����ݿ��Ƿ����ӳɹ�
if(!$conn){
  exit('<h1>�������ݿ���ʧ��</h1>');
}

//�������
$query = mysqli_query($conn,"insert into song values('{$id}','{$title}','{$artist}','{$images}','{$source}');");
if(!$query){
  exit('<h1>�޸�����ʧ��</h1>');
}

$affected_rows = mysqli_affected_rows($conn);

  if ($affected_rows !== 1) {
    $GLOBALS['message'] = '�������ʧ��';
    return;
  }

//��ת��listҳ��
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
        <!-- multiple ������һ���ļ����ѡ -->
        <input type="file" class="form-control" id="images" name="images" accept="image/*" multiple>
      </div>
      <div class="form-group">
        <label for="source">source</label>
        <!-- accept ������������ֵ�ֱ�Ϊ  MIME Type / �ļ���չ�� -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">commit</button>
    </form>
  </div>
</body>
</html>
