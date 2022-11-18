/*layer popup 관련 라이브러리 by hankiseon 2012.09.28*/


// ex >>  $('target').layer_pop_start();


(function($){	
	
	$.fn.layer_pop_start = function(options, callback, end_callback){
		
		
		
		if($.isFunction(options) == true){
			callback = options;
			options = null; 
			callback.call(this);
		}		
		else if($.isFunction(callback) == true){
			callback.call(this);
		}

		

		
		options = $.extend({}, $.fn.layer_pop_start.defaults , options);	
		
		return this.each(function(){	
			var $tg = $(this);
			var $tg_id = $(this).attr('id');
			options.on_off_flag = true;
			if(options.scrollable == false){
				$('body').css('overflow','hidden');
			}
			
			if(options.m_scrollable == false){
				if(isMobile){
					$('body').css({ 'overflow':'hidden','position':'fixed' });
				}
			}
			
			function ww(){ //가로폭
				return $(window).width()+$(window).scrollLeft()+'px';
			}
			function wh(){ //세로폭				
				if($(window).height() < document.documentElement.scrollHeight){					
					return document.documentElement.scrollHeight+'px';	
				}
				else{
					return $(window).height()+'px';
				}
			}
			function tg_x(){ //x좌표
				return (($(window).width() - $tg.width())/2+$(window).scrollLeft())+'px';
			}
			function tg_y(){ //y좌표
				return (($(window).height() - $tg.height())/2+$(window).scrollTop())+'px';
			}			
			
			var black_cover = 
			'<div id="hks_black_cover" style=" display:none; z-index:'+options.bg_z_index+';\
			 position:fixed; top:0; left:0; width:'+ ww() +'; height:'+ wh() +'; background-color:'+options.bg_color+'; "></div>';			
			
			if($('html').find('#hks_black_cover').length == 0){
				$('body').prepend(black_cover);	
			}
			$('body').prepend($tg);	
			
			$tg.css({'position':'absolute','zIndex':options.z_index,'left':tg_x(),'top':tg_y()});
			
			if(options.	animation==true){
				$('#hks_black_cover').fadeTo(Math.floor((options.visible_time)/3*2),options.bg_alpha);
				$tg.fadeIn(options.visible_time);
			}
			else{
				$('#hks_black_cover').fadeTo(0,options.bg_alpha);
				$tg.show();
			}
			
			
			function react_fn(){	
				if(options.on_off_flag){	
					$('#hks_black_cover').css({'width':ww(),'height':wh()});
					
					if(options.center_move == true){
						if(options.	animation==true){
							setTimeout(function(){	
								if($tg.css('left') != tg_x() || $tg.css('top') != tg_y()){ 															
									$tg.stop().animate({'left':tg_x(),'top':tg_y()},options.easing_move_speed);
								}
							},options.easing_before_delay);
	
						}
						else{
							$tg.css({'left':tg_x(),'top':tg_y()})	
						}
					}
				}
			}
			
			
			$(window).resize(function(){react_fn();});//resize
			$(window).scroll(function(){react_fn();});//scroll		
				
				
			function close_fn(){
				if(options.	animation==true){
					$('#hks_black_cover').fadeOut(options.hidden_time,function(){						
						$('#hks_black_cover').remove();	
					});
					$tg.fadeOut(options.hidden_time, function(){
						if($.isFunction(end_callback) == true){
							end_callback.call(this);
						}
					});					
				}
				else{
					$('#hks_black_cover').hide(0,function(){
						$('#hks_black_cover').remove();	
					});
					$tg.hide(function(){
						if($.isFunction(end_callback) == true){							
							end_callback.call(this);
						}	
					});
				}				
				$('body').css({ 'overflow':'auto', 'position':'relative' });			
				options.on_off_flag = false;
			}
							
			
			$tg.find('.'+options.close_btn_class_name).click(function(){				
				close_fn();
			});			
			if(options.black_cover_close){
				$('#hks_black_cover').click(function(){
					close_fn();
				});
			}
			
		});//$(this).each
		
	}//$.fn.layer_pop_start


	
	$.fn.layer_pop_close = function(options, callback){
		if($.isFunction(callback) == true){
			callback.call(this);
		}
		
		if($.isFunction(options) == true){
			callback = options;
			options = null; 
			callback.call(this);
		}
		
		options = $.extend({}, $.fn.layer_pop_start.defaults , options);			
		
		
		return this.each(function(){	
			var $tg = $(this);
			if(options.	animation==true){
				$('#hks_black_cover').fadeOut(options.hidden_time,function(){						
					$('#hks_black_cover').remove();	
				});
				$tg.fadeOut(options.hidden_time);					
			}
			else{
				$('#hks_black_cover').hide(0,function(){
					$('#hks_black_cover').remove();	
				});
				$tg.hide();					
			}
			$('body').css({ 'overflow':'auto', 'position':'relative' });			
			options.on_off_flag = false;
		});
	}

	
	$.fn.layer_pop_start.defaults = {
		z_index:2000,	// 타겟 z-index	
		bg_z_index:1999, // 블랙커버 z-index	
		bg_color:'#000',  // 블랙커버 색상
		bg_alpha:0.7, // 블랙커버 투명도
		center_move:false, //창크기 변화시 센터로 위치조정 여부
		animation:true, //on, off 및 이동시 애니매이션 여부
		easing_move_speed:500, //부드러운 움직임시 이동속도
		easing_before_delay:300, //부드러운 움직임시 민감도
		visible_time:500, //팝업창 켜지는 시간
		hidden_time:300, //팝업창 꺼지는 시간
		scrollable:true, //팝업창 켜질시 스크롤 가능여부
		m_scrollable:true, //팝업창 켜질시 모바일에서 스크롤 가능여부 isMobile.js 필요
		close_btn_class_name:'btn_close', //닫기버튼 class_name
		black_cover_close:true, //닫기버튼 외에 백그라운드를 클릭했을때도 꺼지게
		on_off_flag:false
	}	
	
})(jQuery);
