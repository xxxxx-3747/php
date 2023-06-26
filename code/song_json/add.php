<?php

header('Content-Type:text/html;charset="GBK"');

// function add () {
//   // Ŀ�꣺���տͻ����ύ�����ݺ��ļ������ձ��浽�����ļ���
//   $data = array(); // ׼��һ���յ�����������װ����Ҫ����� ����
//   $data['id'] = uniqid();


//   // ���� title �� artist
//   $data['title'] = $_POST['title'];
//   $data['artist'] = $_POST['artist'];

//   // 2. ����ͼƬ�ļ�


//   $images = $_FILES['images'];
//   // ׼��һ������װ���еĺ���·��
//   $data['images'] = array();

//   // ��������ļ����е�ÿһ���ļ����ж��Ƿ�ɹ����ж����͡��жϴ�С���ƶ�����վĿ¼�У�
//   for ($i = 0; $i < count($images['name']); $i++) {
//     // $images['error'] => [0, 0, 0]
//     if ($images['error'][$i] !== UPLOAD_ERR_OK) {
//       $GLOBALS['error_message'] = '�ϴ������ļ�ʧ��1';
//       return;
//     }

//     // ���͵�У��
//     // $images['type'] => ['image/png', 'image/jpg', 'image/gif']
//     if (strpos($images['type'][$i], 'image/') !== 0) {
//       $GLOBALS['error_message'] = '�ϴ������ļ���ʽ����';
//       return;
//     }

//     // TODO: �ļ���С���ж�
//     if ($images['size'][$i] > 1 * 1024 * 1024) {
//       $GLOBALS['error_message'] = '�ϴ������ļ�����';
//       return;
//     }

//     // �ƶ��ļ�����վ��Χ֮��
//     $dest = '../uploads/' . uniqid() . $images['name'][$i];
//     if (!move_uploaded_file($images['tmp_name'][$i], $dest)) {
//       $GLOBALS['error_message'] = '�ϴ������ļ�ʧ��2';
//       return;
//     }

//     $data['images'][] = substr($dest, 2);
//   }

//   // 3. ���������ļ�
//   // =======================================================
//   if (empty($_FILES['source'])) {
//     $GLOBALS['error_message'] = '������ʹ�ñ�';
//     return;
//   }

//   $source = $_FILES['source'];
//   // => { name: , tmp_name .... }

//   // �ж��Ƿ��ϴ��ɹ�
//   if ($source['error'] !== UPLOAD_ERR_OK) {
//     $GLOBALS['error_message'] = '�ϴ������ļ�ʧ��1';
//     return;
//   }
//   // �ж������Ƿ�����
//   $source_allowed_types = array('audio/mp3', 'audio/wma');
//   if (!in_array($source['type'], $source_allowed_types)) {
//     $GLOBALS['error_message'] = '�ϴ������ļ����ʹ���';
//     return;
//   }
//   // �жϴ�С
//   if ($source['size'] < 1 * 1024 * 1024) {
//     $GLOBALS['error_message'] = '�ϴ������ļ���С';
//     return;
//   }
//   if ($source['size'] > 10 * 1024 * 1024) {
//     $GLOBALS['error_message'] = '�ϴ������ļ�����';
//     return;
//   }
//   // �ƶ�
//   $target = '../uploads/' . uniqid() . '-' . $source['name'];
//   if (!move_uploaded_file($source['tmp_name'], $target)) {
//     $GLOBALS['error_message'] = '�ϴ������ļ�ʧ��2';
//     return;
//   }
//   // ������װ����
//   // �������ݵ�·��һ��ʹ�þ���·����
//   $data['source'] = substr($target, 2);

//   // 4. �����ݼ��뵽ԭ��������
//   $json = file_get_contents('data.json');
//   $old = json_decode($json, true);
//   array_push($old, $data);
//   $new_json = json_encode($old);
//   file_put_contents('data.json', $new_json);

//   // 5. ��ת
//   header('Location: list.php');
// }
// 
function add() {
  //�жϱ����Ƿ�Ϊ��
  if(empty($_POST['title'])){
    $GLOBALS['error'] = '�������������';
    return;
  }
  //�жϸ����Ƿ�Ϊ��
  if(empty($_POST['artist'])){
    $GLOBALS['error'] = '�����������';
    return;
  }
  //�жϺ������Ƿ�Ϊ��
  if(empty($_FILES['images'])){
    $GLOBALS['error'] = '���ϴ������ļ�1';
    return;
  }

  $file_images = $_FILES['images'];
  //var_dump($file_images);
  //�ж��ϴ��ĺ����ļ��Ƿ��д���
  if($file_images['error'] !== UPLOAD_ERR_OK ){
    $GLOBALS['error'] = '���ϴ������ļ�2';
    return;
  }
  //�жϺ����Ĵ�С�Ƿ����
  if($file_images['size'] < 1 * 1024 *1024 ){
    $GLOBALS['error'] = '�ϴ��ĺ����ļ�̫С';
    return;
  }
  if($file_images['size'] > 10 * 1024 *1024 ){
    $GLOBALS['error'] = '�ϴ��ĺ����ļ�̫��';
    return;
  }
  //�жϺ������ļ���ʽ�Ƿ�Ϸ�
  $file_images_source = array('image/png', 'image/jpg', 'image/gif');
  //�ж��ƶ��Ƿ�ɹ�
  if(in_array($file_images['type'],$file_images_source)){
    $GLOBALS['error'] = '�ϴ��ĺ����ļ���ʽ����';
    return;
  }
  //��ʾ�ϴ��ɹ�8
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  add();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>���������</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">���������</h1>
    <hr>

    <?php if (isset($error)): ?>
    <div class="alert alert-danger">
      <?php echo $error; ?>
    </div>
    <?php endif ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">����</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="artist">����</label>
        <input type="text" class="form-control" id="artist" name="artist">
      </div>
      <div class="form-group">
        <label for="images">����</label>
        <!-- multiple ������һ���ļ����ѡ -->
        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
      </div>
      <div class="form-group">
        <label for="source">����</label>
        <!-- accept ������������ֵ�ֱ�Ϊ  MIME Type / �ļ���չ�� -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">����</button>
    </form>
  </div>
</body>
</html>
