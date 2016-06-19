<?
if((isset($_POST['mailUsName'])&&$_POST['mailUsName']!="")&&(isset($_POST['mailUsEmail'])&&$_POST['mailUsEmail']!="")&&(isset($_POST['mailUsText'])&&$_POST['mailUsText']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
        $to = 'vitaliy030589@gmail.com'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Quest_room письмо отзыв об игре'; //Заголовок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['mailUsName'].'</p>
                        <p>Почта: '.$_POST['mailUsEmail'].'</p>   
                        <p>Текст сообщения: '.$_POST['mailUsText'].'</p>  
                        <p>Оценка: '.$_POST['rating'].'</p>                       
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель <from@example.com>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}
?>