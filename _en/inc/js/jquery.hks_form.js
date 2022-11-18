/*form 관련 라이브러리 by hankiseon 2012.01.20*/
/*첫시작... thanks to hsm, hcp...*/




//default_value값을 기억하고, focus시 설정한 효과 적용(

(function($){
	
	
	$.fn.d_v_fn = function(options, callback){
		
		if($.isFunction(options)){
				callback = options;
				options = null; 
		}
		options = $.extend({}, $.fn.d_v_fn.defaults , options);	
		
		return this.each(function(){	
		
			var default_value = $(this).val();
			var default_font_color, default_border_color, default_bg_color, default_box_shadow;
			default_font_color = $(this).css('color');
			default_border_color = $(this).css('border-color');
			default_bg_color = $(this).css('background-color');

			if(default_bg_color == 'transparent'){
				if(navigator.appVersion.indexOf("MSIE 8.0") != -1 || navigator.appVersion.indexOf("MSIE 7.0") != -1) {
					default_bg_color = 'none';
				}				
			}
			default_box_shadow = $(this).css('box-shadow');
			
			
			
			$(this).focus(function(){
				if($(this).val()==default_value){
					$(this).val('');
				}
				$(this)
				.css({
					'color':options.font_color,
					'border-color':options.border_color,
					'background-color':options.bg_color,
					'box-shadow':options.box_shadow,
					'-moz-box-shadow':options.box_shadow,
					'-webkit-box-shadow':options.box_shadow														
				})				
				.addClass(options.add_class);
			});//focus
			
			$(this).blur(function(){
				if($(this).val()==''){
					$(this).val(default_value)
					.css('color',default_font_color);
				}
				$(this).css({					
					'border-color':default_border_color,
					'background-color':default_bg_color,
					'box-shadow':default_box_shadow,
					'-moz-box-shadow':default_box_shadow,
					'-webkit-box-shadow':default_box_shadow																							
				});
				if(options.add_class!=null){
					$(this).removeClass(options.add_class);
				}		
			});//blur		
			
		});//$(this).each
		
	}//$.fn.d_v_fn
	
	
	$.fn.d_v_fn.defaults = {
		font_color:null,   
		border_color:null,		
		bg_color:null,
		box_shadow:null,
		add_class:null
	}	
	
	
})(jQuery);
