<?
include_once "_hd.php";
?>

<style type="text/css">
#main #bd #main_con #main_support_con_wrap dl,
#main #bd #main_con #main_support_con_wrap dl dd.icon{ height:100px}
dd.desc{ display:none;}


#main #bd #main_con p.desc { margin:0px 0px;text-align:left; padding:10px;}
#main_con{ text-align:left}

#main_con h3{color:#1184ba; text-align:left; font-size:24px; font-weight:bold; width:100% !important;padding:10px;}
</style>

<div id="main" class="wrap">

	<?
	include_once "_gnb.php";
	?>
    
    
    <div id="bd">
    	<div id="img_slide_wrap">
        	<div id="img_slide_text_box">
            	<h2>
                	<div id="roll_title_wrap">
                        <p class="roll_0">Relentless Evolution</p>
                        <p class="roll_1">Inspired Creation</p>
                        <p class="roll_2">Service Excellence</p>
                    </div>
                </h2>
				<div class="desc">
                	<div id="roll_desc_wrap">
                        <p class="roll_0">Led by a group of young experts with great passion on coffee and roasters.</p>
                        <p class="roll_1">Our official distributors near you will provide with installation and maintenance.</p>
                        <p class="roll_2">Designed and crafted by coffee roasters. we tune into our consumers and produce the best results.</p>
					</div>                    
                </div>                
            </div><!--#img_slide_text_box-->
            
            <div id="roll_img_wrap">
            	<div id="roll_img_inner_wrap">
                    <img class="roll_img" id="roll_img_0" src="inc/img/main_slide_img_0.png" />
                    <img class="roll_img" id="roll_img_1" src="inc/img/main_slide_img_1.png" />
                    <img class="roll_img" id="roll_img_2" src="inc/img/main_slide_img_2.png" />
                    <div class="cb"></div>
                </div>
            </div>
            
            <div class="btn_slide_arrow left"></div>
            <div class="btn_slide_arrow right"></div>    
            
            <ul id="img_slide_nav">
            	<li id="img_slide_nav_0" class="on btn_slide_nav"></li>
            	<li id="img_slide_nav_1" class="btn_slide_nav"></li>
            	<li id="img_slide_nav_2" class="last btn_slide_nav"></li>                                
            </ul>        
            <div class="cb"></div>
        </div><!--#img_slide_wrap-->
        
        
        <div id="main_con">
        	<h3 style="">Service and Support</h3>
            <p class="desc">TRINITAS roasters are built in our production center in Korea.<br>Please contact NOVUSTEC about questions, sales, technical support, or information on TRINITAS roasters, <br>or contact our authorized distributor in your area.</p>








            
            
            
            <div id="main_support_con_wrap" style="display:none">
            	<dl id="main_support_con_0">
                	<dt>Phone Care Service</dt>
                    <dd class="desc">노부스텍은 고객님들의 문의 전화를 <br>해결해 드리기 앞서,
전문 로스터가<br> 정기적으로 전화를 드려 로스터기의 <br>점검과 함께 로스팅 프로파일이나<br> 기타 궁금한 부분을 친절히 안내해<br>드립니다.</dd>
                    <dd class="icon"></dd>
                </dl>

            	<dl id="main_support_con_1">
                	<dt>Shop Care Service</dt>
                    <dd class="desc">노부스텍은 문제가 발생되기 이전에 <br>정기적으로 고객님을 방문하여 로스터기 사전 점검 및 기기 청소등의 케어 서비스를 제공해
드립니다.</dd>
                    <dd class="icon"></dd>
                </dl>
                
            	<dl id="main_support_con_2">
                	<dt>Warranty Service</dt>
                    <dd class="desc">노부스텍은 로스터기 구매 후, 1년간 <br>무료로  A/S 를 해 드리며, 이후<br> Extended Warranty 를 통해 보증기간을<br> 연장 하실 수 있습니다.</dd>
                    <dd class="icon"></dd>
                </dl>          
                <div class="cb"></div>                  
            </div><!--#main_support_con_wrap-->
            
           
            <div id="contact_num_wrap">
             <!--
             <img src="inc/img/main_contact_num.png" alt="Novustec 연락처 Phone:031-745-3690, H.P:010-4204-3225, Fax:031-745-3691" />
             -->
             </div>
            
       </div><!--#main_con-->
        
        
    </div><!--#bd-->
    
    
<?
include_once "_ft.php";
?>


</div><!--.wrap-->
<script type="text/javascript" src="inc/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="inc/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="inc/js/jquery.hks_layer_popup.js"></script>
<script type="text/javascript" src="inc/js/jquery.hks_form.js"></script>
<script type="text/javascript" src="inc/js/common.js"></script>
<script type="text/javascript">
$(function(){
	
var img_slide = {
	now_pos:0,
	roll_title_y:[0, -38, -76],
	roll_desc_y:[0, -44, -88],	
	start:function(){
		$('#img_slide_wrap .btn_slide_arrow').on('click', function(){	
			$('#img_slide_wrap .btn_slide_arrow').off('click');
			img_slide.slide_arrow_fn($(this));
		});		

		var timer = setInterval(function(){
			$('#img_slide_wrap .btn_slide_arrow').off('click');
			img_slide.slide_arrow_fn($('#img_slide_wrap .btn_slide_arrow.right'));
		},5000);
		
		$('#img_slide_wrap').click(function(){
			clearInterval(timer);
		});
	},	
	move_fn:function(this_img){	
		$('#img_slide_wrap #roll_title_wrap,#img_slide_wrap #roll_desc_wrap').fadeOut(200,function(){
			$('#img_slide_wrap #roll_title_wrap').css({ 'top':img_slide.roll_title_y[img_slide.now_pos]});
			$('#img_slide_wrap #roll_desc_wrap').css({ 'top':img_slide.roll_desc_y[img_slide.now_pos]});
		});
		
		
		$('#img_slide_wrap #roll_title_wrap,#img_slide_wrap #roll_desc_wrap').fadeIn(500);	
			
		this_img
			.css({ 'z-index':999 })
			.stop()
			.animate({ 'left':0 }, 2000, 'easeInOutExpo', function(){
				$('#img_slide_wrap #roll_img_inner_wrap img').css('z-index',1);
				
				this_img.css('z-index', 2);	
				$('#img_slide_wrap #img_slide_nav li').removeClass('on');
				$('#img_slide_wrap #img_slide_nav li#img_slide_nav_'+img_slide.now_pos).addClass('on');

				$('#img_slide_wrap .btn_slide_arrow').on('click', function(){	
					$('#img_slide_wrap .btn_slide_arrow').off('click');
					img_slide.slide_arrow_fn($(this));
				});	
				
				
				
				
			
			});		
			
			//$('#img_slide_wrap #roll_title_wrap').stop().animate({ 'top':img_slide.roll_title_y[img_slide.now_pos]} , 1000, 'easeOutExpo')
			//$('#img_slide_wrap #roll_desc_wrap').stop().animate({ 'top':img_slide.roll_desc_y[img_slide.now_pos]} , 1000, 'easeOutExpo')	
						
			
	},
	
	prev_fn:function(){
		img_slide.now_pos = Number(img_slide.now_pos) - 1;
		if(img_slide.now_pos == -1){
			img_slide.now_pos = 2;
		}
		
		var this_img = $('#img_slide_wrap #roll_img_inner_wrap #roll_img_'+img_slide.now_pos);
		this_img.css({ 'left':-1000 });			
		img_slide.move_fn(this_img);
	},
	
	next_fn:function(){
		img_slide.now_pos = Number(img_slide.now_pos) + 1;
		if(img_slide.now_pos == 3){
			img_slide.now_pos = 0;
		}
		var this_img = $('#img_slide_wrap #roll_img_inner_wrap #roll_img_'+img_slide.now_pos);
		this_img.css({ 'left':1000 });				
		img_slide.move_fn(this_img);		
	},
	
	slide_arrow_fn:function(tg){		
		if(tg.hasClass('left')){
			img_slide.prev_fn();	
		}
		else if(tg.hasClass('right')){
			img_slide.next_fn();
		}			
	}
}

img_slide.start();

setNav('m1');

});
</script>


</body>
</html>
