$(document).ready(function(){
	formreset();
	var cena='0';
	var select_index=$(".vbei select").val();
	var select_obem_index=$(".vbei select").val();
	$('a[href^="#"]').click(function () { 
	     elementClick = $(this).attr("href");
	     destination = $(elementClick).offset().top;
	       $('body').animate( { scrollTop: destination }, 1100 );
	     return false;
   });
	$("#map_adr1").click(function(){
		myMap.setCenter([48.424781,35.001613], 16);
		$(".predst_item").removeClass("map_item_active");
		$(this).addClass("map_item_active");
	});
	$("#map_adr2").click(function(){
		myMap.setCenter([48.741964,37.586379], 16);
		$(".predst_item").removeClass("map_item_active");
		$(this).addClass("map_item_active");
	});
	$("#map_adr3").click(function(){
		myMap.setCenter([50.443517,30.649451], 16);
		$(".predst_item").removeClass("map_item_active");
		$(this).addClass("map_item_active");
	});
	$(".product_item").mouseover(function(){
		$(this).children(".product_desc_hide").stop().fadeIn(300);
	});
	$(".product_item").mouseout(function(){
		$(this).children(".product_desc_hide").stop().fadeOut(300);
	});
	function updater(h1, h2, m1, m2, s1, s2) {
	  // День сброса - 26 декабря 2016 года (и далее каждый день)
	  var baseTime = new Date(2017, 03, 27);
	  // Период сброса — 3 дня
	  var period = 72*60*60*1000;

	  function update() {
	    var cur = new Date();
	    // сколько осталось миллисекунд
	    var diff = period - (cur - baseTime) % period;
	    // сколько миллисекунд до конца секунды
	    var millis = diff % 1000;
	    diff = Math.floor(diff/1000);
	    // сколько секунд до конца минуты
	    var sec = diff % 60;
	    var sec1 = sec % 10;
	    var sec2 = Math.floor(sec/10);
	    diff = Math.floor(diff/60);
	    // сколько минут до конца часа
	    var min = diff % 60;
	    var min1 = min %10;
	    var min2 = Math.floor(min/10);
	    diff = Math.floor(diff/60);
	    // сколько часов до конца дня
	    var hours = diff % 72;
	    var hours1 = hours %10;
	    var hours2 = Math.floor(hours/10);
	    h1.innerHTML = hours1;
	    h2.innerHTML = hours2;
	    m1.innerHTML = min1;
	    m2.innerHTML = min2;
	    s1.innerHTML = sec1;
	    s2.innerHTML = sec2;
	  
	    // следующий раз вызываем себя, когда закончится текущая секунда
	    setTimeout(update, millis);
	  }
	  setTimeout(update, 0);
	}
	updater(document.getElementById("hours1"),document.getElementById("hours2"), document.getElementById("minutes1"), document.getElementById("minutes2"),
	 document.getElementById("seconds1"),document.getElementById("seconds2"));	
	$(".popup_overlay").click(function(){
		formreset();
		$(".popup").fadeOut(300);
	});
	$(".popup_close").click(function(){
		formreset();
		$(".popup").fadeOut(300);
	});
	$(".top_knopka").click(function(){
		$(".popup").fadeIn(300);
		$("#form_popup1").fadeIn(300);
	});
	$(".product_desc").click(function(){
		$(".popup").fadeIn(300);
		$("#form_popup2").fadeIn(300);
		if($(this).attr('id')=='product_desc1'){ $("#form_popup2 input[name='vid_producta']").val('1') }
		else if($(this).attr('id')=='product_desc2'){ $("#form_popup2 input[name='vid_producta']").val('2') }
		else if($(this).attr('id')=='product_desc3'){ $("#form_popup2 input[name='vid_producta']").val('3') }
		else if($(this).attr('id')=='product_desc4'){ $("#form_popup2 input[name='vid_producta']").val('4') }
		else if($(this).attr('id')=='product_desc5'){ $("#form_popup2 input[name='vid_producta']").val('5') }
		else{ $("#form_popup2 input[name='vid_producta']").val('6') }
	});
	$(".send_price").click(function(){
		$(".popup").fadeIn(300);
		$("#form_popup3").fadeIn(300);
	});
	$(".send_zakaz").click(function(){
		$(".popup").fadeIn(300);
		$("#form_popup4").fadeIn(300);
	});
	$(".knopka_zakazat").click(function(){
		$(".popup").fadeIn(300);
		$("#form_popup5").fadeIn(300);
	});
	function formreset(){
		$("#form_popup1").fadeOut(300);
		$("#form_popup2").fadeOut(300);
		$("#form_popup3").fadeOut(300);
		$("#form_popup4").fadeOut(300);
		$("#form_popup5").fadeOut(300);
		$(".modal_thanks").fadeOut(300);
		$(".modal_descr").fadeOut(300);
	};
	$("form").submit(function() {
		if($(this).find("input[name='phone']").length>0 && $(this).find("input[name='email']").length==0 && $(this).find("input[name='phone']").val()==''){ $(this).find("input[name='phone']").css("background","yellow"); return false;}
		else if($(this).find("input[name='email']").length>0 && $(this).find("input[name='email']").val()==''){ $(this).find("input[name='email']").css("background","yellow"); return false;}
		else{
			var th = $(this);
			$.ajax({
				type: "POST",
				url: "send.php", //Change
				data: th.serialize()
			}).done(function() {
				formreset();
				$(".modal_thanks").fadeIn(300);
				$(".popup").fadeIn(300);		
				setTimeout(function() {
					$(".popup").fadeOut();
					th.trigger("reset");
				}, 5000);
			});
			return false;
		};
	});
	$(".product_desc_hide").click(function(){
		var element_index = $( ".product_desc_hide" ).index( this )+1;
		var elemaen_text = text[element_index];
		var element_zag = $(this).parent(".product_item").children(".product_desc").html();
		$(".modal_descr h3").html(element_zag);
		$(".modal_descr .text").html(elemaen_text);
		$(".popup").fadeIn(300);
		$(".modal_descr").fadeIn(300);
		if($(this).attr('id')=='product_desc_hide1'){ $("#form_popup2 input[name='vid_producta']").val('1') }
		else if($(this).attr('id')=='product_desc_hide2'){ $("#form_popup2 input[name='vid_producta']").val('2') }
		else if($(this).attr('id')=='product_desc_hide3'){ $("#form_popup2 input[name='vid_producta']").val('3') }
		else if($(this).attr('id')=='product_desc_hide4'){ $("#form_popup2 input[name='vid_producta']").val('4') }
		else if($(this).attr('id')=='product_desc_hide5'){ $("#form_popup2 input[name='vid_producta']").val('5') }
		else{ $("#form_popup2 input[name='vid_producta']").val('6') }
	});
	$(".modal_descr .text_zakaz").click(function(){
		$(".modal_descr").fadeOut(300);
		$("#form_popup2").fadeIn(300);
	});
	$(".strelka_top").click(function(){
		$('body').animate( { scrollTop: 0 }, 1100 );
	});
	$(".zvonok").click(function(){
		$(".popup").fadeIn(300);
		$("#form_popup4").fadeIn(300);
	});
})