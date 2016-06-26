<?php
    try {
        $pdo = new PDO ('mysql:host=localhost;dbname=spoilichek_6para','spoilichek_6para','Totv12ka');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("set names utf8");
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    function add_to_base($pdo,$time,$date,$name,$surname,$phone){
        $answer;
        $query =sprintf("INSERT INTO client (name, surname, phone, date, time, is_schedule) VALUES ('$name', '$surname', '$phone','$date','$time', '1')");
        try{
      $pdo->query($query);
          $answer = "Клиент добавлен";
        }
        catch (PDOException $e) {
          $answer = "Не удалось выполнить запись клиента";
      }

        return $answer;

        
    }

    $time = $_POST['time'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];

    add_to_base($pdo,$time,$date,$name,$surname,$phone);

?>