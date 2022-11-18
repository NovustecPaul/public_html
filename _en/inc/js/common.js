function G_URL(){
	//return 'https://snsdev.hyundai.com';//+window.location.host;
	return window.location.protocol+"//"+window.location.host;
}

function G_AJAX_URL(){
	return G_URL()+"/ajax.php";
}

//debug
function _(str) {
	if (window.console && window.console.log)
		console.log(str);		
}

//popup window
function ssl_popup(name,url,w,h){
		window.open(url,name,"scrollbars=yes,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=yes,width="+w+",height="+h);
}

function ssl_close(){
    if (/MSIE/.test(navigator.userAgent)){
        //Explorer 8이상일때
        if(navigator.appVersion.indexOf("MSIE 8.0")>=0){
            window.opener='Self';
            window.open('','_parent','');
            window.close();
        }
        //Explorer 7이상일때
        else if(navigator.appVersion.indexOf("MSIE 7.0")>=0){
            window.open('about:blank','_self').close();
        }
        //Explorer 7미만일때
        else{
            window.opener = self;
            self.close();
        }
		window.open('about:blank', '_self').close();
    }
}



function _w(s){document.write(s);}

//trim
String.prototype.trim = function() {
	return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}

//바이트 갯수
function cntByte(str){
	  var now_str = str
	  var now_len = str.length;              //현재 value값의 글자 수 
	  
	  var i = 0;                                  //for문에서 사용할 변수 
	  var cnt_byte = 0;                            //한글일 경우 2 그외에는 1바이트 수 저장 
	  var sub_cnt = 0;                             //substring 할때 사용할 제한 길이를 저장 
	  var chk_letter = "";                         //현재 한/영 체크할 letter를 저장 
	  
	  
	  for (i=0; i<now_len; i++) 
	  { 
		 //1글자만 추출 
		 chk_letter = now_str.charAt(i); 
		 // 체크문자가 한글일 경우 2byte 그 외의 경우 1byte 증가 
		 if (escape(chk_letter).length > 4) 
		 {
			 //한글인 경우 2byte 
			 cnt_byte += 2; 
		 }else{ 
			 //그외의 경우 1byte 증가 
			 cnt_byte++; 
		 }	  
		 // 제한할 문자까지의 count값을 sub_cnt에 누적 
		 sub_cnt = i + 1; 
	  } 
	  return cnt_byte;
}



function add_comma(number){
	var new_num = String(number);
	var pattern = /(-?[0-9]+)([0-9]{3})/;	 
	while(pattern.test(new_num)) {
	  new_num = new_num.replace(pattern,"$1,$2");
	}
	return new_num;
}

/*
var number_format = {
	type1: function(x){
		// 1000 단위 콤마
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	},
	type2: function(x){
		// 1000 단위 콤마 찍힌것을 정수로 리턴
		 return parseInt(x.split(",").join(""));
	}
}
*/





























(function($) {

/*백그라운드 에니메이션 수정  시작*/
	if(!document.defaultView || !document.defaultView.getComputedStyle){ // IE6-IE8
		var oldCurCSS = $.curCSS;
		$.curCSS = function(elem, name, force){
			if(name === 'background-position'){
				name = 'backgroundPosition';
			}
			if(name !== 'backgroundPosition' || !elem.currentStyle || elem.currentStyle[ name ]){
				return oldCurCSS.apply(this, arguments);
			}
			var style = elem.style;
			if ( !force && style && style[ name ] ){
				return style[ name ];
			}
			return oldCurCSS(elem, 'backgroundPositionX', force) +' '+ oldCurCSS(elem, 'backgroundPositionY', force);
		};
	}
	
	var oldAnim = $.fn.animate;
	$.fn.animate = function(prop){
		if('background-position' in prop){
			prop.backgroundPosition = prop['background-position'];
			delete prop['background-position'];
		}
		if('backgroundPosition' in prop){
			prop.backgroundPosition = '('+ prop.backgroundPosition;
		}
		return oldAnim.apply(this, arguments);
	};
	
	function toArray(strg){
		strg = strg.replace(/left|top/g,'0px');
		strg = strg.replace(/right|bottom/g,'100%');
		strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g,"$1px$2");
		var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
		return [parseFloat(res[1],10),res[2],parseFloat(res[3],10),res[4]];
	}
	
	$.fx.step. backgroundPosition = function(fx) {
		if (!fx.bgPosReady) {
			var start = $.curCSS(fx.elem,'backgroundPosition');
			if(!start){//FF2 no inline-style fallback
				start = '0px 0px';
			}
			
			start = toArray(start);
			fx.start = [start[0],start[2]];
			var end = toArray(fx.end);
			fx.end = [end[0],end[2]];
			
			fx.unit = [end[1],end[3]];
			fx.bgPosReady = true;
		}
		//return;
		var nowPosX = [];
		nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
		nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];           
		fx.elem.style.backgroundPosition = nowPosX[0]+' '+nowPosX[1];
	};
/*백그라운드 에니메이션 수정  끝*/
	
	
	
	
	
	
var contact_us_html ='\
<div id="contact_us">\
	<h5><img src="inc/img/sub_title_contact.png" alt="Novustec contact us" /></h5>\
    <p>Drop us a note and we will respond quickly!</p>\
    <div class="btn_close"></div>\
    <form>\
		<input id="guest_name" type="text" class="input_text" value="Name" />\
		<input id="guest_email" type="text" class="input_text" value="Email" />\
		<textarea id="guest_msg">Message</textarea>\
		<input id="btn_submit" type="submit" value="Send" />\
    </form>\
    <dl>\
    	<dt>NOVUSTEC</dt>\
        <dd class="addr">A-503, Keumkang-Penterium IT Tower, 215, Galmachi-ro, Jungwon-gu, Sungnam-si, Korea<br /><span>AM 8:00 – PM 6:00, Monday - Friday</span></dd>\
        <dd class="contact_num">\
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+82-31-745-3690<br />\
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+82-10-4204-3225<br />\
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+82-31-745-3691\
        </dd>        \
        <dd class="map">\
        	<a href="http://naver.me/GTMycZtk">\
            	<img style="border:1px solid #aaa" src="inc/img/map.png" alt="Novustec" />\
            </a>\
        </dd>\
    </dl>\
    <div class="cb"></div>\
</div>\
'
$('body').prepend(contact_us_html);
	
$('#btn_pop_contact').on('click', function(){
	$('#contact_us').layer_pop_start();
});
	
$('#contact_us input:text, #contact_us textarea').d_v_fn({ 'font_color':'#333' });


$('#btn_submit').click(function(){
	var ing_text = 'Sending...';	
	var ing = $('#btn_submit').val();
	if(ing == ing_text){
		_(ing_text);
		return;
	}
	$('#btn_submit').val(ing_text);
	
	$.getJSON('ajax.php',{
			'name':$('#guest_name').val(),
			'mail':$('#guest_email').val(),
			'msg':$('#guest_msg').val(),
		},function(r){
			_(r);
			$('#btn_submit').val('Send');
	});
});



})(jQuery);




//상단네비
function setNav(m){
	$('#main_nav .gnb').removeClass('on');
	$('#'+m).addClass('on');
}





var old_ie = false; //IE7, IE8 체크
var old_ie_9 = false;
if(navigator.appVersion.indexOf("MSIE 8.0") != -1 || navigator.appVersion.indexOf("MSIE 7.0") != -1 || navigator.appVersion.indexOf("MSIE 9.0") != -1) {
	old_ie_9 = true;
}
if(navigator.appVersion.indexOf("MSIE 8.0") != -1 || navigator.appVersion.indexOf("MSIE 7.0") != -1) {
	old_ie = true;
}


