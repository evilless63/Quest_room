<?php
header('Content-Type: text/html; charset= utf-8');
session_start(); //Запускаем сессии
echo "<link rel=\"stylesheet\" href=\"../dist/css/index.css\">
      <link rel=\"stylesheet\" href=\"../dist/css/reset.css\">" ;
/** 
 * Класс для авторизации
 * @author дизайн студия ox2.ru 
 */ 
class AuthClass {
    private $_login = "Виталий"; //Устанавливаем логин
    private $_password = "1"; //Устанавливаем пароль
 
    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
     
    /**
     * Авторизация пользователя
     * @param string $login
     * @param string $passwors 
     */
    public function auth($login, $passwors) {
        if ($login == $this->_login && $passwors == $this->_password) { //Если логин и пароль введены правильно
            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
            $_SESSION["login"] = $login; //Записываем в сессию логин пользователя
            return true;
        }
        else { //Логин и пароль не подошел
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
     
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
     
     
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}
 
$auth = new AuthClass();
 
if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:red;\">Логин и пароль введен не правильно!</h2>";
    }
}
 
if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
 
?>

<?php 
if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:  
    echo "Здравствуйте, " . $auth->getLogin() ;
    echo "<br/><br/><a href='?is_exit=1'>Выйти</a>"; //Показываем кнопку выхода
    
    
    try {
        $pdo = new PDO ('mysql:host=localhost;dbname=spoilichek_6para','spoilichek_6para','Totv12ka');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("set names utf8");
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

     function get_schedule($pdo){
        $answer;
        $query = "SELECT `id`,`date`,`time`, `name`, `surname`, `phone` FROM client WHERE is_schedule=1 ";
        try{
            $dataSet = $pdo->query($query);
            foreach($dataSet as $row){
                $answer[] = array('id' => $row['id'], 'date' => $row['date'], 'time' => $row['time'], 'name' => $row['name'], 'surname' => $row['surname'], 'phone' => $row['phone']);
                }
            //если мы не считали никаких данных из БД
            if(!$answer) $answer = "Никто еще не отправлял почту";
            } 
        catch (PDOException $e) {
        $answer = "Не удалось считать данные из БД";
        }
        
        return $answer;
        
    }

    $times = array( 
        "10.00 - 11.00",
        "11.00 - 12.00",
        "12.00 - 13.00",
        "13.00 - 14.00",
        "14.00 - 15.00",
        "15.00 - 16.00",
        "16.00 - 17.00",
        "17.00 - 18.00",
        "18.00 - 19.00",
        "19.00 - 20.00",
        "20.00 - 21.00",
        "21.00 - 22.00",
        "22.00 - 23.00",
        "23.00 - 00.00"
        );
    $days = array(
        'Воскресенье' , 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота'
    );
    $num_day = (date('w'));
    $num_month = (date('m'));
    $num_year = (date('y'));
    $day_count = 0;
    $days_week = date("d");
    ?>
    <div style="
    display: flex; justify-content: space-around; flex-direction: column; margin: 0 auto;">
        <div style="width: 90%; display: flex; margin: 0 auto;">
            <?php
                for($i = 0; $i <= 6 ; $i++) {
                    $name_day = $days[$num_day];
                    if ( $num_day == "7") {
                        $num_day = 0;
                        echo "<div style=\"width: 15%\">".$days[$num_day]."</div>";
                    } else {
                        echo "<div style=\"width: 15%\">".$name_day."</div>";
                    }
                    $num_day ++ ;
                }
            
            ?>
        </div>
        <div style="width: 90%; display: flex; margin: 0 auto;">
            <?php
                for($i = 0; $i <= 6 ; $i++) {

                    echo "<div style=\"width: 15%; display: flex; flex-direction: column\"><div>".$days_week.".".$num_month.".".$num_year."</div>";
                        foreach ($times as $time) {
                            $get_schedule = get_schedule($pdo);
                                if ($answer != "Не удалось считать данные из БД") {
                                    foreach ($get_schedule as $get_schedule_row) {
                                    if( $get_schedule_row['date'] == $days_week."-".$num_month."-".$num_year && $get_schedule_row['time'] == $time) {
                                    echo "<div class=\"colored\" style=\"color: red; cursor: pointer; margin: 10px 0px 10px 0px\" data-attribute=".$days_week."-".$num_month."-".$num_year."><div class=\"del_time\">".$time."</div><div class=\"del_id\" style=\"display: none\">".$get_schedule_row['id']."</div></div>";
                                    }       
                                }
                            echo "<div class=\"add_to_base\" style=\"cursor: pointer; margin: 10px 0px 10px 0px\" data-attribute=".$days_week."-".$num_month."-".$num_year."><div class=\"add_time\">".$time."</div><div class=\"add_date\" style=\"display: none\">".$days_week."-".$num_month."-".$num_year."</div>
                            <div class=\"form_add\">
                                <form action=\"\" >
                                    <span>Назначеная дата: </span><div class=\"add_date_modal\"></div>
                                    <span>Назначеное время: </span><div class=\"add_time_modal\"></div>
                                    <input type=\"text\" class=\"add_name\" placeholder=\"Введите имя\" required />
                                    <input type=\"text\" class=\"add_surname\" placeholder=\"Введите фамилию\" required />
                                    <input type=\"text\" class=\"add_phone\" placeholder=\"Введите телефон\" required />
                                    <div class=\"add_button_base\">Добавить запись в базу</div>
                                </form>
                            </div></div>";   
                        }

                            
                        }
                    echo "</div>";
                    $days_week ++;
                }
               
            ?>
        </div> 
        
        <script src="../dist/bower/jquery/dist/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $(".colored").next().css("display", "none");

                // $(".add_to_base").click(function(){
                //     $(this).children(".form_add").fadeIn("slow");

                //     var add_time = $(this).children(".add_time").text();
                //     var add_date = $(this).children(".add_date").text(); 

                //     $(".add_time_modal").html(add_time);
                //     $(".add_date_modal").html(add_date);
                // })

                // $(".add_button_base").click(function(){
                //     var date = $(".add_date_modal").text();
                //     var time = $(".add_time_modal").text();
                //     var name = $(".form_add").find(".add_name").val();
                //     var surname = $(".form_add").find(".add_surname").val();
                //     var phone = $(".form_add").find(".add_phone").val();
                //     $.ajax({
                //       type: "POST",
                //       url: "add_to_base.php",
                //       data: { name: name, surname: surname, phone: phone, date: date, time: time }
                //     }).done(function() {
                //       alert( "Время и дата: " + time + " и " + date + " добавлены");
                //       location.reload();
                //     });
                // });

                $(".add_to_base").click(function(){
                    var date = $(this).find(".add_date").text();
                    var time = $(this).find(".add_time").text();

                    $.ajax({
                      type: "POST",
                      url: "add_to_base.php",
                      data: { date: date, time: time }
                    }).done(function() {
                      alert( "Время и дата: " + time + " и " + date + " добавлены");
                      location.reload();
                    });
                })
                
                $(".colored").click(function(){
                    var del_id = $(this).find(".del_id").text();

                    $.ajax({
                      type: "POST",
                      url: "del_from_base.php",
                      data: { id: del_id }
                    }).done(function() {
                      alert( "Время и дата удалены");
                      location.reload();
                    });
                });
            });

        </script>
    </div><?php
} 
else { //Если не авторизован, показываем форму ввода логина и пароля
?>
<form method="post" action="">
    Логин: <input type="text" name="login"
    value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" />
    <br/>
    Пароль: <input type="password" name="password" value="" /><br/>
    <input type="submit" value="Войти" />
</form>
<?php } ?>