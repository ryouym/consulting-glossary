<?php
if(isset($_POST['add'])==true){ //もし「追加」ボタンが押されていて
  header('Location:glossary_add.php');
  exit();
}

if(isset($_POST['edit'])==true){ //もし「修正」ボタンが押されていて

  if(isset($_POST['name'])==false){ //もしラジオボタンが何も選択されていなければ
    header('Location: glossary_ng.php');
    exit();
  }

  $name=$_POST['name'];
  header('Location:glossary_edit.php?name='.$name);
  exit();
}

if(isset($_POST['delete'])==true){ //もし「修正」ボタンが押されていて

  if(isset($_POST['name'])==false){ //もしラジオボタンが何も選択されていなければ
    header('Location: glossary_ng.php');
    exit();
  }

  $name=$_POST['name'];
  header('Location:glossary_delete.php?name='.$name);
  exit();
}
?>
