<!DOCTYPE html>
<?php
	header('Content-Type: text/html; charset= utf-8');

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
	    $query = "SELECT `id`,`date`,`time` FROM client WHERE is_schedule=1 ";
	    try{
		    $dataSet = $pdo->query($query);
		    foreach($dataSet as $row){
			    $answer[] = array('id' => $row['id'], 'date' => $row['date'], 'time' => $row['time']);
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
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Квест комната "Идеальная кукла", создана по фильму мертвая тишина</title>
	<meta name="description" content="Идеальная кукла уникальный квест в самаре от организаторов квестов 6 параллель. Запись, информация, фото, топ лучших команд">
	<meta name="keywords" content="квесты комната,квест комната в самаре,квест в самаре">
	<link rel="stylesheet" href="dist/css/fonts.css">
	<link rel="stylesheet" href="dist/css/index.css">
	<link rel="stylesheet" href="dist/css/ghost.css">
	<link rel="stylesheet" href="dist/css/reset.css">
</head>
<body class="kukla_quest">
	<section class="mainMenu container">
		<ul>
			<img src="dist/images/star_bullet.png" alt="квест комната самары">
			<li><a href="index.html">Квесты в Самаре</a></li>
			<img src="dist/images/star_bullet.png" alt="квесты самары 6 параллель">
			<li><a href="actions.html">Акции</a></li>
			<img src="dist/images/star_bullet.png" alt="квест комната самары акции">
			<li><a href="feedback.html">Отзывы</a></li>
			<img src="dist/images/star_bullet.png" alt="квест комната в самаре отзывы">
			<li><a href="team.html">Команда</a></li>
			<img src="dist/images/star_bullet.png" alt="квесты в самаре команда">
			<li><a href="contacts.html">Контакты</a></li>
			<img src="dist/images/star_bullet.png" alt="квесты самары контакты">
		</ul>
	</section>
	<section class="logoBlock_page container">
		<span class="logoText">Quest Room<span>Выход где-то</span></span>
		<span class="logoText secondLogoText">в Самаре<span class="secondLogoSpan">рядом</span></span>
		<img src="dist/images/logo_page.png" alt="" class="mainLogo">
	</section>
	<section class="quest_description_wrapper  container">
		<div class="quest_sheme quest_kukla">
			<div class="quest_sheme_rating quest_sheme_point">Рейтинг: 9,8</div>
			<div class="quest_sheme_players quest_sheme_point">2-4 игроков</div>
			<div class="quest_sheme_years quest_sheme_point">Мин. возраст</div>
			<div class="quest_sheme_level quest_sheme_point">Средний</div>
		</div>
		<div class="quest_description">
			<div class="quest_descriptionHeader"><h1>Квест комната Идеальная кукла</h1></div>
			<p class="quest_description_paragraph">Мери видишь у двери, тише будь и не кричи. Звук услышит Мери, не уйти тебе от двери! В тишине приходит Мери с куклами страшными как звери. Коль увидишь куклу Мери, на засов закрой все двери и не звука не скажи, а то не быть тебе живым!
</p>
			<p class="quest_description_paragraph">Квест комната в самаре<br>Хоррор квест в самаре идеальная кукла создан по мотивам фильма мертвая тишина. Игроков ждут сложные логические задания, неповторимая антуражность, новые эмоции. Вас запирают в комнате на 60 минут, необходимо пройти все задания в комнате что бы получить заветный ключ для выхода. </p>
		</div>
	</section>
	<div class="info_wrapper">
		<section class="schedule_wpapper container">
			<div class="schedule_wpapper_header">
				<h2>Расписание квест комнаты</h2>
			</div>
			<div class="schedule_wpapper_desc">
				Забронируйте любое удобное для Вас время для прохождения квест комнаты Идеальная кукла
			</div>
			<div class="schedule_wpapper_table">
				<div class="schedule_wpapper_thead">
				<?php
				for($i = 0; $i <= 6 ; $i++) {
					$name_day = $days[$num_day];
					if ( $num_day == "7") {
						$num_day = 0;
						echo "<div class=\"schedule_wpapper_thead_block\">".$days[$num_day]."</div>";
					} else {
						echo "<div class=\"schedule_wpapper_thead_block\">".$name_day."</div>";
					}
					$num_day ++ ;
				}
			
				?>
				</div>
				<div class="schedule_wpapper_field">
				<?php
					for($i = 0; $i <= 6 ; $i++) {

						echo "<div class=\"schedule_wpapper_date_block\" style=\"width: 15%; display: flex; flex-direction: column\"><div class=\"schedule_wpapper_date_block\">".$days_week.".".$num_month.".".$num_year."</div>";
							foreach ($times as $time) {
								$get_schedule = get_schedule($pdo);
									if ($answer != "Не удалось считать данные из БД") {
										foreach ($get_schedule as $get_schedule_row) {
										if( $get_schedule_row['date'] == $days_week."-".$num_month."-".$num_year && $get_schedule_row['time'] == $time) {
										echo "<div class=\"colored schedule_wpapper_column_block not_active\"  data-attribute=".$days_week."-".$num_month."-".$num_year."><div class=\"del_time \">".$time."</div><div class=\"del_id\" style=\"display: none\">".$get_schedule_row['id']."</div><span class=\"schedule_cost\">2500 руб</span></div>";
										}		
									}
								echo "<div class=\"add_to_base schedule_wpapper_column_block schedule_wpapper_column_block_active\" data-attribute=".$days_week."-".$num_month."-".$num_year."><div class=\"add_time schedule_time\">".$time."</div><div class=\"add_date schedule_date_nodisplay\" >".$days_week."-".$num_month."-".$num_year."</div><span class=\"schedule_cost\">2500 руб</span></div>";	
							}

								
							}
						echo "</div>";
						$days_week ++;
					}
				?>
			</div>	
				
					
			</div>
			<div class="schedule_wpapper_bottom_desc">
				Если в расписании Вы не нашли интересующий вас день позвонить нам по телефону +7 (917) 104 76 66
			</div>	
		</section>
		<section class="quest_statistics container">
			<div class="quest_statistics_header"><h3>Квест комната Мертвая тишина Топ10</h3></div>
			<div class="quest_statistics_body">
				<div class="quest_statistics_body_block">
					<span>Тестеры</span>
					<span>4 игрока</span>
					<span>58 минут</span>
					<span>1 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>2 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>3 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>4 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>5 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>6 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>7 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>8 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>9 место</span>
				</div>
				<div class="quest_statistics_body_block">
					<span>-----</span>
					<span>? игрока</span>
					<span>60 минут</span>
					<span>10 место</span>
				</div>
			</div>
		</section>
		<section class="quest_feedback container">
			<div class="quest_feedback_header"><h4>Квест комната отзывы</h4></div>
			<div class="quest_feedback_block">Ждем открытия квестов с нетерпением, уже записались на 7 июля <span>Светлана</span>.</div>
			<div class="quest_feedback_block">Записались на квесты с колегами, на 7 июля <span>Ксю</span></div>
			<form action enctype="multipart/form-data" class="mailUs" id="mailUsFeedback" method="post">
				<div class="mailUsRow">
					<input type="text" id="mailUsName" name="mailUsName" 	 class="mailUsName" placeholder="Имя..." required>
					<input type="text" id="mailUsEmail" name="mailUsEmail" 	 class="mailUsEmail" placeholder="Email..." required>
				</div>	
				<div class="mailUsRow">
					<textarea name="mailUsText" class="mailUsText" id="mailUsText" cols="30" rows="2" placeholder="Комментарий" required></textarea>
				</div>
				<span class="mailUs_markText">Пожалуйста оцените квест квест комнату «Идеальная кукла»</span>	
				<div class="rating quest_mark_stars">

					 <input type="radio" name="rating" value="1" id="r1">
					 <label for="r1"></label>
					 
					 <input type="radio" name="rating" value="2" id="r2">
					 <label for="r2"></label>
					 
					 <input type="radio" name="rating" value="3" id="r3">
					 <label for="r3"></label>
					 
					 <input type="radio" name="rating" value="4" id="r4">
					 <label for="r4"></label>

					 <input type="radio" name="rating" value="5" id="r5">
					 <label for="r5"></label>
				 
				</div>	

				<button class="mailUsSubmit" type="submit" id="mailFeedbackSubmit">Отправить</button>
			</form>				
		</section>
	</div>
	<div class="modalWindow container">
		<div class="schedule_modalWindow_header">
			Оформление бронирования
		</div>
		<div class="schedule_modalWindow_desc">
		Бронирование времени для прохождения квеста комнаты в самаре идеальная кукла, после оформления заявки с Вами свяжеться наш администратор для уточнения всех данных и отметит бронирование на веб сайте.<br>
Администрация квесты комнаты самары 6 параллель<br>
		</div>
		<div class="schedule_modalWindow_form">
			<div class="schedule_modalWindow_formInfo">
				<div class="schedule_modalWindow_formHeader">Квест "Идеальная кукла"</div>
				<div class="schedule_modalWindow_formFields">
					Начало сеанса <span id="itemScheduleDate" class="itemScheduleDate"></span>, <span id="itemScheduleTime" class="itemScheduleTime"></span><br>
					К оплате <span class="itemScheduleCost"></span>
					<form action enctype="multipart/form-data" id="itemScheduleForm" method="post" class="itemScheduleForm">
						<input type="text" name="itemScheduleFormName" class="itemScheduleFormName" id="itemScheduleFormName" required placeholder="Ваше имя">
						<input type="text" name="itemScheduleFormSurname" class="itemScheduleFormSurname" id="itemScheduleFormSurname" required placeholder="Ваша фамилия">
						<input type="text" name="itemScheduleFormPhone" class="itemScheduleFormPhone" id="itemScheduleFormPhone" required placeholder="Ваш телефон">
						<input type="checkbox" id="itemScheduleFormCheck" class="itemScheduleFormCheck" required />
<label class="itemScheduleFormLabel" for="itemScheduleFormCheck"><span></span>Я прочел и принимаю условия Пользовательского соглашения</label>
<div class="itemScheduleFormSubmitWrapper">
    <input type="hidden" id="itemScheduleFormQuest" value="kukla" />
	<div id="itemScheduleFormSubmit" class="itemScheduleFormSubmit">Забронировать</div>
</div>

					</form>
				</div>
			</div>
			<div class="schedule_modalWindow_formImage">
				<img src="dist/images/schedule_kukla_img.jpg" alt="">
			</div>
		</div>
	</div>
	<footer>
		<div class="wrapper">
			<div class="aboutUs">
				<div class="aboutUsHeader"><h4>Страшный квест в самаре идеальная кукла</h4></div>
				<p>Идеальная кукла страшный квест в самаре сделанный в стиле Хоррор квеста. Вас запирают в комнате на прохождение которой Вам дается 60 минут. Квест сделан для любителей пощекотать себе нервы так что будьте бдительны, Вас ожидает страшная жуть которую придется преодолеть. В квесте так же много логических заданий, так что вперед и пусть удача будет на вашей стороне!</p>
			</div>
			<div class="questLinks">
				<a href="http://6-parallel.ru/simpsons.html" class="questLinkFooter questLinkFooter_">Симпсоны</a>
				<a href="http://6-parallel.ru/kontclager.html" class="questLinkFooter questLinkFooter_">Побег из концлагеря</a>
				<a href="http://6-parallel.ru" class="questLinkFooter questLinkFooter_">Квесты 6 паралели</a>
				<a href="Квесты" class="questLinkFooter questLinkFooter_">квесты самары</a>
			</div>
			<div class="footerContacts">
				<div class="teammatePhotoSocial">
					<a href="https://vk.com/six_parallel?w=product-122075420_226288%2Fquery" class="teammatePhotoSocialLink">
						<div class="teammatePhotoSocialVkIcon"></div>
					</a>
					<a href="https://www.instagram.com/six_parallel/" class="teammatePhotoSocialLink">
						<div class="teammatePhotoSocialInstagrammIcon"></div>
					</a>
				</div>
				<span class="footerContactsBlock footerContactsAdress">Ул. Ново-Садовая д.155</span>
				<span class="footerContactsBlock footerContactsPhone">Phone<span>+7 (917) 104 76 66</span></span>
				<span class="footerContactsBlock footerContactsViber">Viber<span>+7 (917) 104 76 66</span></span>
			</div>
		</div>	
	</footer>
	<script src="dist/bower/jquery/dist/jquery.js"></script>
	<script src="dist/js/script.js"></script>
	<script>
			$(document).ready(function(){
			$(".colored").next().css("display", "none");
			});
		</script>
</body>
</html>