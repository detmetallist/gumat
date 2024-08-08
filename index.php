<?php
	$product[1] = 'Гумат калия "Стандарт"';
	$product[2] = 'Гумат калия "Зерновой"';
	$product[3] = 'Гумат калия "Кукуруза"';
	$product[4] = 'Гумат калия "Бор"';
	$product[5] = 'Гумат калия "Масличные"';
	$cena[1] = '50';
	$cena[2] = '95';
	$cena[3] = '95';
	$cena[4] = '95';
	$cena[5] = '80';
	$prod_count = count($product);
	include "texts.php";
?>
<html>
<head>
	<title>Гумат калия</title>
	<link rel="stylesheet" href="animations.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="media.css" />
	<script src="jquery-3.1.0.min.js"></script>
	<script src="my.js"></script>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap, 
            myPlacemark1,
            myPlacemark2,
            myPlacemark3;

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [48.424781,35.001613],
                zoom: 16
            }); 
            
            myPlacemark1 = new ymaps.Placemark([48.424781,35.001613], {
                hintContent: 'Днепр',
                balloonContent: 'ДНЕПР<br> Строителей 25 офис 317<br>‎тел. +380 (67) 829-11-05',
            });
            myPlacemark2 = new ymaps.Placemark([48.741964,37.586379], {
                hintContent: 'Краматорск',
                balloonContent: 'КРАМАТОРСК<br>ШКАДИНОВА 34<br>тел. ‎+380 (98) 196-01-49',
            });
            myPlacemark3 = new ymaps.Placemark([50.443517,30.649451], {
                hintContent: 'Киев',
                balloonContent: 'КИЕВ<br>Азербайджанская 25 офис 3<br>тел. ‎+380 (67) 654-40-44',
            });                                    
            
            myMap.geoObjects.add(myPlacemark1);
            myMap.geoObjects.add(myPlacemark2);
            myMap.geoObjects.add(myPlacemark3);
            myMap.removeControl(SearchControl);
        }
    </script>
</head>
<body>
	<div class="strelka_top"></div>
	<div class="zvonok"></div>
	<div class="popup">
		<div class="form_popup" id="form_popup1">
			<form name="form1" id="form1" method="post">
				<h3><span>Форма</span> обратной связи</h3>
				<input type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="phone" placeholder="Ваш телефон *">
				<p>Поля * обязательны для заполнения</p>
				<input type="submit" value="Позвонить мне">
			</form>
			<div class="popup_close"></div>
		</div>
		<div class="form_popup" id="form_popup2">
			<form name="form2" method="post">
				<h3>Хотите узнать подробнее?</h3>
				<input type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="phone" placeholder="Ваш телефон *">
				<input type="hidden" name="vid_producta">
				<p>Поля * обязательны для заполнения</p>
				<input type="submit" value="Заказать звонок">
			</form>
			<div class="popup_close"></div>
		</div>
		<div class="form_popup" id="form_popup3">
			<form name="form3" method="post">
				<h3><span>Форма</span> обратной связи</h3>
				<input type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="email" placeholder="Ваш e-mail *">
				<p>Поля * обязательны для заполнения</p>
				<input type="submit" value="Получить прайс">
			</form>
			<div class="popup_close"></div>
		</div>
		<div class="form_popup" id="form_popup4">
			<form name="form4" method="post">
				<h3>Заявка на обратный звонок</h3>
				<input type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="phone" placeholder="Ваш телефон *">
				<p>Поля * обязательны для заполнения</p>
				<input type="submit" value="Позвонить мне">
			</form>
			<div class="popup_close"></div>
		</div>
		<div class="form_popup" id="form_popup5">
				<form name="form5" method="post">
					<h3> </h3>
					<input type="text" name="name" placeholder="Ваше имя">
					<input type="text" name="email" placeholder="Ваш телефон *">
					<input type="text" name="phone" placeholder="Ваш e-mail">
					<input type="hidden" name="cena">
					<input type="hidden" name="nazv_tov">
					<input type="hidden" name="kol_litr">
					<p>Поля * обязательны для заполнения</p>
					<input type="submit" value="Заказать!">
				</form>
				<div class="popup_close"></div>
		</div>
		<div class="modal_descr">
			<h3></h3>
			<div class="text"></div>
			<div class="text_zakaz">Узнать подробнее</div>
			<div class="popup_close"></div>
		</div>
		<div class="modal_thanks">
			<p>Спасибо за заявку!<br>Мы свяжемся с Вами в ближайшее время!</p>
		</div>
		<div class="popup_overlay"></div>
	</div>
	<div class="header" id="main">
		<div class="container">
			<div class="top_menu">
				<ul>
					<li><a href="#main">Главная</a></li>
					<li><a href="#product">Продукция</a></li>
					<li><a href="#how">Как мы работаем</a></li>
					<li><a href="#contacts">Контакты</a></li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="top_logocont">
				<div class="logo"></div>
				<div class="top_zvonok">
					<div class="top_zvonok_tel">‎+380 (67) 829-11-05</div>
					<div class="top_knopka">Заказать обратный звонок</div>
				</div>
			</div>
		</div>
	</div>
	<div class="preim">
		<div class="video_pl"></div>
		<video autoplay loop muted class="bgvideo" id="bgvideo">
		   <source src="video.mp4"></source>
		 </video>
		<div class="zagol">
			<h1>Гумат калия</h1>
			<h2>Органический биостимулятор роста растений</h2>
		</div>
		<div class="preim_items">
			<div class="preim_item">
				<p>Продукция от производителя без посредников</p>
				<div class="preim_item_vnutr">Прямые<br>поставки</div>
			</div>
			<div class="preim_item preim_center">
				<p>Подберём состав под Ваши нужды</p>
				<div class="preim_item_vnutr">Индивидуальные<br>разработки</div>
			</div>
			<div class="preim_item">
				<p>Полное соотвествие государственным стандартам</p>
				<div class="preim_item_vnutr">Соответствие<br>ГОСТам</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="polosa"></div>
	<div class="product" id="product">
		<div class="container">
			<h1>Наша продукция</h1>
			<div class="animatedParent products">
				<div class="animated fadeInLeftShort product_item">
					<div class="product_desc_hide" id="product_desc_hide1">Состав (г/л):<br>Гумат калия - 72, Mg - 0.4, Mn - 0.2, S - 0.5, Fe - 0.3, Zn - 0.06, B - 0.01, Cu - 0.05, N - 1.8</div>
					<div class="product_desc" id="product_desc1">Гумат Калия "Стандарт"</div>
				</div>
				<div class="product_item">
					<div class="product_desc_hide" id="product_desc_hide2">Состав (г/л):<br>Гумат калия - 45, Mg - 7.3, Mn - 11.6, S - 14.0, Fe - 5.1, Co - 1.9, Mo - 2.1, Se - 1.0, Ni - 1.2, Zn - 4.5, B - 6.4, Cu - 4.0, N - 15.8</div>
					<div class="product_desc" id="product_desc2">Гумат Калия "Зерновой"</div>
				</div>
				<div class="product_item">
					<div class="product_desc_hide" id="product_desc_hide3">Состав (г/л):<br>Гумат калия - 35, Mg - 6.5, Mn - 8.8, Fe - 2.5, Zn - 86, B - 6.4, Cu - 2.1, N - 12.0</div>
					<div class="product_desc" id="product_desc3">Гумат Калия "Кукуруза"</div>
				</div>
				<div class="product_item">
					<div class="product_desc_hide" id="product_desc_hide4">Состав (г/л):<br>Гумат калия - 25, B - 150, K - 36.0, N - 30.0</div>
					<div class="product_desc" id="product_desc4">Гумат Калия "Бор"</div>
				</div>
				<div class="product_item">
					<div class="product_desc_hide" id="product_desc_hide5">Состав (г/л):<br>Гумат калия - 45, Mg - 35.4, Mn - 14.1, Zn - 15.8, B - 15.0, Cu - 12.5</div>
					<div class="product_desc" id="product_desc5">Гумат Калия "Масличные"</div>
				</div>
				<div class="product_item">
					<div class="product_desc_hide" id="product_desc_hide6">Состав (г/л):<br>В зависимости от разработок</div>
					<div class="product_desc" id="product_desc6">Индивидуальные разработки</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="send_price">Получить полный<br>ПРАЙС-ЛИСТ</div>
		</div>
	</div>
	<div class="polosa"></div>
<!--	<form method="post" name="form5">	-->
		<div class="kakrab" id="how">
			<div class="container">
				<h1>Как мы работаем</h1>
				<div class="kakrab_items">
					<div class="kakrab_item">
						<p>Звонок или заявка<br>на сайт</p>
					</div>
					<div class="kakrab_item">
						<p>Оформление заказа<br>в течении 30 минут</p>
					</div>
					<div class="kakrab_item">
						<p>Отправка заказа<br>в тот же день</p>
					</div>
				</div>
				<div class="send_zakaz">Совершите заказ<br>ПРЯМО СЕЙЧАС</div>
				<div class="spec_pred">
					<p><span>Акция -10%</span><br>на все виды продукции</p>
				</div>
					<div class="vbei">
						<select name="select_prod">
							<option selected="selected" value="0">Выберите вид продукции</option>
							<?php 
								for($i=1; $i<=$prod_count; $i++){
									echo('<option id='.$cena[$i].' value='.$i.'>'.$product[$i].'</option>');
								} 
							?>
						</select>
						<div class="vbei_cena">Цена: <span>10</span> грн/литр</div>
						<select name="select_obem">
							<option selected="selected" value="0">Выберите обьём</option>
							<option value="10">10 литров</option>
							<option value="20">20 литров</option>
							<option value="1000">1000 литров</option>
							<option value="other">Другой обьём</option>
						</select>
						<input type="text" class="input_litr" placeholder="Введите обьём, л">
						<div class="clear"></div>
					</div>
					<div class="raschety">
						<div class="raschot_cen">Рассчитать цену со скидкой</div>
						<div class="cena_skidka">Цена со скидкой: <span class="cena1">2000</span> <span class="cena2">1800</span> грн</div>
					</div>	
					<div class="uspey">Успейте оставить заявку<br>на приобретение продукции<br>в течении 72 часов<span> со скидкой!</span></div>
					<div class="timer">
						<div class="timer_item" id="hours2">0</div>
						<div class="timer_item" id="hours1">4</div>
						<div class="timer_item" id="minutes2">2</div>
						<div class="timer_item" id="minutes1">4</div>
						<div class="timer_item" id="seconds2">5</div>
						<div class="timer_item" id="seconds1">9</div>
					</div>
					<div class="knopka_zakazat">Заказать!</div>
			</div>
		</div>
		<div class="kakrab_bottom">
<!--			<div class="form">
				<div class="form_container">
					<h3><span>Форма</span> обратной связи</h3>
					<input type="text" name="name" placeholder="Ваше имя">
					<input type="text" name="phone" placeholder="Ваш телефон">
					<input type="hidden" name="cena">
					<input type="hidden" name="nazv_tov">
					<input type="hidden" name="kol_litr">
					<input type="submit" value="Сделать заказ">
				</div>
			</div>	-->
		</div>
<!--	</form>	-->
	<div class="predstavitelstva" id="contacts">
		<div class="container">
			<h1>Наши представительства</h1>	
			<div class="predst_items">
				<div class="predst_item" id="map_adr1">Днепр<p class="ulica">Cтроителей 25 офис 317</p><p class="telefon">‎+380 (67) 829-11-05</p></div>
				<div class="predst_item" id="map_adr3">Киев<p class="ulica">Азербайджанская 25 офис 3</p><p class="telefon">‎+380 (67) 654-40-44</p></div>
				<div class="predst_item" id="map_adr2">Краматорск<p class="ulica">Шкадинова 34</p><p class="telefon">+380 (98) 196-01-49</p></div>
				<div class="clear"></div>
			</div>
			<div class="map"><div id="map"></div></div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="footer_logo"></div>
			<div class="footer_menu">
				<ul>
					<li><a href="#main">Главная</a></li>
					<li><a href="#product">Продукция</a></li>
					<li><a href="#how">Как мы работаем</a></li>
					<li><a href="#contacts">Контакты</a></li>
				</ul>
			</div>
			<div class="footer_counter">
				<div class="footer_tel">‎+380 (67) 829-11-05</div>
				<!--LiveInternet counter--><script type="text/javascript">
				document.write("<a href='//www.liveinternet.ru/click' "+
				"target=_blank><img src='//counter.yadro.ru/hit?t12.6;r"+
				escape(document.referrer)+((typeof(screen)=="undefined")?"":
				";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
				screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
				";"+Math.random()+
				"' alt='' title='LiveInternet: показано число просмотров за 24"+
				" часа, посетителей за 24 часа и за сегодня' "+
				"border='0' width='88' height='31'><\/a>")
				</script><!--/LiveInternet-->
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer_copyright"><p>Разработано компанией</p><a href="http://qwertyx.net/" target="_blanc"><img src = "images/logo-qwertyx.svg"></a><div class="clear"></div></div>
	</div>
</body>
<script>
	var i=1;
	var text = new Array();
	<?php for ($i=1;$i<=6;$i++): ?>
		text[i] = '<?php echo $text[$i]; ?>';
		i++;
	<?php endfor; ?>
	$(".vbei select[name='select_prod']").change(function(){
		$(".input_litr").fadeOut(300);
		$(".cena_skidka").fadeOut(300);
		select_index=$(".vbei select[name='select_prod']").val();
		if(select_index=='0'){ $(".raschot_cen").fadeOut(300); }
		if(select_index!='0'){
			$(".raschot_cen").fadeIn(300);
			$(".vbei select[name='select_obem']").fadeIn(300);
			$(".vbei select[name='select_prod']").css('float','left').css('margin-left','0');
			cena=$(".vbei select option:selected").attr('id');
			$(".vbei_cena span").html(cena);
			$(".vbei_cena").fadeIn(300);
			if($(".input_litr").val()!=""){
				$(".cena_skidka").animate({'opacity':'1'},300);
				raschot();
			}
		}
		else{
			$(".vbei_cena").fadeOut(300);
		}
	});
	$(".input_litr").change(function(){
		$(".cena_skidka").fadeOut(300);
		$(".raschot_cen").delay(300).fadeIn(300);
	});
	$(".vbei select[name='select_obem']").change(function(){
		select_obem_index=$(".vbei select[name='select_obem']").val();
		if(select_obem_index!='0'){
			$(".raschot_cen").animate({'opacity':'1'},300);
			$(".raschot_cen").delay(300).fadeIn(300);
		}
		if(select_obem_index=='0'){
			$(".raschot_cen").animate({'opacity':'0'},300);
		}
		if(select_obem_index=='other'){
			$(".vbei select[name='select_obem']").fadeOut(300);
			$(".input_litr").delay(300).fadeIn(300);
		}
		$(".cena_skidka").fadeOut(300);
	});
	$(".raschot_cen").click(function(){
		$(this).fadeOut(300);
		$(".cena_skidka").delay(300).fadeIn(300);
		raschot();
	});
	function raschot(){
		if(select_obem_index=='other'){ var cena_bez_skidki = parseInt(cena)*parseInt($(".input_litr").val()); }
		else { var cena_bez_skidki = parseInt(cena)*parseInt(select_obem_index); }
		var cena_so_skidkoy = cena_bez_skidki-cena_bez_skidki/10;
		$(".cena_skidka .cena1").html(cena_bez_skidki);
		$(".cena_skidka .cena2").html(cena_so_skidkoy);
		$("#form_popup5 input[name='cena']").val(cena_so_skidkoy);
		$("#form_popup5 input[name='nazv_tov']").val(select_index);
		if(select_obem_index=='other') {$("#form_popup5 input[name='kol_litr']").val($(".input_litr").val()); }
		else{ $("#form_popup5 input[name='kol_litr']").val(select_obem_index); }
	}
</script>
<script src="css3-animate-it.js"></script>
</html>