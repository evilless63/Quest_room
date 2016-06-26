<?
 //Проверка отправилось ли наше поля name и не пустые ли они
        $to = 'oleg100188@mail.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Quest_room письмо заявка на игру'; //Заголовок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['name'].'</p>
                        <p>Фамилия: '.$_POST['surname'].'</p>   
                        <p>Телефон: '.$_POST['phone'].'</p>    
                        <p>Дата игры: '.$_POST['date'].'</p>   
                        <p>Время игры: '.$_POST['time'].'</p>   
                        <p>Стоимость игры: '.$_POST['cost'].'</p>
                        <p>Название: '.$_POST['questName'].'</p>
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель <from@example.com>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail

?>