<?php
  try {
        $pdo = new PDO ('mysql:host=localhost;dbname=spoilichek_6para','spoilichek_6para','Totv12ka');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("set names utf8");
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

  function del_from_base($pdo,$id){
        $answer;
        $query = sprintf("DELETE FROM `client` WHERE id='$id'");
        try{
      $pdo->query($query);
          $answer = "Сообщение успешно удалено";
        }
        catch (PDOException $e) {
          $answer = "Не удалось выполнить удаление сообщения";
      }
        return $answer;
      }

      $id = $_POST['id'];
      del_from_base($pdo,$id);

?>